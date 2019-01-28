<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'KaryawanModel',
            'persediaanModel',
            'supplierModel',
            'jadwalKandangModel',
            'ViewJumlahAyamModel',
            'viewHistoryTransaksi'));
        $this->load->model('viewModel');

        $this->load->library('PdfGenerator');
    }

    public function index()
    {
        $this->blade->view("page.page_laporan", $this->data);
    }

    public function stokayam($idkandang = false, $cetak = false)
    {

        $this->data['title'] = "Laporan Stok Kandang";
        $this->data['count'] = $this->viewModel->countViewStokKandang($this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewModel->getViewStokkandang(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        $this->data['kandang'] = $this->kandangModel->get();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($cetak) {
            switch ($cetak) {
                case 'html':
                    $this->data['kandang'] = $this->viewStokModel->get();
                    $laporan = $this->blade->render("page.laporan.laporan_stok_ayam", $this->data);

                    echo $laporan;

                    // $this->PdfGenerator->generate($laporan, "laporankandang.pdf");
                    return;
                default:
                    break;
            }
        }

        $this->blade->view("page.laporan.page_stok_ayam", $this->data);
    }

    public function stokGudang($id = false, $type = null)
    {
        $this->data['title'] = "Laporan Stok Gudang";
        $this->data['count'] = $this->viewStokGudang->count($this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewStokGudang->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        $this->data['kandang'] = $this->kandangModel->get();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($type) {
            switch ($type) {
                case 'html':
                    $this->data['kandang'] = $this->viewStokGudang->get();

                    $laporan = $this->blade->render("page.laporan.laporan_stok_gudang", $this->data);

                    echo $laporan;

                    // $this->PdfGenerator->generate($laporan, "laporankandang.pdf");
                    return;
                    break;

                default:
                    break;
            }
        }

        $this->blade->view("page.laporan.page_stok_gudang", $this->data);
    }

    public function jadwalPakan($id = false, $type = false)
    {
        $this->data['title'] = "Laporan Jadwal Pakan";
        $this->data['count'] = $this->jadwalKandangModel->countAll($this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->jadwalKandangModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        $this->data['kandang'] = $this->kandangModel->get();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($id && $type) {
            $this->data['data'] = $this->jadwalKandangModel->get(
                false, false, false, $this->params
            );
            $laporan = $this->blade->render("page.laporan.laporan_jadwal_persediaan", $this->data);

            switch ($type) {
                case 'html':
                    echo $laporan;
                    return;
                    break;
                case 'pdf':
                    //$this->PdfGenerator->generate($laporan, "laporankandang.pdf");
                    return;
                    break;
            }

        }

        $this->blade->view("page.laporan.page_laporan_jadwal_persediaan", $this->data);

    }

    public function transaksigudang($page = null, $print = null, $idkandang = null)
    {
        $this->data['title'] = "Laporan Gudang";
        $this->data['count'] = $this->viewTransaksiGudangModel->countViewTransaksiPersediaan(false, $this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewTransaksiGudangModel->getViewTransaksiPersediaan(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        if ($this->data['id']['tahun'] != "0") {
            $this->data['bulan'] = $this->viewTransaksiGudangModel->dateViewTransaksiPersediaan($this->data['id']['tahun']);
        }

        $this->data['persediaan'] = $this->persediaanModel->get();
        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['tahun'] = $this->viewTransaksiGudangModel->dateViewTransaksiPersediaan();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') !== null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['transdataaksi'] = $this->viewTransaksiGudangModel->getViewTransaksiPersediaan(
                    false,
                    false,
                    false,
                    $this->params
                );
                $laporan = $this->blade->render("page.laporan.laporan_transaksi_gudang", $this->data);

                echo $laporan;

                //    $this->PdfGenerator->generate($laporan, "laporantransaksi.pdf");
            } else {
                $this->blade->view("page.laporan.page_transaksi_gudang", $this->data);
            }
        } else {
            $this->blade->view("page.laporan.page_transaksi_gudang", $this->data);
        }
    }

    public function transaksiayam($page = null, $print = null, $idkandang = null)
    {
        $this->data['title'] = "Laporan Transaksi Ayam";
        $this->data['count'] = $this->viewTransaksiAyamModel->countViewTransaksiAyam(false, $this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewTransaksiAyamModel->getViewTransaksiAyam(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        if ($this->data['id']['tahun'] != "0") {
            $this->data['bulan'] = $this->viewTransaksiAyamModel->dateViewTransaksiAyam($this->data['id']['tahun']);
        }

        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['tahun'] = $this->viewTransaksiAyamModel->dateViewTransaksiAyam();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') !== null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['transaksi'] = $this->viewTransaksiAyamModel->getViewTransaksiAyam(
                    false,
                    false,
                    false,
                    $this->params
                );
                $laporan = $this->blade->render("page.laporan.laporan_transaksi_ayam", $this->data);

                echo $laporan;
                //    $this->PdfGenerator->generate($laporan, "laporantransaksi.pdf");
            } else {
                $this->blade->view("page.laporan.page_transaksi_ayam", $this->data);
            }
        } else {
            $this->blade->view("page.laporan.page_transaksi_ayam", $this->data);
        }
    }
}
