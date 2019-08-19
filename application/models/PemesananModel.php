<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PemesananModel extends CI_Model
{

    public static $table = "tb_pemesanan";
    public static $detail = "view_detail_pemesanan";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($params = [])
    {
        if (isset($params['status'])) {
            $this->db->where(self::$detail . ".status", $params["status"]);
        }
    }

    public function get($limit = false, $offset = false, $id_pemesanan = false, $params = array())
    {
        $this->select($params);

        if ($id_pemesanan) {
            $this->db->where("id_pemesanan", $id_pemesanan);

            $data = $this->db->get(self::$table)->row();

            return $data;
        } else {
            $data = $this->db->get(self::$table)->result();

            return $data;
        }
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
    }

    public function put($data, $id)
    {
        $this->db->where("id_pemesanan", $id);
        $this->db->update(self::$table, $data);
    }

    public function remove($id)
    {
        $this->db->where("id_pemesanan", $id);
        $this->db->delete(self::$table);
    }

    public function countAll($params = [])
    {
        $this->select($params);

        $data = $this->db->get(self::$table)->result();

        return count($data);
    }

    public function getDetail($limit = false, $offset = false, $id_pemesanan = false, $params = array())
    {
        if ($id_pemesanan) {
            $this->db->where("id_pemesanan", $id_pemesanan);

            $data = $this->db->get(self::$detail)->row();

            $data->penjualan = $this->detailPenjualanAyamModel->get(false, false, false, [
                'id_pemesanan' => $data->id_pemesanan,
            ]);

            return $data;
        } else {
            $data = $this->db->get(self::$detail)->result();

            foreach ($data as $key => &$value) {
                # code...
                $value->penjualan = $this->detailPenjualanAyamModel->get(false, false, false, [
                    'id_pemesanan' => $value->id_pemesanan,
                ]);
            }

            return $data;
        }
    }

    public function countAllDetail($params = [])
    {
        $this->select($params);

        $data = $this->db->get(self::$detail)->result();

        return count($data);
    }

}

/* End of file PemesananModel.php */
