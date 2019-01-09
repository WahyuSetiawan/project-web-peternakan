<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PersediaanModel extends CI_Model
{

    public $table = "persediaan";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($id_supplier = null)
    {
        if ($id_supplier != null) {
            $this->db->where('id_supplier', $id_supplier);
        }
    }

    public function get($limit = false, $offset = false, $id_persediaan = false, $id_supplier = false)
    {
        $this->select($id_supplier);

        if ($id_persediaan) {
            $this->db->where('id_persediaan', $id_persediaan);

            $data = $this->db->get($this->table)->row();

            $this->db->where("id_jenis", $data->id_persediaan);
            $this->db->join("detail_supplier_jenis", "detail_supplier_jenis.id_supplier = supplier.id_supplier", "inner");

            $data->data_supplier = $this->db->get("supplier")->result();

            return $data;

        } else {
            $data = $this->db->get($this->table, $limit, $offset)->result();

            foreach ($data as &$value) {
                $this->db->where("id_jenis", $value->id_persediaan);
                $this->db->join("detail_supplier_jenis", "detail_supplier_jenis.id_supplier = supplier.id_supplier", "inner");

                $value->data_supplier = $this->db->get("supplier")->result();
            }

            return $data;

        }
    }

    public function countAll()
    {
        $data = $this->db->get($this->table)->result();

        return count($data);
    }

    public function set($data)
    {
        $this->db->set("id_persediaan", $this->newId());
        $this->db->insert($this->table, $data);
        return $this->db->last_query();
    }

    public function put($data, $id)
    {
        $this->db->where('id_persediaan', $id);
        return $this->db->update($this->table, $data);
    }

    public function del($id)
    {
        $this->db->where('id_persediaan', $id);
        return $this->db->delete($this->table);
    }

    public function newId()
    {
        $this->db->select('function_id_persediaan() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
