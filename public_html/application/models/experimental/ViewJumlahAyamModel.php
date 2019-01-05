<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewJumlahAyamModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($id_kandang = false, $limit = null, $offset = null, $where = array()) {
		if ($limit >= null && $offset >= null) {
			$this->db->limit($limit, $offset);
		}

		if ($id_kandang !== false) {
			$this->db->where('id_kandang', $id_kandang);
		}

		$this->db->where($where);

		$data = $this->db->get('view_jumlah_ayam_kandang')->result();

		return $data;
	}

	public function countAll() {
		return $this->db->count_all('view_jumlah_ayam_kandang');
	}

	public function getJoinPersediaan($limit = null, $offset = null, $id_kandang = false) {
		$this->db->select('view_jumlah_ayam_kandang.*, persediaan.nama as nama_persediaan, persediaan.keterangan, persediaan.cara_pemakaian, persediaan.id as id_persediaan, detail_persediaan.type_durasi, detail_persediaan.durasi, detail_persediaan.type, , view_stok_gudang_vaksin.jumlah');

		$this->db->join('detail_persediaan', 'detail_persediaan.id_kandang = view_jumlah_ayam_kandang.id_kandang', 'inner');
		$this->db->join('persediaan', 'persediaan.id = detail_persediaan.id_persediaan', 'inner');
		$this->db->join('view_stok_gudang_vaksin', 'view_stok_gudang_vaksin.id = persediaan.id', 'inner');

		$data = $this->get($id_kandang, $limit, $offset);

		return $data;
	}

	public function once($id_kandang) {
		$this->db->where('id_kandang', $id_kandang);
		return $this->db->get('view_jumlah_ayam_kandang')->row();
	}

}
