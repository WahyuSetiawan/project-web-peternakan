<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ViewStokGudangVaksin extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get($limit = null, $offset = null) {
		return $this->db->get('view_stok_gudang_vaksin', $limit, $offset)->result();
	}

	public function once($id_vaksin) {
		$this->db->where('id_persediaan', $id_vaksin);

		$data =  $this->db->get('view_stok_gudang_vaksin')->row();
		
		return $data;
	}

	public function countAll() {
		return $this->db->count_all('view_stok_gudang_vaksin');
	}

}
