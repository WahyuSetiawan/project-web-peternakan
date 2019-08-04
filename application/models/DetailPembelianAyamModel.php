<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelianAyamModel extends CI_Model
{

    public static $table = "tb_detail_pembelian_ayam";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = false, $params = [])
    {
        if (isset($params['id_detail_group_transaksi'])) {
            $this->db->where("" . self::$table . ".id_detail_group_transaksi", $params['id_detail_group_transaksi']);
        }

        if (isset($params['supplier'])) {
            $this->db->where("" . self::$table . ".id_supplier", $params['supplier']);
        }

        if (isset($params['kandang'])) {
            $this->db->where("" . self::$table . ".id_kandang", $params['kandang']);
        }

        if (isset($params['id_detail_pembelian_ayam'])) {
            $this->db->where(self::$table . ".id_detail_pembelian_ayam", $params['id_detail_pembelian_ayam']);
        }

        $this->db->select("" . self::$table . ".*, "
            . kandangModel::$table . '.nama as nama_kandang, '
            . 'DATE_FORMAT(' . self::$table . '.tanggal, "%d-%m-%Y") as tanggal,'
            . KaryawanModel::$table . '.nama as nama_karyawan, '
            . SupplierModel::$table . '.nama as nama_supplier,'
            . AdminModel::$table . '.nama as nama_admin,'
            . 'admin_update.nama as update_by_admin_nama, '
            . 'jumlah_sisa_ayam, jumlah_penjualan, '
            . 'view_sisa_pembelian.umur_ayam_sekarang, '
            . 'view_stok_ayam.sisa_jumlah_ayam, '
            . 'jumlah_penjualan_harga, jumlah_kerugian_ayam ,(jumlah_penjualan_harga- harga_ayam) as harga_sisa,'
            . 'karyawan_update.nama as update_by_karyawan_nama');

        $this->db->order_by(self::$table . '.id_detail_pembelian_ayam', 'DESC');

        if ($id_pembelian_ayam) {
            $this->db->where(self::$table . '.id_detail_pembelian_ayam', $id_pembelian_ayam);
        }

        $this->db->join(SupplierModel::$table, SupplierModel::$table . ".id_supplier = " . self::$table . ".id_supplier", 'inner');
        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . ".id_karyawan =" . self::$table . ".id_karyawan", 'left');
        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . ".id = " . self::$table . ".id_admin", 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', "admin_update.id = " . self::$table . ".update_by_admin", 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', "karyawan_update.id_karyawan = " . self::$table . ".id_karyawan", 'left');
        $this->db->join("view_sisa_pembelian", "view_sisa_pembelian.id_detail_pembelian_ayam = " . self::$table . ".id_detail_pembelian_ayam", "inner");
        $this->db->join("view_stok_ayam", "view_stok_ayam.id_detail_group_transaksi = " . self::$table . ".id_detail_group_transaksi", "left");
    }

    public function get($limit = false, $offset = false, $id_pembelian_ayam = null, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->select($id_pembelian_ayam, $params);

        if ($id_pembelian_ayam != null) {
            $a = $this->db->get(self::$table)->row();

            $a->id_pembelian = $this->detailPembelianAyamModel->child(false, false, null, [
                'id_detail_group_transaksi' => $a->id_detail_group_transaksi,
            ]);

            return $a;
        } else {
            $a = $this->db->get(self::$table)->result();

            foreach ($a as $key => &$value) {
                $value->id_pembelian = $this->detailPembelianAyamModel->child(false, false, null, [
                    'id_detail_group_transaksi' => $value->id_detail_group_transaksi,
                ]);
            }

            return $a;
        }
    }

    public function child($limit = false, $offset = false, $id_pembelian_ayam = null, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->select($id_pembelian_ayam, $params);

        if (isset($params['id_detail_pembelian_ayam'])) {
            $a = $this->db->get(self::$table)->row();

            return $a;
        } else {
            $a = $this->db->get(self::$table)->result();

            return $a;
        }
    }

    public function set($data)
    {
        $this->db->set("id_detail_pembelian_ayam", $this->newId());
        $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where('id_detail_pembelian_ayam', $id);
        $this->db->update(self::$table, $data);
    }

    public function remove($id)
    {
        $this->db->where('id_detail_pembelian_ayam', $id);
        $this->db->delete(self::$table);
    }

    public function countAll($params = [])
    {
        $this->select(false, $params);

        return count($this->db->get(self::$table)->result());
    }

    public function newId()
    {
        $this->db->select('function_id_detail_pembelian_ayam() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }
}
