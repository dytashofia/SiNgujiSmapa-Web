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
    return $this->db->get('tb_soal');
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

}
 