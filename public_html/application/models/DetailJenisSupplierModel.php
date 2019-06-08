<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailJenisSupplierModel extends CI_Model
{
    public static $table = "tb_detail_supplier_jenis";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($limit = null, $offset = null, $id = null, $where = null)
    {
        $this->structur($id, $where);
        $a = $this->db->get(self::$table, $limit, $offset)->result();
        return $a;
    }

    public function set($data)
    {
        $this->db->set("id_detail_supplier_jenis", "function_id_detail_supplier_jenis()", false);
        $this->db->insert(self::$table, $data);
        return $this->db->insert_id();
    }

    public function put($data, $id)
    {
        $this->db->where("id_detail_supplier_jenis", $id);
        return $this->db->update(self::$table, $data);
    }

    public function setArray($id, $data)
    {
        $this->db->where("id_supplier", $id);
        $this->db->where_not_in("id_gudang", $data);
        $this->db->delete(self::$table);

        foreach ($data as $value) {
            $datadetailupdate = array(
                "id_supplier" => $id,
                "id_gudang" => $value,
            );

            $this->db->where($datadetailupdate);
            $datadetail = $this->db->get(self::$table)->row();

            if (isset($datadetail)) {
                $this->db->where("id", $datadetail->id);
                $this->db->update(self::$table, $datadetailupdate);
            } else {
                $this->db->insert(self::$table, $datadetailupdate);
            }
        }
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete(self::$table);
    }

    public function structur($id = null, $where = array())
    {
        if (isset($id)) {
            $this->db->where(self::$table . ".id", $id);
        }

        $this->db->where($where);

        $this->db->join(SupplierModel::$table, SupplierModel::$table . ".id_supplier = " . self::$table . ".id_supplier", "left");
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . self::$table . ".id_gudang", "left");
    }
}
