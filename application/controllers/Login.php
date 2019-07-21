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

                $admin = $this->adminModel->login($this->input->post('username'), $this->input->post('password'));
                if ($admin) {
                    $data = array(
                        'login' => true,
                        'id' => $admin->id,
                        'password' => $this->input->post('password'),
                        'type' => $this->input->post('jenis'),
                    );
                    $this->session->set_userdata($data);
                } else {
                    $this->session->set_flashdata('login_failed', 'Username dan password salah');
                }

                redirect('login');
            } else {

                $admin = $this->karyawanModel->login($this->input->post('username'), $this->input->post('password'));

                if ($admin) {
                    $data = array(
                        'login' => true,
                        'id' => $admin->id_karyawan,
                        'password' => $this->input->post('password'),
                        'type' => $this->input->post('jenis'),
                    );
                    $this->session->set_userdata($data);
                } else {
                    $this->session->set_flashdata('login_failed', 'Username dan password salah');
                }

                redirect('login');
            }

            redirect(current_url());
        }
        $this->blade->view("page.login", array());
    }

    public function out()
    {
        $this->session->unset_userdata(array('login', 'id'));
        redirect(base_url());
    }

    public function change()
    {
        if (!$this->session->userdata('login')) {
            redirect("login");
        }

        $this->load->model(array('AdminModel', 'KaryawanModel'));

        if ($this->session->userdata('type') == "karyawan") {
            $this->data['head']['username'] = $this->KaryawanModel->get(1, 0, $this->session->userdata('id'));
        } else {
            $this->data['head']['username'] = $this->AdminModel->get(1, 0, $this->session->userdata('id'))[0];
        }

        $this->data['head']['type'] = $this->session->userdata('type');
        $this->data['head']['current_location'] = base_url($this->router->fetch_class());

        $password = $this->input->post('new_password');

        if ($this->data['head']['type'] == 'admin') {
            $this->adminModel->put(
                $this->data['head']['username']->id,
                $this->data['head']['username']->nama,
                $this->data['head']['username']->username,
                $password
            );
        } else {
            $insert = [];

            $insert = [
                'password' => $password,
            ];

            $this->karyawanModel->put($insert, $this->data['head']['username']->id_karyawan, $this->data['head']['username']->username);
        }

        redirect(base_url());
    }
}
