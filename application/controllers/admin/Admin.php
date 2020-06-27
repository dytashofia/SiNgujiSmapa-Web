<?php

// File ini berfungsi sebagai controller bagian admin 

class Admin extends CI_Controller {
    public function __construct() {
        parent:: __construct();

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
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('admin/v_tampil_guru');
        $this->load->view('template/footer');     
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

        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('admin/v_edit_guru');
        $this->load->view('template/footer');
    }

    public function updateGuru ($NIP) 
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
            'NIP' => $NIP
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
    



}

?>