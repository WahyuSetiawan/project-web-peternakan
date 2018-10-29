<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Typegudang extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('TypeGudangModel'));
	}

	public function index()
	{
		$data = array();

		if (null !== ($this->input->post("submit"))) {
			$data = [
				'keterangan' => $this->input->post("keterangan"),
			];

			$this->TypeGudangModel->set($data);

			redirect(current_url());
		}

		if (null !== ($this->input->post("put"))) {
			$data = [
				'keterangan' => $this->input->post("keterangan"),
			];

			$this->TypeGudangModel->put($data, $this->input->post('id'));

			redirect(current_url());
		}

		if (null !== ($this->input->post("del"))) {

			$this->TypeGudangModel->del($this->input->post('id'));

			redirect(current_url());
		}

		$per_page = 3;

		$pagination = $this->getConfigPagination(site_url('typegudang/index'), $this->TypeGudangModel->countAll(), $per_page);
		$this->data['pagination'] = $this->pagination($pagination);

		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['per_page'] = $per_page;
		$this->data['type_gudang'] = $this->TypeGudangModel->get($this->data['per_page'], $this->data['page']);

		$this->blade->view("page.type_gudang", $this->data);
	}
}
