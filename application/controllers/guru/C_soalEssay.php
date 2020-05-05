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
            // Urutan load view adalah sebagai berikut
            // Header
            // topNavbar
            // sideNavbar
            // halaman custom yang digunakan
            // footer

            $data['tb_soal'] = $this->m_data_soalEssay->tampil_soalEssay()->result();
            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_soalEssay', $data);
            $this->load->view('template/footer');
        }

        function paketSoal()
        {
            //mengambil data dari model dengan function tampil_paket_soal
            $data['result_paket_soal'] = $this->m_data_soalEssay->tampil_paket_soal()->result();
            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_paketsoal',$data);
            $this->load->view('template/footer');
        }

        public function tambah_soalEssay() {

            // berfugsi untuk membuat fungsi melakukan penambahan ID soal secara otomatis
		    // $jumlahSoal berfungsi untuk mendapatkan jumlah soal yang ada dalam database
            $jumlahSoal = $this->m_data_soalEssay->tampil_soalEssay()->num_rows();  

            if($jumlahSoal > 0) 
            {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                $soalTerakhir = $this->m_data_soalEssay->tampil_soal_akhir()->result();
                foreach($soalTerakhir as $row)
                {
                    $rawIdSoal = substr($row->id_soal,2);
                    $intIdSoal = intval($rawIdSoal);

                    if(strlen($intIdSoal) == 1)
                    {
                        $idSoal = "SL0".($intIdSoal + 1);
                    } else if(strlen($intIdSoal) == 2)
                    {
                        $idSoal = "SL0".($idSoal + 1);
                    }else if(strlen($intIdSoal) == 3)
                    {
                        $idSoal = "SL".($intIdSoal + 1);
                    }
                }
            } else
            {
                $idSoal = "SL001";
            }

            $data = array(
                'idSoal' => $idSoal
            );

            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_tambah_soalEssay',$data);
            $this->load->view('template/footer');
        }

        public function tambah_aksi() {
            $id_soal = $this->input->post('id_soal');
            $id_paket = $this->input->post('id_paket');
            $id_jenis_soal = $this->input->post('id_jenis_soal');
            $pertanyaan = $this->input->post('pertanyaan');
            $kunci_jawaban = $this->input->post('kunci_jawaban');
            $pembahasan = $this->input->post('pembahasan');
            
            $data = array(
			'id_soal' => $id_soal,
			'id_paket' => $id_paket,
			'id_jenis_soal' => $id_jenis_soal,
			'pertanyaan' => $pertanyaan,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
		    );
            $this->m_data_soalEssay->tambah_soalEssay($data,'tb_soal');
            redirect('guru/C_soalEssay/index');
        }

        public function edit_soalEssay($id_soal) {
            $where = array('id_soal' => $id_soal);
            $data['tb_soal'] = $this->m_data_soalEssay->edit_soalEssay($where,'tb_soal')->result();

            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_edit_soalEssay',$data);
            $this->load->view('template/footer');

            redirect('guru/C_soalEssay->index');
        }

        public function hapus_soalEssay($id_soal) {
            $where = array('id_soal' => $id_soal);
            $this->m_data_soalEssay->hapus_soalEssay($where,'tb_soal');
            redirect('guru/C_soalEssay/index');
        }

        public function update_soalEssay() {
            $id_soal = $this->input->post('id_soal');
            $pertanyaan = $this->input->post('pertanyaan');
            $kunci_jawaban = $this->input->post('kunci_jawaban');
            $pembahasan = $this->input->post('pembahasan');

            $data = array(
                'pertanyaan' => $pertanyaan,
                'kunci_jawaban' => $kunci_jawaban,
                'pembahasan' => $pembahasan,
            );

            $where = array(
                'id_soal' => $id_soal
            );

            $this->m_data_soalEssay->update_soalEssay($where,$data, 'tb_soal');
            redirect('guru/v_soalEssay/index');
        }

    }

?>