<?php

    defined('BASEPATH') OR exit('No direct access script allowed');

    class M_Exam extends CI_Model
    {

        public function get_soal($data)
        {
            return $this->db->get_where('tb_soal', $data);
        }

        public function get_total_jawaban()
        {
            return $this->db->get('tb_jawaban');
        }

        public function get_last_jawaban()
        {
            $this->db->order_by('id_jawaban', 'DESC');
            return $this->db->get('tb_jawaban', 1);
        }

        public function tambah_jawaban($data)
        {
            $this->db->insert("tb_jawaban", $data);
        }

    }

?>