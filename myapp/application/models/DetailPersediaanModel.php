<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPersediaanModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function set($data) {
		return $this->db->insert('detail_persediaan', $data);
	}

	public function put($id, $data) {
		$this->db->where('id', $id);

		return $this->db->update('detail_persediaan', $data);
	}

	public function get($limit = null, $offset = null, $id_kandang = null) {
		$this->strukturData("persediaan.*, "
				. "detail_persediaan.id_detail_persediaan, "
				. "detail_persediaan.durasi, "
				. "detail_persediaan.type_durasi, "
				. "detail_persediaan.type, "
				. "persediaan.id_persediaan, "
				. "kandang.nama as nama_kandang", $id_kandang);

		return $this->db->get('detail_persediaan', $limit, $offset)->result();
	}

	public function remove($id) {
		$this->db->where('id_detail_persediaan', $id);

		return $this->db->delete('detail_persediaan');
	}

	public function strukturData($select = "*", $id_kandang = null) {
		$this->db->select($select);
		
		$this->db->join('persediaan', 'persediaan.id_persediaan = detail_persediaan.id_persediaan', 'inner');
		$this->db->join('kandang', 'kandang.id_kandang = detail_persediaan.id_kandang', 'inner');
		
		$this->db->order_by("kandang.id_kandang", "asc");

		if ($id_kandang != null) {
			$this->db->where('kandang.id_kandang', $id_kandang);
		}
	}

	public function persediaanJoinKandang() {
		$this->db->join('detail_kandang_persediaan', 'detail_kandang_persediaan.id_persediaan = kandang.id', 'inner');
		$this->db->join('kandang', 'detail_kandang_persediaan.id_kandang = kandang.id', 'inner');

		return $this->db->get('persediaan')->result();
	}

}
