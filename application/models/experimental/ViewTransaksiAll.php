<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewTransaksiAll extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($limit = null, $offset = null, $where = array()) {
		$this->db->where($where);

		return $this->db->get('view_transaksi_all', $limit, $offset)->result();
	}

	public function countAll() {
		return $this->db->count_all('view_transaksi_all');
	}

}
