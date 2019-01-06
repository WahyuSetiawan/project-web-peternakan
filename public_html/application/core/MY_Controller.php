<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller
{

    public $page = 0;
    public $per_page = 5;

    public $data = array(
        "pagination" => "",
    );

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect("login");
        }

        $this->load->model(array('AdminModel', 'KaryawanModel'));

        if ($this->session->userdata('type') == "karyawan") {
            $this->data['head']['username'] = $this->KaryawanModel->get(1, 0, $this->session->userdata('id'))[0];
        } else {
            $this->data['head']['username'] = $this->AdminModel->get(1, 0, $this->session->userdata('id'))[0];
        }

        $this->data['head']['type'] = $this->session->userdata('type');
        $this->data['head']['current_location'] = base_url($this->router->fetch_class());

        if ($this->input->get("per_page") !== null) {
            $this->page = $this->input->get("per_page");
        }

        $this->data['offset'] = ($this->page > 0) ? (($this->page - 1) * $this->per_page) : $this->page;
        $this->data['limit'] = $this->per_page;
        $this->data['count'] = 0;

        $this->showAlert();
    }

    public function showAlert()
    {
        foreach ($this->session->flashdata() as $key => $value) {
            $this->data[$key] = $this->session->flashdata($key);
        }
    }

    public function getConfigPagination($site, $count, $per_page)
    {
//konfigurasi pagination
        $config['base_url'] = $site; //site url

        $config['total_rows'] = $count; //total row
        $config['per_page'] = $per_page; //show record per halaman
        //        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config["page_query_string"] = true;
        $config["use_page_numbers"] = true;
        $config['reuse_query_string'] = true;
        $config['enable_query_strings'] = true;

// Membuat Style pagination untuk BootStrap v4
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);

        return $config;
    }

    public function pagination($config)
    {
        return $this->pagination->create_links();
    }

}
