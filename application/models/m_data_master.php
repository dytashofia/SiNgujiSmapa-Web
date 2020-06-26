<?php

defined('BASEPATH') or exit('No direct script access allowed');
//model yang diambil untuk crud soal
class M_data_master extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function tampil_seluruh_guru()
    {
        return $this->db->get('tb_guru');
    }

    public function tambah_Master($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_Master($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_Master() 
    {
        return $this->db->get_where($table, $where);
    }

    function update_Master ()
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


}



?>