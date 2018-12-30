<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ViewHistoryTransaksiGudang extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($limit = null, $offset = null, $id = null) {
		if ($id != null) {
			$this->db->where('id_persediaan', $id);
		}
		return $this->db->get('view_history_transaksi_gudang', $limit, $offset)->result();
	}

	public function countAll() {
		return $this->db->count_all('view_history_transaksi_gudang');
	}

	public function once($id) {
		$this->db->where('id', $id);

		return $this->db->get('view_history_transaksi_gudang')->row();
	}

}
