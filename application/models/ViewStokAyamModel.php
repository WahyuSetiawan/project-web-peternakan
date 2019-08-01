<?php

class ViewStokAyamModel extends CI_Model
{

    public static $view = "view_stok_ayam";

    public function select($params = [], $order = [])
    {
        $this->db->select(self::$view . ".*, " .
            KaryawanModel::$table . ".nama as nama_karyawan");

        $this->db->join(KaryawanModel::$table, KaryawanModel::$table . '.id_karyawan = ' . self::$view . '.id_karyawan', 'left');

        // $this->db->order_by(self::$view . '.created_at', 'DESC');
    }

    public function get($limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        if (isset($params["id_kandang"])) {
            $this->db->where("id_kandang", $params["id_kandang"]);
            $this->db->limit(1);
            return $this->db->get(self::$view)->row();
        } else {
            return $this->db->get(self::$view, $limit, $offset)->result();
        }
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

/* End of file ViewStokModel.php */
