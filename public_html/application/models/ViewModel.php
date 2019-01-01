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

    public function viewJumlahPersediaanCountAll() {
        return $this->db->count_all('view_jumlah_persediaan');
    }

    public function viewJumlahAyam($limit = null, $offset = null, $id_kandang = null) {
        $this->db->select('view_stok_ayam.*, kandang.nama as nama_kandang');

        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id_kandang != null) {
            $this->db->where('view_stok_kandang.id_kandang', $id_kandang);
        }
        
        $this->db->join('kandang', 'kandang.id_kandang = view_stok_ayam.id_kandang', 'left');


        return $this->db->get('view_stok_ayam')->result();
    }

    public function viewTransaksiKandang($limit = null, $offset = null, $id_kandang = null) {
        $this->db->select('view_transaksi_kandang.*, '
                . 'karyawan.nama as nama_karyawan,'
                . 'kandang.nama as nama_kandang,'
                . 'supplier.nama as nama_supplier');

        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id_kandang != null) {
            $this->db->where('view_transaksi_kandang.id_kandang', $id_kandang);
        }
        
        $this->db->join('karyawan', 'karyawan.id_karyawan = view_transaksi_kandang.id_karyawan', 'left');
        $this->db->join('supplier', 'supplier.id_supplier = view_transaksi_kandang.id_supplier', 'left');
        $this->db->join('kandang', 'kandang.id_kandang = view_transaksi_kandang.id_kandang', 'left');

        return $this->db->get('view_transaksi_kandang')->result();
    }

    public function viewCountTransaksiKandang($id_kandang = false) {
        if ($id_kandang) {
            $this->db->where('id_kandang', $id_kandang);
        }

        return $this->db->count_all('view_transaksi_kandang');
    }

}
