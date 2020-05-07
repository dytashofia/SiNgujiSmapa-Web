<?php

 class M_data_soalEssay extends CI_Model {
     function __construct() {
         parent:: __construct();
         
     }

    public function tampil_soalEssay(){
      $this->db->where('id_jenis_soal','JNS002');
      return $this->db->get('tb_soal');
    }

    public function tampil_BenarSalah() {
      $this->db->where('id_jenis_soal', 'JNS003');
      return $this->db->get('tb_soal');
    }

    public function tampil_soal_akhir()
      {
        // Mengurutkan data yang ditampilkan menurut idnya, data diurutkan dari yang paling besar
        $this->db->order_by('id_soal','DESC');
        // Mengambil hanya 1 data dari tabel
        return $this->db->get('tb_soal',1);
      }

//model untuk input data soal essay
    public function tambah_soalEssay($data,$table) {
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
    
    function lihat_data($where,$table){		
      return $this->db->get_where($table,$where);
    }

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
?>