<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JadwalKandangModel extends CI_Model
{

    public static $table = "jadwal_kandang";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($id_jadwal_kandang = false, $params = [])
    {
        if (isset($params['kandang'])) {
            $this->db->where("self::$table.id_kandang", $params['kandang']);
        }

        if (isset($params['persediaan'])) {
            $this->db->where("self::$table.id_persediaan", $params['persediaan']);
        }

        if ($id_jadwal_kandang) {
            $this->db->where('id_jadwal_kandang', $id_jadwal_kandang);
        }

        $this->db->select(self::$table . '.*,'
            . PersediaanModel::$table . '.nama as nama_persediaan,'
            . KandangModel::$table . '.nama as nama_kandang');

        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
        $this->db->join(PersediaanModel::$table, PersediaanModel::$table . ".id_persediaan = " . self::$table . ".id_persediaan", 'left');
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
    }

    public function get($limit = false, $offset = false, $id_jadwal_kandang = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->select($id_jadwal_kandang, $params);

        $data = $this->db->get(self::$table)->result();

        return $data;
    }

    public function put($data, $id)
    {
        $this->db->where('id_jadwal_kandang', $id);
        $this->db->update(self::$table, $data);
    }

    public function remove($id)
    {
        $this->db->where('id_jadwal_kandang', $id);
        $this->db->delete(self::$table);
    }

    public function countAll($params = [])
    {
        $this->select(false, $params);

        return count($this->db->get(self::$table)->result());
    }

    public function newId()
    {
        $this->db->select('function_id_jadwal_kandang() as id');
        $data = $this->db->get()->row();
        return $data->id;
    }

}
