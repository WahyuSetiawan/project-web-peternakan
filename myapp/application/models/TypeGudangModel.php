<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TypeGudangModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($limit = null, $offset = null, $id_supplier = null) {
		if ($id_supplier != null) {
			$this->db->where('id_supplier', $id_supplier);
		}

		return $this->db->get('type_gudang', $limit, $offset)->result();
	}

	public function countAll() {
		return $this->db->count_all('type_gudang');
	}

	public function set($data) {
		$this->db->set("id_type_gudang", $this->newId());
		$this->db->insert('type_gudang', $data);
		return $this->db->last_query();
	}

	public function put($data, $id) {
		$this->db->where('id_type_gudang', $id);
		return $this->db->update('type_gudang', $data);
	}

	public function del($id) {
		$this->db->where('id_type_gudang', $id);
		return $this->db->delete('type_gudang');
	}

	public function newId() {
		$this->db->select('function_id_type_gudang() as id');
		$data = $this->db->get()->row();
		return $data->id;
	}

}
