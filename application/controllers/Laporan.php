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
        $this->load->model('viewModel');
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
            $this->data['kandang'] = $this->viewStokAyamModel->get();
            $laporan = $this->blade->render("page.laporan.laporan_stok_ayam", $this->data);

            switch ($cetak) {
                case 'html':
                    echo $laporan;
                    return;
                    break;
                case 'pdf':
                    $this->pdfgenerator->generate($laporan, "laporan_stok_ayam_" . date("d-m-Y") . ".pdf");
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
        $this->data['title'] = "Laporan Stok Pakan";
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

    public function pendapatan()
    {

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

        if ($this->input->get("type") !== null) {
            if ($this->input->get("type") == "html") {
                if ($this->input->get("id") !== null) {
                    if ($this->input->get('id') !== "0") {
                        $params['id_detail_pembelian_ayam'] = $this->input->get("id");
                        $this->data['id'] = $this->input->get("id");
                    }
                }

                $this->data['data'] = $this->detailPembelianAyamModel->get(
                    false,
                    false,
                    false,
                    $params
                );

                $this->data['data_pembelian'] = $this->detailPenjualanAyamModel->get(
                    false,
                    false,
                    false,
                    $params
                );

                $this->data['title'] = "Laporan Penggunaan Gudang";

                $this->blade->view("page.laporan.laporan_pendapatan_pembelian", $this->data);

                return;
            }
        }

        $this->blade->view("page.laporan.page_pendapatan", $this->data);
    }

    public function group($type = false, $id = false, $cetak = false)
    {
        if ($type == false || $type == "html") {
            $data = array();

            $params = array();
            $page = 0;
            $per_page = 3;

            $params["id_kandang"] = true;

            $this->data['id_supplier'] = "0";
            $this->data['id_kandang'] = "0";

            if ($this->input->get("per_page") !== null) {
                $page = $this->input->get("per_page");
            }

            if ($this->input->get("supplier") !== null) {
                if ($this->input->get('supplier') !== "0") {
                    $params['supplier'] = $this->input->get("supplier");
                    $this->data['id_supplier'] = $this->input->get("supplier");
                }
            }

            // filter pembelian ayam
            if ($this->input->get("kandang") !== null) {
                if ($this->input->get('kandang') !== "0") {
                    $params['kandang'] = $this->input->get("kandang");
                    $this->data['id_kandang'] = $this->input->get("kandang");
                }
            }

            $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
            $this->data['limit'] = $per_page;
            $this->data['count'] = $this->viewDetailGroupTransaksi->countAll($params);

            $pagination = $this->getConfigPagination(
                current_url(),
                $this->data['count'],
                $this->data['limit']
            );
            $this->data['pagination'] = $this->pagination($pagination);

            $this->data['data'] = $this->viewDetailGroupTransaksi->get(
                $this->data['limit'],
                $this->data['offset'],
                $params
            );

            $this->data['kandang'] = $this->kandangModel->get();
            $this->data['supplier'] = $this->supplierModel->get();

            if ($type == "html") {
                if ($id == false) {
                    $this->data['data'] = $this->viewDetailGroupTransaksi->get();
                    $this->data["title"] = "Laporan pendapatan perkelompok";

                    $this->blade->view("page.laporan.laporan_group_all", $this->data);
                } else {
                    $this->data['data'] = $this->viewDetailGroupTransaksiAyamModel->get(
                        false, false, [
                            "id_detail_group_transaksi" => $id,
                        ]
                    );

                    $this->data["title"] = "Laporan pendapatan perkelompok untuk id " . $id;

                    $this->blade->view("page.laporan.laporan_group", $this->data);
                }
            } else {
                $this->blade->view("page.laporan.page_group_laporan", $this->data);
            }
        } else {
            if ($type == "pembelian") {
                # code...

                $data = array();

                $params = array();
                $page = 0;
                $per_page = 3;

                $this->data['id_group'] = $id;
                $this->data['id_supplier'] = "0";
                $this->data['id_kandang'] = "0";
                $this->data['id_detail_group_transaksi'] = $id;

                if ($this->input->get("per_page") !== null) {
                    $page = $this->input->get("per_page");
                }

                if ($this->input->get("supplier") !== null) {
                    if ($this->input->get('supplier') !== "0") {
                        $params['supplier'] = $this->input->get("supplier");
                        $this->data['id_supplier'] = $this->input->get("supplier");
                    }
                }

                // filter pembelian ayam
                if ($this->input->get("kandang") !== null) {
                    if ($this->input->get('kandang') !== "0") {
                        $params['kandang'] = $this->input->get("kandang");
                        $this->data['id_kandang'] = $this->input->get("kandang");
                    }
                }

                $this->data['kandang'] = $this->kandangModel->get();
                $this->data['supplier'] = $this->supplierModel->get();

                $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
                $this->data['limit'] = $per_page;
                $this->data['count'] = $this->detailPembelianAyamModel->countAll($params);

                if ($id != false && $cetak == "html") {
                    $this->data['data'] = $this->viewDetailGroupTransaksiAyamModel->get(
                        false, false, [
                            "id_detail_group_transaksi" => $id,
                            "aksi" => "beli",
                        ]
                    );

                    $this->data["title"] = "Laporan pendapatan perkelompok untuk id " . $id;

                    $this->blade->view("page.laporan.laporan_group", $this->data);
                } else {
                    $this->data['data'] = $this->detailPembelianAyamModel->get(
                        $this->data['limit'],
                        $this->data['offset'],
                        false,
                        $params
                    );

                    $this->blade->view("page.laporan.page_group_pembelian_laporan", $this->data);
                }
            } elseif ($type == "penjualan") {
                # code...

                $data = array();

                $params = array();
                $page = 0;
                $per_page = 3;

                $this->data['id_group'] = $id;
                $this->data['id_supplier'] = "0";
                $this->data['id_kandang'] = "0";
                $this->data['id_detail_group_transaksi'] = $id;

                if ($this->input->get("per_page") !== null) {
                    $page = $this->input->get("per_page");
                }

                if ($this->input->get("supplier") !== null) {
                    if ($this->input->get('supplier') !== "0") {
                        $params['supplier'] = $this->input->get("supplier");
                        $this->data['id_supplier'] = $this->input->get("supplier");
                    }
                }

                // filter pembelian ayam
                if ($this->input->get("kandang") !== null) {
                    if ($this->input->get('kandang') !== "0") {
                        $params['kandang'] = $this->input->get("kandang");
                        $this->data['id_kandang'] = $this->input->get("kandang");
                    }
                }

                $this->data['kandang'] = $this->kandangModel->get();
                $this->data['supplier'] = $this->supplierModel->get();

                $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
                $this->data['limit'] = $per_page;
                $this->data['count'] = $this->detailPenjualanAyamModel->countAll($params);

                if ($id != false && $cetak == "html") {
                    $this->data['data'] = $this->viewDetailGroupTransaksiAyamModel->get(
                        false, false, [
                            "id_detail_group_transaksi" => $id,
                            "aksi" => "jual",
                        ]
                    );

                    $this->data["title"] = "Laporan penjualan perkelompok untuk id " . $id;

                    $this->blade->view("page.laporan.laporan_group", $this->data);
                } else {
                    $this->data['data'] = $this->detailPenjualanAyamModel->get(
                        $this->data['limit'],
                        $this->data['offset'],
                        false,
                        $params
                    );

                    $this->blade->view("page.laporan.page_group_penjualan_laporan", $this->data);
                }
            } elseif ($type == "kerugian") {
                # code...

                $data = array();

                $params = array();
                $page = 0;
                $per_page = 3;

                $this->data['id_group'] = $id;
                $this->data['id_supplier'] = "0";
                $this->data['id_kandang'] = "0";
                $this->data['id_detail_group_transaksi'] = $id;

                if ($this->input->get("per_page") !== null) {
                    $page = $this->input->get("per_page");
                }

                if ($this->input->get("supplier") !== null) {
                    if ($this->input->get('supplier') !== "0") {
                        $params['supplier'] = $this->input->get("supplier");
                        $this->data['id_supplier'] = $this->input->get("supplier");
                    }
                }

                // filter pembelian ayam
                if ($this->input->get("kandang") !== null) {
                    if ($this->input->get('kandang') !== "0") {
                        $params['kandang'] = $this->input->get("kandang");
                        $this->data['id_kandang'] = $this->input->get("kandang");
                    }
                }

                $this->data['kandang'] = $this->kandangModel->get();
                $this->data['supplier'] = $this->supplierModel->get();

                $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
                $this->data['limit'] = $per_page;
                $this->data['count'] = $this->detailKerugianAyamModel->countAll($params);

                if ($id != false && $cetak == "html") {
                    $this->data['data'] = $this->viewDetailGroupTransaksiAyamModel->get(
                        false, false, [
                            "id_detail_group_transaksi" => $id,
                            "aksi" => "rugi",
                        ]
                    );

                    $this->data["title"] = "Laporan kerugian perkelompok untuk id " . $id;

                    $this->blade->view("page.laporan.laporan_group", $this->data);
                } else {
                    $this->data['data'] = $this->detailKerugianAyamModel->get(
                        $this->data['limit'],
                        $this->data['offset'],
                        false,
                        $params
                    );

                    $this->blade->view("page.laporan.page_group_kerugian_laporan", $this->data);
                }

            } else {
                # code...

                print("Tidak ditemukan type yang cocok");
            }

        }
    }
}
