<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function kerugianAyamGet($limit = null, $offset = null) {
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('view_dashboard_kerugian_ayam')->result();
    }

    public function pembelianAyamGet($limit = null, $offset = null) {
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }

        $this->db->order_by('bulan', 'desc');
        $this->db->order_by('tahun', 'desc');


        return $this->db->get('view_dashboard_pembelian_ayam')->result();
    }

    public function penjualanAyamGet($limit = null, $offset = null) {
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        
        $this->db->order_by('bulan', 'desc');
        $this->db->order_by('tahun', 'desc');

        return $this->db->get('view_dashboard_penjualan_ayam')->result();
    }

}
