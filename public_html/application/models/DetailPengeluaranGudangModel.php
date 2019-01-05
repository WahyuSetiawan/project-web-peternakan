<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPengeluaranGudangModel extends CI_Model {

    var $table = "detail_pengeluaran_gudang";

    public function __construct() {
        parent::__construct();
    }

    public function select($id_pembelian_ayam = null, $params = []) {
        if(isset($params['persediaan'])){
            $this->db->where("$this->table.id_persediaan", $params['persediaan']);
                }
        
        $this->db->select('detail_pengeluaran_gudang.*, '
                . 'kandang.nama as nama_kandang,'
                . 'karyawan.nama as nama_karyawan,'
                . 'type_gudang.keterangan as nama_persediaan,'
                . 'admin.nama as nama_admin,'
                . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
                . 'admin_update.nama as update_by_admin_nama,'
                . 'karyawan_update.nama as update_by_karyawan_nama');

        if ($id_pembelian_ayam != null) {
            $this->db->where('id_detail_pengeluaran_gudang', $id_pembelian_ayam);
        }

        $this->db->join('kandang', "kandang.id_kandang = $this->table.id_kandang", 'left');
        $this->db->join('karyawan', "karyawan.id_karyawan = $this->table.id_karyawan", 'left');
        $this->db->join('type_gudang', "type_gudang.id_type_gudang = $this->table.id_persediaan", 'left');
        $this->db->join('admin', "admin.id = $this->table.id_admin", 'left');
        $this->db->join('admin as admin_update', "admin_update.id = $this->table.update_by_admin", 'left');
        $this->db->join('karyawan as karyawan_update', "karyawan_update.id_karyawan = $this->table.update_by_karyawan", 'left');
    }

    function get($limit = false, $offset = false, $id_pembelian_ayam = false, $params = []) {
        $this->db->limit($limit, $offset);
        $this->select($id_pembelian_ayam, $params);

        return $this->db->get($this->table)->result();
    }

    function set($data) {
        $this->db->set("id_detail_pengeluaran_gudang", $this->newId());
        $this->db->insert($this->table, $data);
    }

    function put($id, $data) {
        $this->db->where('id_detail_pengeluaran_gudang', $id);
        $this->db->update($this->table, $data);
    }

    function del($id) {
        $this->db->where('id_detail_pengeluaran_gudang', $id);
        $this->db->delete($this->table);
    }

    function countAll($params = []) {
        $this->select(false, $params);
        return count($this->db->get($this->table)->result());
    }

    function newId() {
        $this->db->select('function_id_detail_pengeluaran_gudang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
