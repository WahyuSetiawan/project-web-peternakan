<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends MY_Controller
{

    public function index()
    { }

    public function ayam()
    {
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;

        $this->data['id_supplier'] = "0";
        $this->data['id_kandang'] = "0";

        if ($this->input->get("per_page") !== null) {
            $page = $this->input->get("per_page");
        }

        if ($this->input->get("supplier") !== null) {
            if ($this->input->get('supplier') !== "0") {
                $params['supplier'] = $this->input->get("supplier");
                $this->data['id_supplier'] = $this->input->get("supplier");
            }
        }


        // filter pembelian ayam
        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        $this->data['kandang'] = $this->kandangModel->get();
        $this->data['supplier'] = $this->supplierModel->get();

        $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
        $this->data['limit'] = $per_page;
        $this->data['count'] = $this->ViewTransaksiPembelianAyamModel->count();

        $this->data['data'] = $this->ViewTransaksiPembelianAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            $params
        );

        $this->blade->view("page.riwayat.ayam", $this->data);
    }

    public function penjualan($id_pembelian = null)
    {
        $data = array();

        $params = array();
        $page = 0;
        $per_page = 3;

        $this->data['id_kandang'] = "0";

        if ($this->input->get("kandang") !== null) {
            if ($this->input->get('kandang') !== "0") {
                $params['kandang'] = $this->input->get("kandang");
                $this->data['id_kandang'] = $this->input->get("kandang");
            }
        }

        $params['id_detail_pembelian_ayam'] = $id_pembelian;
        $this->data['id_pembelian'] = $id_pembelian;

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
        $this->data['count'] = $this->detailPenjualanAyamModel->countAll($params);

        $pagination = $this->getConfigPagination(
            current_url(),
            $this->data['count'],
            $this->data['limit']
        );
        $this->data['pagination'] = $this->pagination($pagination);

        $this->data['data'] = $this->detailPenjualanAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
            $params
        );

        $this->data['kandang'] = $this->kandangModel->get();
        $this->data['id_pembelian'] = $id_pembelian;

        $this->blade->view("page.riwayat.trans_ayam", $this->data);
    }
}

/* End of file Riwayat.php */
