<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Persediaan extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(
                array(
                    "PersediaanModel"
                )
        );
    }

    public function index() {
        
        $this->blade->view("page.data.persediaan", $this->data);
    }
    
}
