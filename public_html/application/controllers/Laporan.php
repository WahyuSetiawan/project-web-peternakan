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
            // 'KaryawanModel',
            // 'gudangModel',
            // 'supplierModel',
            // 'jadwalKandangModel',
            // 'ViewJumlahAyamModel',
            // 'viewHistoryTransaksi'
        ));
        $this->load->model('viewModel');

        $this->load->library('pdfGenerator');
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
            current_url(),
            $this->data['count'],
            $this->data['limit']
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
                    $this->data['kandang'] = $this->viewStokAyamModel->get();
                    $laporan = $this->blade->render("page.laporan.laporan_stok_ayam", $this->data);

                    echo $laporan;
                    return;
                    break;
                case 'pdf':
                    $this->pdfGenerator->generate($laporan, "laporan_stok_ayam_" . date("d-m-Y") . ".pdf");
                    break;
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
        $this->data['count'] = $this->viewStokGudangModel->count($this->params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['transaksi'] = $this->viewStokGudangModel->get(
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

            $this->data['kandang'] = $this->viewStokGudangModel->get();

            $laporan = $this->blade->render("page.laporan.laporan_stok_gudang", $this->data);

            switch ($type) {
                case 'html':

                    echo $laporan;
                    return;
                    break;
                case 'pdf':
                    $this->pdfGenerator->generate($laporan, "laporan_stok_gudang_" . date("d-m-Y") . ".pdf");
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
            current_url(),
            $this->data['count'],
            $this->data['limit']
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
                false,
                false,
                false,
                $this->params
            );
            $laporan = $this->blade->render("page.laporan.laporan_jadwal_persediaan", $this->data);

            switch ($type) {
                case 'html':
                    echo $laporan;
                    return;
                    break;
                case 'pdf':
                    $this->pdfGenerator->generate($laporan, "laporan_jadwal_persediaan_" . date("d-m-Y") . ".pdf");
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
            current_url(),
            $this->data['count'],
            $this->data['limit']
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

        $this->data['gudang'] = $this->gudangModel->get();
        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['tahun'] = $this->viewTransaksiGudangModel->dateViewTransaksiPersediaan();

        if ($this->data['count'] <= 0) {
            $this->data['flashdata']['not_found_data'] = "Tidak terdapat data yang ditampilkan, maka tidak bisa melakukan <strong>cetak data</strong>";
        }

        if ($this->input->get('type') !== null) {
            $cetak = $this->input->get('type');

            $this->data['transdataaksi'] = $this->viewTransaksiGudangModel->getViewTransaksiPersediaan(
                false,
                false,
                false,
                $this->params
            );
            $laporan = $this->blade->render("page.laporan.laporan_transaksi_gudang", $this->data);

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                echo $laporan;
            } else if ($cetak == "pdf" && ($this->data['count'] > 0)) {
                $this->pdfGenerator->generate($laporan, "laporan_transaksi_gudang_" . date("d-m-y") . ".pdf");
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
            current_url(),
            $this->data['count'],
            $this->data['limit']
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

            $this->data['transaksi'] = $this->viewTransaksiAyamModel->getViewTransaksiAyam(
                false,
                false,
                false,
                $this->params
            );
            $laporan = $this->blade->render("page.laporan.laporan_transaksi_ayam", $this->data);

            if ($cetak == "html" && ($this->data['count'] > 0)) {
                echo $laporan;
            } else if ($cetak == "pdf" && ($this->data['count'] > 0)) {
                $this->pdfGenerator->generate($laporan, "laporan_transaksi_ayam_" . date("d-m-Y") . ".pdf");
            } else {
                $this->blade->view("page.laporan.page_transaksi_ayam", $this->data);
            }
        } else {
            $this->blade->view("page.laporan.page_transaksi_ayam", $this->data);
        }
    }

    public function penggunaanGudang()
    {
        $current_date = Date("Y-m-d H:i");
        $current_date_view = Date("Y-m-d");
        $current_time_view = Date("H:i");

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

        $this->data['data'] = $this->detailPenggunaanGudangModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['current_date'] = $current_date;
        $this->data['current_date_view'] = $current_date_view;
        $this->data["current_time_view"] = $current_time_view;


        if ($this->input->get("type") !== null) {
            if ($this->input->get("type") == "html") {
                $this->data['data'] = $this->detailPenggunaanGudangModel->get(
                    false,
                    false,
                    false,
                    $params
                );

                $this->data['title'] = "Laporan Penggunaan Gudang";

                $this->blade->view("page.laporan.laporan_penggunaan_gudang", $this->data);

                return;
            }
        }

        $this->blade->view("page.laporan.page_pengunaan_gudang", $this->data);
    }

    function pendapatan(){

        // initial value variable
        $id = ($this->input->post('id') !== null && $this->input->post('id') !== "") ? $this->input->post('id') : $this->detailPembelianAyamModel->newId();
        $params = array();

        $this->data['id_kandang'] = "0";
        $this->data['id_supplier'] = "0";

        // get input initial

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

        // method crud

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }


            $data = array(
                "id_detail_pembelian_ayam" => $id,
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "umur" => $this->input->post("umur"),
                "harga_ayam" => $this->input->post("harga"),
                "id_karyawan" => $this->id_karyawan,
                "id_admin" => $this->id_admin,
                "tanggal" => $tanggal,
                "jumlah_ayam" => $this->input->post("jumlah"),
            );

            $this->data['post'] = $data;

            $this->detailPembelianAyamModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data pembelian ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', 'Berhasil simpan data pembelian ayam denga id : ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }

            $data = array(
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "update_by_karyawan" => $this->id_karyawan,
                "update_by_admin" => $this->id_admin,
                "harga_ayam" => $this->input->post("harga"),
                "tanggal" => $tanggal,
                "jumlah_ayam" => $this->input->post("jumlah"),
            );

            $this->detailPembelianAyamModel->put($this->input->post("id"), $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data pemebelian bibit ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', 'Berhasil menyimpan data pembelian bibit ayam');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->detailPembelianAyamModel->remove($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() == false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data transaksi pembelian bibit ayan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Behasil menghapus data transaksi pembelian bibit ayam');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->detailPembelianAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['supplier'] = $this->supplierModel->get(false, false, false, ['jual_ayam' => "Y"]);
        $this->data['kandang'] = $this->functionModel->avaliable_data_kandang();

        $this->data['data'] = $this->detailPembelianAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->blade->view("page.transaksi.kandang.pembelian", $this->data);
    }

}
