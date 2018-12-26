<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Kandang extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(
                array(
                    'KandangModel',
                    'SupplierModel',
                    'DetailPembelianAyamModel',
                    'DetailPenjualanAyamModel',
                    'DetailJenisSupplierModel'
                )
        );
    }

    public function index() {
        $data = array();

        if (null !== ($this->input->post("submit"))) {
            $data = [
                'nama' => $this->input->post("nama"),
//              'maksimal_jumlah' => $this->input->post("maksimal_jumlah"),
            ];

            $this->KandangModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                'nama' => $this->input->post("nama"),
//              'maksimal_jumlah' => $this->input->post("maksimal_jumlah"),
            ];

            $this->KandangModel->put($data, $this->input->post('id'));

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->KandangModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $per_page = 3;

        $pagination = $this->getConfigPagination(
                site_url('kandang/index'), $this->KandangModel->countAll(), $per_page
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['kandang'] = $this->KandangModel->get(
                $this->data['per_page'], $this->data['page']
        );

        $this->blade->view("page.data.kandang", $this->data);
    }

    public function pembelian() {

        if (null !== ($this->input->post("submit"))) {
            $data = array(
                "id_detail_pembelian_ayam" => $this->DetailPembelianAyamModel->newId(),
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "id_karyawan" => $this->input->post("karyawan"),
                "tanggal" => $this->input->post("tanggal"),
                "jumlah_ayam" => $this->input->post("jumlah")
            );

            $this->data['post'] = $data;

            $this->DetailPembelianAyamModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = array(
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "id_karyawan" => $this->input->post("karyawan"),
                "tanggal" => $this->input->post("tanggal"),
                "jumlah_ayam" => $this->input->post("jumlah")
            );

            $this->DetailPembelianAyamModel->put($this->input->post("id"), $data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->DetailPembelianAyamModel->remove($this->input->post("id"));
            redirect(current_url());
        }


        $this->data['supplier'] = $this->SupplierModel->get();
        $this->data['kandang'] = $this->KandangModel->get();

        $this->data['data'] = $this->DetailPembelianAyamModel->get();

        $this->blade->view("page.kandang.pembelian", $this->data);
    }

    public function penjualan() {
        if (null !== ($this->input->post("submit"))) {
            $data = array(
                "id_detail_penjualan_ayam" => $this->DetailPenjualanAyamModel->newId(),
                "tanggal" => $this->input->post("tanggal"),
                "keterangan" => $this->input->post("keterangan"),
                "jumlah_ayam" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "id_karyawan" => $this->input->post("karyawan")
            );

            $this->data['post'] = $data;

            $this->DetailPenjualanAyamModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = array(
                "tanggal" => $this->input->post("tanggal"),
                "keterangan" => $this->input->post("keterangan"),
                "jumlah_ayam" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "id_karyawan" => $this->input->post("karyawan")
            );

            $this->DetailPenjualanAyamModel->put($this->input->post("id"), $data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->DetailPenjualanAyamModel->remove($this->input->post("id"));
            redirect(current_url());
        }


        $this->data['supplier'] = $this->SupplierModel->get();
        $this->data['kandang'] = $this->KandangModel->get();

        $this->data['data'] = $this->DetailPenjualanAyamModel->get();

        $this->blade->view("page.kandang.penjualan", $this->data);
    }

    public function idPembelianAyam() {
        echo $this->DetailPembelianAyamModel->newId();
    }

    public function idPenjualanAyam() {
        echo $this->DetailPenjualanAyamModel->newId();
    }

}
