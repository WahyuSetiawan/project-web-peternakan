<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailJenisSupplierModel extends CI_Model {
    
    var $table = "detail_supplier_jenis";

    public function __construct() {
        parent::__construct();
    }

    public function get($limit = null, $offset = null, $id = null, $where = null) {
        $this->structur($id, $where);
        return $this->db->get("detail_supplier_jenis", $limit, $offset)->result();
    }

    public function set($data) {
        $this->db->set("id_detail_supplier_jenis", "function_id_detail_supplier_jenis()", false);
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function put($data, $id) {
        $this->db->where("id_detail_supplier_jenis", $id);
        return $this->db->update($this->table, $data);
    }

    public function setArray($id, $data) {
        $this->db->where("id_supplier", $id);
        $this->db->where_not_in("id_jenis", $data);
        $this->db->delete($this->table);

        foreach ($data as $value) {
            $datadetailupdate = array(
                "id_supplier" => $id,
                "id_jenis" => $value
            );

            $this->db->where($datadetailupdate);
            $datadetail = $this->db->get("detail_supplier_jenis")->row();

            echo $this->db->last_query();

            if (isset($datadetail)) {
                $this->db->where("id", $datadetail->id);
                $this->db->update("detail_supplier_jenis", $datadetailupdate);
            } else {
                $this->db->insert("detail_supplier_jenis", $datadetailupdate);
            }
        }
    }

    public function delete($id) {
        $this->db->where("id", $id);
        return $this->db->delete("detail_supplier_jenis");
    }

    public function structur($id = null, $where = array()) {
        if (isset($id)) {
            $this->db->where("detail_supplier_jenis.id", $id);
        }
        $this->db->where($where);

        $this->db->join("supplier", "supplier.id_supplier = detail_supplier_jenis.id_supplier", "inner");
        $this->db->join("type_gudang", "type_gudang.id_type_gudang = detail_supplier_jenis.id_jenis", "inner");
    }

}
