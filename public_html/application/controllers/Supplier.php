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
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;


        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

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

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->SupplierModel->countAll($params);

        $pagination = $this->getConfigPagination(
                current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['supplier'] = $this->SupplierModel->get($this->data['limit'], $this->data['offset']);
        
        $this->data['jenis_supplier'] = $this->TypeGudangModel->get();

        $this->blade->view("page.data.supplier", $this->data);
    }

}
