<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Kandang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['limit_umur'] = 7 * 5;
    }

    public function index()
    {
        $data = array();
        $params = array();

        if (null !== ($this->input->post("submit"))) {
            $this->form_validation->set_rules(
                "nama",
                'Nama',
                'required|is_unique[tb_kandang.nama]',
                [
                    'is_unique' => 'Peringatan, Nama kandang sudah dipakai oleh nama kandang yang lain !!!!.',
                    'required' => 'Peringatan, Nama kandang tidak boleh kosong !!!!',
                ]
            );

            $this->form_validation->set_rules(
                "stok",
                'Stok Ayam',
                'required|greater_than_equal_to[10]',
                [
                    'greater_than_equal_to' => 'Peringatan, minimal stok ayam 10 ekor !!!!',
                    'required' => 'Peringatan, Nama kandang tidak boleh kosong !!!!',
                ]
            );

            if ($this->form_validation->run() == true) {
                $this->db->trans_start();

                $id = $this->kandangModel->newId();

                $data = [
                    'id_kandang' => $id,
                    'nama' => $this->input->post("nama"),
                    'stok_ayam' => $this->input->post("stok"),
                    'id_karyawan' => $this->input->post('karyawan'),
                ];

                $this->kandangModel->set($data);

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('insert_failed', "Mengubah data pada kandang dengan id " . $id . " tidak berhasil !!");
                    $this->session->mark_as_flash('insert_failed');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('insert_success', "Menyimpan data pada kandang dengan id " . $id . " berhasil !!");
                    $this->session->mark_as_flash('insert_success');
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("put"))) {
            $this->form_validation->set_rules(
                "nama",
                'Nama',
                'required|edit_unique[tb_kandang.nama.id_kandang.' . $this->input->post("id") . ']',
                [
                    'edit_unique' => 'Peringatan, Nama kandang sudah dipakai oleh nama kandang yang lain !!!!.',
                    'required' => 'Peringatan, Nama kandang tidak boleh kosong !!!!',
                ]
            );

            $this->form_validation->set_rules(
                "stok",
                'Stok Ayam',
                'required|greater_than_equal_to[10]',
                [
                    'greater_than_equal_to' => 'Peringatan, minimal stok ayam 10 ekor !!!!',
                    'required' => 'Peringatan, Nama kandang tidak boleh kosong !!!!',
                ]
            );

            if ($this->form_validation->run() == true) {
                $this->db->trans_start();

                $data = [
                    'nama' => $this->input->post("nama"),
                    'stok_ayam' => $this->input->post("stok"),
                    'id_karyawan' => $this->input->post('karyawan'),
                ];

                $this->kandangModel->put($data, $this->input->post('id'));

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('update_failed', "Mengubah data pada kandang dengan id " . $this->input->post('id') . " tidak berhasil !!");
                    $this->session->mark_as_flash('update_failed');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('update_success', "Menyimpan data pada kandang dengan id " . $this->input->post('id') . " berhasil !!");
                    $this->session->mark_as_flash('update_success');
                    $this->db->trans_commit();
                }

                $this->session->set_flashdata('flash_welcome', 'Hey, welcome to the site!');

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->kandangModel->remove($this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Menghapus data kandang dengan id' . $this->input->post('id') . " tidak berhasil");
                $this->session->mark_as_flash('delete_failed');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Menghapus data kandang dengan id ' . $this->input->post('id') . " berhasil");
                $this->session->mark_as_flash('delete_success');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->kandangModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->kandangModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['karyawan'] = $this->KaryawanModel->get();

        $this->blade->view("page.data.kandang", $this->data);
    }

    public function pembelian()
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

        // method crud
        // update method
        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $data_kandang = $this->viewStokAyamModel->get(false, false, [
                "id_kandang" => $this->input->post("kandang"),
            ]);

            $umur_ayam = (($data_kandang->umur_ayam_sekarang > 0
                && $data_kandang->jumlah_transaksi_masuk >= 1) ? $data_kandang->umur_ayam_sekarang + 10 : 365);

            $this->form_validation->set_rules(
                "jumlah",
                'Jumlah',
                'required|greater_than_equal_to[0]|less_than_equal_to[' . ($data_kandang->sisa_jumlah_ayam) . ']',
                [
                    'greater_than_equal_to' => 'Peringatan, harga tidak boleh diisi kosong',
                    'less_than_equal_to' => 'Peringatan, jumlah tidak boleh lebih dari ' . ($data_kandang->sisa_jumlah_ayam),
                    'required' => 'Peringatan, harga harus di isi!!!!',
                ]
            );

            $this->form_validation->set_rules(
                "supplier",
                "Supplier",
                "required",
                [
                    "required" => "Supplier tidak boleh kosong",
                ]
            );

            $this->form_validation->set_rules(
                "umur",
                "Umur",
                'required|greater_than_equal_to[0]|less_than_equal_to[' . $umur_ayam . ']',
                [
                    'required' => 'Umur harus diisikan tidak boleh kosong',
                    'greater_than_equal_to' => 'Umur, tidak boleh kurang dari 0',
                    'less_than_equal_to' => "Umur ayan yang dimasukan tidak boleh melebihi dari $umur_ayam",
                ]
            );

            $this->form_validation->set_rules(
                "harga",
                'Harga',
                'required|greater_than_equal_to[0]',
                [
                    'greater_than_equal_to' => 'Peringatan, harga tidak boleh diisi kosong',
                    'required' => 'Peringatan, harga harus di isi!!!!',
                ]
            );

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
            }

            if ($this->form_validation->run()) {
                $data = array(
                    "id_detail_pembelian_ayam" => $id,
                    "id_kandang" => $this->input->post("kandang"),
                    "id_supplier" => $this->input->post("supplier"),
                    "umur" => $this->input->post("umur"),
                    "id_detail_group_transaksi" => null,
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
        }

        // edit method
        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
            }

            $data_kandang = $this->viewStokAyamModel->get(false, false, [
                "id_kandang" => $this->input->post("kandang"),
            ]);

            $umur_ayam = (($data_kandang->umur_ayam_sekarang > 0
                && $data_kandang->jumlah_transaksi_masuk > 1) ? $data_kandang->umur_ayam_sekarang + 10 : 365);

            $this->form_validation->set_rules(
                "jumlah",
                'Jumlah',
                'required|greater_than_equal_to[0]|less_than_equal_to[' . ($data_kandang->sisa_jumlah_ayam) . ']',
                [
                    'greater_than_equal_to' => 'Peringatan, harga tidak boleh diisi kosong',
                    'less_than_equal_to' => 'Peringatan, jumlah tidak boleh lebih dari ' . ($data_kandang->sisa_jumlah_ayam),
                    'required' => 'Peringatan, harga harus di isi!!!!',
                ]
            );

            $this->form_validation->set_rules(
                "supplier",
                "Supplier",
                "required",
                [
                    "required" => "Supplier tidak boleh kosong",
                ]
            );

            $this->form_validation->set_rules(
                "umur",
                "Umur",
                'required|greater_than_equal_to[0]|less_than_equal_to[' . $umur_ayam . ']',
                [
                    'required' => 'Umur harus diisikan tidak boleh kosong',
                    'greater_than_equal_to' => 'Umur, tidak boleh kurang dari 0',
                    'less_than_equal_to' => "Umur ayan yang dimasukan tidak boleh melebihi dari $umur_ayam",
                ]
            );

            $this->form_validation->set_rules(
                "harga",
                'Harga',
                'required|greater_than_equal_to[0]',
                [
                    'greater_than_equal_to' => 'Peringatan, harga tidak boleh diisi kosong',
                    'required' => 'Peringatan, harga harus di isi!!!!',
                ]
            );

            if ($this->form_validation->run()) {
                $data = array(
                    "id_kandang" => $this->input->post("kandang"),
                    "id_supplier" => $this->input->post("supplier"),
                    "umur" => $this->input->post("umur"),
                    "id_detail_group_transaksi" => $this->input->post("group"),
                    "harga_ayam" => $this->input->post("harga"),
                    "id_karyawan" => $this->id_karyawan,
                    "id_admin" => $this->id_admin,
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
        $this->data['semua_kandang'] = $this->kandangModel->get();
        $this->data['kandang_stok'] = $this->functionModel->viewStokAyam(true);

        $this->data['data'] = $this->detailPembelianAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->blade->view("page.transaksi.kandang.pembelian", $this->data);
    }

    public function penjualan()
    {
        $params = array();
        $id = ($this->input->post('id') !== null && $this->input->post('id') !== "") ? $this->input->post("id") : $this->detailPenjualanAyamModel->newId();

        $this->data['pembelian'] = $this->functionModel->pdSelectPenjualanAyam();

        $this->data['id_kandang'] = "0";

        // get input initial

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        // if (count($this->data['pembelian']) > 0) {
        //     $this->data['id_pembelian'] = $this->data['pembelian'][0]->id_detail_pembelian_ayam;
        //     $params['id_detail_pembelian_ayam'] = $this->data['pembelian'][0]->id_detail_pembelian_ayam;
        // }

        // if ($this->input->get("pembelian") !== null) {
        //     if ($this->input->get('pembelian') !== "0") {
        //         $params['id_detail_pembelian_ayam'] = $this->input->get("pembelian");
        //         $this->data['id_pembelian'] = $this->input->get("pembelian");
        //     }
        // }

        // $this->data['kandang'] = $this->functionModel->available_data_kandang_penjualan($params['id_detail_pembelian_ayam']);

        $this->data['kandang'] = $this->functionModel->viewStokAyam(false, true, true);

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $id_data = null;

                foreach ($this->data['kandang'] as $key => $value) {
                    if ($this->input->get('kandang') == $value->id_kandang) {
                        $id_data = $value->id_kandang;
                    }
                }

                if ($id_data !== null) {
                    $params['kandang'] = $this->input->get("kandang");
                    $this->data['id_kandang'] = $this->input->get("kandang");
                }
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        // validation area  data for penjualan yang diletakan pada sebelum submit dan update

        $this->form_validation->set_rules(
            "harga",
            'Harga',
            'required|greater_than_equal_to[0]',
            [
                'greater_than_equal_to' => 'Peringatan, harga tidak boleh diisi kosong',
                'required' => 'Peringatan, harga harus di isi!!!!',
            ]
        );

        $this->form_validation->set_rules(
            "id_group",
            "ID Kelompok Transaksi",
            "required",
            [
                "required" => "Peringatan, id Group tidak boleh kosong",
            ]
        );

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
            }

            // $data = $this->functionModel->statusPenjualanAyam($this->data['id_pembelian'], $tanggal);
            $data = $this->functionModel->viewStokAyam(false, true, true, $this->input->post('kandang'));
            $view_sisa_pembelian = $this->detailPenjualanAyamModel->getSisaAyam($this->input->post("pembelian"));

            $this->form_validation->set_rules(
                "jumlah",
                'Jumlah',
                'required|greater_than_equal_to[0]|max_stok[view_stok_ayam.jumlah.id_kandang.' . $this->input->post("kandang") . ']',
                [
                    'greater_than_equal_to' => 'Peringatan, Jumlah Stok tidak boleh kosong',
                    'max_stok' => 'Peringatan, Jumlah yang dimasukan melebihi jumlah stok ayam yang ada',
                    'required' => 'Peringatan, jumlah ayam harus diisi !!!!',
                ]
            );

            if ($this->form_validation->run()) {
                $dataInsert = array(
                    "id_detail_penjualan_ayam" => $id,
                    "tanggal" => $tanggal,
                    "id_kandang" => $this->input->post("kandang"),
                    "keterangan" => $this->input->post("keterangan"),
                    "jumlah_ayam" => $this->input->post("jumlah"),
                    "id_detail_group_transaksi" => $this->input->post("id_group"),
                    "harga" => $this->input->post("harga"),
                    "id_karyawan" => $this->id_karyawan,
                    "id_admin" => $this->id_admin,
                );

                $this->data['post'] = $dataInsert;

                if ($data->umur_ayam_sekarang >= $this->data['limit_umur']) {
                    $this->detailPenjualanAyamModel->set($dataInsert);
                } else {
                    $this->db->trans_complete();

                    $this->session->set_flashdata("insert_failed", "Umur ayam belum cukup untuk dijual ");
                    $this->db->trans_commit();

                    redirect(current_url());
                }

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data penjualan ayam');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('insert_success', 'Berhasil menyimpan data transaksi penjualan ayam dengan id ' . $id);
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
            }

            // $data = $this->functionModel->statusPenjualanAyam($this->data['id_pembelian'], $tanggal);
            $data = $this->functionModel->viewStokAyam(false, true, true, $this->input->post('kandang'));

            $this->form_validation->set_rules(
                "jumlah",
                'Jumlah',
                'required|greater_than_equal_to[0]|max_stok[view_stok_ayam.jumlah.id_kandang.' . $this->input->post("kandang") . ']',
                [
                    'greater_than_equal_to' => 'Peringatan, Jumlah Stok tidak boleh kosong',
                    'max_stok' => 'Peringatan, Jumlah yang dimasukan melebihi jumlah stok ayam yang ada',
                    'required' => 'Peringatan, jumlah ayam harus diisi !!!!',
                ]
            );

            if ($this->form_validation->run()) {
                $dataUpdate = array(
                    "tanggal" => $tanggal,
                    // "id_detail_pembelian_ayam" => $this->input->post("pembelian"),
                    "id_kandang" => $this->input->post("kandang"),
                    "keterangan" => $this->input->post("keterangan"),
                    "jumlah_ayam" => $this->input->post("jumlah"),
                    "id_detail_group_transaksi" => $this->input->post("id_group"),
                    "harga" => $this->input->post("harga"),
                    "id_karyawan" => $this->id_karyawan,
                    "id_admin" => $this->id_admin,
                );

                $this->data['post'] = $dataUpdate;

                if ($data->umur_ayam_sekarang >= $this->data['limit_umur']) {
                    $this->detailPenjualanAyamModel->put($this->input->post("id"), $dataUpdate);
                } else {
                    $this->db->trans_complete();

                    $this->session->set_flashdata("update_failed", "Umur ayam belum cukup untuk dijual");
                    $this->db->trans_commit();

                    redirect(current_url());
                }

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data transaksi penjualan ayam');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('update_success', 'Berhasil mengubah data penjualan ayam');
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->detailPenjualanAyamModel->remove($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data penjualan ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Berhasil menghapus data penjualan dengan id ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->detailPenjualanAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->detailPenjualanAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['semua_kandang'] = $this->kandangModel->get();

        $this->blade->view("page.transaksi.kandang.penjualan", $this->data);
    }

    public function kerugian()
    {
        //initial id pembelian ayam
        $params = array();
        $id = ($this->input->post('id') !== null) ? (($this->input->post("id") != "") ? $this->input->post("id") : $this->detailKerugianAyamModel->newId()) : $this->detailKerugianAyamModel->newId();

        // $this->data['pembelian'] = $this->functionModel->pdSelectPenjualanAyam();

        $this->data['id_kandang'] = "0";
        // if (count($this->data['pembelian']) > 0) {
        //     $this->data['id_pembelian'] = $this->data['pembelian'][0]->id_detail_pembelian_ayam;
        //     $params['id_detail_pembelian_ayam'] = $this->data['pembelian'][0]->id_detail_pembelian_ayam;
        // }

        // filter pembelian ayam
        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        // if ($this->input->get("pembelian") !== null) {
        //     if ($this->input->get('pembelian') !== "0") {
        //         $params['id_detail_pembelian_ayam'] = $this->input->get("pembelian");
        //         $this->data['id_pembelian'] = $this->input->get("pembelian");
        //     }
        // }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        // method Crud on kerugian ayam
        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
            }

            $this->form_validation->set_rules(
                "jumlah",
                'Jumlah',
                'required|greater_than_equal_to[0]|max_stok[view_stok_ayam.jumlah.id_kandang.' . $this->input->post("kandang") . ']',
                [
                    'greater_than_equal_to' => 'Peringatan, Jumlah Stok tidak boleh kosong',
                    'max_stok' => 'Peringatan, Jumlah yang dimasukan melebihi jumlah stok ayam yang ada',
                    'required' => 'Peringatan, jumlah ayam harus diisi !!!!',
                ]
            );

            $this->form_validation->set_rules(
                "keterangan",
                "Keterangan",
                "required",
                [
                    'required' => "Keterangan tidak boleh kosong !!",
                ]
            );

            if ($this->form_validation->run()) {
                $data = array(
                    "id_detail_kerugian_ayam" => $id,
                    "tanggal" => $tanggal,
                    // "id_detail_pembelian_ayam" => $this->input->post('pembelian'),
                    "id_detail_group_transaksi" => $this->input->post("id_group"),
                    "keterangan" => $this->input->post("keterangan"),
                    "jumlah" => $this->input->post("jumlah"),
                    "id_kandang" => $this->input->post("kandang"),
                    "id_karyawan" => $this->id_karyawan,
                    "id_admin" => $this->id_admin,
                );

                $this->data['post'] = $data;

                $this->detailKerugianAyamModel->set($data);

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data kerugian ayam');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('insert_success', 'Berhasil menyimpan data kerugian ayam dengan id ' . $id);
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));
            }

            $this->form_validation->set_rules(
                "jumlah",
                'Jumlah',
                'required|greater_than_equal_to[0]|max_stok[view_stok_ayam.jumlah.id_kandang.' . $this->input->post("kandang") . ']',
                [
                    'greater_than_equal_to' => 'Peringatan, Jumlah Stok tidak boleh kosong',
                    'max_stok' => 'Peringatan, Jumlah yang dimasukan melebihi jumlah stok ayam yang ada',
                    'required' => 'Peringatan, jumlah ayam harus diisi !!!!',
                ]
            );

            $this->form_validation->set_rules(
                "keterangan",
                "Keterangan",
                "required",
                [
                    'required' => "Keterangan tidak boleh kosong !!",
                ]
            );

            if ($this->form_validation->run()) {

                $data = array(
                    "tanggal" => $tanggal,
                    // "id_detail_pembelian_ayam" => $this->input->post('pembelian'),
                    "id_detail_group_transaksi" => $this->input->post("id_group"),
                    "keterangan" => $this->input->post("keterangan"),
                    "jumlah" => $this->input->post("jumlah"),
                    "id_kandang" => $this->input->post("kandang"),
                    "id_karyawan" => $this->id_karyawan,
                    "id_admin" => $this->id_admin,
                );

                $this->detailKerugianAyamModel->put($this->input->post("id"), $data);

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data kerugian ayam');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('update_success', 'Berhasil mengubah data kerugian ayam');
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->detailKerugianAyamModel->del($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data kerugian ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Berhasil menghapus data kerugian dengan id ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->detailKerugianAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data["semua_kandang"] = $this->kandangModel->get();
        // $this->data['kandang'] = $this->functionModel->avaliable_data_kandang();
        $this->data['kandang'] = $this->functionModel->viewStokAyam(false, true, true);
        $this->data['pembelian'] = $this->functionModel->pdSelectPenjualanAyam();

        $this->data['data'] = $this->detailKerugianAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->blade->view("page.transaksi.kandang.kerugian", $this->data);
    }
}
