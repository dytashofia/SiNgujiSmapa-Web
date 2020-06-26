<?php

// File ini berfungsi sebagai controller bagian admin 

class Admin extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model(array('m_data_master')); //controller memangguil database dari model m_data_soal 
		$this->load->helper('url'); // menggunakan helper url 

        // mengecek apakah sesion status, untuk mendeteksi apakah user atau admin sudah login atau belum. 
        if($this->session->userdata('status') != "login"){ 
            redirect(base_url("login")); //jika user tidak berhasil login maka akan diarahkan ke halaamn login
        }
    }

    // Menampilkan home.php dalam view, berdasarkan urutan pembagian template yang 
    public function index() {
        // Urutan load view adalah sebagai berikut
        // Header
        // topNavbar
        // sideNavbar
        // halaman custom yang digunakan
        // footer
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('admin/home');
        $this->load->view('template/footer'); 
    }

//  ===== Controller Untuk Guru =====
    public function tambahdataGuru() 
    {
        $tambahData = $this->m_data_master->tambahMaster->num_rows;      
    }

    public function tambahAksi_guru ()
    {
        $NIP = $this->input->post('NIP');
        $id_mapel = $this->input->post('id_mapel');
        $id_jurusan = $this->input->post('id_jurusan');
        $nama_guru = $this->input->post('nama_guru');
        $status = $this->input->post('status');
        $username_guru = $this->input->post('username_guru');
        $password_guru = $this->input->post('password_guru'); 

        $data = array(
            'NIP' => $NIP,
            'id_mapel' => $id_mapel,
            'id_jurusan' => $id_jurusan,
            'nama_guru' => $nama_guru,
            'status' => $status,
            'username_guru' => $username_guru,
            'password_guru' => $password_guru
        );
        $this->m_data_master->tambah_Master($data, 'tb_guru');
        redirect('Admin/index'); 
    }

    public function editDataGuru ($NIP) 
    {
        $where = array ('NIP' => $NIP);
        $data['tb_guru'] = $this->m_data_master->edit_Master($where, 'tb_guru');
    }

    public function aksiEditGuru ($NIP) 
    {
        $NIP = $this->input->post('NIP');
        $id_mapel = $this->input->post('id_mapel');
        $id_jurusan = $this->input->post('id_jurusan');
        $nama_guru = $this->input->post('nama_guru');
        $status = $this->input->post('status');
        $username_guru = $this->input->post('username_guru');
        $password_guru = $this->input->post('password_guru'); 

        $data = array(
            'NIP' => $NIP,
            'id_mapel' => $id_mapel,
            'id_jurusan' => $id_jurusan,
            'nama_guru' => $nama_guru,
            'status' => $status,
            'username_guru' => $username_guru,
            'password_guru' => $password_guru
        );

        $where = array(
            'NIP' => $NIP,
        );

        $this->m_data_master->update_Master($data, 'tb_guru');
        redirect('Admin/index');


    }

    public function hapusDataGuru () 
    {
        $where = array (
            'NIP' => $NIP
        );
        
        $this->m_data_master->haous_Master($where, 'tb_guru');
        redirect('Admin/index');
    }   
    
   //  ===== Controller Untuk Siswa =====
   
   //function untuk tampilan tabel master siswa
   public function tampilSiswa()
	{
		$data['tb_siswa'] = $this->m_data_master->tampil_siswa()->result(); // function untuk mengambil semua data paket soal dari database
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('admin/v_tampil_siswa', $data);
		$this->load->view('template/footer');
    }
    public function tambahSiswa()
	{
        $jurusan = $this->m_data_master->tampil_jurusan()->result();
        
        $data = array(
            'jurusan' => $jurusan
        );

    $this->load->view('template/header');
    $this->load->view('template/topNavbar');
    $this->load->view('template/sideNavbar');
    $this->load->view('admin/v_tambah_siswa',$data);
    $this->load->view('template/footer');
  
    }
    public function  aksiTambahSiswa()
    {
        $NIS = $this->input->post('NIS');
        $nama_siswa = $this->input->post('nama_siswa');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $id_jurusan = $this->input->post('id_jurusan');
        $kelas = $this->input->post('kelas');
        $semester = $this->input->post('semester');
        $username_siswa = $this->input->post('username_siswa');
        $password_siswa= $this->input->post('password_siswa');
        $foto_siswa = $this->input->post('foto_siswa');

        $data = array(
            'NIS' => $NIS,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'id_jurusan' => $id_jurusan,
            'kelas' => $kelas,
            'semester' => $semester,
            'username_siswa' => $username_siswa,
            'password_siswa' => $password_siswa,
            'foto_siswa' => $foto_siswa
        );
        $this->m_data_master->tambah_siswa($data, 'tb_siswa');
        redirect('admin/Admin/tampilSiswa'); 
    }
    function tampilDetailSiswa($NIS)
	{
		//function edit menangkap NIS dari pengiriman NIS yang ditampilkan di v_TAMPIL_SISWA
		echo $NIS;
		$where = array('NIS' => $NIS); // kemudian diubah menjadi array
		$data['tb_siswa'] = $this->m_data_master->tampil_paket_where_only($where, 'tb_siswa')->result(); //dan barulah kita kirim data array edit tersebut pada m_data_soal dan ditangkap oleh function edit_data 
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('admin/v_detail_siswa', $data); // kemudian setelah eksekusi ditrampilkan view v_edit untuk mengubah data
		$this->load->view('template/footer');
    }
    
    function editSiswa($NIS)
	{
		echo $NIS;
		$where = array('NIS' => $NIS);
		$result = $this->m_data_master->tampil_paket_where_only($where, "tb_siswa")->result();
		// Mendapatkan data mata pelajaran melalui modal
		$resultJurusan = $this->m_data_master->tampil_jurusan()->result();
		// Menyimpan hasil dari model kedalam array
		$data = array(
			'data_siswa' => $result,
			'data_jurusan' => $resultJurusan
		);
		// Menampilkan view dengan data dari model
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('admin/v_edit_siswa.php', $data);
		$this->load->view('template/footer');
    }
    
     function aksiEditSiswa() 
    {
        $NIS = $this->input->post('NIS');
        $nama_siswa = $this->input->post('nama_siswa');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $id_jurusan = $this->input->post('id_jurusan');
        $kelas = $this->input->post('kelas');
        $semester = $this->input->post('semester');
        $username_siswa = $this->input->post('username_siswa');
        $password_siswa= $this->input->post('password_siswa');

        $data = array(   
            'NIS' => $NIS,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'id_jurusan' => $id_jurusan,
            'kelas' => $kelas,
            'semester' => $semester,
            'username_siswa' => $username_siswa,
            'password_siswa' => $password_siswa
        );

        $where = array(
            'NIS' => $NIS,
        );

        $this->m_data_master->update_siswa($where,$data,'tb_siswa');
        redirect('admin/Admin/tampilSiswa');
    }
    function hapusSiswa($NIS)
	{
        //function hapus menangkap NIS dari pengiriman NIS yang ditampilkan di view MASTER SISWA
		$where = array('NIS' => $NIS); // kemudian diubah menjadi array
		$this->m_data_master->delete_siswa($where, 'tb_siswa'); //dan barulah kita kirim data array hapus tersebut pada m_data_soal yang ditangkap oleh function hapus_data
		// id paket disini merujuk pada id paket soal mana yang digunakan sekarang
		redirect('admin/Admin/tampilSiswa'); // setelah itu langsung diarah kan ke function index yang menampilkan v_masuk
	}


}

?>