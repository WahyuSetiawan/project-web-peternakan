<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPenggunaanGudangModel extends CI_Model
{

    public static $table = "tb_detail_penggunaan_gudang";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = null, $params = [])
    {
        if (isset($params['gudang'])) {
            $this->db->where(self::$table . ".id_gudang", $params['gudang']);
        }

        if (isset($params['tanggal'])) {
            $this->db->where("date(tanggal) = date('" . $params['tanggal'] . "')");
            unset($params['tanggal']);
        }

        $this->db->select(self::$table . '.*, '
            . KaryawanModel::$table . '.nama as nama_karyawan,'
            . GudangModel::$table . '.nama as nama_gudang,'
            . AdminModel::$table . '.nama as nama_admin,'
            . KandangModel::$table . '.nama as nama_kandang,'
            .  JadwalKandangModel::$table . ".id_jadwal_kandang, " 
            .  JadwalKandangModel::$table . ".hari, " 
            . "date_format(" . JadwalKandangModel::$table . ".waktu_mulai, '%H:%i') as waktu_mulai,  " 
            . "date_format(" . JadwalKandangModel::$table . ".waktu_selesai, '%H:%i') as waktu_selesai,  "
            . 'tanggal,'
            . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal_datetime,'
            . 'DATE_FORMAT(time, "%H:%i") as tanggal_time_only,'
            . 'admin_update.nama as update_by_admin_nama,'
            . 'karyawan_update.nama as update_by_karyawan_nama');

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pengeluaran_gudang', $id_pembelian_ayam);
        }

        $this->db->join(JadwalKandangModel::$table, JadwalKandangModel::$table . ".id_jadwal_kandang = " . self::$table . ".id_jadwal", "left");
        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . ".id_karyawan = " . self::$table . ".id_karyawan", 'left');
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . self::$table . ".id_gudang", 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . ".id = " . self::$table . ".id_admin", 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', "admin_update.id = " . self::$table . ".update_by_admin", 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', "karyawan_update.id_karyawan = " . self::$table . ".update_by_karyawan", 'left');
    }

    public function get($limit = false, $offset = false, $id_pembelian_ayam = false, $params = [])
    {
        $this->db->limit($limit, $offset);
        $this->select($id_pembelian_ayam, $params);

        $a =  $this->db->get(self::$table)->result();
        return $a;
    }

    public function belum($limit = false, $offset = false, $id_pembelian_ayam = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->db->select(
            JadwalKandangModel::$table . ".id_jadwal_kandang, " .
                JadwalKandangModel::$table . ".hari, " .
                "date_format(" . JadwalKandangModel::$table . ".waktu_mulai, '%H:%i') as waktu_mulai,  " .
                "date_format(" . JadwalKandangModel::$table . ".waktu_selesai, '%H:%i') as waktu_selesai,  " .
                JadwalKandangModel::$table . ".catatan, " .
                JadwalKandangModel::$table . ".id_kandang, " .
                JadwalKandangModel::$table . ".id_gudang, " .
                KandangModel::$table . '.nama as nama_kandang,' .
                GudangModel::$table . '.nama as nama_gudang'
        );

        $this->db->where("
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('" . $params['tanggal'] . "'))");

        $this->db->where("" . JadwalKandangModel::$table . ".hari = date_format('" . $params['tanggal'] . "','%w')");

        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . JadwalKandangModel::$table . ".id_kandang", 'left');
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . JadwalKandangModel::$table . ".id_gudang", 'left');

        $a =  $this->db->get(JadwalKandangModel::$table)->result();

        return $a;
    }


    public function belum_gudang($limit = false, $offset = false, $id_pembelian_ayam = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->db->distinct();

        $this->db->select(
            JadwalKandangModel::$table . ".id_gudang as id_gudang, " .
                GudangModel::$table . '.nama'
        );

        $this->db->where("" . JadwalKandangModel::$table . ".hari = date_format('" . $params['tanggal'] . "','%w')");

        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . JadwalKandangModel::$table . ".id_kandang", 'left');
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . JadwalKandangModel::$table . ".id_gudang", 'left');

        $a =  $this->db->get(JadwalKandangModel::$table)->result();

        return $a;
    }

    public function belum_kandang($limit = false, $offset = false, $id_pembelian_ayam = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->db->distinct();

        $this->db->select(
            JadwalKandangModel::$table . ".id_kandang, " .
                KandangModel::$table . '.nama'
        );

        $this->db->where("" . JadwalKandangModel::$table . ".hari = date_format('" . $params['tanggal'] . "','%w')");

        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . JadwalKandangModel::$table . ".id_kandang", 'left');
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . JadwalKandangModel::$table . ".id_gudang", 'left');

        $a =  $this->db->get(JadwalKandangModel::$table)->result();

        return $a;
    }


    public function set($data)
    {
        $this->db->set("id_detail_penggunaan_gudang", $this->newId());
        $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where('id_detail_penggunaan_gudang', $id);
        $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where('id_detail_penggunaan_gudang', $id);
        $this->db->delete(self::$table);
    }

    public function countAll($params = [])
    {
        $this->select(false, $params);
        return count($this->db->get(self::$table)->result());
    }

    public function newId()
    {
        $this->db->select('function_id_detail_pengeluaran_gudang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }
}
