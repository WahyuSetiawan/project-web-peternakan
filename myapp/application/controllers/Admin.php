<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('AdminModel'));
	}

	public function index() {
		if (null !== ($this->input->post("submit"))) {
			$this->AdminModel->register($this->input->post("username"), $this->input->post("password"));
			redirect(current_url());
		}

		if (null !== ($this->input->post("put"))) {
			$this->AdminModel->put($this->input->post("id"), $this->input->post("username"), $this->input->post("password"));

			redirect(current_url());
		}

		if (null !== ($this->input->post("del"))) {
			$this->AdminModel->remove($this->input->post('id'));

			redirect(current_url());
		}

		$per_page = 3;

		$pagination = $this->getConfigPagination(site_url('admin/index'), $this->AdminModel->countAll(), $per_page);
		$this->data['pagination'] = $this->pagination($pagination);

		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['per_page'] = $per_page;
		$this->data['admin'] = $this->AdminModel->get($per_page, $this->data['page']);

		$this->blade->view("page.admin", $this->data);
	}

}
