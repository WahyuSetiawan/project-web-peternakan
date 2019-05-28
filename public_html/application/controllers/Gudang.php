<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(
            array(
                // "detailPembelianGudangModel",
                // 'DetailJenisSupplierModel',
                // "detailPenggunaanGudangModel",
                // "ViewModel",
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

            $id = $this->gudangModel->newId();

            $data = [
                'id_gudang' => $id,
                'nama' => $this->input->post("nama"),
                'cara_pemakaian' => $this->input->post('cara_pemakaian'),
            ];

            $this->gudangModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('insert_failed', "Mengubah data pada gudang dengan id " . $id . " tidak berhasil !!");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', "Menyimpan data pada gudang dengan id " . $id . " berhasil !!");
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

            $this->gudangModel->put($data, $this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('update_failed', "Mengubah data pada gudang dengan id " . $this->input->post('id') . " tidak berhasil !!");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', "Menyimpan data pada gudang dengan id " . $this->input->post('id') . " berhasil !!");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->gudangModel->del($this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Menghapud data gudang dengan id' . $this->input->post('id') . " tidak berhasil");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Menghapus data gudang dengan id ' . $this->input->post('id') . " berhasil");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->gudangModel->countAll();

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);
        $this->data['type_gudang'] = $this->gudangModel->get($this->data['limit'], $this->data['offset']);

        $this->blade->view("page.data.gudang", $this->data);
    }

    public function pembelian()
    {
        $id = ($this->input->post("id") !== null && $this->input->post("id") !== "") ? $this->input->post('id') : $this->detailPembelianGudangModel->newId();

        $id_admin = null;
        $id_karyawan = null;

        $params = [];

        $this->data['id_gudang'] = "0";
        $this->data['id_supplier'] = "0";

        if ($this->data['head']['type'] == "admin") {
            $id_admin = $this->data['head']['username']->id;
        } else {
            $id_karyawan = $this->data['head']['username']->id_karyawan;
        }

        if ($this->input->get("gudang") !== null) {
            if ($this->input->get('gudang') !== "0") {
                $params['gudang'] = $this->input->get("gudang");
                $this->data['id_gudang'] = $this->input->get("gudang");
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

            $id = $this->detailPembelianGudangModel->newId();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }



            $data = [
                'id_detail_pembelian_gudang' => $id,
                "id_supplier" => $this->input->post("supplier"),
                "id_gudang" => $this->input->post("gudang"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $tanggal,
                "jumlah" => $this->input->post("jumlah"),
            ];

            $this->detailPembelianGudangModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
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

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }



            $data = [
                "id_supplier" => $this->input->post("supplier"),
                "id_gudang" => $this->input->post("gudang"),
                "update_by_karyawan" => $id_karyawan,
                "update_by_admin" => $id_admin,
                "tanggal" => $tanggal,
                "jumlah" => $this->input->post("jumlah"),
            ];

            $this->detailPembelianGudangModel->put($id, $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
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

            $this->detailPembelianGudangModel->del($id);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data dengan id ' . $id);
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Berhasil menghapus data id = ' . $id);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->detailPembelianGudangModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->detailPembelianGudangModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['gudang'] = $this->gudangModel->get();

        $this->blade->view("page.transaksi.gudang.pembelian", $this->data);
    }

    public function penjualan()
    {
        $id = ($this->input->post('id') !== null) ? (($this->input->post("id") != "") ? $this->input->post("id") : $this->detailPenggunaanGudangModel->newId()) : $this->detailPenggunaanGudangModel->newId();
        $id_admin = null;
        $id_karyawan = null;

        $params = [];

        $this->data['id_gudang'] = "0";

        if ($this->data['head']['type'] == "admin") {
            $id_admin = $this->data['head']['username']->id;
        } else {
            $id_karyawan = $this->data['head']['username']->id_karyawan;
        }

        if ($this->input->get("gudang") !== null) {
            if ($this->input->get('gudang') !== "0") {
                $params['gudang'] = $this->input->get("gudang");
                $this->data['id_gudang'] = $this->input->get("gudang");
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }

            $data = [
                'id_detail_penggunaan_gudang' => $id,
                "id_gudang" => $this->input->post("gudang"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $tanggal,
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
            ];

            $this->detailPenggunaanGudangModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
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

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }

            $data = [
                "id_gudang" => $this->input->post("gudang"),
                "id_karyawan" => $this->input->post("karyawan"),
                "tanggal" => $tanggal,
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
                "update_by_admin" => $id_admin,
                "update_by_karyawan" => $id_karyawan,
            ];

            $this->detailPenggunaanGudangModel->put($id, $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', "Data transaksi id : $id berhasil terubah");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== $this->input->post("del")) {
            $this->db->trans_start();

            $this->detailPenggunaanGudangModel->del($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data transaksi pengeluaran gudang');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Data id = ' . $id . ' berhasil terhapus');
                $this->db->trans_commit();
            }

            redirect(current_url());
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

        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['gudang'] = $this->gudangModel->get();
        $this->data['kandang'] = $this->kandangModel->get();

        $this->blade->view("page.transaksi.gudang.penjualan", $this->data);
    }

    public function jumlah()
    {
        $per_page = 3;

        $pagination = $this->getConfigPagination(site_url('typegudang/jumlah'), $this->ViewModel->viewJumlahgudangCountAll(), $per_page);
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['data'] = $this->ViewModel->viewJumlahgudang($this->data['per_page'], $this->data['page']);

        $this->blade->view("page.kandang.jumlah_gudang", $this->data);
    }

    public function penggunaan()
    {
        $id = ($this->input->post('id') !== null) ? (($this->input->post("id") != "") ? 
            $this->input->post("id") : 
            $this->detailPenggunaanGudangModel->newId()) : 
            $this->detailPenggunaanGudangModel->newId();
        $id_admin = null;
        $id_karyawan = null;

        $params = [];

        $this->data['id_gudang'] = "0";

        if ($this->data['head']['type'] == "admin") {
            $id_admin = $this->data['head']['username']->id;
        } else {
            $id_karyawan = $this->data['head']['username']->id_karyawan;
        }

        if ($this->input->get("gudang") !== null) {
            if ($this->input->get('gudang') !== "0") {
                $params['gudang'] = $this->input->get("gudang");
                $this->data['id_gudang'] = $this->input->get("gudang");
            }
        }

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }

            $data = [
                'id_detail_penggunaan_gudang' => $id,
                "id_gudang" => $this->input->post("gudang"),
                "id_karyawan" => $id_karyawan,
                "id_admin" => $id_admin,
                "tanggal" => $tanggal,
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
            ];

            $this->detailPenggunaanGudangModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
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

            $tanggal = date("Y-m-d");

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d", strtotime($this->input->post("tanggal")));;
            }

            $data = [
                "id_gudang" => $this->input->post("gudang"),
                "id_karyawan" => $this->input->post("karyawan"),
                "tanggal" => $tanggal,
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
                "update_by_admin" => $id_admin,
                "update_by_karyawan" => $id_karyawan,
            ];

            $this->detailPenggunaanGudangModel->put($id, $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', "Data transaksi id : $id berhasil terubah");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== $this->input->post("del")) {
            $this->db->trans_start();

            $this->detailPenggunaanGudangModel->del($this->input->post("id"));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data transaksi pengeluaran gudang');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Data id = ' . $id . ' berhasil terhapus');
                $this->db->trans_commit();
            }

            redirect(current_url());
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

        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['gudang'] = $this->gudangModel->get();
        $this->data['kandang'] = $this->kandangModel->get();

        $this->blade->view("page.transaksi.gudang.penggunaan", $this->data);
    }
}
