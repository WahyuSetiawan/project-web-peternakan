<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/vendor/autoload.php';

use Restserver\Libraries\REST_Controller;

class Rest extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(array(
            'DetailPersediaanModel',
            'PersediaanModel',
            "ViewJumlahAyamModel",
            "KandangPersediaanHistoryModel",
            "Dashboard")
        );
    }

    public function dashboard_get() {
        $data = array();

        $data['kerugian'] = $this->Dashboard->kerugianAyamGet(7);
        $data['pembelian'] = $this->Dashboard->pembelianAyamGet(7);
        $data['penjualan'] = null;

        $this->response($data, 200);
    }

    public function index_get() {
        $this->response(array("success" => false));
    }

    public function jadwal_get($date = null) {
        $data = array();

        $persediaan = $this->ViewJumlahAyamModel->getJoinPersediaan();

        $timezone = 'WIB';
        $constraint = null;
        $rule = null;

        foreach ($persediaan as $key => $value) {
            $startDate = new \DateTime($value->tanggal_pembelian_terbaru, new \DateTimeZone($timezone));

            if (strtotime($value->tanggal_pembelian_terbaru) > strtotime($value->tanggal_penjualan_terbaru)) {
                $endDate = date_create($value->tanggal_pembelian_terbaru);
                date_add($endDate, date_interval_create_from_date_string("100 days"));
            } else {
                $endDate = new \DateTime(date("Y-m-t", $value->tanggal_penjualan_terbaru), new \DateTimeZone($timezone)); // Optional
            }

            $rule = (new \Recurr\Rule)
                    ->setStartDate($startDate)
                    ->setTimezone($timezone)
                    ->setInterval($value->durasi)
                    ->setFreq($value->type_durasi)
                    ->setUntil(new \DateTime(date_format($endDate, "Y-m-t")));

            $transformer = new \Recurr\Transformer\ArrayTransformer();

            if ($date != null) {
                $constraint = new \Recurr\Transformer\Constraint\BetweenConstraint(new \DateTime($date . " 00:00:00"), new \DateTime($date . " 23:59:59"), false);
            }

            foreach ($transformer->transform($rule, $constraint) as $key => $value_date) {
                $datamodel = $this->KandangPersediaanHistoryModel->get(array(
                    'tanggal' => $value_date->getStart()->format("Y-m-d"),
                    'id_pembelian' => $value->id_pembelian_terbaru,
                    'id_persediaan' => $value->id_persediaan
                ));

                $data['result'][] = array(
                    "id" => $value_date->getStart()->format("Ymd") . $value->id_kandang . $value->id_persediaan,
                    "date" => $value_date->getStart()->format("Y-m-d"),
                    "title" => "kandang " . $value->nama_kandang . " beri persediaan : " . $value->nama_persediaan . ((count($datamodel) >= 1) ? " (Telah Selesai)" : ''),
                    "modal" => "#events-modal",
                    "class" => (count($datamodel) >= 1) ? "event-success" : $value->type,
                    "data" => $value,
                    "start" => $value_date->getStart()->getTimestamp() * 1000, // Milliseconds
                    "end" => $value_date->getEnd()->getTimestamp() * 1000 // Milliseconds
                );
            }
        }

        $data["success"] = 1;
        $this->response($data, 200);
    }

}
