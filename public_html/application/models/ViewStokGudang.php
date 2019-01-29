<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewStokGudang extends CI_Model
{

    public static $view = "view_stok_gudang";

    public function select($params = [], $order = [])
    {

    }

    public function get($limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        return $this->db->get(self::$view, $limit, $offset)->result();
    }

    public function getSingle($id)
    {
        $this->db->where("id_gudang", $id);
        return $this->db->get(self::$view)->row();
    }

    public function count($params = [])
    {
        $this->select($params);

        return $this->db->get(self::$view)->num_rows();
    }

}

/* End of file ViewStokGudang.php */
