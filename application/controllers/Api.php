<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function index()
    {

    }

    public function kandang()
    {
        header('Content-Type: application/json');
        $data = [];

        $data["result"] = $this->viewStokAyamModel->get();

        echo json_encode($data);
    }

    public function pakan()
    {
        header('Content-Type: application/json');

        $data = [];
        $keys = [];
        $label = [];

        $data["x"] = "bulan";

        $date_temp = $this->functionModel->view_transaksi_periode_month();

        foreach ($date_temp as $key => $value) {
            $temp = [];

            $temp[$data["x"]] = $value->num_month . " - " . $value->num_year;

            $temp_gudang = $this->functionModel->view_transaksi_periode_gudang($value->num_year, $value->num_month);

            foreach ($temp_gudang as $key_gudang => $value_gudang) {
                $temp[$value_gudang->id_gudang] = $value_gudang->stok;

                if ($key == 0) {
                    $keys[] = $value_gudang->id_gudang;
                    $label[] = $value_gudang->nama;
                }
            }
            $data['result'][] = $temp;
        }

        $data['label'] = $label;
        $data['keys'] = $keys;

        echo json_encode($data);
    }

    public function umur()
    {
        header('Content-Type: application/json');

        $data = [];
        $data["result"] = [
            ["value" => 0, "label" => "umur 0-30 hari"],
            ["value" => 0, "label" => "umur 30-60 hari"],
            ["value" => 0, "label" => "umur 60-90 hari"],
            ["value" => 0, "label" => "umur 90-120 hari"],
            ["value" => 0, "label" => "umur > 120 hari"],
        ];

        $temp = $this->viewStokAyamModel->get();

        foreach ($temp as $key => $value) {
            if ($value->umur_ayam_sekarang <= 30) {
                $data["result"][0]["value"] = $data["result"][0]["value"] + $value->jumlah;
                continue;
            }

            if ($value->umur_ayam_sekarang <= 60) {
                $data["result"][1]["value"] = $data["result"][1]["value"] + $value->jumlah;
                continue;
            }

            if ($value->umur_ayam_sekarang <= 90) {
                $data["result"][2]["value"] = $data["result"][2]["value"] + $value->jumlah;
                continue;
            }

            if ($value->umur_ayam_sekarang <= 120) {
                $data["result"][3]["value"] = $data["result"][3]["value"] + $value->jumlah;
                continue;
            }

            if ($value->umur_ayam_sekarang > 120) {
                $data["result"][4]["value"] = $data["result"][4]["value"] + $value->jumlah;
                continue;
            }
        }

        echo json_encode($data);
    }

}

/* End of file ApiController.php */
