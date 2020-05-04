<?php

 class M_data_soalEssay extends CI_Model {
     function __construct() {
         parent:: __construct();
         
     }

    public function tampil_soalEssay(){
            return $this->db->get('tb_soal');
        }

//model untuk input data soal essay
    public function tambah_soalEssay() {
        $this->db->insert($table,$data);                   
    }

    function hapus_soalEssay($where,$table){
      $this->db->where($where);
      $this->db->delete($table);
    }

    function edit_soalEssay($where,$table){		
      return $this->db->get_where($table,$where);
    }

    function update_soalEssay($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
    }	
}
?>