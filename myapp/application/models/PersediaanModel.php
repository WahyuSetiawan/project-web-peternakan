<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PersediaanModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($limit = null, $offset = null) {
		if ($limit != null && $offset != null) {
			$this->db->limit($limit, $offset);
		}

		return $this->db->get('persediaan')->result();
	}

	public function set($data) {
		$this->db->set('id_persediaan', $this->newId());
		return $this->db->insert('persediaan', $data);
	}

	public function put($data, $id) {
		$this->db->where('id_persediaan', $id);
		return $this->db->update('persediaan', $data);
	}

	public function remove($id) {
		$this->db->where('id_persediaan', $id);
		return $this->db->delete('persediaan');
	}

	public function countAll() {
		return $this->db->count_all('persediaan');
	}

	public function vaksinJoinKandang() {
		$this->db->select('*, persediaan.nama as nama_persediaan, kandang.nama as nama_kandang');

		$this->db->join('detail_kandang_vaksin', 'detail_kandang_vaksin.id_vaksin = persediaan.id', 'inner');
		$this->db->join('kandang', 'detail_kandang_vaksin.id_kandang = kandang.id', 'inner');

		return $this->db->get('vaksin')->result();
	}

	public function newId() {
		$this->db->select('function_id_persediaan() as id');
		$data = $this->db->get()->row();
		return $data->id;
	}

}
