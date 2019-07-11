<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Pakan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('AdminModel'));
    }

    public function belum()
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

        // function submit data
        if (null !== ($this->input->post("submit"))) {
            $message = "";
            $tanggal = $current_date;

            if ($this->input->post("tanggal") !== "") {
                $tanggal = date("Y-m-d H:i:s", strtotime($this->input->post("tanggal")));
            }

            $this->db->trans_start();

            $data = [
                'id_detail_penggunaan_gudang' => $id,
                "id_gudang" => $this->input->post("id_gudang"),
                "id_karyawan" => $id_karyawan,
                "id_kandang" => $this->input->post("id_kandang"),
                "id_admin" => $id_admin,
                "time" => $this->input->post("waktu"),
                "tanggal" => $current_date_view,
                "jumlah" => $this->input->post("jumlah"),
                'keterangan' => $this->input->post("keterangan"),
            ];


            $status = $this->functionModel->avaliable_jadwal_pakan(
                $tanggal,
                $this->input->post("kandang"),
                $this->input->post("gudang")
            );

            if (count($status->result()) == 0) {
                $this->detailPenggunaanGudangModel->set($data);

                var_dump($data);
            } else {
                $this->db->trans_complete();

                $this->session->set_flashdata('insert_failed', 'Pakan Sudah diberikan');
                $this->db->trans_rollback();

                redirect(current_url());
            }

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

        $this->data['count'] = $this->detailPenggunaanGudangModel->countBelum($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );

        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->detailPenggunaanGudangModel->belum(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['current_date'] = $current_date;
        $this->data['current_date_view'] = $current_date_view;
        $this->data["current_time_view"] = $current_time_view;

        $this->blade->view('page/jadwal/belum', $this->data);
    }
}
