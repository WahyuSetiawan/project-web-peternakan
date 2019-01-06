<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Kandang extends MY_Controller
{

    public $id_admin = null;
    public $id_karyawan = null;

    public function __construct()
    {
        parent::__construct();

        $this->load->model(
            array(
                'DetailPembelianAyamModel',
                'DetailPenjualanAyamModel',
                'DetailJenisSupplierModel',
            )
        );

        if ($this->data['head']['type'] == "admin") {
            $this->id_admin = $this->data['head']['username']->id;
        } else {
            $this->id_karyawan = $this->data['head']['username']->id;
        }
    }

    public function index()
    {
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = [
                'nama' => $this->input->post("nama"),
                'id_karyawan' => $this->input->post('karyawan'),
            ];

            $this->KandangModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                'nama' => $this->input->post("nama"),
                'id_karyawan' => $this->input->post('karyawan'),
            ];

            $this->KandangModel->put($data, $this->input->post('id'));

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->KandangModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->DetailPembelianAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;

        $this->data['kandang'] = $this->KandangModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->data['karyawan'] = $this->KaryawanModel->get();

        $this->blade->view("page.data.kandang", $this->data);
    }

    public function pembelian()
    {
        $params = array();
        $page = 0;
        $per_page = 3;

        $this->data['id_kandang'] = "0";
        $this->data['id_supplier'] = "0";

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        if ($this->input->get("supplier") !== null) {
            if ($this->input->get('supplier') !== "0") {
                $params['supplier'] = $this->input->get("supplier");
                $this->data['id_supplier'] = $this->input->get("supplier");
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = array(
                "id_detail_pembelian_ayam" => $this->DetailPembelianAyamModel->newId(),
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "id_karyawan" => $this->id_karyawan,
                "id_admin" => $this->id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah_ayam" => $this->input->post("jumlah"),
            );

            $this->data['post'] = $data;

            $this->DetailPembelianAyamModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = array(
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "update_by_karyawan" => $this->id_karyawan,
                "update_by_admin" => $this->id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah_ayam" => $this->input->post("jumlah"),
            );

            $this->DetailPembelianAyamModel->put($this->input->post("id"), $data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->DetailPembelianAyamModel->remove($this->input->post("id"));
            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->DetailPembelianAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['supplier'] = $this->SupplierModel->get(null, null, ['jual_ayam' => "Y"]);
        $this->data['kandang'] = $this->KandangModel->get();

        $this->data['data'] = $this->DetailPembelianAyamModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->blade->view("page.transaksi.kandang.pembelian", $this->data);
    }

    public function penjualan()
    {
        $params = array();
        $page = 0;
        $per_page = 3;

        $this->data['id_kandang'] = "0";

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = array(
                "id_detail_penjualan_ayam" => $this->DetailPenjualanAyamModel->newId(),
                "tanggal" => $this->input->post("tanggal"),
                "keterangan" => $this->input->post("keterangan"),
                "jumlah_ayam" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "id_karyawan" => $this->id_karyawan,
                "id_admin" => $this->id_admin,
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
                "update_by_karyawan" => $this->id_karyawan,
                "update_by_admin" => $this->id_admin,
            );

            $this->DetailPenjualanAyamModel->put($this->input->post("id"), $data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->DetailPenjualanAyamModel->remove($this->input->post("id"));
            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->DetailPenjualanAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->KandangModel->get();

        $this->data['data'] = $this->DetailPenjualanAyamModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->blade->view("page.transaksi.kandang.penjualan", $this->data);
    }

    public function idPembelianAyam()
    {
        echo $this->DetailPembelianAyamModel->newId();
    }

    public function idPenjualanAyam()
    {
        echo $this->DetailPenjualanAyamModel->newId();
    }

}
