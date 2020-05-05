<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //model yang diambil untuk crud soal
class M_data_soal extends CI_Model{
 
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  //fuction untuk menampilkan tabel soal
  public function tampil_data(){
    $this->db->where('id_jenis_soal','JNS001');
    return $this->db->get('tb_soal');
  }

  // function untuk menampilkan data terakhir di tabel soal
  public function tampil_soal_akhir()
  {
    // Mengurutkan data yang ditampilkan menurut idnya, data diurutkan dari yang paling besar
    $this->db->order_by('id_soal','DESC');
    // Mengambil hanya 1 data dari tabel
    return $this->db->get('tb_soal',1);
  }
  
  //function untuk menginputkan data soal
  function input_data($data,$table){
		$this->db->insert($table,$data);                      
	}
  //function untuk menghapus data soal
  function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
  }
   //function untuk mengedit data soal
  function edit_data($where,$table){		
    return $this->db->get_where($table,$where);
  }
  //function untuk mengupdate tabel soal setelah dilakukan edit data
  function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
  }	
  //function untuk melihat data soal yang diinginkan 
  function lihat_data($where,$table){		
    return $this->db->get_where($table,$where);
  }

  // function untuk melihat semua data dalam tabel paket soal
  function tampil_paket_soal()
  {
    $fields = array(
      "tb_paket_soal.id_paket",
      "tb_paket_soal.nama_paket",
      "tb_paket_soal.NIP",
      "tb_guru.nama_guru",
      "tb_paket_soal.id_mapel",
      "tb_mapel.mata_pelajaran",
      "tb_paket_soal.id_jurusan",
      "tb_jurusan.jurusan",
      "tb_paket_soal.tgl_pembuatan"
    );
    $this->db->select($fields);
    $this->db->from('tb_paket_soal');
    $this->db->join('tb_guru','tb_paket_soal.NIP = tb_guru.NIP');
    $this->db->join('tb_mapel','tb_paket_soal.id_mapel = tb_mapel.id_mapel');
    $this->db->join('tb_jurusan','tb_paket_soal.id_jurusan = tb_jurusan.id_jurusan');
    $query = $this->db->get();
    return $query;
  }


}
 