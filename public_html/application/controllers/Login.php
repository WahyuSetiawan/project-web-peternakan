<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect('');
        }

        if (null !== $this->input->post("login")) {
            if ($this->input->post('jenis') == "admin") {
                $admin = $this->AdminModel->login($this->input->post('username'), $this->input->post('password'));
                if ($admin) {
                    $data = array(
                        'login' => true,
                        'id' => $admin->id,
                        'type' => $this->input->post('jenis'),
                    );
                    $this->session->set_userdata($data);
                }
            } else {
                $admin = $this->KaryawanModel->login($this->input->post('username'), $this->input->post('password'));

                if ($admin) {
                    $data = array(
                        'login' => true,
                        'id' => $admin->id,
                        'type' => $this->input->post('jenis'),
                    );
                    $this->session->set_userdata($data);
                }
            }

            //redirect(current_url());
        }
        $this->blade->view("page.login", array());
    }

    public function out()
    {
        $this->session->unset_userdata(array('login', 'id'));
        redirect(base_url());
    }

}
