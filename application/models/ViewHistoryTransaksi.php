<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewHistoryTransaksi extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function getTahun($id_kandang = null, $params = array()) {
		$this->db->select('distinct(year(tanggal_transaksi)) as tahun');

		$this->select($id_kandang, null, null, $params);

		return $this->db->get('view_history_transaksi')->result();
	}

	public function countAll($id_kandang = null, $params = array()) {
		$this->select($id_kandang, null, null, $params);

		return $this->db->count_all('view_history_transaksi');
	}

	public function select($id_kandang = null, $limit = null, $offset = null, $params = array()) {
		if ($id_kandang !== null) {
			$this->db->where('id_kandang', $id_kandang);
		}

		if ($limit != null) {
			$this->db->limit($limit);
		}

		if ($limit != null && $offset != null) {
			$this->db->limit($limit, $offset);
		}

		$this->db->where($params);
		$this->db->order_by("id_kandang, tanggal_transaksi", 'desc');
	}

	public function get($id_kandang = null, $limit = null, $offset = null, $params = array()) {
		$this->select($id_kandang, $limit, $offset, $params);

		return $this->db->get('view_history_transaksi')->result();
	}

}
