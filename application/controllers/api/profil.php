<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Profil extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_data_saya');
        // $this->load->library('PrimsLib');
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    function getUser_post()
    {
        $response = $this->M_data_saya->getUser($this->post('NIS'));
        if ($response['data'] != null) {
            $this->response($response);
        } else {
            $response['status'] = 502;
            $response['error'] = true;
            $response['message'] = 'Data user tidak ditemukan!';
            $this->response($response);
        }
    }

    function updateProfil_put()
    {
        $email = $this->db->get_where('tb_siswa', array('NIS' => $this->put('NIS')))->row()->id_jurusan;
        if ($this->put('id_jurusan') == $email) {
            $data = array(
                'nama_siswa' => $this->put('nama_siswa'),
                'id_jurusan' => $this->put('id_jurusan'),
                'jenis_kelamin' => $this->put('jenis_kelamin'),
                'kelas' => $this->put('kelas'),
                'semester' => $this->put('semester'),
                'username_siswa' => $this->put('username_siswa'),
                'password_siswa' => $this->put('password_siswa')
            );
        } else {
            $data = array(
                'nama_siswa' => $this->put('nama_siswa'),
                'id_jurusan' => $this->put('id_jurusan'),
                'jenis_kelamin' => $this->put('jenis_kelamin'),
                'kelas' => $this->put('kelas'),
                'semester' => $this->put('semester'),
                'username_siswa' => $this->put('username_siswa'),
                'password_siswa' => $this->put('password_siswa')
            );
        }

        $where = array('NIS' => $this->put('NIS'));
        $response = $this->M_data_saya->updateUser($data, $where);
        if ($response['data'] == true) {
            $this->response($response);
        } else {
            $response['status'] = 502;
            $response['error'] = true;
            $response['message'] = 'Gagal memperbarui token device tidak ditemukan!';
            $this->response($response);
        }
    }

    function uploadfoto_put()
    {
        $response = $this->M_data_saya->uploadfoto(
            $this->put('NIS'),
            $this->put('foto_siswa')
        );
        $this->response($response);
    }
}
