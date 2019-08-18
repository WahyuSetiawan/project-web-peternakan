<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public $page = 0;
    public $per_page = 10;

    public $id_admin = null;
    public $id_karyawan = null;

    public $params = [];

    public $data = array(
        "pagination" => "",
        "id" => [],
        "data_get" => [],
        "flashdata" => []
    );

    public function index()
    {

        if ($this->input->post("submit")) {
            $this->form_validation->set_rules(
                "nama",
                "Nama",
                "required",
                [
                    "required" => "Pemberitahuan, nama tidak boleh kosong",
                ]
            );

            $this->form_validation->set_rules(
                "jumlah",
                "Jumlah Ayam",
                "required",
                [
                    "required" => "Pemberitahuan, jumlah ayam tidak boleh kosong",
                ]
            );

            $this->form_validation->set_rules(
                "alamat",
                "Alamat",
                "required",
                [
                    "required" => "Pemberitahuan, alamat tidak boleh kosong",
                ]
            );

            $this->form_validation->set_rules(
                "telepon",
                "Telepon",
                "required",
                [
                    "required" => "Pemberitahuan, telepon tidak boleh kosong",
                ]
            );

            if ($this->form_validation->run() == true) {
                $this->db->trans_start();

                $data = [
                    "nama" => $this->input->post("nama"),
                    "telepon" => $this->input->post("telepon"),
                    "jumlah_ayam" => $this->input->post("jumlah"),
                    "alamat" => $this->input->post("alamat"),
                ];

                $this->pemesananModel->set($data);

                $this->db->trans_complete();

                if ($this->db->trans_status() === false) {
                    $this->session->set_flashdata('insert_failed', "Menyimpan data pemesanan tidak berhasil !!");
                    $this->session->mark_as_flash('insert_failed');
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata('insert_success', "Telah sukses menyimpan data penyimpanan !!");
                    $this->session->mark_as_flash('insert_success');
                    $this->db->trans_commit();
                }

                redirect(current_url(), 'refresh');
            }
        }

        $params = [];

        $page = 0;
        $per_page = 3;

        $params["id_kandang"] = true;

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->viewDetailGroupTransaksi->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->functionModel->viewStokAyam(

        );

        $this->data['kandang'] = $this->kandangModel->get();
        $this->data['supplier'] = $this->supplierModel->get();

        $this->blade->view("page.pemesanan.pemesanan", $this->data);
    }

    public function pagination($config)
    {
        return $this->pagination->create_links();
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

}

/* End of file Pemesanan.php */
