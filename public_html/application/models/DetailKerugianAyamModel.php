<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailKerugianAyamModel extends CI_Model
{
    public static $table = "tb_detail_kerugian_ayam";

    public function select($params = [])
    {
        if (isset($params['supplier'])) {
            $this->db->where(self::$table . ".id_supplier", $params['supplier']);
        }

        if (isset($params['kandang'])) {
            $this->db->where(self::$table . ".id_kandang", $params['kandang']);
        }

        if (isset($params['id_detail_pembelian_ayam'])) {
            $this->db->where(self::$table . ".id_detail_pembelian_ayam", $params['id_detail_pembelian_ayam']);
        }

        $this->db->select(self::$table . ".*, "
            . 'DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal,'
            . KandangModel::$table . '.nama as nama_kandang, '
            . KaryawanModel::$table . '.nama as nama_karyawan, '
            . AdminModel::$table . '.nama as nama_admin,'
            . 'admin_update.nama as update_by_admin_nama,'
            . 'karyawan_update.nama as update_by_karyawan_nama');

        // if ($id_pembelian_ayam) {
        //     $this->db->where('id_detail_kerugian_ayam', $id_kerugian_ayam);
        // }

        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . ".id_karyawan                = " . self::$table . ".id_karyawan", 'left');
        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang                   = " . self::$table . ".id_kandang", 'left');
        $this->db->join(AdminModel::$table, AdminModel::$table . ".id                               = " . self::$table . ".id_admin", 'left');
        $this->db->join(AdminModel::$table . ' as admin_update', "admin_update.id                   = " . self::$table . ".update_by_admin", 'left');
        $this->db->join(KaryawanModel::$table . ' as karyawan_update', "karyawan_update.id_karyawan = " . self::$table . ".id_karyawan", 'left');
    }

    public function get($limit = false, $offset = false, $id = false, $params = [])
    {
        $this->select($params);

        if ($id) {
            $this->db->where(self::$table . ".id_detail_kerugian_ayam", $id);
            return $this->db->get(self::$table)->row();
        } else {
            return $this->db->get(self::$table, $limit, $offset)->result();
        }
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
        return $this->db->last_query();
    }

    public function put($id, $data)
    {
        $this->db->where("id_detail_kerugian_ayam", $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where("id_detail_kerugian_ayam", $id);
        return $this->db->delete(self::$table);
    }

    public function countAll($params = [])
    {
        $this->select(false, $params);

        return count($this->db->get(self::$table)->result());
    }

    public function newID()
    {
        $this->db->select('function_id_detail_kerugian_ayam() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }
}

/* End of file KerugianModel.php */
