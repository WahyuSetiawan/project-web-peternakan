<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GudangModel extends CI_Model
{

    public static $table = "tb_gudang";

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

    public function get($limit = false, $offset = false, $id_gudang = false, $id_supplier = false)
    {
        $this->select($id_supplier);

        if ($id_gudang) {
            $this->db->where('id_gudang', $id_gudang);

            $data = $this->db->get(self::$table)->row();

            $this->db->where("id_gudang", $data->id_gudang);
            $this->db->join(DetailJenisSupplierModel::$table, DetailJenisSupplierModel::$table . ".id_supplier = " . SupplierModel::$table . ".id_supplier", "inner");

            $data->data_supplier = $this->db->get(SupplierModel::$table)->result();

            return $data;

        } else {
            $data = $this->db->get(self::$table, $limit, $offset)->result();

            foreach ($data as &$value) {
                $this->db->where("id_gudang", $value->id_gudang);
                $this->db->join(DetailJenisSupplierModel::$table, DetailJenisSupplierModel::$table . ".id_supplier = " . SupplierModel::$table . ".id_supplier", "inner");

                $value->data_supplier = $this->db->get(SupplierModel::$table)->result();
            }

            return $data;

        }
    }

    public function countAll()
    {
        $data = $this->db->get(self::$table)->result();

        return count($data);
    }

    public function set($data)
    {
        $this->db->set("id_gudang", $this->newId());
        $this->db->insert(self::$table, $data);
        return $this->db->last_query();
    }

    public function put($data, $id)
    {
        $this->db->where('id_gudang', $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where('id_gudang', $id);
        return $this->db->delete(self::$table);
    }

    public function newId()
    {
        $this->db->select('function_id_gudang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
