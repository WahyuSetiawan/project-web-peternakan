<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('AdminModel'));
    }

    public function index()
    {
        $this->form_validation->set_rules(
            "nama",
            'Nama',
            'required|is_unique[tb_admin.nama]',
            [
                'is_unique' => 'Peringatan, Nama admin sudah dipakai oleh nama admin yang lain !!!!.',
                'required' => 'Peringatan, Nama admin tidak boleh kosong !!!!'
            ]
        );

        if (null !== ($this->input->post("submit"))) {
            if ($this->form_validation->run()) {

                $this->AdminModel->register(
                    $this->input->post("nama"),
                    $this->input->post("username"),
                    $this->input->post("password")
                );
                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("put"))) {
            if ($this->form_validation->run()) {
                $this->AdminModel->put(
                    $this->input->post("id"),
                    $this->input->post("nama"),
                    $this->input->post("username"),
                    $this->input->post("password")
                );

                redirect(current_url());
            }
        }

        if (null !== ($this->input->post("del"))) {
            $this->AdminModel->remove(
                $this->input->post('id')
            );

            redirect(current_url());
        }

        $per_page = 3;

        $pagination = $this->getConfigPagination(
            site_url('admin/index'),
            $this->AdminModel->countAll(),
            $per_page
        );

        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['per_page'] = $per_page;
        $this->data['admin'] = $this->AdminModel->get($per_page, $this->data['page']);

        $this->blade->view("page.admin.admin", $this->data);
    }
}
