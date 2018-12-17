<?php

class SupplierModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function set($data) {
        $id = $this->newId();
        $this->db->set('id_supplier', $id);
        $this->db->insert('supplier', $data);

        return $id;
    }

    public function get($limit = null, $offset = null, $param = array()) {
        if (isset($param['type_gudang'])) {
            $this->db->join('detail_supplier_jenis', 'detail_supplier_jenis.id_supplier = supplier.id_supplier', 'inner');

            $this->db->where('id_jenis', $param['type_gudang']);
        }

        $data = $this->db->get('supplier', $limit, $offset)->result();

        foreach ($data as &$value) {
            $value->jenis = $this->DetailJenisSupplierModel->get(null, null, null, array('supplier.id_supplier' => $value->id_supplier));
        }

        return $data;
    }

    public function put($data, $id) {
        $this->db->where('id_supplier', $id);
        $this->db->update('supplier', $data);
    }

    public function remove($id) {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }

    public function vaksinJoinKandang() {
        $this->db->join('detail_kandang_vaksin', 'detail_kandang_vaksin.id_vaksin = kandang.id_kandang', 'inner');
        $this->db->join('kandang', 'detail_kandang_vaksin.id_kandang = kandang.id_kandang', 'inner');

        return $this->db->get('vaksin')->result();
    }

    public function countAll() {
        return $this->db->count_all('supplier');
    }

    public function newId() {
        $this->db->select('function_id_supplier() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
