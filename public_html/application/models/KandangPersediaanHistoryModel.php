<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class KandangPersediaanHistoryModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function set($data)
    {
        return $this->db->insert('kandang_persediaan_history', $data);
    }

    public function get($search = array(), $limit = null, $offset = null)
    {
        $this->db->where($search);

        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('kandang_persediaan_history')->result();
    }

}
