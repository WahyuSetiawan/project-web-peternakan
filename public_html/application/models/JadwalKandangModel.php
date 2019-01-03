<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JadwalKandangModel extends CI_Model {

    var $table = "jadwal_kandang";

    public function __construct() {
        parent::__construct();
    }

    public function select($id_jadwal_kandang = false) {
        if ($id_jadwal_kandang) {
            $this->db->where('id_jadwal_kandang', $id_jadwal_kandang);
        }

        $this->db->select('jadwal_kandang.*,'
                . 'type_gudang.keterangan as nama_persediaan,'
                . 'kandang.nama as nama_kandang');

        $this->db->join('kandang', "kandang.id_kandang = $this->table.id_kandang", 'left');
        $this->db->join('type_gudang', "type_gudang.id_type_gudang = $this->table.id_persediaan", 'left');
    }

    public function set($data) {
        $this->db->insert($this->table, $data);
    }

    public function get($limit = null, $offset = null, $id_jadwal_kandang = null) {
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        $this->select($id_jadwal_kandang);

        $data = $this->db->get($this->table)->result();

        return $data;
    }

    public function put($data, $id) {
        $this->db->where('id_jadwal_kandang', $id);
        $this->db->update($this->table, $data);
    }

    public function remove($id) {
        $this->db->where('id_jadwal_kandang', $id);
        $this->db->delete($this->table);
    }

    public function countAll() {
        return $this->db->count_all($this->table);
    }

    public function newId() {
        $this->db->select('function_id_jadwal_kandang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
