<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ViewModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function selectStokPersediaan($params = [])
    {

    }

    /*
    view stok persediaan
     */

    public function getViewStokPersediaan($limit = false, $offset = false, $id_persediaan = false, $params = [])
    {
        $this->selectStokPersediaan($params);

        if ($id_persediaan) {
            $this->db->where('view_stok_persediaan.id_persediaan', $id_persediaan);
        }

        $data = $this->db->get('view_stok_persediaan', $limit, $offset)->result();

        if ($id_persediaan) {
            return $data[0];
        }
        return $data;
    }

    public function countViewStokPersediaan($params = [])
    {
        $this->selectStokPersediaan($params);

        $data = $this->db->get('view_stok_persediaan')->result();

        return count($data);
    }

    /*
    view transaksi persediaan
     */

    public function selectViewTransaksiPersediaan($params = [])
    {
        if (isset($params['supplier'])) {
            $this->db->where('view_transaksi_persediaan.id_supplier', $params['supplier']);
        }

        if (isset($params['aksi'])) {
            $this->db->where('aksi', $params['aksi']);
        }

        $this->db->select("view_transaksi_persediaan.*," .
            "DATE_FORMAT(view_transaksi_persediaan.tanggal, \"%d-%m-%Y\") as tanggal," .
            "DATE_FORMAT(view_transaksi_persediaan.created_at, \"%d-%m-%Y\") as created_at," .
            "DATE_FORMAT(view_transaksi_persediaan.updated_at, \"%d-%m-%Y\") as updated_at," .
            "persediaan.nama as nama_persediaan," .
            "supplier.nama as nama_supplier," .
            "karyawan.nama as nama_karyawan," .
            "admin.nama as nama_admin," .
            "persediaan.nama as nama_persediaan," .
            "karyawan_update.nama as update_by_karyawan_nama," .
            "admin_update.nama as update_by_admin_nama");

        $this->db->join('persediaan', 'persediaan.id_persediaan = view_transaksi_persediaan.id_persediaan', 'left');
        $this->db->join('karyawan', 'karyawan.id_karyawan = view_transaksi_persediaan.id_karyawan', 'left');
        $this->db->join('supplier', 'supplier.id_supplier = view_transaksi_persediaan.id_supplier', 'left');
        $this->db->join('admin', 'admin.id = view_transaksi_persediaan.id_admin', 'left');
        $this->db->join('karyawan as karyawan_update', 'karyawan_update.id_karyawan = view_transaksi_persediaan.update_by_karyawan', 'left');
        $this->db->join('admin as admin_update', 'admin_update.id = view_transaksi_persediaan.update_by_admin', 'left');
    }

    public function getViewTransaksiPersediaan($limit = false, $offset = false, $id_persediaan = false, $params = [])
    {
        $this->selectViewTransaksiPersediaan($params);

        if ($id_persediaan) {
            $this->db->where('view_transaksi_persediaan.id_persediaan', $id_persediaan);
        }

        $data = $this->db->get('view_transaksi_persediaan', $limit, $offset)->result();

        return $data;
    }

    public function countViewTransaksiPersediaan($id_persediaan, $params = [])
    {
        $this->selectViewTransaksiPersediaan($params);

        if ($id_persediaan) {
            $this->db->where('view_transaksi_persediaan.id_persediaan', $id_persediaan);
        }

        $data = $this->db->get('view_transaksi_persediaan')->result();

        return count($data);
    }

    /*
    view jumlah ayam
     */

    public function dateViewTransaksiAyam($tahun = false)
    {
        if ($tahun) {
            $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%m\')) as bulan');
            $this->db->where('DATE_FORMAT(tanggal,\'%Y\')', $tahun);

            $data = $this->db->get('view_transaksi_kandang')->result();

            return $data;
        } else {
            $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%Y\')) as tahun');
            $data = $this->db->get('view_transaksi_kandang')->result();

            foreach ($data as $key => &$value) {
                $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%m\')) as bulan');
                $this->db->where('DATE_FORMAT(tanggal,\'%Y\')', $value->tahun);

                $value->bulan = $this->db->get('view_transaksi_kandang')->result();
            }

            return $data;
        }
    }

    public function viewJumlahAyam($limit = false, $offset = false, $id_kandang = false)
    {
        $this->db->select('view_stok_ayam.*, kandang.nama as nama_kandang');

        if ($id_kandang) {
            $this->db->where('view_stok_ayam.id_kandang', $id_kandang);
        }

        $this->db->join('kandang', 'kandang.id_kandang = view_stok_ayam.id_kandang', 'left');

        $data = $this->db->get('view_stok_ayam', $limit, $offset)->result();

        if ($id_kandang) {
            return $data[0];
        }

        return $data;
    }

    public function viewTransaksiKandang($limit = false, $offset = false, $id_kandang = false, $params = [])
    {
        $this->db->select('view_transaksi_kandang.*, '
            . "DATE_FORMAT(view_transaksi_kandang.tanggal, \"%d-%m-%Y\") as tanggal,"
            . "DATE_FORMAT(view_transaksi_kandang.created_at, \"%d-%m-%Y\") as created_at,"
            . "DATE_FORMAT(view_transaksi_kandang.updated_at, \"%d-%m-%Y\") as updated_at,"
            . 'karyawan.nama as nama_karyawan,'
            . 'kandang.nama as nama_kandang,'
            . 'karyawan_penanggung.nama as nama_penanggung_jawab,'
            . 'supplier.nama as nama_supplier,'
            . 'karyawan_update.nama as update_by_karyawan_nama,'
            . 'admin_update.nama as update_by_admin_nama');

        $this->db->limit($limit, $offset);

        if ($id_kandang) {
            $this->db->where('view_transaksi_kandang.id_kandang', $id_kandang);
        }

        if (isset($params['supplier'])) {
            $this->db->where("view_transaksi_kandang.id_supplier", $params['supplier']);
        }

        $this->db->join('karyawan', 'karyawan.id_karyawan = view_transaksi_kandang.id_karyawan', 'left');
        $this->db->join('supplier', 'supplier.id_supplier = view_transaksi_kandang.id_supplier', 'left');
        $this->db->join('kandang', 'kandang.id_kandang = view_transaksi_kandang.id_kandang', 'left');
        $this->db->join('karyawan as karyawan_update', 'karyawan_update.id_karyawan = view_transaksi_kandang.update_by_karyawan', 'left');
        $this->db->join('admin as admin_update', 'admin_update.id = view_transaksi_kandang.update_by_admin', 'left');
        $this->db->join('karyawan as karyawan_penanggung', 'karyawan_penanggung.id_karyawan = kandang.id_karyawan', 'left');

        return $this->db->get('view_transaksi_kandang')->result();
    }

    public function viewCountTransaksiKandang($id_kandang = false, $params = [])
    {
        if ($id_kandang) {
            $this->db->where('id_kandang', $id_kandang);
        }

        if (isset($params['supplier'])) {
            $this->db->where("view_transaksi_kandang.id_supplier", $params['supplier']);
        }

        $data = $this->db->get('view_transaksi_kandang');

        return count($data->result());
    }

}
