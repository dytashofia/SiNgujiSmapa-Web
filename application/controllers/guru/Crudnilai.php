
<!-- crud.php meruapakan controler yang berisi fungsi mengambil data nilai dari model yang kemudian ditampilkan ke view-->
<?php 

class Crudnilai extends CI_Controller{

   function __construct(){
    parent::__construct();      
    $this->load->model('m_nilai'); //memanggil m_data
    $this->load->helper('url'); //mengaktifkan helper url

}
					// ======Menampilkan data=======
// fungsi construct pada crud.php digunakan untuk memanggil m_nilai yang merupakan model (berisi operasi database) dan helper  url

function index(){
    $data['nilai'] = $this->m_nilai->nilai()->result(); //mengambil daata dari database 
     $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_tampilnilai',$data);
            $this->load->view('template/footer');
     // parsing data ke view
    
}

 

// Catatan : agar mengakses dan mengelola databes harus melakukan load library database,saya mengaktifkan library database pada pengaturan autoload codeigniter.application/config/autoload.php.


                    
                    // ======input data======

// fungsi tambah berfungsi untuk menampilkan v_tamabhnilai yang merupakan form tambah data nilai 
    function tambah(){
        $data= $this->m_nilai->tampil_data()->num_rows();
        // Jika jumlah paket soal lebih dari 0
        if($data > 0)
        {
            // Mengambil id soal sebelumnya
            $lastId = $this->m_nilai->tampil_nilai_akhir()->result();
            // Melakukan perulangan untuk mengambil data
            foreach($lastId as $row)
            {
                // Melakukan pemisahan huruf dengan angka pada id paket
                $rawid_nilai = substr($row->id_nilai,3);
                // Melakukan konversi nilai pemisahan huruf dengan angka pada id paket menjadi integer
                $id_nilaiInt = intval($rawid_nilai);

                // Menghitung panjang id yang sudah menjadi integer
                if(strlen($id_nilaiInt) == 1)
                {
                    // jika panjang id hanya 1 angka
                    $id_nilai = "NI000".($id_nilaiInt + 1);
                }else if(strlen($id_nilaiInt) == 2)
                {
                    // jika panjang id hanya 2 angka
                    $id_nilai = "NI00".($id_nilaiInt + 1);
                }else if(strlen($id_nilaiInt) == 3)
                {
                    // jika panjang id hanya 3 angka
                    $idnilai = "NI0".($id_nilaiInt + 1);
                }

            }
        }else
        {
            // Jika jumlah paket soal kurang dari sama dengan 0
            $id_jurusan = "NI0001";
        }

        // Mengambil data mata pelajaran menggunakan model
       
         $data= $this->m_nilai->tampil_data()->result();
         $id_ujian = $this->db->get('tb_ujian')->result();

         $NIS = $this->db->get('tb_siswa')->result();
           
        
       $data = array(
            "id_nilai" => $id_nilai,
            "id_ujian" => $id_ujian,
             "NIS" => $NIS
            
        ); 



         $this->load->view('template/header');
            $this->load->view('template/topNavbar');
               $this->load->view('template/sideNavbar');
           $this->load->view('guru/v_tambahnilai',$data); 
        
            $this->load->view('template/footer');// menampilkan topbar ke view
    
    }

// fungsi tambah_aksi digunakan untuk mengatur proses penginputan data nilai
    function tambah_aksi(){



        $id_nilai = $this->input->post('id_nilai'); 
        $id_ujian = $this->input->post('id_ujian');
        $NIS = $this->input->post('NIS');
        $nilai = $this->input->post('nilai');
         $tanggal_nilai = $this->input->post('tanggal_nilai');



       $data = array(
            'id_nilai' => $id_nilai,
            'id_ujian' => $id_ujian,
            'NIS'=> $NIS,
            'nilai' => $nilai,
            'tanggal_nilai' => $tanggal_nilai
        ); 

//kemudian data yang diterima atau ditangkap di jadikan sebuah aray
       

//menginput data array ke database  dengan menggunakan fungsi input_data yang terdpat pada model m_nilai
//parameter petama berisi data yang akan diinpukan (array data : $data)
//parameter kedua berisi tabel tujuan untuk menyimpan data (nilai)
        $this->m_nilai->input_data($data,'tb_nilai'); //menginputkan data ke tabel nilai
        redirect('guru/crudnilai/index'); // mengerahkan ke index
    }


                     // ======hapus data=======

// fungsi hapus data  pada controller crudnilai.php berfungsi untuk menghapus data nilai yang ada didatabase berdasarkan id yang tertampung di variabel $where mengunakan fungsi hapus_data yang terdapat di model m_data
    function hapus($id){
        $where = array('id_nilai' => $id); //data id nilai yang akan dihapus dijadikan array
        $this->m_nilai->hapus_data($where,'tb_nilai'); // mengahapus data tabel nilai engan id yang tertampung di variabel where
        redirect('guru/crudnilai/index'); //jika proses hapus data berhasil akan diarahkan ke index
    }

                            // ======edit data========

// fungsi edit  pada controller crudnilai.php berfungsi untuk mengambil data dari tabel nilai untuk di edit di from v_editnilai                        
     function edit($id){
    $where = array('id_nilai' => $id); //menjadikan id yang akan digunakan sebgai array 
    $data['nilaiedit'] = $this->m_nilai->edit_data($where,'tb_nilai')->result(); // mengambil data yanga akan di edit berdasaekan data array berupa id 
     $this->load->view('template/header');
            $this->load->view('template/topNavbar');
           $this->load->view('template/sideNavbar');
            $this->load->view('guru/v_editnilai',$data);
            $this->load->view('template/footer');
           
  //memampilkan v_edit yang merupakan form untuk mengedit data

}

// fungsi update digunakan untuk mengatur proses update data  obatterbaru ke database
function update(){
        $id = $this->input->post('id_nilai');
        $id_ujian = $this->input->post('id_ujian');
        $NIS = $this->input->post('NIS');
        $nilai = $this->input->post('nilai');
        $tanggal_nilai = $this->input->post('tanggal_nilai');
//data nama, alamat dan pekerjaan yang diterima melalui method post  kemudian dijadikan array dan disimpan pada variabel $data
    $data = array(
            'id_ujian' => $id_ujian,
            'NIS' => $NIS,
            'nilai' => $nilai,
            'tanggal_nilai' => $tanggal_nilai
            
            );

//smentara data id yang menjadi penentu nilai mana yang mau diedit, data id tersebut di simpan di dalam variabel where dan juga dijadikan array.
    $where = array(
        'id_nilai' => $id
    );

//mengupdate data nilai ke tb-nilai berdasarkan id yamg terdapat di dalam variabel whwre
    $this->m_nilai->update_data($where,$data,'tb_nilai'); // update data nilai ke database
    redirect('guru/crudnilai/index'); //mengarahkan ke index
}

}











