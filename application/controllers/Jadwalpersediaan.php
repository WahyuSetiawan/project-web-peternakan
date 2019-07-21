<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalpersediaan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $params = array();

        $this->data['id_kandang'] = "0";
        $this->data['id_gudang'] = "0";
        $this->data['id_hari'] = "-1";
        $this->data['current_id_hari'] = date('w');

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        if ($this->input->get("gudang") !== null) {
            if ($this->input->get('gudang') !== "0") {
                $params['gudang'] = $this->input->get("gudang");
                $this->data['id_gudang'] = $this->input->get("gudang");
            }
        }

        if ($this->input->get("hari") !== null) {
            if ($this->input->get('hari') !== "-1") {
                $params['hari'] = $this->input->get("hari");
                $this->data['id_hari'] = $this->input->get("hari");
            }
        }
        // else {
        //     $this->data['id_hari'] = date('w');
        //     $params['hari'] = $this->data['id_hari'];
        // }


        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = [
                "id_jadwal_kandang" => $this->jadwalKandangModel->newId(),
                'id_kandang' => $this->input->post("kandang"),
                'hari' => $this->input->post('hari'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'id_gudang' => $this->input->post('gudang'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->jadwalKandangModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                'id_kandang' => $this->input->post("kandang"),
                'hari' => $this->input->post('hari'),
                "waktu_mulai" => $this->input->post('waktu_mulai'),
                "waktu_selesai" => $this->input->post("waktu_selesai"),
                'id_gudang' => $this->input->post('gudang'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->jadwalKandangModel->put($data, $this->input->post('id'));

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->jadwalKandangModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $this->data['count'] = $this->jadwalKandangModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->kandangModel->get();
        $this->data['gudang'] = $this->gudangModel->get();

        $this->data['data'] = $this->jadwalKandangModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->blade->view("page.jadwal_persediaan", $this->data);
    }

    public function setJadwalSelesai()
    {
        $data_pengeluaran = array(
            'tanggal_transaksi' => $this->input->post('tanggal'),
            'id_gudang' => $this->input->post('id_gudang'),
            'id_kandang' => $this->input->post('id_kandang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->detailPengunaanGudangModel->set($data_pengeluaran);

        $data = array(
            'id_pembelian' => $this->input->post('id_pembelian'),
            'id_gudang' => $this->input->post("id_gudang"),
            'tanggal' => $this->input->post('tanggal'),
        );

        $this->KandangPersediaanHistoryModel->set($data);

        redirect($this->agent->referrer());
    }
}
