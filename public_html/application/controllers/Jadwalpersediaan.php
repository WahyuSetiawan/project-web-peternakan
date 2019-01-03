<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalpersediaan extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model([
            'kandangmodel',
            'PersediaanModel',
            'TypeGudangModel',
            'JadwalKandangModel',
            'DetailPersediaanModel',
            'KandangPersediaanHistoryModel',
            'DetailPengeluaranGudangModel'
        ]);
    }

    public function index() {
        if (null !== ($this->input->post("submit"))) {
            $data = [
                "id_jadwal_kandang" => $this->JadwalKandangModel->newId(),
                'id_kandang' => $this->input->post("kandang"),
                'hari' => $this->input->post('hari'),
                'id_persediaan' => $this->input->post('persediaan'),
                'catatan' => $this->input->post('catatan')
            ];

            $this->JadwalKandangModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                'id_kandang' => $this->input->post("kandang"),
                'hari' => $this->input->post('hari'),
                'id_persediaan' => $this->input->post('persediaan'),
                'catatan' => $this->input->post('catatan')
            ];

            $this->JadwalKandangModel->put($data, $this->input->post('id'));

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->JadwalKandangModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $per_page = 3;

        $pagination = $this->getConfigPagination(
                site_url('jadwalpersediaan/index'), $this->JadwalKandangModel->countAll(), $per_page
        );

        $this->data['pagination'] = $this->pagination($pagination);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;

        $this->data['kandang'] = $this->KandangModel->get(
                $this->data['per_page'], $this->data['page']
        );

        $this->data['data'] = $this->JadwalKandangModel->get();
        $this->data['kandang'] = $this->KandangModel->get();
        $this->data['persediaan'] = $this->TypeGudangModel->get();

        $this->blade->view("page.jadwal_persediaan", $this->data);
    }

    public function setJadwalSelesai() {
        $data_pengeluaran = array(
            'tanggal_transaksi' => $this->input->post('tanggal'),
            'id_persediaan' => $this->input->post('id_persediaan'),
            'id_kandang' => $this->input->post('id_kandang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->DetailPengeluaranGudangModel->set($data_pengeluaran);

        $data = array(
            'id_pembelian' => $this->input->post('id_pembelian'),
            'id_persediaan' => $this->input->post("id_persediaan"),
            'tanggal' => $this->input->post('tanggal')
        );

        $this->KandangPersediaanHistoryModel->set($data);

        redirect($this->agent->referrer());
    }

}
