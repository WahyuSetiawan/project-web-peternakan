<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends MY_Controller
{

    public function index()
    {}

    public function group($type = false, $id = false)
    {
        if ($type == false) {
            $data = array();

            $params = array();
            $page = 0;
            $per_page = 10;

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

            $this->data['offset'] = ($page > 0) ? (($page - 1) * $per_page) : $page;
            $this->data['limit'] = $per_page;
            $this->data['count'] = $this->viewDetailGroupTransaksi->countAll($params);

            $pagination = $this->getConfigPagination(
                current_url(),
                $this->data['count'],
                $this->data['limit']
            );
            $this->data['pagination'] = $this->pagination($pagination);

            $this->data['data'] = $this->viewDetailGroupTransaksi->get(
                $this->data['limit'],
                $this->data['offset'],
                $params
            );

            $this->data['kandang'] = $this->kandangModel->get();
            $this->data['supplier'] = $this->supplierModel->get();

            $this->blade->view("page.riwayat.group", $this->data);
        }

        if ($type == "pembelian") {
            $data = array();

            $params = array();
            $page = 0;
            $per_page = 3;

            $this->data['id_group'] = $id;
            $this->data['id_supplier'] = "0";
            $this->data['id_kandang'] = "0";
            $this->data['id_detail_group_transaksi'] = $id;

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
            $this->data['count'] = $this->detailPembelianAyamModel->countAll($params);

            $this->data['data'] = $this->detailPembelianAyamModel->get(
                $this->data['limit'],
                $this->data['offset'],
                false,
                $params
            );

            $this->blade->view("page.riwayat.pembelian", $this->data);
        }

        if ($type == "penjualan") {
            $data = array();

            $params = array();
            $page = 0;
            $per_page = 3;

            $this->data['id_group'] = $id;
            $this->data['id_supplier'] = "0";
            $this->data['id_kandang'] = "0";
            $this->data['id_detail_group_transaksi'] = $id;

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
            $this->data['count'] = $this->detailPenjualanAyamModel->countAll($params);

            $this->data['data'] = $this->detailPenjualanAyamModel->get(
                $this->data['limit'],
                $this->data['offset'],
                false,
                $params
            );

            $this->blade->view("page.riwayat.penjualan", $this->data);
        }

        if ($type == "kerugian") {
            $data = array();

            $params = array();
            $page = 0;
            $per_page = 3;

            $this->data['id_group'] = $id;
            $this->data['id_supplier'] = "0";
            $this->data['id_kandang'] = "0";
            $this->data['id_detail_group_transaksi'] = $id;

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
            $this->data['count'] = $this->detailKerugianAyamModel->countAll($params);

            $this->data['data'] = $this->detailKerugianAyamModel->get(
                $this->data['limit'],
                $this->data['offset'],
                false,
                $params
            );

            $this->blade->view("page.riwayat.kerugian", $this->data);
        }
    }

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
        $this->data['count'] = $this->detailPembelianAyamModel->countAll($params);

        $this->data['data'] = $this->detailPembelianAyamModel->get(
            $this->data['limit'],
            $this->data['offset'],
            false,
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
