<?php

class DetailPenjualanAyamModel extends CI_Model {

    var $table = "detail_penjualan_ayam";

    public function __construct() {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = false, $params = []) {
        if (isset($params['kandang'])) {
            $this->db->where("$this->table.id_kandang", $params['kandang']);
        }

        $this->db->select("detail_penjualan_ayam.*, "
                . "kandang.nama as nama_kandang, "
                . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
                . "karyawan.nama as nama_karyawan,"
                . "admin.nama as nama_admin,"
                . "admin_update.nama as update_by_admin_nama, "
                . "karyawan_update.nama as update_by_karyawan_nama");

        if ($id_pembelian_ayam) {
            $this->db->where("id_detail_penjualan_ayam", $id_pembelian_ayam);
        }

        $this->db->join("kandang", "kandang.id_kandang = $this->table.id_kandang", "inner");
        $this->db->join("karyawan", "karyawan.id_karyawan = $this->table.id_karyawan", "left");
        $this->db->join("admin", "admin.id = $this->table.id_admin", "left");
        $this->db->join("admin as admin_update", "admin_update.id = $this->table.update_by_admin", "left");
        $this->db->join("karyawan as karyawan_update", "karyawan_update.id_karyawan = $this->table.update_by_karyawan", "left");
    }

    function get($limit = false, $offset = false, $id_pembelian_ayam = false, $params = []) {
        $this->db->limit($limit, $offset);
        $this->select($id_pembelian_ayam, $params);
        return $this->db->get($this->table)->result();
    }

    function set($data) {
        $this->db->set("id_detail_penjualan_ayam", $this->newId());
        $this->db->insert($this->table, $data);
    }

    function put($id, $data) {
        $this->db->where("id_detail_penjualan_ayam", $id);
        $this->db->update($this->table, $data);
    }

    function remove($id) {
        $this->db->where("id_detail_penjualan_ayam", $id);
        $this->db->delete($this->table);
    }

    function countAll($params) {
        $this->select(false, $params);
        return count($this->db->get($this->table)->result());
    }

    function newId() {
        $this->db->select("function_id_detail_penjualan_ayam() as id");
        $data = $this->db->get()->row();
        return $data->id;
    }

}
