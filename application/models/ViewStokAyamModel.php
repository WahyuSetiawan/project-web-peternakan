<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewStokAyamModel extends CI_Model
{

    public static $view = "view_stok_ayam";

    public function select($params = [], $order = [])
    {
        $this->db->select(self::$view . ".*, " .
            KaryawanModel::$table . ".nama as nama_karyawan");

        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . '.id_karyawan = ' . self::$view . '.id_karyawan', 'left');
    }

    public function get($limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        return $this->db->get(self::$view, $limit, $offset)->result();
    }

    public function getSingle($id)
    {
        $this->select();

        $this->db->where("id_kandang", $id);

        return $this->db->get(self::$view)->row();
    }

    public function count($params = [])
    {
        $this->select($params);

        return $this->db->get(self::$view)->num_rows();

    }

}

/* End of file ViewStokModel.php */
