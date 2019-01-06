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

    function get($limit = false, $offset = false, $id_pembelian_ayam = false, $params = []) {
        $this->select($limit, $offset, $id_pembelian_ayam, $params);

        $data = $this->db->get($this->table)->result();


        foreach ($data as &$value) {
            $this->db->where("id_jenis", $value->id_persediaan);
            $this->db->join("detail_supplier_jenis", "detail_supplier_jenis.id_supplier = supplier.id_supplier", "inner");

            $value->data_supplier = $this->db->get("supplier")->result();
        }

        return $data;
    }

    function select($limit = false, $offset = false, $id_pembelian_ayam = false, $params = []) {
        $this->db->limit($limit, $offset);

        if (isset($params['persediaan'])) {
            $this->db->where("$this->table.id_persediaan", $params['persediaan']);
        }
        
         if (isset($params['supplier'])) {
            $this->db->where("$this->table.id_supplier", $params['supplier']);
        }

        if ($id_pembelian_ayam) {
            $this->db->where("id_detail_pembelian_gudang", $id_pembelian_ayam);
        }

        $this->db->select("detail_pembelian_gudang.*, "
                . "supplier.nama as nama_supplier, "
                . "persediaan.nama as nama_persediaan, "
                . "karyawan.nama as nama_karyawan,"
                . "admin.nama as nama_admin,"
                . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
                . "admin_update.nama as update_by_admin_nama,"
                . "karyawan_update.nama as update_by_karyawan_nama");

        $this->db->join("supplier", "supplier.id_supplier = $this->table.id_supplier", "inner");
        $this->db->join("persediaan", "persediaan.id_persediaan = $this->table.id_persediaan", "inner");
        $this->db->join("karyawan", "karyawan.id_karyawan = $this->table.id_karyawan", "left");
        $this->db->join("admin", "admin.id = $this->table.id_admin", "left");
        $this->db->join("admin as admin_update", "admin_update.id = $this->table.update_by_admin", "left");
        $this->db->join("karyawan as karyawan_update", "karyawan_update.id_karyawan = $this->table.update_by_karyawan", "left");
    }

    function set($data) {
        $this->db->set("id_detail_pembelian_gudang", $this->newId());
        $this->db->insert($this->table, $data);
    }

    function put($id, $data) {
        $this->db->where("id_detail_pembelian_gudang", $id);
        $this->db->update($this->table, $data);
    }

    function del($id) {
        $this->db->where("id_detail_pembelian_gudang", $id);
        $this->db->delete($this->table);
    }

    function countAll($params = []) {
        $this->select(false, false, false, $params);

        $data = $this->db->get($this->table)->result();

        return count($data);
    }

    function newId() {
        $this->db->select("function_id_detail_pembelian_gudang() as id");
        $data = $this->db->get()->row();
        return $data->id;
    }

}
