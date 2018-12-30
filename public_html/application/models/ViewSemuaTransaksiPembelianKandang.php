<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewSemuaTransaksiPembelianKandang extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($id_kandang = false, $limit = 0, $offset = 0) {
		if ($id_kandang !== false) {
			$this->db->where('id_kandang', $id_kandang);
		}

		if ($limit <= 0 && $offset <= 0) {
			return $this->db->get('view_semua_transaksi_pembelian_kandang')->result();
		} else {
			return $this->db->get('view_semua_transaksi_pembelian_kandang', limit, offset)->result();
		}
	}

}
