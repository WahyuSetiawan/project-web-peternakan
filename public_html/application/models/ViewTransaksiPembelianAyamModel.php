<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewTransaksiPembelianAyamModel extends CI_Model
{
    static $table = "view_sisa_pembelian";

    public function select()
    {

        $this->db->select("" . self::$table . ".*, "
            . kandangModel::$table . '.nama as nama_kandang, '
            . 'DATE_FORMAT(' .  self::$table . '.tanggal, "%d-%m-%Y") as tanggal,'
            . KaryawanModel::$table . '.nama as nama_karyawan, '
            . SupplierModel::$table . '.nama as nama_supplier,'
            . AdminModel::$table . '.nama as nama_admin,'
            . 'admin_update.nama as update_by_admin_nama,'
            . 'harga_ayam,'
            . 'jumlah_sisa_ayam, jumlah_penjualan, umur_ayam_sekarang,'
            . 'karyawan_update.nama as update_by_karyawan_nama');

        $this->db->join(SupplierModel::$table, SupplierModel::$table . ".id_supplier = "  . self::$table  . ".id_supplier", 'inner');
        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . ".id_karyawan = " . self::$table . ".id_karyawan", 'left');
        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . ".id = " . self::$table . ".id_admin", 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', "admin_update.id = " . self::$table . ".update_by_admin", 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', "karyawan_update.id_karyawan = " . self::$table . ".id_karyawan", 'left');
        $this->db->join("tb_detail_pembelian_ayam", "tb_detail_pembelian_ayam.id_detail_pembelian_ayam = " . self::$table . ".id_detail_pembelian_ayam", "inner");

        $this->db->where("jumlah_sisa_ayam <= 0");
    }

    public function get()
    {
        $this->select();

        $data =  $this->db->get(self::$table)->result();

        return $data;
    }

    public function count()
    {
        $this->select();

        $this->db->select("count(*) as count");
        $data =  $this->db->get(self::$table)->row()->count;
        return $data;
    }
}

/* End of file ViewTransaksiPembelianAyamModel.php */
