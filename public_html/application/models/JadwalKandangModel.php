<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JadwalKandangModel extends CI_Model
{

    public static $table = "tb_jadwal_kandang";

    public function __construct()
    {
        parent::__construct();
    }

    public function select($id_jadwal_kandang = false, $params = [])
    {
        if (isset($params['kandang'])) {
            $this->db->where(self::$table . ".id_kandang", $params['kandang']);
        }

        if (isset($params['persediaan'])) {
            $this->db->where(self::$table . ".id_gudang", $params['persediaan']);
        }

        if (isset($params['hari'])) {
            if ($params['hari'] >= 0 && $params['hari'] <= 6) {
                $this->db->where(self::$table . ".hari", $params['hari']);
            }
        }

        if ($id_jadwal_kandang) {
            $this->db->where('id_jadwal_kandang', $id_jadwal_kandang);
        }

        $this->db->select(self::$table . '.*,'
            . 'DATE_FORMAT(' . self::$table . '.waktu_mulai, "%H:%i") as waktu_mulai_format,'
            . 'DATE_FORMAT(' . self::$table . '.waktu_selesai, "%H:%i") as waktu_selesai_format,'
            . GudangModel::$table . '.nama as nama_gudang,'
            . KandangModel::$table . '.nama as nama_kandang');

        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . self::$table . ".id_gudang", 'left');
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
    }

    public function get($limit = false, $offset = false, $id_jadwal_kandang = false, $params = [])
    {
        $this->db->limit($limit, $offset);

        $this->select($id_jadwal_kandang, $params);
        $this->db->order_by('waktu_mulai', 'asc');
        $this->db->order_by('hari', 'asc');
        $this->db->order_by("id_kandang", "asc");
        $this->db->order_by("id_gudang", "asc");

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

    public function getJadwal($date, $kandang, $gudang, $id_detail = null)
    {
        return $this->db->query("
        select 
            tb_jadwal_kandang.id_jadwal_kandang 
        from 
            tb_jadwal_kandang 
        where 
            date_format('$date', '%w') = tb_jadwal_kandang.hari 
            and tb_jadwal_kandang.id_kandang = '$kandang'
            and tb_jadwal_kandang.id_gudang = '$gudang'
            and time('$date') BETWEEN waktu_mulai 
            and waktu_selesai
        ");
    }

    public function getJadwal_from_date($date, $id_detail = null)
    {
        $this->db->select(self::$table . '.*,'
            . 'DATE_FORMAT(' . self::$table . '.waktu_mulai, "%H:%i") as waktu_mulai_format,'
            . 'DATE_FORMAT(' . self::$table . '.waktu_selesai, "%H:%i") as waktu_selesai_format,'
            . GudangModel::$table . '.nama as nama_gudang,'
            . KandangModel::$table . '.nama as nama_kandang');

        $this->db->where(" date_format('$date', '%w') = tb_jadwal_kandang.hari ");

        $this->db->join(KandangModel::$table, KandangModel::$table . ".id_kandang = " . self::$table . ".id_kandang", 'left');
        $this->db->join(GudangModel::$table, GudangModel::$table . ".id_gudang = " . self::$table . ".id_gudang", 'left');

        return  $this->db->get(self::$table);
    }
}
