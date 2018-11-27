<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Stokayam extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model(array('ViewJumlahAyamModel', 'DetailPembelian', 'SupplierModel', 'DetailPembelian', 'viewHistoryTransaksi', 'KerugianModel', "DetailJenisSupplierModel"));
	}

	public function index() {
		$this->data['jumlah_ayam'] = $this->ViewJumlahAyamModel->get();
		$this->data['supplier'] = $this->SupplierModel->get();

		$this->blade->view("page.stokayam", $this->data);
	}

	public function Transaksi($idkandang = false, $page = 0) {
		if ($this->input->post('submit') !== null) {
			$data_insert = array(
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'jumlah_ayam' => $this->input->post('jumlah'),
			);

			$this->DetailPembelian->set($data_insert);

			redirect(current_url());
		}

		if ($this->input->post('submit-kerugian') !== null) {
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'id_pemasukan_ayam' => $this->input->post('id_pemasukan_ayam'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_ayam' => $this->input->post('jumlah')
			);

			$this->KerugianModel->set($data);

			redirect(current_url());
		}

		if ($this->input->post('put-beli') !== null) {
			$data_insert = array(
				'id_kandang' => $idkandang,
				'tanggal' => $this->input->post('tanggal'),
				'jumlah_ayam' => $this->input->post('jumlah'),
			);

			$this->DetailPembelian->put($data_insert, $this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('put-rugi') !== null) {
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'id_pemasukan_ayam' => $this->input->post('id_pemasukan_ayam'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_ayam' => $this->input->post('jumlah')
			);

			$this->KerugianModel->put($data, $this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('del-pengeluaran') !== null) {
			$this->KerugianModel->del($this->input->post('id'));

			redirect(current_url());
		}

		if ($this->input->post('del-pemasukan') !== null) {
			$this->DetailPembelian->del($this->input->post('id'));

			redirect(current_url());
		}
		
		$per_page = 1;

		$pagination = $this->getConfigPagination(site_url(current_url()), $this->viewHistoryTransaksi->countAll($idkandang), $per_page);
		$this->data['pagination'] = $this->pagination($pagination);

		$this->data['jumlah_ayam'] = $this->viewHistoryTransaksi->get($idkandang);
		$this->data['supplier'] = $this->SupplierModel->get();
		$this->data['kandang'] = $this->ViewJumlahAyamModel->once($idkandang);
		$this->data['pemasukan_ayam'] = $this->DetailPembelian->get();

		$this->blade->view('page.ayam_transaksi', $this->data);
	}

}
