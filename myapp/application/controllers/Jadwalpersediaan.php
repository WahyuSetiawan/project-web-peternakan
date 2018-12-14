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

        $this->load->model(array('kandangmodel', 'PersediaanModel', 'DetailPersediaanModel', 'KandangPersediaanHistoryModel', 'DetailPengeluaranGudangModel'));
    }

    public function index() {
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
