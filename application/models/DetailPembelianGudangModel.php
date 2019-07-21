<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailPembelianGudangModel extends CI_Model
{

    public static $table = "tb_detail_pembelian_gudang";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($limit = false, $offset = false, $id_pembelian_ayam = false, $params = [])
    {
        $this->select($limit, $offset, $id_pembelian_ayam, $params);

        $data = $this->db->get(self::$table)->result();

        foreach ($data as &$value) {
            $this->db->where("id_jenis", $value->id_gudang);
            $this->db->join("detail_supplier_jenis", "detail_supplier_jenis.id_supplier = ".SupplierModel::$table.".id_supplier", "inner");

            $value->data_supplier = $this->db->get(SupplierModel::$table)->result();
        }

        return $data;
    }

    public function select($limit = false, $offset = false, $id_pembelian_ayam = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        if (isset($params['gudang'])) {
            $this->db->where(self::$table.".id_gudang", $params['gudang']);
        }

        if (isset($params['supplier'])) {
            $this->db->where(self::$table.".id_supplier", $params['supplier']);
        }

        if ($id_pembelian_ayam) {
            $this->db->where("id_detail_pembelian_gudang", $id_pembelian_ayam);
        }

        $this->db->select(self::$table . ".*, "
            . SupplierModel::$table . ".nama as nama_supplier, "
            . GudangModel::$table . ".nama as nama_gudang, "
            . KaryawanModel::$table . ".nama as nama_karyawan,"
            . AdminModel::$table . ".nama as nama_admin,"
            . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
            . "admin_update.nama as update_by_admin_nama,"
            . "karyawan_update.nama as update_by_karyawan_nama");

        $this->db->join(SupplierModel::$table, SupplierModel::$table . ".id_supplier = " . self::$table . ".id_supplier", "inner");
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . self::$table . ".id_gudang", "inner");
        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . ".id_karyawan = " . self::$table . ".id_karyawan", "left");
        $this->db->join(AdminModel::$table, AdminModel::$table . ".id = " . self::$table . ".id_admin", "left");
        $this->db->join(AdminModel::$table . " as admin_update", "admin_update.id = " . self::$table . ".update_by_admin", "left");
        $this->db->join(KaryawanModel::$table . " as karyawan_update", "karyawan_update.id_karyawan = " . self::$table . ".update_by_karyawan", "left");
    }

    public function set($data)
    {
        $this->db->set("id_detail_pembelian_gudang", $this->newId());
        $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where("id_detail_pembelian_gudang", $id);
        $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where("id_detail_pembelian_gudang", $id);
        $this->db->delete(self::$table);
    }

    public function countAll($params = [])
    {
        $this->select(false, false, false, $params);

        $data = $this->db->get(self::$table)->result();

        return count($data);
    }

    public function newId()
    {
        $this->db->select("function_id_detail_pembelian_gudang() as id");
        $data = $this->db->get()->row();
        return $data->id;
    }
}
