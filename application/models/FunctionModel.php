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
        $a =  $this->db->query("select * from view_sisa_pembelian where jumlah_sisa_ayam  > 0 and umur_ayam_sekarang >= 120");
        return $a->result();
    }

    function avaliable_data_kandang()
    {
        $a =  $this->db->query("select * from view_kandang_avaliable");
        return $a->result();
    }

    function available_data_kandang_penjualan($id_pembelianAyam = null)
    {
        if ($id_pembelianAyam != null) {
            $this->db->where("id_detail_pembelian_ayam", $id_pembelianAyam);
        }

        $a = $this->db->get("view_kandang_penjualan_avaiable");
        return $a->result();
    }

    function avaliable_jadwal_pakan($date, $kandang, $gudang, $id_detail = null)
    {
        if ($id_detail == null) {
            return $this->db->query("select 
                    * 
                from 
                    view_jadwal_penggunaan_gudang 
                where 
                    view_jadwal_penggunaan_gudang.id_jadwal_gudang in (
                        select 
                            tb_jadwal_kandang.id_jadwal_kandang 
                        from 
                            tb_jadwal_kandang 
                        where 
                            date_format('$date', '%w') = tb_jadwal_kandang.hari 
                            and tb_jadwal_kandang.id_kandang = '$kandang'
                            and tb_jadwal_kandang.id_gudang = '$gudang'
                            and time('$date') BETWEEN waktu_mulai 
                            and waktu_selesai
            )");
        } else {
            return $this->db->query("select 
                    * 
                from 
                    view_jadwal_penggunaan_gudang 
                where 
                    view_jadwal_penggunaan_gudang.id_jadwal_gudang in (
                        select 
                            tb_jadwal_kandang.id_jadwal_kandang 
                        from 
                            tb_jadwal_kandang 
                        where 
                            date_format('$date', '%w') = tb_jadwal_kandang.hari 
                            and tb_jadwal_kandang.id_kandang = '$kandang'
                            and tb_jadwal_kandang.id_gudang = '$gudang'
                            and time('$date') BETWEEN waktu_mulai 
                            and waktu_selesai
                ) and id_detail_penggunaan_gudang != '$id_detail'");
        }
    }
}

/* End of file ModelName.php */
