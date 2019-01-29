<?php

/* End of file Jumlahpersediaan.php */

defined('BASEPATH') or exit('No direct script access allowed');

class Stokgudang extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('ViewModel');

    }

    public function index()
    {
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->viewStokGudang->count($params);

        $pagination = $this->getConfigPagination(
            current_url(), $this->data['count'], $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->viewStokGudang->get(
            $this->data['limit'], $this->data['offset']);

        $this->blade->view("page.stok.gudang.stok", $this->data);
    }

    public function detail($id_persediaan = false)
    {
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;

        $this->data['id_supplier'] = "0";

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if ($this->input->get("supplier") !== null) {
            if ($this->input->get('supplier') !== "0") {
                $params['supplier'] = $this->input->get("supplier");
                $this->data['id_supplier'] = $this->input->get("supplier");
            }
        }

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->viewTransaksiGudangModel->countViewTransaksiPersediaan($id_persediaan, $params);

        $pagination = $this->getConfigPagination(
            current_url(), 
            $this->data['count'], 
            $this->data['limit']
        );

        $this->data['pagination'] = $this->pagination($pagination);

        if ($id_persediaan) {
            $this->data['data'] = $this->viewTransaksiGudangModel->getViewTransaksiPersediaan(
                $this->data['limit'], 
                $this->data['offset'], 
                $id_persediaan, 
                $params
            );

            $this->data['supplier'] = $this->supplierModel->get();
            $this->data['jumlah_persediaan'] = $this->viewStokGudang->getSingle($id_persediaan);

            $this->blade->view("page.stok.gudang.detail_transaksi", $this->data);
        }

    }

}

/* End of file Jumlahpersediaan.php */
