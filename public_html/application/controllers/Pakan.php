<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Pakan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('AdminModel'));
    }

    public function belum()
    {
        $current_date = Date("Y-m-d H:i");
        $current_date_view = Date("Y-m-d");

        $id = ($this->input->post('id') !== null) ? (($this->input->post("id") != "") ?
            $this->input->post("id") : $this->detailPenggunaanGudangModel->newId()) : $this->detailPenggunaanGudangModel->newId();

        $id_admin = null;
        $id_karyawan = null;

        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['gudang'] = $this->gudangModel->get();
        $this->data['kandang'] = $this->kandangModel->get();

        $params = [];

        $this->data['id_gudang'] = "0";
        $this->data['id_kandang'] = $this->kandangModel->get()[0]->id_kandang;

        // setting id input for admin or karyawan

        if ($this->data['head']['type'] == "admin") {
            $id_admin = $this->data['head']['username']->id;
        } else {
            $id_karyawan = $this->data['head']['username']->id_karyawan;
        }

        // generate params selected

        if ($this->input->get("gudang") !== null) {
            if ($this->input->get('gudang') !== "0") {
                $params['gudang'] = $this->input->get("gudang");
                $this->data['id_gudang'] = $this->input->get("gudang");
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if ($this->input->get("tanggal") !== null) {
            $current_date_target = $this->input->get("tanggal");
            $current_date_view_target = $this->input->get("tanggal");

            $this->data['current_date_target'] = $current_date_target;
            $this->data['current_date_view_target'] = $current_date_view_target;

            $params['tanggal'] = $current_date_target;
        } else {
            $params['tanggal'] = $current_date;
        }

        $this->data['count'] = $this->detailPenggunaanGudangModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->detailPenggunaanGudangModel->belum(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['current_date'] = $current_date;
        $this->data['current_date_view'] = $current_date_view;

        $this->blade->view('page/jadwal/belum', $this->data);
    }
}
