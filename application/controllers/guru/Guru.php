<?php

// File ini berfungsi sebagai controller bagian Guru

    class Guru extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('status') != "login"){ 
            redirect(base_url("login")); //jika user tidak berhasil login maka akan diarahkan ke halaamn login
        }
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
            $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/home');
            $this->load->view('template/footer');
        }

    }

?>