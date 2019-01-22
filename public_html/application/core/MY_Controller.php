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

    public $id_admin = null;
    public $id_karyawan = null;

    public $params = [];

    public $data = array(
        "pagination" => "",
        "id" => [],
        "data_get" => [],
        "flashdata" => []
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

        if ($this->data['head']['type'] == "admin") {
            $this->id_admin = $this->data['head']['username']->id;
        } else {
            $this->id_karyawan = $this->data['head']['username']->id_karyawan;
        }

        $this->data['offset'] = ($this->page > 0) ? (($this->page - 1) * $this->per_page) : $this->page;
        $this->data['limit'] = $this->per_page;
        $this->data['count'] = 0;

        $this->showAlert();
        $this->filter();
    }

    public function showAlert()
    {
        foreach ($this->session->flashdata() as $key => $value) {
            $this->data['flashdata'][$key] = $this->session->flashdata($key);
        }
    }

    		/*<?php foreach ($id as $key => $value) {?>
			// 		<input type="hidden" name={{$key}} value={{$value}} />
			 		<?php }?>*/

    public function filter()
    {
        $this->data['id']['kandang'] = "0";

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $id = $this->input->get('kandang');

                $this->params['kandang'] = $id;
                $this->data['id']['kandang'] = $id;

                $this->data['data_get']['kandang'] = $this->kandangModel->get(false, false, $id);
            }
        }

        $this->data['id']['supplier'] = "0";

        if ($this->input->get("supplier") !== null) {
            if ($this->input->get('supplier') !== "0") {
                $id = $this->input->get("supplier");

                $this->params['supplier'] = $id;
                $this->data['id']['supplier'] = $id;

                $this->data['data_get']['supplier'] = $this->supplierModel->get(false, false, $id);
            }
        }

        $this->data['id']['persediaan'] = "0";

        if ($this->input->get('persediaan') !== null) {
            if ($this->input->get('persediaan') !== "0") {
                $id = $this->input->get("persediaan");

                $this->params['persediaan'] = $id;
                $this->data['id']['persediaan'] = $id;

                $this->data['data_get']['persediaan'] = $this->persediaanModel->get(false, false, $id);
            }
        }

        $this->data['id']['tahun'] = "0";

        if ($this->input->get('tahun') !== null) {
            if ($this->input->get("tahun") !== "0") {
                $tahun = $this->input->get("tahun");
                $this->params['tahun'] = $tahun;
                $this->data['id']['tahun'] = $tahun;
            }
        }

        $this->data['id']['bulan'] = "0";

        if ($this->input->get('bulan') !== null) {
            if ($this->input->get("bulan") !== "0") {
                $bulan = $this->input->get("bulan");
                $this->params['bulan'] = $bulan;
                $this->data['id']['bulan'] = $bulan;
            }
        }

        $this->data['id']['aksi'] = null;

        if ($this->input->get('aksi') !== null) {
            if ($this->input->get("aksi") == "in" || $this->input->get("aksi") == "out") {
                $this->params['aksi'] = $this->input->get("aksi");
                $this->data['id']['aksi'] = $this->input->get("aksi");
            }
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
