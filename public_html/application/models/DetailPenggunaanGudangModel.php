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

        $this->db->select(self::$table . '.*, '
            . KaryawanModel::$table . '.nama as nama_karyawan,'
            . GudangModel::$table . '.nama as nama_gudang,'
            . AdminModel::$table . '.nama as nama_admin,'
            . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
            . 'admin_update.nama as update_by_admin_nama,'
            . 'karyawan_update.nama as update_by_karyawan_nama');

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pengeluaran_gudang', $id_pembelian_ayam);
        }

        // $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
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

        return $this->db->get(self::$table)->result();
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
