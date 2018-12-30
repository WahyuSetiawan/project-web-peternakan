<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ViewModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function viewJumlahPersediaan($limit = null, $offset = null, $id_persediaan = null) {
		if ($limit != null && $offset != null) {
			$this->db->limit($limit, $offset);
		}

		if ($id_persediaan != null) {
			$this->db->where('id_persediaan', $id_persediaan);
		}

		return $this->db->get('view_jumlah_persediaan')->result();
	}
	
	public function viewJumlahPersediaanCountAll(){
		return $this->db->count_all('view_jumlah_persediaan');
	}

}
