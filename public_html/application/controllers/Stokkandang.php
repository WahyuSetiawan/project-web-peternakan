<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Stokkandang extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'ViewModel',
            "DetailJenisSupplierModel")
        );
    }

    public function index()
    {
        $this->data['jumlah_ayam'] = $this->viewStokModel->get();

        $this->blade->view("page.stok.kandang.stok", $this->data);
    }

    public function detail($id_kandang = false, $page = false)
    {
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;

        $this->data['id_supplier'] = "0";

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if ($this->input->get("supplier") !== null) {
            if ($this->input->get('supplier') !== "0") {
                $params['supplier'] = $this->input->get("supplier");
                $this->data['id_supplier'] = $this->input->get("supplier");
            }
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->viewTransaksiAyamModel->countViewTransaksiAyam($id_kandang, $params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );

        $this->data['pagination'] = $this->pagination($pagination);

        if ($id_kandang) {
            $this->data['data'] = $this->viewTransaksiAyamModel->getViewTransaksiAyam(
                $this->data['limit'], $this->data['offset'], $id_kandang, $params);

            $this->data['kandang'] = $this->kandangModel->get(false, false, $id_kandang);
            $this->data['supplier'] = $this->supplierModel->get();
            $this->data['jumlah_ayam'] = $this->viewStokModel->getSingle( $id_kandang);

            $this->blade->view("page.stok.kandang.detail_transaksi", $this->data);
        }
    }

//
    //    public function transaksi($idkandang = false, $page = 0) {
    //        if ($this->input->post('submit') !== null) {
    //            $data_insert = array(
    //                'id_kandang' => $idkandang,
    //                'tanggal' => $this->input->post('tanggal'),
    //                'jumlah_ayam' => $this->input->post('jumlah'),
    //            );
    //
    //            $this->DetailPembelian->set($data_insert);
    //
    //            redirect(current_url());
    //        }
    //
    //        if ($this->input->post('submit-kerugian') !== null) {
    //            $data = array(
    //                'tanggal' => $this->input->post('tanggal'),
    //                'id_pemasukan_ayam' => $this->input->post('id_pemasukan_ayam'),
    //                'keterangan' => $this->input->post('keterangan'),
    //                'jumlah_ayam' => $this->input->post('jumlah')
    //            );
    //
    //            $this->KerugianModel->set($data);
    //
    //            redirect(current_url());
    //        }
    //
    //        if ($this->input->post('put-beli') !== null) {
    //            $data_insert = array(
    //                'id_kandang' => $idkandang,
    //                'tanggal' => $this->input->post('tanggal'),
    //                'jumlah_ayam' => $this->input->post('jumlah'),
    //            );
    //
    //            $this->DetailPembelian->put($data_insert, $this->input->post('id'));
    //
    //            redirect(current_url());
    //        }
    //
    //        if ($this->input->post('put-rugi') !== null) {
    //            $data = array(
    //                'tanggal' => $this->input->post('tanggal'),
    //                'id_pemasukan_ayam' => $this->input->post('id_pemasukan_ayam'),
    //                'keterangan' => $this->input->post('keterangan'),
    //                'jumlah_ayam' => $this->input->post('jumlah')
    //            );
    //
    //            $this->KerugianModel->put($data, $this->input->post('id'));
    //
    //            redirect(current_url());
    //        }
    //
    //        if ($this->input->post('del-pengeluaran') !== null) {
    //            $this->KerugianModel->del($this->input->post('id'));
    //
    //            redirect(current_url());
    //        }
    //
    //        if ($this->input->post('del-pemasukan') !== null) {
    //            $this->DetailPembelian->del($this->input->post('id'));
    //
    //            redirect(current_url());
    //        }
    //
    //        $per_page = 1;
    //
    //        $pagination = $this->getConfigPagination(site_url(current_url()), $this->viewHistoryTransaksi->countAll($idkandang), $per_page);
    //        $this->data['pagination'] = $this->pagination($pagination);
    //
    //        $this->data['jumlah_ayam'] = $this->viewHistoryTransaksi->get($idkandang);
    //        $this->data['supplier'] = $this->supplierModel->get();
    //        $this->data['kandang'] = $this->ViewJumlahAyamModel->once($idkandang);
    //        $this->data['pemasukan_ayam'] = $this->DetailPembelian->get();
    //
    //        $this->blade->view('page.ayam_transaksi', $this->data);
    //    }
}
