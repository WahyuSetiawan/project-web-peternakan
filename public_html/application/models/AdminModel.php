<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminModel extends CI_Model {
        public static $table = "admin";

    public function __construct() {
        parent::__construct();
    }

    public function register($username, $password) {
        $data = array(
            "username" => $username,
            "password" => crypt($password)
        );

        return $this->db->insert('admin', $data);
    }

    public function put($id, $username, $password) {
        $this->db->where('id', $id);

        $data = array(
            "username" => $username,
            "password" => crypt($password)
        );

        return $this->db->update('admin', $data);
    }

    public function login($username, $password) {
        $this->db->where('username', trim($username));
        $admin = $this->db->get('admin')->row();

        if ($admin != null) {
            if (password_verify(trim($password), $admin->password)) {
                return $admin;
            }
        }

        return false;
    }

    public function get($limit = null, $offset = null, $id = null) {
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id != null) {
            $this->db->where('id', $id);
        }

        return $this->db->get('admin')->result();
    }

    public function remove($id) {
        $this->db->where('id', $id);
        return $this->db->delete('admin');
    }

    public function countAll() {
        return $this->db->count_all('admin');
    }

}
