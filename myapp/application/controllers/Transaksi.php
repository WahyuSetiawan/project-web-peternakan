<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model(array('ViewJumlahAyamModel', 'suppliermodel', 'DetailPembelian', 'viewHistoryTransaksi', 'DetailPenjualan', 'KerugianModel'));
	}

	public function index($idkandang = false) {
		if ($this->input->post('submit') !== null) {
			$data_insert = array(
				'id_vendor' => $this->input->post('supplier'),
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'umur_awal' => $this->input->post('umur'),
				'jumlah_ayam' => $this->input->post('jumlah'),
			);

			$this->DetailPembelian->set($data_insert);

			redirect(current_url());
		}

		if ($this->input->post("submit-penjualan") !== null) {
			$data_insert = array(
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'jumlah_ayam' => $this->input->post('jumlah'),
			);

			$this->DetailPenjualan->set($data_insert);

			redirect(current_url());
		}

		if ($this->input->post('submit-kerugian') !== null) {
			$data = array(
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_ayam' => $this->input->post('jumlah')
			);

			$this->KerugianModel->set($data);

			redirect(current_url());
		}

		if ($this->input->post('put-beli') !== null) {
			$data_insert = array(
				'id_vendor' => $this->input->post('supplier'),
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'umur_awal' => $this->input->post('umur'),
				'jumlah_ayam' => $this->input->post('jumlah'),
			);

			$this->DetailPembelian->put($data_insert, $this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('put-jual') !== null) {
			$data_insert = array(
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'jumlah_ayam' => $this->input->post('jumlah'),
			);

			$this->DetailPenjualan->put($data_insert, $this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('put-rugi') !== null) {
			$data = array(
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_ayam' => $this->input->post('jumlah')
			);

			$this->KerugianModel->put($data, $this->input->post('id'));

			redirect(current_url());
		}

		/* if ($this->input->post('del') !== null) {
		  $this->DetailPembelian->del($this->input->post('id'));

		  redirect(current_url());
		  } */

		if ($this->input->post('del-rugi') !== null) {
			$this->KerugianModel->del($this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('del-beli') !== null) {
			$this->DetailPembelian->del($this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('del-jual') !== null) {
			$this->DetailPenjualan->del($this->input->post('id'));

			redirect(current_url());
		}

		$per_page = 1;

		$pagination = $this->getConfigPagination(site_url('karyawan/index'), $this->viewHistoryTransaksi->countAll($idkandang), $per_page);
		$this->data['pagination'] = $this->pagination($pagination);

		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['per_page'] = $per_page;

		$this->data['jumlah_ayam'] = $this->viewHistoryTransaksi->get($idkandang, $per_page, $this->data['page']);
		$this->data['supplier'] = $this->suppliermodel->get();
		$this->data['kandang'] = $this->ViewJumlahAyamModel->once($idkandang);

		$this->blade->view('page.pembelian', $this->data);
	}

}
