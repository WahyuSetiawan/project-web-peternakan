<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewTransaksiAyamModel extends CI_Model
{

    public static $view_transaksi_ayam = "view_transaksi_ayam";

    public function countViewTransaksiAyam($id_kandang, $params = [])
    {
        $this->selectViewTransaksiAyam($params);

        if ($id_kandang) {
            $this->db->where(self::$view_transaksi_ayam . ".id_kandang", $id_kandang);
        }

        $data = $this->db->get(self::$view_transaksi_ayam)->result();

        return count($data);
    }

    public function getViewTransaksiAyam($limit = false, $offset = false, $id_kandang, $params = [])
    {
        $this->selectViewTransaksiAyam($params);

        $data = $this->db->get(self::$view_transaksi_ayam, $limit, $offset)->result();

        return $data;
    }

    public function selectViewTransaksiAyam($params = [])
    {
        $this->db->select(self::$view_transaksi_ayam . '.*, '
            . "DATE_FORMAT(" . self::$view_transaksi_ayam . ".tanggal, \"%d-%m-%Y\") as tanggal,"
            . "DATE_FORMAT(" . self::$view_transaksi_ayam . ".created_at, \"%d-%m-%Y\") as created_at,"
            . "DATE_FORMAT(" . self::$view_transaksi_ayam . ".updated_at, \"%d-%m-%Y\") as updated_at,"
            . KaryawanModel::$table . '.nama as nama_karyawan,'
            . KandangModel::$table . '.nama as nama_kandang,'
            . SupplierModel::$table . '.nama as nama_supplier,'
            . AdminModel::$table . '.nama as nama_admin,'
            . 'karyawan_penanggung.nama as nama_penanggung_jawab,'
            . 'karyawan_update.nama as update_by_karyawan_nama,'
            . 'admin_update.nama as update_by_admin_nama');

        if (isset($params['supplier'])) {
            $this->db->where(self::$view_transaksi_ayam . ".id_supplier", $params['supplier']);
        }

        if (isset($params['tahun'])) {
            if ($params['tahun'] != "0") {
                $this->db->where('DATE_FORMAT(' . self::$view_transaksi_ayam . '.tanggal,\'%Y\')', $params['tahun']);
            }
        }

        if (isset($params['bulan'])) {
            if ($params['bulan'] != "0") {
                $this->db->where('DATE_FORMAT(' . self::$view_transaksi_ayam . '.tanggal,\'%m\')', $params['bulan']);
            }
        }

        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . '.id_karyawan = ' . self::$view_transaksi_ayam . '.id_karyawan', 'left');
        $this->db->join(SupplierModel::$table, SupplierModel::$table . '.id_supplier = ' . self::$view_transaksi_ayam . '.id_supplier', 'left');
        $this->db->join(KandangModel::$table, KandangModel::$table . '.id_kandang = ' . self::$view_transaksi_ayam . '.id_kandang', 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . '.id = ' . self::$view_transaksi_ayam . '.id_admin', 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', 'karyawan_update.id_karyawan = ' . self::$view_transaksi_ayam . '.update_by_karyawan', 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', 'admin_update.id = ' . self::$view_transaksi_ayam . '.update_by_admin', 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_penanggung', 'karyawan_penanggung.id_karyawan = ' . KandangModel::$table . '.id_karyawan', 'left');
    }

    public function dateViewTransaksiAyam($tahun = false)
    {

        if ($tahun) {
            $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%m\')) as bulan');
            $this->db->where('DATE_FORMAT(tanggal,\'%Y\')', $tahun);

            $data = $this->db->get(self::$view_transaksi_ayam)->result();

            return $data;
        } else {
            $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%Y\')) as tahun');
            $data = $this->db->get(self::$view_transaksi_ayam)->result();

            foreach ($data as $key => &$value) {
                $this->db->select('DISTINCT(DATE_FORMAT(tanggal,\'%m\')) as bulan');
                $this->db->where('DATE_FORMAT(tanggal,\'%Y\')', $value->tahun);

                $value->bulan = $this->db->get(self::$view_transaksi_ayam)->result();
            }

            return $data;
        }
    }
}

/* End of file ViewTransaksiAyamModel.php */
