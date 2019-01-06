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

    public function select($id_jadwal_kandang = false, $params = []) {
        if (isset($params['kandang'])) {
            $this->db->where("$this->table.id_kandang", $params['kandang']);
        }

        if (isset($params['persediaan'])) {
            $this->db->where("$this->table.id_persediaan", $params['persediaan']);
        }

        if ($id_jadwal_kandang) {
            $this->db->where('id_jadwal_kandang', $id_jadwal_kandang);
        }
 
        $this->db->select('jadwal_kandang.*,'
                . 'persediaan.nama as nama_persediaan,'
                . 'kandang.nama as nama_kandang');

        $this->db->join('kandang', "kandang.id_kandang = $this->table.id_kandang", 'left');
        $this->db->join('persediaan', "persediaan.id_persediaan = $this->table.id_persediaan", 'left');
    }

    public function set($data) {
        $this->db->insert($this->table, $data);
    }

    public function get($limit = false, $offset = false, $id_jadwal_kandang = false, $params = []) {
        $this->db->limit($limit, $offset);

        $this->select($id_jadwal_kandang, $params);

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

    public function countAll($params = []) {
        $this->select(false, $params);

        return count( $this->db->get($this->table)->result());
    }

    public function newId() {
        $this->db->select('function_id_jadwal_kandang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
