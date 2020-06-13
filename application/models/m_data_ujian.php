<?php
defined('BASEPATH') or exit('No direct script access allowed');
//model yang diambil untuk crud soal
class M_data_ujian extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function tampil_data_ujian()
    {
        return $this->db->get('tb_ujian');
    }
    public function tampil_data_ujian_akhir()
    {
        // Mengurutkan data yang ditampilkan menurut idnya, data diurutkan dari yang paling besar
        $this->db->order_by('id_ujian', 'DESC');
        // Mengambil hanya 1 data dari tabel
        return $this->db->get('tb_ujian', 1);
    }
    public function tambahDujian($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function deleteDujian($where, $table)
    {

        $this->db->delete($table, $where);
    }
}
