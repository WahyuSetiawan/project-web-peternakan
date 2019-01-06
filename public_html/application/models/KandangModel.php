<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class KandangModel extends CI_Model
{

    public $table = "kandang";

    public function __construct()
    {
        parent::__construct();
    }

    public function set($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function select($id_kandang = false, $params = [])
    {
        if ($id_kandang) {
            $this->db->where('id_kandang', $id_kandang);
        }

        $this->db->select("$this->table.*, karyawan.nama as nama_karyawan");

        $this->db->join('karyawan', "karyawan.id_karyawan = $this->table.id_karyawan", 'inner');
    }

    public function get($limit = false, $offset = false, $id_kandang = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->select($id_kandang, $params);

        $data = $this->db->get($this->table)->result();

        if($id_kandang){
            return $data[0];
        }
        return $data;
    }

    public function put($data, $id)
    {
        $this->db->where('id_kandang', $id);
        $this->db->update($this->table, $data);
    }

    public function remove($id)
    {
        $this->db->where('id_kandang', $id);
        $this->db->delete($this->table);
    }

    public function countAll()
    {
        $this->select();

        $data = $this->db->get($this->table)->result();

        return count($data);
    }

    public function newId()
    {
        $this->db->select('function_id_kandang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
