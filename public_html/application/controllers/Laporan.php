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

        $this->load->model(array('KaryawanModel', 'persediaanModel', 'supplierModel', 'ViewJumlahAyamModel', 'viewHistoryTransaksi'));
        $this->load->model('viewModel');

        $this->load->library('PdfGenerator');
    }

    public function index()
    {
        $this->blade->view("page.page_laporan", $this->data);
    }

    public function kandang()
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

        if ($this->input->get('type') != null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['kandang'] = $this->kandangModel->get();
                $laporan = $this->blade->render("page.laporan.laporan_kandang", $this->data);

                $this->PdfGenerator->generate($laporan, "laporankandang.pdf");

                return;
            }

        }

        $this->blade->view("page.laporan.page_kandang", $this->data);
    }

    public function persediaan()
    {
        $this->data['title'] = "Laporan Stok Persediaan";
        $this->data['count'] = $this->viewModel->countViewStokPersediaan($this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewModel->getViewStokPersediaan(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        $this->data['kandang'] = $this->kandangModel->get();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') != null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['kandang'] = $this->kandangModel->get();
                $laporan = $this->blade->render("page.laporan.laporan_kandang", $this->data);

                $this->PdfGenerator->generate($laporan, "laporankandang.pdf");

                return;
            }

        }

        $this->blade->view("page.laporan.page_persediaan", $this->data);
    }

    public function jadwalkandang()
    {
        $this->data['title'] = "Laporan Stok Persediaan";
        $this->data['count'] = $this->viewModel->countViewStokPersediaan($this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewModel->getViewStokPersediaan(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        $this->data['kandang'] = $this->kandangModel->get();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') != null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['kandang'] = $this->kandangModel->get();
                $laporan = $this->blade->render("page.laporan.laporan_kandang", $this->data);

                $this->PdfGenerator->generate($laporan, "laporankandang.pdf");

                return;
            }

        }

        $this->blade->view("page.laporan.page_persediaan", $this->data);

    }

    // public function karyawan($page = null, $print = null)
    // {
    //     $per_page = 1000;

    //     $pagination = $this->getConfigPagination(site_url('karyawan/index'), $this->KaryawanModel->countAll(), $per_page);
    //     $this->data['pagination'] = $this->pagination($pagination);

    //     $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $this->data['per_page'] = $per_page;
    //     $this->data['karyawan'] = $this->KaryawanModel->get($per_page, $this->data['page']);
    //     $this->data['title'] = "Laporan Karyawan";

    //     if ($print != null) {
    //         $this->data['karyawan'] = $this->KaryawanModel->get();
    //         $laporan = $this->blade->render("page.laporan.laporan_karyawan", $this->data);

    //         $this->PdfGenerator->generate($laporan, "laporankaryawan.pdf");

    //         return;
    //     }
    //     $this->blade->view('page.laporan.page_karyawan', $this->data);
    // }

    // public function stokAyam($page = null, $print = null)
    // {
    //     $per_page = 1000;

    //     $pagination = $this->getConfigPagination(site_url('laporan/transaksi'), $this->ViewJumlahAyamModel->countAll(), $per_page);
    //     $this->data['pagination'] = $this->pagination($pagination);

    //     $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $this->data['per_page'] = $per_page;
    //     $this->data['kandang'] = $this->ViewJumlahAyamModel->get(false, $per_page, $this->data['page']);
    //     $this->data['title'] = "Laporan Stok Ayam";

    //     if ($print != null) {
    //         $this->data['kandang'] = $this->ViewJumlahAyamModel->get();
    //         $laporan = $this->blade->render("page.laporan.laporan_stok_ayam", $this->data);

    //         $this->PdfGenerator->generate($laporan, "laporankaryawan.pdf");

    //         return;
    //     }

    //     $this->blade->view('page.laporan.page_jumlah_stok', $this->data);
    // }

    // public function vaksin($page = null, $print = null)
    // {
    //     $per_page = 1000;

    //     $pagination = $this->getConfigPagination(site_url('vaksin/index'), $this->PersediaanModel->countAll(), $per_page);
    //     $this->data['pagination'] = $this->pagination($pagination);

    //     $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $this->data['per_page'] = $per_page;
    //     $this->data['vaksin'] = $this->PersediaanModel->get($per_page, $this->data['page']);
    //     $this->data['title'] = "Laporan Persediaan";

    //     if ($print != null) {
    //         $this->data['vaksin'] = $this->PersediaanModel->get();
    //         $laporan = $this->blade->render("page.laporan.laporan_persediaan", $this->data);

    //         $this->PdfGenerator->generate($laporan, "laporanvaksin.pdf");

    //         return;
    //     }

    //     $this->blade->view("page.laporan.page_persediaan", $this->data);
    // }

    // public function transaksi($page = null, $print = null, $idkandang = null)
    // {
    //     $per_page = 3;
    //     $params = array();

    //     if ($this->input->get("ket") !== null) {
    //         if ($this->input->get("ket") !== "semua") {
    //             $params['ket'] = $this->input->get("ket");
    //         }

    //     }

    //     if ($this->input->get("id_kandang") !== null) {
    //         $params['id_kandang'] = $this->input->get("id_kandang");
    //     }

    //     if ($this->input->get("tahun") !== null) {
    //         $params['year(tanggal_transaksi)'] = $this->input->get("tahun");
    //     }

    //     if ($this->input->get("bulan") !== null) {
    //         $params['month(tanggal_transaksi)'] = $this->input->get("bulan");
    //     }

    //     $this->data['title'] = "Laporan Transaksi ";

    //     $pagination = $this->getConfigPagination(site_url('laporan/transaksi/'), $this->viewHistoryTransaksi->countAll($idkandang, $params), $per_page);
    //     $this->data['pagination'] = $this->pagination($pagination);
    //     $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $this->data['per_page'] = $per_page;

    //     if ($print != null) {
    //         $this->data['jumlah_ayam'] = $this->viewHistoryTransaksi->get($idkandang, null, null, $params);
    //         $laporan = $this->blade->render("page.laporan.laporan_transaksi", $this->data);

    //         $this->PdfGenerator->generate($laporan, "laporantransaksi.pdf");

    //         return;
    //     }

    //     $this->data['tahun_transaksi'] = $this->viewHistoryTransaksi->getTahun();
    //     $this->data['jumlah_ayam'] = $this->viewHistoryTransaksi->get($idkandang, $per_page, $this->data['page'], $params);
    //     $this->data['kandang'] = $this->kandangModel->get();

    //     $this->blade->view("page.laporan.page_transaksi", $this->data);
    // }

    public function gudang($page = null, $print = null, $idkandang = null)
    {
        $this->data['title'] = "Laporan Persediaan";
        $this->data['count'] = $this->viewModel->countViewTransaksiPersediaan(false, $this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewModel->getViewTransaksiPersediaan(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        if ($this->data['id']['tahun'] != "0") {
            $this->data['bulan'] = $this->viewModel->dateViewTransaksiPersediaan($this->data['id']['tahun']);
        }

        $this->data['persediaan'] = $this->persediaanModel->get();
        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['tahun'] = $this->viewModel->dateViewTransaksiPersediaan();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') !== null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['transaksi'] = $this->viewModel->getViewTransaksiPersediaan(
                    false,
                    false,
                    false,
                    $this->params
                );
                $laporan = $this->blade->render("page.laporan.laporan_persediaan", $this->data);

                echo $laporan;

                //    $this->PdfGenerator->generate($laporan, "laporantransaksi.pdf");
            } else {
                $this->blade->view("page.laporan.page_gudang", $this->data);
            }
        } else {
            $this->blade->view("page.laporan.page_gudang", $this->data);
        }
    }

    public function transaksiayam($page = null, $print = null, $idkandang = null)
    {
        $this->data['title'] = "Laporan Transaksi Ayam";
        $this->data['count'] = $this->viewModel->countViewTransaksiAyam(false, $this->params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewModel->getViewTransaksiAyam(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $this->params
        );

        if ($this->data['id']['tahun'] != "0") {
            $this->data['bulan'] = $this->viewModel->dateViewTransaksiAyam($this->data['id']['tahun']);
        }

        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['tahun'] = $this->viewModel->dateViewTransaksiAyam();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') !== null) {
            $cetak = $this->input->get('type');

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                $this->data['transaksi'] = $this->viewModel->getViewTransaksiAyam(
                    false,
                    false,
                    false,
                    $this->params
                );
                $laporan = $this->blade->render("page.laporan.laporan_transaksi_ayam", $this->data);
                //    $this->PdfGenerator->generate($laporan, "laporantransaksi.pdf");
            } else {
                $this->blade->view("page.laporan.page_transaksi_ayam", $this->data);
            }
        } else {
            $this->blade->view("page.laporan.page_transaksi_ayam", $this->data);
        }
    }
}
