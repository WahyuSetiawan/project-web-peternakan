<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Supplier extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('SupplierModel', 'DetailJenisSupplierModel', "TypeGudangModel"));
    }

    public function index() {
        if (null !== ($this->input->post("submit"))) {
            $this->db->trans_start();

            $data = [
                'nama' => $this->input->post("nama"),
                'alamat' => $this->input->post("alamat"),
                'notelepon' => $this->input->post("telepon"),
            ];

            $id = $this->SupplierModel->set($data);
            $this->DetailJenisSupplierModel->setArray($id, $this->input->post('jenis_supplier'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("put"))) {
            var_dump($this->input->post());

            $this->db->trans_start();

            $data = [
                'nama' => $this->input->post("nama"),
                'alamat' => $this->input->post("alamat"),
                'notelepon' => $this->input->post("telepon"),
            ];

            $this->SupplierModel->put($data, $this->input->post('id'));
            $this->DetailJenisSupplierModel->setArray($this->input->post('id'), $this->input->post('jenis_supplier'));

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("del"))) {
            $this->SupplierModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $per_page = 10;

        $pagination = $this->getConfigPagination(site_url('supplier/index'), $this->SupplierModel->countAll(), $per_page);
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['supplier'] = $this->SupplierModel->get($per_page, $this->data['page']);
        $this->data['jenis_supplier'] = $this->TypeGudangModel->get();

        $this->blade->view("page.supplier", $this->data);
    }

}
