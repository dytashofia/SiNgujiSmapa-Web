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

    // Model data siswa

    function tampil_siswa()
    {
      $fields = array(
        "tb_siswa.NIS",
        "tb_siswa.nama_siswa",
        "tb_siswa.jenis_kelamin",
        "tb_jurusan.jurusan",
        "tb_siswa.kelas",
        "tb_siswa.semester",
        "tb_siswa.username_siswa",
        "tb_siswa.password_siswa",
        "tb_siswa.foto_siswa"
         
      );
      $this->db->select($fields);
      $this->db->from('tb_siswa');
      $this->db->join('tb_jurusan', 'tb_siswa.id_jurusan = tb_jurusan.id_jurusan');
      $query = $this->db->get();
      return $query;
    }

    function tampil_jurusan()
  {
    return $this->db->get('tb_jurusan');
  }
    function tampil_paket_where_only($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

    function tambah_siswa($data, $table)
  {
      $this->db->insert($table, $data);
  }
    function edit_siswa() 
  {
    return $this->db->get_where($table, $where);
  }
  function update_siswa($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  function delete_siswa($where, $table)
  {
    $this->db->delete($table, $where);
  }

  


}



?>