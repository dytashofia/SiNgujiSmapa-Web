<?php

// File ini berfungsi sebagai controller bagian detail soal

    class C_soalEssay extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model(array('m_data_soalEssay'));//controller memangguil database dari model m_data_soal 
		    $this->load->helper('url');// menggunakan helper url 
        }

        // Menampilkan home.php dalam view, berdasarkan urutan pembagian template yang 
        public function index()
        {
            $data['tb_soal'] = $this->m_data_soalEssay->tampil_soalEssay()->result();
            // Urutan load view adalah sebagai berikut
            // Header
            // topNavbar
            // sideNavbar
            // halaman custom yang digunakan
            // footer

            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_soalEssay', $data);
            $this->load->view('template/footer');
        }

        public function tambah_soalEssay() {
            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_tambah_soalEssay');
            $this->load->view('template/footer');
        }

        public function tambah_aksi() {
            $data = array(
			'id_soal' => $id_soal,
			'id_paket' => $id_paket,
			'id_jenis_soal' => $id_jenis_soal,
			'soal' => $soal,
			'jawaban_benar' => $kunci_jawaban,
			'pembahasan_soal' => $pembahasan,
		);
            $this->m_data_soalEssay->input_data($data,'tb_soal');
            redirect('guru/C_soalEssay/index');
        }

        public function edit_soalEssay($id) {
            $where array('id_soal' => $id);
            $data['tb_soal'] = $this->m_data_soalEssay->edit_soalEssay($where,'tb_soal')->result();

            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('template/v_edit_soalEssay');
            $this->load->view('template/footer');

            redirect('guru/C_soalEssay->index');
        }

        public function delete_soalEssay($id) {
            $where array('id_soal' => $id);
            $data['tb_soal'] = $this->m_data_soalEssay->hapus_soalEssay($where, 'tb_soal')->result();

            redirect('guru/C_soalEssay->index');
        }

        public function update_soalEssay() {
            $id_soal = $this->input->post('id_soal');
            $id_paket = $this->input->post('id_paket');
            $id_jenis_soal = $this->input->post('id_jenis_soal');
            $soal = $this->input->post('soal');
            $kunci_jawaban = $this->input->post('kunci_jawaban');
            $pembahasan = $this->input->post('pembahasan_soal');
        }

    }

?>