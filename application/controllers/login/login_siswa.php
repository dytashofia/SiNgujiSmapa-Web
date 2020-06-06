<?php

/* === Controller ini digunakan sebagai REST API android login siswa === */

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';  // import library dari rest controller
use Restserver\Libraries\REST_Controller; 

// Deklarasi Class Login_siswa

class Login_siswa extends REST_Controller
{
    function construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
    

    function index_get() {
        $username_siswa = $this->get('username_siswa');
        $password_siswa = $this->get('password_siswa');

        if ($username_siswa, $password_siswa == '') {
            
        } else {
            $this->db->$username_siswa('username_siswa', $username_siswa);
            $this->db->$password_siswa('password_siswa', $password_siswa);
        }
    }
}


?>