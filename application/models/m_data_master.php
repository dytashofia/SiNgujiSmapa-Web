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

    // ==== Modal Data Guru ====
    function tampil_Guru()
    {
        $fields = array(
        "tb_guru.NIP",
        "tb_guru.id_mapel",
        "tb_mapel.mata_pelajaran",
        "tb_guru.id_jurusan",
        "tb_jurusan.jurusan",
        "tb_guru.nama_guru",
        "tb_guru.status",
        "tb_guru.username_guru",
        "tb_guru.password_guru",
        "tb_guru.foto_guru"              
      );
      $this->db->select($fields);
      $this->db->from('tb_guru');
      $this->db->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
      $this->db->join('tb_jurusan', 'tb_guru.id_jurusan = tb_jurusan.id_jurusan');
      $query = $this->db->get();
      return $query;
    }

    function tambah_Guru($data, $table)
    {
        $this->db->insert($table, $data);
    }

  
    function edit_Guru() 
    {
        return $this->db->get_where($table, $where);
    }

    function hapus_Guru($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function update_Guru ($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function tampil_mapel()
    {
      return $this->db->get('tb_mapel');
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