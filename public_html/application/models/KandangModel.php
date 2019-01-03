<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class KandangModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function set($data) {
        $this->db->set('id_kandang', $this->newId());
        $this->db->insert('kandang', $data);
    }

    public function select($id_kandang = null, $params = []) {
        if ($id_kandang != null) {
            $this->db->where('id_kandang', $id_kandang);
        }
    }

    public function get($limit = null, $offset = null, $id_kandang = null, $params = []) {
        $this->db->select('kandang.*, karyawan.nama as nama_karyawan');


        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        $this->select($id_kandang, $params);
        
        $this->db->join('karyawan', 'karyawan.id_karyawan = kandang.id_karyawan', 'inner');


        $data = $this->db->get('kandang')->result();

        return $data;
    }

    public function put($data, $id) {
        $this->db->where('id_kandang', $id);
        $this->db->update('kandang', $data);
    }

    public function remove($id) {
        $this->db->where('id_kandang', $id);
        $this->db->delete('kandang');
    }

    public function countAll() {
        return $this->db->count_all('kandang');
    }

    public function newId() {
        $this->db->select('function_id_kandang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
