<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class KerugianModel extends CI_Model {

	public $table = "detail_pengeluaran_ayam";

	public function __construct() {
		parent::__construct();
	}

	public function set($data) {
		$this->db->set('id_detail_pengeluaran_ayam', 'function_id_detail_pengeluaran_ayam()', false);
		return $this->db->insert($this->table, $data);
	}

	public function put($data, $id) {
		$this->db->where('id_detail_pengeluaran_ayam', $id);
		return $this->db->update($this->table, $data);
	}

	public function del($id) {
		$this->db->where('id_detail_pengeluaran_ayam', $id);
		return $this->db->delete($this->table);
	}

}
