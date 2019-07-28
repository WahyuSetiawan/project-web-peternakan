<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewDetailGroupTransaksiAyamModel extends CI_Model
{

    public static $view = "view_detail_group_transaksi_ayam";

    public function select($params = [], $order = [])
    {
        $this->db->select(self::$view . ".*");

        if (isset($params['aksi'])) {
            $this->db->where("" . self::$view . ".aksi", $params['aksi']);
        }
    }

    public function get($limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        if (isset($params['id_group_group_transaksi'])) {
            $this->db->where("" . self::$view . ".id_group_group_transaksi", $params['id_group_group_transaksi']);
        }

        $this->db->order_by(self::$view . '.created_at', 'ASC');

        return $this->db->get(self::$view)->result();
    }

    public function getSingle($id)
    {
        $this->select();

        $this->db->where("id_kandang", $id);

        return $this->db->get(self::$view)->row();
    }

    public function countAll($params = [])
    {
        $this->select($params);

        return $this->db->get(self::$view)->num_rows();

    }

}

/* End of file ViewDetailGroupTransaksi.php */
