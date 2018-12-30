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

    function get($limit = null, $offset = null, $id_pembelian_ayam = null) {
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pengeluaran_gudang', $id_pembelian_ayam);
        }

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
