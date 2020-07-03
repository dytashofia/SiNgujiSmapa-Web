<?php

class SetUjian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_ujian'); //controller memangguil database dari model m_data_soal 
        $this->load->helper('url'); // menggunakan helper url 
    }

    public function tampilDujian()
    {
        $data['result_set_ujian'] = $this->m_data_ujian->tampil_data_ujian()->result(); // function untuk mengambil semua data paket soal dari database
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('guru/v_dataUjian', $data);
        $this->load->view('template/footer');
    }

    public function tambahDujian()
    {
        $jumlahUjianSoal = $this->m_data_ujian->tampil_data_ujian()->num_rows();
        // Jika jumlah Ujian soal lebih dari 0
        if ($jumlahUjianSoal > 0) {
            // Mengambil id soal sebelumnya
            $lastId = $this->m_data_ujian->tampil_data_ujian_akhir()->result();
            // Melakukan perulangan untuk mengambil data
            foreach ($lastId as $row) {
                // Melakukan pemisahan huruf dengan angka pada id Ujian
                $rawIdUjian = substr($row->id_ujian, 3);
                // Melakukan konversi nilai pemisahan huruf dengan angka pada id Ujian menjadi integer
                $idUjianInt = intval($rawIdUjian);

                // Menghitung panjang id yang sudah menjadi integer
                if (strlen($idUjianInt) == 1) {
                    // jika panjang id hanya 1 angka
                    $idUjian = "UJN00" . ($idUjianInt + 1);
                } else if (strlen($idUjianInt) == 2) {
                    // jika panjang id hanya 2 angka
                    $idUjian = "UJN0" . ($idUjianInt + 1);
                } else if (strlen($idUjianInt) == 3) {
                    // jika panjang id hanya 3 angka
                    $idUjian = "UJN" . ($idUjianInt + 1);
                }
            }
        } else {
            // Jika jumlah paket soal kurang dari sama dengan 0
            $idUjian = "UJN001";
        }


        $jenis_soal = $this->db->get('tb_jenis_soal')->result();
        $tipe = $this->db->get('tb_tipe_ujian')->result();
        $nama_mapel = $this->db->get('tb_mapel')->result();
        $nama_jurusan = $this->db->get('tb_jurusan')->result();

        $data = array(
            "id_ujian" => $idUjian,
            'nama_mapel' => $nama_mapel,
            'nama_jurusan' => $nama_jurusan,
            'jenis_soal' => $jenis_soal,
            'tipe' => $tipe
        );
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('guru/v_tambah_dataUjian', $data);
        $this->load->view('template/footer');
    }

    function aksiTambahDujian()
    {
        // Menyimpan data yang dikirimkan user melalui form kedalam variabel
        $idUjian = $this->input->post("id_ujian");
        $nip = $this->input->post("nip");
        $idMapel = $this->input->post("id_mapel");
        $idJurusan = $this->input->post("id_jurusan");
        $idJenisSoal = $this->input->post("id_jenis_soal");
        $idTipe = $this->input->post("id_tipe");
        $jumlahSoal = $this->input->post("jumlah_soal");
        $waktuMengerjakan = $this->input->post("wkatu_mengerjakan");
        $waktuMulai = $this->input->post("wkatu_mulai");
        $tokenSoal = $this->input->post("token_soal");
        $status = $this->input->post("status");


        // Membuat validasi form
        $this->form_validation->set_rules('id_paket', 'ID Paket', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_mapel', 'ID Mapel', 'trim|required|strip_tags');
        $this->form_validation->set_rules('nama_paket', 'Nama Paket Soal', 'trim|required|strip_tags');

        // Membuat pesan validasi error
        $this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
        $this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
        $this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

        // Menjalankan form
        // Apabila hasil validasi form menunjukkan ada sesuatu yang salah
        // if ($this->form_validation->run() == false) {
        //     $this->tambahDujian();
        // } else {
        // Apabila hasil validasi form menunjukkan tidak ada yang salah
        $data = array(
            'id_ujian' => $idUjian,
            'NIP' => $nip,
            'id_mapel' => $idMapel,
            'id_jurusan' => $idJurusan,
            'id_jenis_soal' => $idJenisSoal,
            'id_tipe' => $idTipe,
            'jumlah_soal' => $jumlahSoal,
            'waktu_mengerjakan' => $waktuMengerjakan,
            'waktu_mulai' => $waktuMulai,
            'token_soal' => $tokenSoal,
            'status_ujian' => $status,

        );

        $this->m_data_ujian->tambahDujian($data, "tb_ujian");
        redirect('guru/setUjian/tampilDujian');
        //}
    }

    public function aksi_tambah()
    {
        $data['transport'] = $this->model_paket->tampil_paket()->result();
        $data['penginapan'] = $this->model_paket->tampil_paket()->result();
        $data['wisata']    = $this->model_paket->tampil_paket()->result();
        $nama_katalog      = $this->input->post('nama_katalog');
        $id_transport      = $this->input->post('id_transport');
        $id_hotel          = $this->input->post('id_hotel');
        $id_wisata         = $this->input->post('id_wisata');
        $harga_katalog     = $this->input->post('harga_katalog');
        $status            = $this->input->post('status');

        $data = array(
            'nama_katalog'        => $nama_katalog,
            'id_transport'        => $id_transport,
            'id_hotel'            => $id_hotel,
            'id_wisata'           => $id_wisata,
            'harga_katalog'       => $harga_katalog,
            'status'              => $status
        );

        $this->model_paket->tambah_paket($data, 'katalog');
        redirect('data_paket/index');
    }

    function hapusDujian($idUjian)
    {
        // Mendapatkan id paket soal yang akan dihapus
        $id_ujian = $idUjian;
        // Menyimpan id paket soal kedalam array
        $where = array(
            'id_ujian' => $id_ujian
        );

        $this->m_data_ujian->deleteDujian($where, 'tb_ujian');
        redirect('guru/setUjian/tampilDujian');
    }

    function editDujian($idUjian)
    {
        // Mendapatkan Id Paket Soal dari URL
        $id_ujian = $idUjian;
        // Membuat array untuk digunakan sebagai media select
        $where = array(
            'id_ujian' => $id_ujian
        );
        // Mendapatkan data paket soal tertentu melalui modal
        $result = $this->m_data_ujian->tampil_data_ujian_where_only($where, "tb_ujian")->result();
        // Mendapatkan data mata pelajaran melalui modal
        $nama_mapel = $this->db->get('tb_mapel')->result();
        $nama_jurusan = $this->db->get('tb_jurusan')->result();
        $jenis_soal = $this->db->get('tb_jenis_soal')->result();
        $tipe = $this->db->get('tb_tipe_ujian')->result();
        // Menyimpan hasil dari model kedalam array
        $data = array(
            'data_ujian' => $result,
            'nama_mapel' => $nama_mapel,
            'nama_jurusan' => $nama_jurusan,
            'jenis_soal' => $jenis_soal,
            'tipe' => $tipe
        );
        // Menampilkan view dengan data dari model
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('guru/v_edit_dataUjian.php', $data);
        $this->load->view('template/footer');
    }
    function aksiEditUjian()
    {
        // Menyimpan input dari user kedalam variabel
        $idUjian = $this->input->post("id_ujian");
        $nip = $this->input->post("nip");
        $idMapel = $this->input->post("id_mapel");
        $idJurusan = $this->input->post("id_jurusan");
        $idJenisSoal = $this->input->post("id_jenis_soal");
        $idTipe = $this->input->post("id_tipe");
        $jumlahSoal = $this->input->post("jumlah_soal");
        $waktuMengerjakan = $this->input->post("wkatu_mengerjakan");
        $waktuMulai = $this->input->post("wkatu_mulai");
        $tokenSoal = $this->input->post("token_soal");
        $status = $this->input->post("status");

        // Membuat validasi form
        $this->form_validation->set_rules('id_paket', 'ID Paket', 'required|trim|strip_tags');
        $this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'required|trim|strip_tags');
        $this->form_validation->set_rules('id_mapel', 'ID Mapel', 'required|trim|strip_tags');
        $this->form_validation->set_rules('nama_paket', 'Nama Paket Soal', 'required|trim|strip_tags');

        // Membuat pesan error untuk validasi form
        $this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
        $this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
        $this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

        // Menjalankan validasi form
        // apabila ditemukan sebuah kesalahan dalam menjalankan validasi form
        // if ($this->form_validation->run() == false) {
        //     $this->editPaket($id_paket);
        // } else {
        // Apabila tidak ditemukan sebuah kesalahan dalam menjalankan validasi form
        // Menyimpan semua variabel kedalam array
        $data = array(
            'id_ujian' => $idUjian,
            'NIP' => $nip,
            'id_mapel' => $idMapel,
            'id_jurusan' => $idJurusan,
            'id_jenis_soal' => $idJenisSoal,
            'id_tipe' => $idTipe,
            'jumlah_soal' => $jumlahSoal,
            'waktu_mengerjakan' => $waktuMengerjakan,
            'waktu_mulai' => $waktuMulai,
            'token_soal' => $tokenSoal,
            'status_ujian' => $status,
        );
        // Menyimpan data sebagai unique key yang digunakan untuk mengupdate
        $where = array(
            'id_ujian' => $idUjian
        );
        $this->m_data_ujian->update_data_ujian($where, $data, 'tb_ujian');
        redirect('guru/setUjian/tampilDujian');
        //}
    }
    function tampilDetailUjian($idUjian)
    {
        // Mendapatkan Id Paket Soal dari URL
        $id_ujian = $idUjian;
        // Membuat array untuk digunakan sebagai select
        $where = array(
            'tb_ujian.id_ujian' => $id_ujian
        );
        // Mendapatkan data paket soal tertentu melalui model
        $result = $this->m_data_ujian->tampil_data_ujian_where_only($where, 'tb_ujian')->result();
        $nama_mapel = $this->db->get('tb_mapel')->result();
        $nama_jurusan = $this->db->get('tb_jurusan')->result();
        $nama_jenis = $this->db->get('tb_jenis_soal')->result();
        $tipe_ujian = $this->db->get('tb_tipe_ujian')->result();
        // Menyimpan hasil dari model kedalam array
        $data = array(
            'data_ujian' => $result,
            'nama_mapel' => $nama_mapel,
            'nama_jurusan' => $nama_jurusan,
            'nama_jenis' => $nama_jenis,
            'tipe_ujian' => $tipe_ujian
        );
        // Menampilkan view dengan data dari model
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('guru/v_detail_dataUjian', $data);
        $this->load->view('template/footer');
    }
}
