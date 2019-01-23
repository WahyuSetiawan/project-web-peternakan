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

        $this->load->model(
            array(
                'DetailPembelianAyamModel',
                'DetailPenjualanAyamModel',
                'DetailJenisSupplierModel',
                'detailKerugianAyamModel',
            )
        );
    }

    public function index()
    {
        $data = array();
        $params = array();

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $id = $this->kandangModel->newId();

            $data = [
                'id_kandang' => $id,
                'nama' => $this->input->post("nama"),
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

            // redirect(current_url());

        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $data = [
                'nama' => $this->input->post("nama"),
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
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->kandangModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->data['karyawan'] = $this->KaryawanModel->get();

        $this->blade->view("page.data.kandang", $this->data);
    }

    public function pembelian()
    {
        $id = ($this->input->post('id') !== null) ? $this->input->post('id') : $this->DetailPembelianAyamModel->newId();
        $params = array();

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
            $this->db->trans_start();

            $data = array(
                "id_detail_pembelian_ayam" => $id,
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "id_karyawan" => $this->id_karyawan,
                "id_admin" => $this->id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah_ayam" => $this->input->post("jumlah"),
            );

            $this->data['post'] = $data;

            $this->DetailPembelianAyamModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
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

            $data = array(
                "id_kandang" => $this->input->post("kandang"),
                "id_supplier" => $this->input->post("supplier"),
                "update_by_karyawan" => $this->id_karyawan,
                "update_by_admin" => $this->id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah_ayam" => $this->input->post("jumlah"),
            );

            $this->DetailPembelianAyamModel->put($this->input->post("id"), $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
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

            $this->DetailPembelianAyamModel->remove($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() != false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data transaksi pembelian bibit ayan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Behasil menghapus data transaksi pembelian bibit ayam');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->DetailPembelianAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['supplier'] = $this->supplierModel->get(false, false, false, ['jual_ayam' => "Y"]);
        $this->data['kandang'] = $this->kandangModel->get();

        $this->data['data'] = $this->DetailPembelianAyamModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->blade->view("page.transaksi.kandang.pembelian", $this->data);
    }

    public function penjualan()
    {
        $params = array();
        $id = ($this->input->post('id') !== null) ? $this->input->post("id") : $this->DetailPenjualanAyamModel->newId();

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
            $this->db->trans_start();

            $data = array(
                "id_detail_penjualan_ayam" => $id,
                "tanggal" => $this->input->post("tanggal"),
                "keterangan" => $this->input->post("keterangan"),
                "jumlah_ayam" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "id_karyawan" => $this->id_karyawan,
                "id_admin" => $this->id_admin,
            );

            $this->data['post'] = $data;

            $this->DetailPenjualanAyamModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data penjualan ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', 'Berhasil menyimpan data transaksi penjualan ayam dengan id ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $data = array(
                "tanggal" => $this->input->post("tanggal"),
                "keterangan" => $this->input->post("keterangan"),
                "jumlah_ayam" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "update_by_karyawan" => $this->id_karyawan,
                "update_by_admin" => $this->id_admin,
            );

            $this->DetailPenjualanAyamModel->put($this->input->post("id"), $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data transaksi penjualan ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', 'Berhasil mengubah data penjualan ayam');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->DetailPenjualanAyamModel->remove($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data penjualan ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Berhasil menghapus data penjualan dengan id ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->DetailPenjualanAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->kandangModel->get();

        $this->data['data'] = $this->DetailPenjualanAyamModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->blade->view("page.transaksi.kandang.penjualan", $this->data);
    }

    public function kerugian()
    {

        $params = array();
        $id = ($this->input->post('id') !== null) ? (($this->input->post("id") != "") ? $this->input->post("id") : $this->detailKerugianAyamModel->newId()) : $this->detailKerugianAyamModel->newId();

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
            $this->db->trans_start();

            if ($this->input->post('tanggal') != "") {
                $time = strtotime($this->input->post('tanggal'));
                $time = date("Y-m-d", $time);
            }else{
                $time =date("Y-m-d");
            }

            $data = array(
                "id_detail_kerugian_ayam" => $id,
                "tanggal" => $time,
                "keterangan" => $this->input->post("keterangan"),
                "jumlah" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "id_karyawan" => $this->id_karyawan,
                "id_admin" => $this->id_admin,
            );

            $this->data['post'] = $data;

            $this->detailKerugianAyamModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data kerugian ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', 'Berhasil menyimpan data kerugian ayam dengan id ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $time = strtotime($this->input->post('tanggal'));

            $data = array(
                "tanggal" => date("Y-m-d", $time),
                "keterangan" => $this->input->post("keterangan"),
                "jumlah" => $this->input->post("jumlah"),
                "id_kandang" => $this->input->post("kandang"),
                "update_by_karyawan" => $this->id_karyawan,
                "update_by_admin" => $this->id_admin,
            );

            $this->detailKerugianAyamModel->put($this->input->post("id"), $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data kerugian ayam');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', 'Berhasil mengubah data kerugian ayam');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->detailKerugianAyamModel->del($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
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
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['kandang'] = $this->kandangModel->get();

        $this->data['data'] = $this->detailKerugianAyamModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->blade->view("page.transaksi.kandang.kerugian", $this->data);

    }
}
