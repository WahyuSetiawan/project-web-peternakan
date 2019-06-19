<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelianAyamModel extends CI_Model
{

    public $table = "tb_detail_pembelian_ayam";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = false, $params = [])
    {
        if (isset($params['supplier'])) {
            $this->db->where("$this->table.id_supplier", $params['supplier']);
        }

        if (isset($params['kandang'])) {
            $this->db->where("$this->table.id_kandang", $params['kandang']);
        }

        $this->db->select("$this->table.*, "
            . kandangModel::$table . '.nama as nama_kandang, '
            . 'DATE_FORMAT(' . $this->table . '.tanggal, "%d-%m-%Y") as tanggal,'
            . KaryawanModel::$table . '.nama as nama_karyawan, '
            . SupplierModel::$table . '.nama as nama_supplier,'
            . AdminModel::$table . '.nama as nama_admin,'
            . 'admin_update.nama as update_by_admin_nama,'
            . 'jumlah_sisa_ayam, jumlah_penjualan, umur_ayam_sekarang,'
            . 'karyawan_update.nama as update_by_karyawan_nama');

        if ($id_pembelian_ayam) {
            $this->db->where('id_detail_pembelian_ayam', $id_pembelian_ayam);
        }

        $this->db->join(SupplierModel::$table, SupplierModel::$table . ".id_supplier = " . $this->table . ".id_supplier", 'inner');
        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . ".id_karyawan = $this->table.id_karyawan", 'left');
        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = $this->table.id_kandang", 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . ".id = $this->table.id_admin", 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', "admin_update.id = $this->table.update_by_admin", 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', "karyawan_update.id_karyawan = $this->table.id_karyawan", 'left');
        $this->db->join("view_sisa_pembelian", "view_sisa_pembelian.id_detail_pembelian_ayam = " . $this->table . ".id_detail_pembelian_ayam", "inner");
    }

    public function get($limit = false, $offset = false, $id_pembelian_ayam = null, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->select($id_pembelian_ayam, $params);

        $a =  $this->db->get($this->table)->result();
        return $a;
    }

    public function set($data)
    {
        $this->db->set("id_detail_pembelian_ayam", $this->newId());
        $this->db->insert($this->table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where('id_detail_pembelian_ayam', $id);
        $this->db->update($this->table, $data);
    }

    public function remove($id)
    {
        $this->db->where('id_detail_pembelian_ayam', $id);
        $this->db->delete($this->table);
    }

    public function countAll($params = [])
    {
        $this->select(false, $params);

        return count($this->db->get($this->table)->result());
    }

    public function newId()
    {
        $this->db->select('function_id_detail_pembelian_ayam() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }
}
