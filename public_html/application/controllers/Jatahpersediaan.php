<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Jatahpersediaan extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model([
            'KandangModel',
            "DetailPersediaanModel",
            "PersediaanModel",
            "DetailPengeluaranGudangModel"
        ]);
    }

    public function index($id_kandang = null) {
        if ($this->input->get("kandang") !== null) {
            if ($id_kandang == "null" || $this->input->get('kandang') == "null") {
                redirect("jatahpersediaan");
            }

            redirect(substr(current_url(), 0, (strpos(current_url(), "/index/") == 0) ? strlen(current_url()) : strpos(current_url(), "/index/")) . "/index/" . $this->input->get("kandang"));
        }

        $this->data['kandang'] = $this->KandangModel->get();
        $this->data['persediaan'] = $this->PersediaanModel->get();

        /* if (count($this->data['kandang']) > 0 && $id_kandang == 0) {
          $id_kandang = $this->data["kandang"][0]->id;
          } */

        if ($this->input->post("submit") !== null) {
            $data = array(
                "id_persediaan" => $this->input->post("persediaan"),
                "id_kandang" => $this->input->post('kandang'),
            );

            if ($this->input->post('id') !== null && $this->input->post('id') != "") {
                $this->DetailPersediaanModel->put($this->input->post('id'), $data);
            } else {
                $this->DetailPersediaanModel->set($data);
            }

            redirect(current_url());
        }
        if (null !== ($this->input->post("del"))) {
            $this->DetailPersediaanModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $this->data['id_kandang'] = $id_kandang;
        $this->data["data_persediaan"] = $this->DetailPersediaanModel->get(null, null, $id_kandang);

        $this->blade->view("page.jatah_persediaan", $this->data);
    }

}
