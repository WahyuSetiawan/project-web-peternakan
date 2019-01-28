<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewTransaksiGudangModel extends CI_Model
{

    public static $view = "view_transaksi_gudang";

    public function dateViewTransaksiPersediaan($tahun = false)
    {
        if ($tahun) {
            $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%m\')) as bulan');
            $this->db->where('DATE_FORMAT(tanggal,\'%Y\')', $tahun);

            $data = $this->db->get('view_transaksi_gudang')->result();

            return $data;
        } else {
            $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%Y\')) as tahun');
            $data = $this->db->get('view_transaksi_gudang')->result();

            foreach ($data as $key => &$value) {
                $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%m\')) as bulan');
                $this->db->where('DATE_FORMAT(tanggal,\'%Y\')', $value->tahun);

                $value->bulan = $this->db->get('view_transaksi_gudang')->result();
            }

            return $data;
        }
    }

    public function selectViewTransaksiPersediaan($params = [])
    {
        if (isset($params['supplier'])) {
            $this->db->where('view_transaksi_gudang.id_supplier', $params['supplier']);
        }

        if (isset($params['aksi'])) {
            $this->db->where('aksi', $params['aksi']);
        }

        if (isset($params['tahun'])) {
            if ($params['tahun'] != "0") {
                $this->db->where('DATE_FORMAT(view_transaksi_gudang.tanggal,\'%Y\')', $params['tahun']);
            }
        }

        if (isset($params['bulan'])) {
            if ($params['bulan'] != "0") {
                $this->db->where('DATE_FORMAT(view_transaksi_gudang.tanggal,\'%m\')', $params['bulan']);
            }
        }

        $this->db->select("view_transaksi_gudang.*," .
            "DATE_FORMAT(view_transaksi_gudang.tanggal, \"%d-%m-%Y\") as tanggal," .
            "DATE_FORMAT(view_transaksi_gudang.created_at, \"%d-%m-%Y\") as created_at," .
            "DATE_FORMAT(view_transaksi_gudang.updated_at, \"%d-%m-%Y\") as updated_at," .
            PersediaanModel::$table . ".nama as nama_gudang," .
            SupplierModel::$table . ".nama as nama_supplier," .
            KaryawanModel::$table . ".nama as nama_karyawan," .
            AdminModel::$table . ".nama as nama_admin," .
            "karyawan_update.nama as update_by_karyawan_nama," .
            "admin_update.nama as update_by_admin_nama");

        $this->db->join(PersediaanModel::$table, PersediaanModel::$table . '.id_persediaan = view_transaksi_gudang.id_gudang', 'left');
        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . '.id_karyawan = view_transaksi_gudang.id_karyawan', 'left');
        $this->db->join(SupplierModel::$table, SupplierModel::$table . '.id_supplier = view_transaksi_gudang.id_supplier', 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . '.id = view_transaksi_gudang.id_admin', 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', 'karyawan_update.id_karyawan = view_transaksi_gudang.update_by_karyawan', 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', 'admin_update.id = view_transaksi_gudang.update_by_admin', 'left');
    }

    public function getViewTransaksiPersediaan($limit = false, $offset = false, $id_gudang = false, $params = [])
    {
        $this->selectViewTransaksiPersediaan($params);

        if ($id_gudang) {
            $this->db->where('view_transaksi_gudang.id_gudang', $id_gudang);
        }

        $data = $this->db->get('view_transaksi_gudang', $limit, $offset)->result();

        return $data;
    }

    public function countViewTransaksiPersediaan($id_gudang, $params = [])
    {
        $this->selectViewTransaksiPersediaan($params);

        if ($id_gudang) {
            $this->db->where('view_transaksi_gudang.id_gudang', $id_gudang);
        }

        $data = $this->db->get('view_transaksi_gudang')->result();

        return count($data);
    }

}

/* End of file ViewTransaksiGudangModel.php */
