<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelianGudang extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($limit, $offset) {
        return $this->db->get('detail_pembelian_gudang', $limit, $offset)->result();
    }

    public function set($data) {
        $this->db->set('id_detail_pembelian_gudang', 'function_id_detail_pembelian_gudang()', false);
        $this->db->insert('detail_pembelian_gudang', $data);
        return $this->db->insert_id();
    }

    public function put($data, $id) {
        $this->db->where('id_detail_pembelian_gudang', $id);
        return $this->db->update('detail_pembelian_gudang', $data);
    }

    public function del($id) {
        $this->db->where('id_detail_pembelian_gudang', $id);
        return $this->db->delete('detail_pembelian_gudang');
    }

}
