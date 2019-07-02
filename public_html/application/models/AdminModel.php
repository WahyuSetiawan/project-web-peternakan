<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminModel extends CI_Model
{
    public static $table = "tb_admin";

    public function __construct()
    {
        parent::__construct();
    }

    public function register($alias, $username, $password)
    {
        $data = array(
            "nama" => $alias,
            "username" => $username,
            "password" => md5($password),
        );

        return $this->db->insert(self::$table, $data);
    }

    public function put($id, $alias, $username, $password)
    {
        $this->db->where('id', $id);

        $data = array(
            "nama" => $alias,
            "username" => $username,
            "password" => md5($password),
        );

        return $this->db->update(self::$table, $data);
    }

    public function login($username, $password)
    {
        $this->db->where('username', trim($username));
        $admin = $this->db->get(self::$table)->row();

        if ($admin != null) {
            if (md5($password) ==  $admin->password) {
                return $admin;
            }
        }

        return false;
    }

    public function get($limit = null, $offset = null, $id = null)
    {
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }

        if ($id != null) {
            $this->db->where('id', $id);
        }

        return $this->db->get(self::$table)->result();
    }

    public function remove($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete(self::$table);
    }

    public function countAll()
    {
        return $this->db->count_all(self::$table);
    }
}
