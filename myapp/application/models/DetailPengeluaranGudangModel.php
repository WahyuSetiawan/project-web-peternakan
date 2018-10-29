<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPengeluaranGudangModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function set($data) {
		$this->db->set('id_detail_pengeluaran_gudang', "function_id_detail_pengeluaran_gudang()", false);
		$this->db->insert('detail_pengeluaran_gudang', $data);
		return $this->db->insert_id();
	}

	public function put($data, $id) {
		$this->db->where('id_detail_pengeluaran_gudang', $id);
		return $this->db->update('detail_pengeluaran_gudang', $data);
	}

	public function get($limit = null, $offset = null) {
		return $this->db->get('detail_pengeluaran_gudang', $limit, $offset)->result();
	}

	public function del($id) {
		$this->db->where('id_detail_pengeluaran_gudang', $id);
		return $this->db->delete('detail_pengeluaran_gudang');
	}

}
