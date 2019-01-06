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
        $page = 0;
        $per_page = 3;

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if (null !== ($this->input->post("submit"))) {
            $data = [
                'nama' => $this->input->post("nama"),
                'no_hp' => $this->input->post("telepon"),
                "username" => $this->input->post("username"),
                "password" => ($this->input->post("password")),
                "hint" => $this->input->post("password"),
            ];

            $this->KaryawanModel->set($data);

            redirect(current_url());
        }

        if (null !== ($this->input->post("put"))) {
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

            redirect(current_url());
        }

        if (null !== ($this->input->post("del"))) {

            $this->KaryawanModel->remove($this->input->post('id'));

            redirect(current_url());
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->KaryawanModel->countAll();

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['karyawan'] = $this->KaryawanModel->get(
            $this->data['limit'], $this->data['offset']);
        $this->data['kandang'] = $this->KandangModel->get();

        $this->blade->view("page.data.karyawan", $this->data);
    }

}
