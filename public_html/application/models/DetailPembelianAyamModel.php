<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelianAyamModel extends CI_Model {

    var $table = "detail_pembelian_ayam";

    public function __construct() {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = null, $params = []) {
        $this->db->select('detail_pembelian_ayam.*, '
                . 'kandang.nama as nama_kandang, '
                . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
                . 'karyawan.nama as nama_karyawan, '
                . 'supplier.nama as nama_supplier,'
                . 'admin.nama as nama_admin,'
                . 'admin_update.nama as update_by_admin_nama,'
                . 'karyawan_update.nama as update_by_karyawan_nama');

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pembelian_ayam', $id_pembelian_ayam);
        }

        $this->db->join('supplier', 'supplier.id_supplier = detail_pembelian_ayam.id_supplier', 'inner');
        $this->db->join('karyawan', 'karyawan.id_karyawan = detail_pembelian_ayam.id_karyawan', 'left');
        $this->db->join('kandang', 'kandang.id_kandang = detail_pembelian_ayam.id_kandang', 'left');
        $this->db->join('admin', "admin.id = detail_pembelian_ayam.id_admin", 'left');
        $this->db->join('admin as admin_update', "admin_update.id = detail_pembelian_ayam.update_by_admin", 'left');
        $this->db->join('karyawan as karyawan_update', 'karyawan_update.id_karyawan = detail_pembelian_ayam.id_karyawan', 'left');
    }

    function get($limit = null, $offset = null, $id_pembelian_ayam = null, $params = []) {
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        $this->select($id_pembelian_ayam, $params);

        return $this->db->get($this->table)->result();
    }

    function set($data) {
        $this->db->set("id_detail_pembelian_ayam", $this->newId());
        $this->db->insert($this->table, $data);
    }

    function put($id, $data) {
        $this->db->where('id_detail_pembelian_ayam', $id);
        $this->db->update($this->table, $data);
    }

    function remove($id) {
        $this->db->where('id_detail_pembelian_ayam', $id);
        $this->db->delete($this->table);
    }

    function countAll() {
        return $this->db->count_all($this->table);
    }

    function newId() {
        $this->db->select('function_id_detail_pembelian_ayam() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
