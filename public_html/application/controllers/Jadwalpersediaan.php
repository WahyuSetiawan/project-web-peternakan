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

        $this->load->model([
            'JadwalKandangModel',
            'KandangPersediaanHistoryModel',
            'DetailPengeluaranGudangModel',
        ]);
    }

    public function index()
    {
        $params = array();

        $this->data['id_kandang'] = "0";
        $this->data['id_persediaan'] = "0";

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        if ($this->input->get("persediaan") !== null) {
            if ($this->input->get('persediaan') !== "0") {
                $params['persediaan'] = $this->input->get("persediaan");
                $this->data['id_persediaan'] = $this->input->get("persediaan");
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = [
                "id_jadwal_kandang" => $this->JadwalKandangModel->newId(),
                'id_kandang' => $this->input->post("kandang"),
                'hari' => $this->input->post('hari'),
                'id_persediaan' => $this->input->post('persediaan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->JadwalKandangModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                'id_kandang' => $this->input->post("kandang"),
                'hari' => $this->input->post('hari'),
                'id_persediaan' => $this->input->post('persediaan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->JadwalKandangModel->put($data, $this->input->post('id'));

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->JadwalKandangModel->remove($this->input->post('id'));

            redirect(current_url());
        }
        
        $this->data['count'] = $this->JadwalKandangModel->countAll($params);

        $pagination = $this->getConfigPagination(
            site_url('jadwalpersediaan/index'), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->KandangModel->get();
        $this->data['persediaan'] = $this->PersediaanModel->get();

        $this->data['data'] = $this->JadwalKandangModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->blade->view("page.jadwal_persediaan", $this->data);
    }

    public function setJadwalSelesai()
    {
        $data_pengeluaran = array(
            'tanggal_transaksi' => $this->input->post('tanggal'),
            'id_persediaan' => $this->input->post('id_persediaan'),
            'id_kandang' => $this->input->post('id_kandang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->DetailPengeluaranGudangModel->set($data_pengeluaran);

        $data = array(
            'id_pembelian' => $this->input->post('id_pembelian'),
            'id_persediaan' => $this->input->post("id_persediaan"),
            'tanggal' => $this->input->post('tanggal'),
        );

        $this->KandangPersediaanHistoryModel->set($data);

        redirect($this->agent->referrer());
    }

}
