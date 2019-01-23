<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class KaryawanModel extends CI_Model
{
    public static $table = "karyawan";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($limit = false, $offset = false, $id = false)
    {

        if ($id) {
            $this->db->where('id_karyawan', $id);

            return $this->db->get('karyawan')->row();
        } else {
            $data = $this->db->get('karyawan', $limit, $offset)->result();

            return $data;
        }
    }

    public function set($data)
    {
        $this->db->set('id_karyawan', $this->newId());

        if (isset($data['password'])) {
            $data['password'] = crypt($data['password'], '$1$somethin$');
        }

        return $this->db->insert('karyawan', $data);
    }

    public function put($data, $id = false, $username = false)
    {

        if (isset($data['password'])) {
            $data['password'] = crypt($data['password'], '$1$somethin$');
        }

        if ($id) {
            $this->db->where('id_karyawan', $id);
        }

        if ($username) {
            $this->db->where('username', $username);
        }

        return $this->db->update('karyawan', $data);
    }

    public function remove($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->delete('karyawan');
    }

    public function countAll()
    {
        return $this->db->count_all('karyawan');
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $karyawan = $this->db->get(self::$table)->row();

        if ($karyawan != null) {
            if (password_verify($password, $karyawan->password)) {
                return $karyawan;
            }
        }

        return false;
    }

    public function newId()
    {
        $this->db->select('function_id_karyawan() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
