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

    function get($limit = null, $offset = null, $id_pembelian_ayam = null) {
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id_pembelian_ayam != null) {
            $this->db->where('iid_detail_pembelian_ayam', $id_pembelian_ayam);
        }

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