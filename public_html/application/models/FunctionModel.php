<?php


defined('BASEPATH') or exit('No direct script access allowed');

class FunctionModel extends CI_Model
{
    function statusInsertPakan($id_pakan, $id_kandang, $tanggal, $id_detail = null)
    {
        if ($id_detail != null) {
            return $this->db->query("select function_status_pemberian_pakan_edit('$id_pakan', '$id_kandang', '$tanggal', '$id_detail') as result");
        } else {
            return $this->db->query("select function_status_pemberian_pakan('$id_pakan', '$id_kandang', '$tanggal') as result");
        }
    }

    function statusPenjualanAyam($id_pembelianAyam, $tanggal)
    {
        return $this->db->query("select function_status_penjualan_ayam('$id_pembelianAyam', '$tanggal') as result");
    }

    function pdSelectPenjualanAyam()
    {
        $a =  $this->db->query("select * from view_sisa_pembelian where jumlah_sisa_ayam  > 0");
        return $a->result();
    }

    function avaliable_data_kandang(){
        $a =  $this->db->query("select * from view_sisa_pembelian join tb_kandang on tb_kandang.id_kandang = view_sisa_pembelian.id_kandang where jumlah_sisa_ayam  <= 0");
        return $a->result();
    }
}

/* End of file ModelName.php */
