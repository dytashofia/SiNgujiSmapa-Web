<?php

    defined('BASEPATH') OR exit('No direct script access allowed.');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Exam extends REST_Controller
    {

        public function __construct($config = 'rest')
        {
            parent::__construct($config);
            $this->load->model('m_exam');
        }

        public function questions_post()
        {
            $jenisSoal = $this->post('jenisSoal');

            $data = array(
                'id_jenis_soal' => $jenisSoal
            );

            $questionData = $this->m_exam->get_soal($data);

            if($questionData->num_rows() > 0)
            {
                $response['status'] = "202";
                $response['error'] = false;
                $response['question_count'] = $questionData->num_rows();
                $response['question'] = $questionData->result();
                $this->response($response);
            }else
            {
                $response['status'] = "502";
                $response['error'] = true;
                $response['question_count'] = $questionData->num_rows();
                $response['question'] = null;
                $this->response($response);
            }
            
        }

        public function insertAnswer_post()
        {
            $jumlahJawaban = $this->m_exam->get_total_jawaban()->num_rows();

            if($jumlahJawaban > 0)
            {
                
                $lastJawaban = $this->m_exam->get_last_jawaban()->result();

                foreach($lastJawaban as $row)
                {
                    $rawIdJawaban = substr($row->id_jawaban,3);
                    $intIdJawaban = intval($rawIdJawaban);
                    $intIdJawaban += 1;

                    if(strlen($intIdJawaban) == 1)
                    {
                        $idJawaban = 'JWB00'. $intIdJawaban;
                    }else if(strlen($intIdJawaban) == 2)
                    {
                        $idJawaban = 'JWB0' . $intIdJawaban;
                    }else if(strlen($intIdJawaban) == 3)
                    {
                        $idJawaban = 'JWB'. $intIdJawaban;
                    }

                }

            }else
            {
                $idJawaban = "JWB001";
            }

            $nis = $this->post('nis');
            $idUjian = $this->post('idUjian');
            $idSoal = $this->post('idSoal');
            $jawaban = $this->post('jawaban');

            $data = array(
                "id_jawaban" => $idJawaban,
                'NIS' =>  $nis,
                'id_ujian' => $idUjian,
                'id_soal' => $idSoal,
                'jawaban' => $jawaban
            );
            
            $insertJawaban = $this->m_exam->tambah_jawaban($data);

            $response['status'] = "202";
            $this->response($response);

        }

        public function grade_post()
        {

            $nis = $this->post('nis');
            $idUjian = $this->post('idUjian');

            $dataJawaban = array(
                'tb_jawaban.NIS' => $nis,
                'tb_jawaban.id_ujian' => $idUjian,
            );

            $queryJawaban = $this->m_exam->get_jawaban_user($dataJawaban);

            if($queryJawaban->num_rows() > 0)
            {
                $resultJawaban = $queryJawaban->result();

                $jawaban_user = [];
                $kunci_jawaban = [];

                $response['true_count'] = 0;

                foreach($resultJawaban as $row)
                {
                    array_push($jawaban_user, $row->jawaban);
                    array_push($kunci_jawaban, $row->kunci_jawaban);
                }

                for($i = 0; $i < count($kunci_jawaban); $i++)
                {
                    if($jawaban_user[$i] == $kunci_jawaban[$i])
                    {
                        $response['true_count'] += 1;
                    }else
                    {
                        $response['true_count'] += 0;
                    }
                }

                $response['user_score'] = round((100 / count($jawaban_user) * $response['true_count']));
                $response['status'] = "202";
                $response['error'] = false;
                $response['message'] = "Berhasil mendapatkan data";                
                $this->response($response);

            }else
            {
                $response['status'] = "502";
                $response['error'] = true;
                $response['message'] = "Gagal mendapatkan data";
                $this->response($response);
            }

        }

    }


?>