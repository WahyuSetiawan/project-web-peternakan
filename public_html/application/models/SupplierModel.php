<?php

class SupplierModel extends CI_Model
{

    public static $table = "supplier";

    public function __construct()
    {
        parent::__construct();
    }

    public function set($data)
    {
        $id = $this->newId();
        $this->db->set("id_supplier", $id);
        $this->db->insert(self::$table, $data);

        return $id;
    }

    public function select($params = array())
    {
        if (isset($params["jual_ayam"])) {
            $this->db->where("jual_ayam", $params["jual_ayam"]);
        }

        if (isset($params["type_gudang"])) {
            $this->db->join("detail_supplier_jenis", "detail_supplier_jenis.id_supplier = ".self::$table.".id_supplier", "inner");

            $this->db->where("id_jenis", $params["type_gudang"]);
        }
    }

    public function get($limit = false, $offset = false, $id_supplier = false, $params = array())
    {
        $this->select($params);

        if ($id_supplier) {
            $this->db->where("id_supplier", $id_supplier);

            $data = $this->db->get(self::$table)->row();

            $data->jenis = $this->detailJenisSupplierModel->get(null, null, null, ["",self::$table.".id_supplier" => $data->id_supplier]);

            return $data;
        } else {
            $data = $this->db->get(self::$table, $limit, $offset)->result();

            foreach ($data as &$value) {
                $value->jenis = $this->detailJenisSupplierModel->get(null, null, null, ["",self::$table.".id_supplier" => $value->id_supplier]);
            }

            return $data;
        }
    }

    public function put($data, $id)
    {
        $this->db->where("id_supplier", $id);
        $this->db->update(self::$table, $data);
    }

    public function remove($id)
    {
        $this->db->where("id_supplier", $id);
        $this->db->delete(self::$table);
    }

    public function vaksinJoinKandang()
    {
        $this->db->join("detail_kandang_vaksin", "detail_kandang_vaksin.id_vaksin = kandang.id_kandang", "inner");
        $this->db->join("kandang", "detail_kandang_vaksin.id_kandang = kandang.id_kandang", "inner");

        return $this->db->get("vaksin")->result();
    }

    public function countAll($params = [])
    {
        $this->select($params);

        $data = $this->db->get(self::$table)->result();

        return count($data);
    }

    public function newId()
    {
        $this->db->select("function_id_supplier() as id");
        $data = $this->db->get()->row();
        return $data->id;
    }

}
