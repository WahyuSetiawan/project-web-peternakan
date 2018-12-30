<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPengeluaranGudangModel extends CI_Model {

    var $table = "detail_pengeluaran_gudang";

    public function __construct() {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = null) {
        $this->db->select('detail_pengeluaran_gudang.*, '
                . 'kandang.nama as nama_kandang,'
                . 'karyawan.nama as nama_karyawan,'
                . 'type_gudang.keterangan as nama_persediaan');

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pengeluaran_gudang', $id_pembelian_ayam);
        }

        $this->db->join('kandang', 'kandang.id_kandang = detail_pengeluaran_gudang.id_kandang', 'left');
        $this->db->join('karyawan', 'karyawan.id_karyawan = detail_pengeluaran_gudang.id_karyawan', 'inner');
        $this->db->join('type_gudang', 'type_gudang.id_type_gudang = detail_pengeluaran_gudang.id_persediaan', 'inner');
        }

    function get($limit = null, $offset = null, $id_pembelian_ayam = null) {
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        $this->select($id_pembelian_ayam);

        return $this->db->get($this->table)->result();
    }

    function set($data) {
        $this->db->set("id_detail_pengeluaran_gudang", $this->newId());
        $this->db->insert($this->table, $data);
    }

    function put($id, $data) {
        $this->db->where('id_detail_pengeluaran_gudang', $id);
        $this->db->update($this->table, $data);
    }

    function remove($id) {
        $this->db->where('id_detail_pengeluaran_gudang', $id);
        $this->db->delete($this->table);
    }

    function countAll() {
        return $this->db->count_all($this->table);
    }

    function newId() {
        $this->db->select('function_id_detail_pengeluaran_gudang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
