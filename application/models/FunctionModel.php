<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FunctionModel extends CI_Model
{
    public function statusInsertPakan($id_pakan, $id_kandang, $tanggal, $id_detail = null)
    {
        if ($id_detail != null) {
            return $this->db->query("select function_status_pemberian_pakan_edit('$id_pakan', '$id_kandang', '$tanggal', '$id_detail') as result");
        } else {
            return $this->db->query("select function_status_pemberian_pakan('$id_pakan', '$id_kandang', '$tanggal') as result");
        }
    }

    public function statusPenjualanAyam($id_pembelianAyam, $tanggal)
    {
        return $this->db->query("select function_status_penjualan_ayam('$id_pembelianAyam', '$tanggal') as result");
    }

    public function pdSelectPenjualanAyam()
    {
        $a = $this->db->query("select * from view_sisa_pembelian where jumlah_sisa_ayam  > 0 and umur_ayam_sekarang >= 120");
        return $a->result();
    }

    public function avaliable_data_kandang()
    {
        $a = $this->db->query("select * from view_kandang_avaliable");
        return $a->result();
    }

    public function available_data_kandang_penjualan($id_pembelianAyam = null)
    {
        if ($id_pembelianAyam != null) {
            $this->db->where("id_detail_pembelian_ayam", $id_pembelianAyam);
        }

        $a = $this->db->get("view_kandang_penjualan_avaiable");
        return $a->result();
    }

    public function avaliable_jadwal_pakan($date, $kandang, $gudang, $id_detail = null)
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

    public function viewStokAyam($avaliable = false, $notempty = false, $siapjual = false, $id_kandang = false)
    {

        if ($siapjual) {
            $this->db->where("view_stok_ayam.umur_ayam_sekarang > 35");
        }

        if ($notempty) {
            $this->db->where("view_stok_ayam.jumlah > 0");
        }

        if ($avaliable) {
            $this->db->where("view_stok_ayam.sisa_jumlah_ayam > 0");
        }

        if ($id_kandang === false) {
            $data = $this->db->get("view_stok_ayam")->result();

            return $data;
        } else {
            $this->db->where("view_stok_ayam.id_kandang", $id_kandang);
            $data = $this->db->get("view_stok_ayam")->row();

            return $data;
        }
    }

    public function view_transaksi_periode_month()
    {
        $data = $this->db->get("view_periode_transaksi_month")->result();

        return $data;
    }

    public function view_transaksi_periode_gudang($year = false, $month = false)
    {
        if ($year != false) {
            $this->db->where("num_year", $year);
        }

        if ($month != false) {
            $this->db->where("num_month", $month);
        }

        $data = $this->db->get("view_periode_transaksi_gudang")->result();

        return $data;
    }
}

/* End of file ModelName.php */
