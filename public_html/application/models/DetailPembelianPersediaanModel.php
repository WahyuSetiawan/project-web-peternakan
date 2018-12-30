<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelianPersediaanModel extends CI_Model {

    var $table = "detail_pembelian_gudang";

    public function __construct() {
        parent::__construct();
    }

    function get($limit = null, $offset = null, $id_pembelian_ayam = null) {
        $this->select($limit, $offset, $id_pembelian_ayam);

        $data = $this->db->get($this->table)->result();


        foreach ($data as &$value) {
            $this->db->where("id_jenis", $value->id_persediaan);
            $this->db->join("detail_supplier_jenis", "detail_supplier_jenis.id_supplier = supplier.id_supplier", "inner");

            $value->data_supplier = $this->db->get("supplier")->result();
        }

        return $data;
    }

    function select($limit = null, $offset = null, $id_pembelian_ayam = null) {
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pembelian_gudang', $id_pembelian_ayam);
        }

        $this->db->select('detail_pembelian_gudang.*, '
                . 'supplier.nama as nama_supplier, '
                . 'type_gudang.keterangan as nama_persediaan, '
                . 'karyawan.nama as nama_karyawan');

        $this->db->join('supplier', 'supplier.id_supplier = detail_pembelian_gudang.id_supplier', 'inner');
        $this->db->join("type_gudang", 'type_gudang.id_type_gudang = detail_pembelian_gudang.id_persediaan', 'inner');
        $this->db->join('karyawan', 'karyawan.id_karyawan = detail_pembelian_gudang.id_karyawan', 'left');
    }

    function set($data) {
        $this->db->set("id_detail_pembelian_gudang", $this->newId());
        $this->db->insert($this->table, $data);
    }

    function put($id, $data) {
        $this->db->where('id_detail_pembelian_gudang', $id);
        $this->db->update($this->table, $data);
    }

    function remove($id) {
        $this->db->where('id_detail_pembelian_gudang', $id);
        $this->db->delete($this->table);
    }

    function countAll() {
        return $this->db->count_all($this->table);
    }

    function newId() {
        $this->db->select('function_id_detail_pembelian_gudang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
