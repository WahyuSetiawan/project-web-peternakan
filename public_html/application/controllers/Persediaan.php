<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(
            array(
                "DetailPembelianPersediaanModel",
                'DetailJenisSupplierModel',
                "DetailPengeluaranGudangModel",
                "ViewModel",
            )
        );
    }

    public function index()
    {
        $data = array();

        $page = 0;
        $per_page = 3;

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = [
                'id_persediaan' => $this->PersediaanModel->newId(),
                'nama' => $this->input->post("nama"),
                'cara_pemakaian' => $this->input->post('cara_pemakaian'),
            ];

            $this->PersediaanModel->set($data);

            // redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                'nama' => $this->input->post("nama"),
                'cara_pemakaian' => $this->input->post('cara_pemakaian'),
            ];

            $this->PersediaanModel->put($data, $this->input->post('id'));

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {

            $this->PersediaanModel->del($this->input->post('id'));

            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->PersediaanModel->countAll();

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['type_gudang'] = $this->PersediaanModel->get($this->data['limit'], $this->data['offset']);

        $this->blade->view("page.data.persediaan", $this->data);
    }

    public function pembelian()
    {
        $id_admin = null;
        $id_karyawan = null;

        $params = [];
        $page = 0;
        $per_page = 3;

        $this->data['id_persediaan'] = "0";
        $this->data['id_supplier'] = "0";

        if ($this->data['head']['type'] == "admin") {
            $id_admin = $this->data['head']['username']->id;
        } else {
            $id_karyawan = $this->data['head']['username']->id;
        }

        if ($this->input->get("persediaan") !== null) {
            if ($this->input->get('persediaan') !== "0") {
                $params['persediaan'] = $this->input->get("persediaan");
                $this->data['id_persediaan'] = $this->input->get("persediaan");
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
            $data = [
                'id_detail_pembelian_gudang' => $this->DetailPembelianPersediaanModel->newId(),
                "id_supplier" => $this->input->post("supplier"),
                "id_persediaan" => $this->input->post("persediaan"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
            ];

            $this->DetailPembelianPersediaanModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                "id_supplier" => $this->input->post("supplier"),
                "id_persediaan" => $this->input->post("persediaan"),
                "update_by_karyawan" => $id_karyawan,
                "update_by_admin" => $id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
            ];

            $this->DetailPembelianPersediaanModel->put($this->input->post('id'), $data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->DetailPembelianPersediaanModel->del($this->input->post('id'));

            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->DetailPembelianPersediaanModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['data'] = $this->DetailPembelianPersediaanModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->data['supplier'] = $this->SupplierModel->get();
        $this->data['persediaan'] = $this->PersediaanModel->get();

        $this->blade->view("page.transaksi.persediaan.pembelian", $this->data);
    }

    public function penjualan()
    {
        $id_admin = null;
        $id_karyawan = null;

        $params = [];
        $page = 0;
        $per_page = 3;

        $this->data['id_persediaan'] = "0";

        if ($this->data['head']['type'] == "admin") {
            $id_admin = $this->data['head']['username']->id;
        } else {
            $id_karyawan = $this->data['head']['username']->id;
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
                'id_detail_pengeluaran_gudang' => $this->DetailPengeluaranGudangModel->newId(),
                "id_persediaan" => $this->input->post("persediaan"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
            ];

            $this->DetailPengeluaranGudangModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $data = [
                "id_persediaan" => $this->input->post("persediaan"),
                "id_karyawan" => $this->input->post("karyawan"),
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
                "update_by_admin" => $id_admin,
                "update_by_karyawan" => $id_karyawan,
            ];

            $this->DetailPengeluaranGudangModel->put($this->input->post('id'), $data);

            redirect(current_url());
        }

        if (null !== $this->input->post("del")) {

            $this->DetailPengeluaranGudangModel->del($this->input->post("id"));
            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->DetailPengeluaranGudangModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->DetailPengeluaranGudangModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->data['supplier'] = $this->SupplierModel->get();
        $this->data['persediaan'] = $this->PersediaanModel->get();
        $this->data['kandang'] = $this->KandangModel->get();

        $this->blade->view("page.transaksi.persediaan.penjualan", $this->data);
    }

    public function jumlah()
    {
        $per_page = 3;

        $pagination = $this->getConfigPagination(site_url('typegudang/jumlah'), $this->ViewModel->viewJumlahPersediaanCountAll(), $per_page);
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['data'] = $this->ViewModel->viewJumlahPersediaan($this->data['per_page'], $this->data['page']);

        $this->blade->view("page.kandang.jumlah_persediaan", $this->data);
    }

}
