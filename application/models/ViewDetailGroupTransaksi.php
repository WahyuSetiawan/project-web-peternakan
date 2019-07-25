<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewDetailGroupTransaksi extends CI_Model
{

    public static $view = "view_detail_group_transaksi";

    public function select($params = [], $order = [])
    {
        $this->db->select(self::$view . ".*");
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

    public function countAll($params = [])
    {
        $this->select($params);

        return $this->db->get(self::$view)->num_rows();

    }

}

/* End of file ViewDetailGroupTransaksi.php */
