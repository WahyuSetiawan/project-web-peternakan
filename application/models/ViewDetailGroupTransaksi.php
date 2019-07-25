<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ViewDetailGroupTransaksi extends CI_Model
{

    public static $view = "view_detail_group_transaksi";

    public function select($params = [], $order = [])
    {
        $this->db->select(self::$view . ".*");

        if (isset($params['supplier'])) {
            $this->db->where("" . self::$view . ".id_detail_group_transaksi in (
                SELECT DISTINCT view_detail_group_transaksi.id_detail_group_transaksi
                FROM `view_detail_group_transaksi`
                join tb_detail_pembelian_ayam on tb_detail_pembelian_ayam.id_detail_group_transaksi = view_detail_group_transaksi.id_detail_group_transaksi
                where tb_detail_pembelian_ayam.id_supplier = \"" . $params['supplier'] . "\"
            ) ");
        }

        if (isset($params['kandang'])) {
            $this->db->where("" . self::$view . ".id_kandang", $params['kandang']);
        }
    }

    public function get($limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        $data = $this->db->get(self::$view, $limit, $offset)->result();

        foreach ($data as $key => &$value) {
            $value->supplier = $this->supplierModel->get(false, false, false, [
                "id_detail_group_transaksi" => $value->id_detail_group_transaksi,
            ]);
        }

        return $data;
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
