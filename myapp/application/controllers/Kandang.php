<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Kandang extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('KandangModel'));
	}

	public function index()
	{
		$data = array();

		if (null !== ($this->input->post("submit"))) {
			$data = [
				'nama' => $this->input->post("nama"),
				//'maksimal_jumlah' => $this->input->post("maksimal_jumlah"),
			];

			$this->KandangModel->set($data);

			redirect(current_url());
		}

		if (null !== ($this->input->post("put"))) {
			$data = [
				'nama' => $this->input->post("nama"),
				//'maksimal_jumlah' => $this->input->post("maksimal_jumlah"),
			];

			$this->KandangModel->put($data, $this->input->post('id'));

			redirect(current_url());
		}

		if (null !== ($this->input->post("del"))) {

			$this->KandangModel->remove($this->input->post('id'));

			redirect(current_url());
		}

		$per_page = 3;

		$pagination = $this->getConfigPagination(site_url('kandang/index'), $this->KandangModel->countAll(), $per_page);
		$this->data['pagination'] = $this->pagination($pagination);

		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['per_page'] = $per_page;
		$this->data['kandang'] = $this->KandangModel->get($this->data['per_page'], $this->data['page']);

		$this->blade->view("page.kandang", $this->data);
	}

}
