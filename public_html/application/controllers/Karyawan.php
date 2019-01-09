<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();

        $params = array();

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $data = [
                'nama' => $this->input->post("nama"),
                'no_hp' => $this->input->post("telepon"),
                "username" => $this->input->post("username"),
                "password" => ($this->input->post("password")),
                "hint" => $this->input->post("password"),
            ];

            $this->KaryawanModel->set($data);

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('insert_delete', 'Tidak berhasil menyimpan data karyawan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('insert_success', 'Berhasil menyimpan data karyawan ');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
            $this->db->trans_start();

            $data = [
                'nama' => $this->input->post("nama"),
                'no_hp' => $this->input->post("telepon"),
                "username" => $this->input->post("username"),
                "hint" => $this->input->post("password"),
            ];

            if ($this->input->post("password") != "") {
                $data["password"] = ($this->input->post("password"));
            }

            $this->KaryawanModel->put($data, $this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('update_failed', 'Tidak berhasil mengubah data karyawan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('update_success', 'Behasil mengubah data karyawan');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->KaryawanModel->remove($this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() !== false) {
                $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data karyawan');
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Berhasil menghapus data karyawan');
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->karyawanModel->countAll();

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['karyawan'] = $this->karyawanModel->get(
            $this->data['limit'], $this->data['offset']);
        $this->data['kandang'] = $this->kandangModel->get();

        $this->blade->view("page.data.karyawan", $this->data);
    }

}
