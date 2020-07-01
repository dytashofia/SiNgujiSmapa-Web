<?php

// File ini berfungsi sebagai controller bagian admin 

class Admin extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model(array('m_data_master')); //controller memanggil database dari model m_data_master 
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
        $this->load->view('template/sideNavbaradm');
        $this->load->view('admin/home');
        $this->load->view('template/footer'); 
    }

//  ===== Controller Untuk Guru =====

    public function tampilDataGuru() {
        $data['tb_guru'] = $this->m_data_master->tampil_Guru()->result(); //memanggil fungsi tampil guru dari m_data_master. 
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbaradm');
        $this->load->view('admin/v_tampil_guru', $data);
        $this->load->view('template/footer');

    }

    public function tambahdataGuru() 
    {
        $jurusan = $this->m_data_master->tampil_jurusan()->result();

        $data = array (
            'jurusan' => $jurusan
        );

        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbaradm');

        $this->load->view('admin/v_tambah_guru', $data);

        $this->load->view('admin/v_tampil_guru');

        $this->load->view('template/footer');     
    }

    public function aksiTambah_guru ()
    {
        $NIP = $this->input->post('NIP');
        $id_mapel = $this->input->post('id_mapel');
        $id_jurusan = $this->input->post('id_jurusan');
        $nama_guru = $this->input->post('kelas');
        $status = $this->input->post('status');
        $username_guru = $this->input->post('username_guru');
        $password_guru= $this->input->post('password_guru');
        $foto_guru = $this->input->post('foto_guru');

        // Membuat validasi form
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required|strip_tags');
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required|strip_tags');
        $this->form_validation->set_rules('status', 'status', 'trim|required|strip_tags');
        $this->form_validation->set_rules('username_guru', 'Username Guru', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password_guru', 'Password Guru', 'trim|required|strip_tags');
        $this->form_validation->set_rules('foto_guru', 'Foto Guru', 'trim|required|strip_tags');

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
		$this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
		$this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->tambahdataGuru();
		} else {

        $data = array(
            'NIP' => $NIP,
            'id_mapel' => $id_mapel,
            'id_jurusan' => $id_jurusan,
            'nama_guru' => $nama_guru,
            'status' => $status,
            'username_guru' => $username_guru,
            'password_guru' => $password_guru,
            'foto_guru' => $password_guru
        );
        $this->m_data_master->tambahdataGuru($data, 'tb_guru');
        redirect('admin/Admin/tampilDataGuru'); 

        }
    }

    public function detailGuru($NIP) 
    {
        echo $NIP;
		$where = array('NIP' => $NIP);
		$result = $this->m_data_master->tampil_paket_where_only($where, "tb_guru")->result();
		// Menyimpan hasil dari model kedalam array
		$data = array(
			'data_guru' => $result,
		);
		// Menampilkan view dengan data dari model
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbaradm');
		$this->load->view('admin/v_detail_guru', $data);
		$this->load->view('template/footer');
    }


    public function editDataGuru ($NIP) 
    {
        echo $NIP;
		$where = array('NIP' => $NIP);
		$result = $this->m_data_master->tampil_paket_where_only($where, "tb_guru")->result();
		// Mendapatkan data mata pelajaran melalui modal
		$resultJurusan = $this->m_data_master->tampil_jurusan()->result();
		// Menyimpan hasil dari model kedalam array
		$data = array(
			'data_guru' => $result,
			'data_jurusan' => $resultJurusan
		);
		// Menampilkan view dengan data dari model
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbaradm');
		$this->load->view('admin/v_edit_guru', $data);
		$this->load->view('template/footer');

        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbaradm');
        $this->load->view('admin/v_edit_guru');
        $this->load->view('template/footer');

    }

    public function aksiEditGuru() 
    {
        $NIP = $this->input->post('NIP');
        $id_mapel = $this->input->post('id_mapel');
        $id_jurusan = $this->input->post('id_jurusan');
        $nama_guru = $this->input->post('kelas');
        $status = $this->input->post('status');
        $username_guru = $this->input->post('username_guru');
        $password_guru= $this->input->post('password_guru');
        $foto_guru = $this->input->post('foto_guru');

        // Membuat validasi form
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required|strip_tags');
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required|strip_tags');
        $this->form_validation->set_rules('status', 'status', 'trim|required|strip_tags');
        $this->form_validation->set_rules('username_guru', 'Username Guru', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password_guru', 'Password Guru', 'trim|required|strip_tags');
        $this->form_validation->set_rules('foto_guru', 'Foto Guru', 'trim|required|strip_tags');

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
		$this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
		$this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->editDataGuru($NIP);
		} else {

        $data = array(   
            'NIP' => $NIP,
            'id_mapel' => $id_mapel,
            'id_jurusan' => $id_jurusan,
            'nama_guru' => $nama_guru,
            'status' => $status,
            'username_guru' => $username_guru,
            'password_guru' => $password_guru,
            'foto_guru' => $password_guru
            
        );

        $where = array(
            'NIP' => $NIP,
        );

        $this->m_data_master->editDataGuru($where,$data,'tb_guru');
        redirect('admin/Admin/tampilDataGuru');
        }
    }

    

    public function hapusDataGuru ($NIP) 
    {
        $where = array (
            'NIP' => $NIP
        );
        
        $this->m_data_master->hapus_Guru($where, 'tb_guru');
        redirect('Admin/tampilDataGuru');
    }   
    
   //  ===== Controller Untuk Siswa =====
   
   //function untuk tampilan tabel master siswa
   public function tampilSiswa()
	{
		$data['tb_siswa'] = $this->m_data_master->tampil_siswa()->result(); // function untuk mengambil semua data paket soal dari database
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbaradm');
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
    $this->load->view('template/sideNavbaradm');
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

        // Membuat validasi form
		$this->form_validation->set_rules('NIS', 'NIS', 'trim|required|strip_tags');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required|strip_tags');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required|strip_tags');
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required|strip_tags');
        $this->form_validation->set_rules('semester', 'Semester', 'trim|required|strip_tags');
        $this->form_validation->set_rules('username_siswa', 'Username', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password_siswa', 'Password', 'trim|required|strip_tags');
        $this->form_validation->set_rules('foto_siswa', 'Foto', 'trim|required|strip_tags');

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
		$this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
		$this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->tambahSiswa();
		} else {

        $data = array(
            'NIS' => $NIS,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'id_jurusan' => $id_jurusan,
            'kelas' => $kelas,
            'semester' => $semester,
            'username_siswa' => $username_siswa,
            'password_siswa' => md5($password_siswa),
            'foto_siswa' => $foto_siswa
        );
        $this->m_data_master->tambah_siswa($data, 'tb_siswa');
        redirect('admin/Admin/tampilSiswa'); 

        }
    }

    function tampilDetailSiswa($NIS)
	{
		echo $NIS;
		$where = array('NIS' => $NIS);
		$result = $this->m_data_master->tampil_paket_where_only($where, "tb_siswa")->result();
		// Menyimpan hasil dari model kedalam array
		$data = array(
			'data_siswa' => $result,
		);
		// Menampilkan view dengan data dari model
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbaradm');
		$this->load->view('admin/v_detail_siswa.php', $data);
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
		$this->load->view('template/sideNavbaradm');
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

        // Membuat validasi form
		$this->form_validation->set_rules('NIS', 'NIS', 'trim|required|strip_tags');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required|strip_tags');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required|strip_tags');
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required|strip_tags');
        $this->form_validation->set_rules('semester', 'Semester', 'trim|required|strip_tags');
        $this->form_validation->set_rules('username_siswa', 'Username', 'trim|required|strip_tags');
    

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
		$this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
		$this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->editSiswa($NIS);
		} else {

        $data = array(   
            'NIS' => $NIS,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'id_jurusan' => $id_jurusan,
            'kelas' => $kelas,
            'semester' => $semester,
            'username_siswa' => $username_siswa,
            
        );

        $where = array(
            'NIS' => $NIS,
        );

        $this->m_data_master->update_siswa($where,$data,'tb_siswa');
        redirect('admin/Admin/tampilSiswa');
        }
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