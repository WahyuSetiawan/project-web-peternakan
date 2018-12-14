<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('viewHistoryTransaksi', 'ViewJumlahAyamModel', 'KandangPersediaanHistoryModel', 'ViewJumlahAyamModel', "AdminModel", "KaryawanModel"));
    }

    public function index() {
        if ($this->input->post('submit') !== null) {
            var_dump($this->input->post());

            if ($this->input->post('type') == "admin") {
                $this->AdminModel->put($this->session->userdata('id'), $this->input->post('username'), $this->input->post('password_baru'));

                redirect(current_url());
            }

            if ($this->input->post('type') == "karyawan") {
                $this->KaryawanModel->put(array("password" => $this->input->post('password_baru'), "hint" => $this->input->post('password_baru')), false, $this->input->post('username'));

                redirect(current_url());
            }
        }

        $this->data['transaksi'] = $this->viewHistoryTransaksi->get(null, 7);
        $this->data['jumlah_ayam'] = $this->ViewJumlahAyamModel->get();

        $this->blade->view('index', $this->data);
    }

}
