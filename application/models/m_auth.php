<?php

class m_auth extends CI_Model
{
    public function empty_response()
    {
        $response['status'] = 502;
        $response['error'] = true;
        $response['message'] = 'Field tidak boleh kosong';
        return $response;
    }

    public function auth_login($username, $password)
    {
        $login = $this->db->get_where('tb_siswa', array('username_siswa' => $username));
        if ($login->num_rows() > 0) {
            if ($password == $login->row()->password_siswa) {
                $response['status'] = 200;
                $response['error'] = false;
                $response['data'] = $login->result();
                $response['message'] = 'success';
            } else {
                $response['status'] = 502;
                $response['error'] = true;
                $response['data'] = null;
                $response['message'] = 'Mungkin password salah';
            }
        } else {
            $response['status'] = 502;
            $response['error'] = true;
            $response['data'] = null;
            $response['message'] = 'Email atau password salah';
        }
        return $response;
    }
}
