<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Supplier extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->model(array('DetailJenisSupplierModel'));
    }

    public function index()
    {
        $data = array();
        $params = array();

        if (null !== ($this->input->post("submit"))) {
            $this->form_validation->set_rules(
                "nama",
                'Nama',
                'required',
                [
                    'required' => 'Peringatan, Nama supplier tidak boleh kosong !!!!'
                ]
            );

            if ($this->form_validation->run()) {
                $this->db->trans_start();

                $data = [
                    'nama' => $this->input->post("nama"),
                    'alamat' => $this->input->post("alamat"),
                    'email' => $this->input->post('email'),
                    'kota' => $this->input->post('kota'),
                    'notelepon' => $this->input->post("telepon"),
                    'jual_ayam' => (null !== ($this->input->post('ayam'))) ? "Y" : "N"
                ];

                $id = $this->supplierModel->set($data);
                $this->detailJenisSupplierModel->setArray($id, $this->input->post('jenis_supplier'));

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('insert_failed', "Mengubah data pada supplier dengan id " . $id . " tidak berhasil !!");
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('insert_success', "Menyimpan data pada supplier dengan id " . $id . " berhasil !!");
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("put"))) {
            $this->form_validation->set_rules(
                "nama",
                'Nama',
                'required',
                [
                    'edit_unique' => 'Peringatan, Nama suplier sudah dipakai oleh nama supplier yang lain !!!!.',
                ]
            );

            if ($this->form_validation->run()) {
                $this->db->trans_start();

                $data = [
                    'nama' => $this->input->post("nama"),
                    'alamat' => $this->input->post("alamat"),
                    'email' => $this->input->post('email'),
                    'kota' => $this->input->post('kota'),
                    'notelepon' => $this->input->post("telepon"),
                    'jual_ayam' => (null !== ($this->input->post('ayam'))) ? "Y" : "N",
                ];

                $this->supplierModel->put($data, $this->input->post('id'));
                $this->detailJenisSupplierModel->setArray($this->input->post('id'), $this->input->post('jenis_supplier'));

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('update_failed', "Mengubah data pada supplier dengan id " . $this->input->post('id') . " tidak berhasil !!");
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('update_success', "Menyimpan data pada supplier dengan id " . $this->input->post('id') . " berhasil !!");
                    $this->db->trans_commit();
                }
                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("del"))) {
            $this->db->trans_start();

            $this->supplierModel->remove($this->input->post('id'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('delete_failed', 'Menghapud data supplier dengan id' . $this->input->post('id') . " tidak berhasil");
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata('delete_success', 'Menghapus data supplier dengan id ' . $this->input->post('id') . " berhasil");
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $this->data['count'] = $this->supplierModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['supplier'] = $this->supplierModel->get($this->data['limit'], $this->data['offset']);

        $this->data['jenis_supplier'] = $this->gudangModel->get();

        $this->blade->view("page.data.supplier", $this->data);
    }
}
