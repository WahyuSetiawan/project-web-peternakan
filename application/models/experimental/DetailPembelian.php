<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelian extends CI_Model {

    public $table = 'detail_pemasukan_ayam';

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        return $this->db->get($this->table)->result();
    }

    public function set($data) {
        $this->db->set('id_detail_pemasukan_ayam', 'function_id_detail_pemasukan_ayam()', false);
        return $this->db->insert($this->table, $data);
    }

    public function put($data, $id) {
        $this->db->where('id_detail_pemasukan_ayam', $id);
        $this->db->update($this->table, $data);
    }

    public function del($id) {
        $this->db->where('id_detail_pemasukan_ayam', $id);
        return $this->db->delete($this->table);
    }

}
