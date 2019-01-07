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

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $id = $this->PersediaanModel->newId();

            $data = [
                'id_persediaan' => $id,
                'nama' => $this->input->post("nama"),
                'cara_pemakaian' => $this->input->post('cara_pemakaian'),
            ];

            $this->PersediaanModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('insert_failed', "Mengubah data pada persediaan dengan id " . $id . " tidak berhasil !!");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', "Menyimpan data pada persediaan dengan id " . $id . " berhasil !!");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $data = [
                'nama' => $this->input->post("nama"),
                'cara_pemakaian' => $this->input->post('cara_pemakaian'),
            ];

            $this->PersediaanModel->put($data, $this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('update_failed', "Mengubah data pada persediaan dengan id " . $this->input->post('id') . " tidak berhasil !!");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', "Menyimpan data pada persediaan dengan id " . $this->input->post('id') . " berhasil !!");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->PersediaanModel->del($this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Menghapud data persediaan dengan id' . $this->input->post('id') . " tidak berhasil");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Menghapus data persediaan dengan id ' . $this->input->post('id') . " berhasil");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->PersediaanModel->countAll();

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);
        $this->data['type_gudang'] = $this->PersediaanModel->get($this->data['limit'], $this->data['offset']);

        $this->blade->view("page.data.persediaan", $this->data);
    }

    public function pembelian()
    {
        $id_admin = null;
        $id_karyawan = null;

        $params = [];

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
            $this->db->trans_start();

            $id = $this->DetailPembelianPersediaanModel->newId();

            $data = [
                'id_detail_pembelian_gudang' => $id,
                "id_supplier" => $this->input->post("supplier"),
                "id_persediaan" => $this->input->post("persediaan"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
            ];

            $this->DetailPembelianPersediaanModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('insert_failed', "Tidak berhasil menyimpan transaksi pembelian");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', 'Berhasil simpan data pada pembelian transaksi dengan id = ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $id = $this->input->post('id');

            $data = [
                "id_supplier" => $this->input->post("supplier"),
                "id_persediaan" => $this->input->post("persediaan"),
                "update_by_karyawan" => $id_karyawan,
                "update_by_admin" => $id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
            ];

            $this->DetailPembelianPersediaanModel->put($id, $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data transaksi pembelian dengan id transaksi ' . $id);
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', 'Data pembelian dengan id = ' . $id . ' berhasil dirubah');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $id = $this->input->post('id');

            $this->DetailPembelianPersediaanModel->del($id);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data dengan id ' . $id);
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Berhasil menghapus data id = ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->DetailPembelianPersediaanModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->DetailPembelianPersediaanModel->get(
            $this->data['limit'], $this->data['offset'], false, $params
        );

        $this->data['supplier'] = $this->SupplierModel->get();
        $this->data['persediaan'] = $this->PersediaanModel->get();

        $this->blade->view("page.transaksi.persediaan.pembelian", $this->data);
    }

    public function penjualan()
    {
        $id = ($this->input->post("id") !== null) ? $this->input->post('id') : $this->DetailPengeluaranGudangModel->newId();
        $id_admin = null;
        $id_karyawan = null;

        $params = [];

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
            $this->db->trans_start();

            $data = [
                'id_detail_pengeluaran_gudang' => $id,
                "id_persediaan" => $this->input->post("persediaan"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
            ];

            $this->DetailPengeluaranGudangModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('insert_failed', 'Data pengluaran data tidak behasil tersimpan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', 'Transaksi pengeluaran data berhasil tersimpan dengan id ; ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $data = [
                "id_persediaan" => $this->input->post("persediaan"),
                "id_karyawan" => $this->input->post("karyawan"),
                "tanggal" => $this->input->post("tanggal"),
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
                "update_by_admin" => $id_admin,
                "update_by_karyawan" => $id_karyawan,
            ];

            $this->DetailPengeluaranGudangModel->put($id, $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', 'Data transaksi id : $id berhasil terubah');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== $this->input->post("del")) {
            $this->db->trans_start();

            $this->DetailPengeluaranGudangModel->del($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data transaksi pengeluaran persediaan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Data id = ' . $id . ' berhasil terhapus');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

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
