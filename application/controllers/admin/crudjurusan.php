
<!-- crud.php meruapakan controler yang berisi fungsi mengambil data obat dari model yang kemudian ditampilkan ke view-->
<?php 

class Crudjurusan extends CI_Controller{

   function __construct(){
    parent::__construct();      
    $this->load->model('m_jus'); //memanggil m_data
    $this->load->helper('url'); //mengaktifkan helper url

}
					// ======Menampilkan data=======
// fungsi construct pada crud.php digunakan untuk memanggil m_data yang merupakan model (berisi operasi database) dan helper  url

function index(){
    $data['jurusan'] = $this->m_jus->tampil_data()->result(); //mengambil daata dari database 
     $this->load->view('template/header');
            $this->load->view('template/topNavbar');
            $this->load->view('template/sideNavbar');
            $this->load->view('admin/v_tampiljurusan',$data);
            $this->load->view('template/footer');
     // parsing data ke view
    
}

// Catatan : agar mengakses dan mengelola databes harus melakukan load library database,saya mengaktifkan library database pada pengaturan autoload codeigniter.application/config/autoload.php.


                    
                    // ======input data======

// fungsi tambah berfungsi untuk menampilkan v_input yang merupakan form input data obat 
    function tambah(){
        $data= $this->m_jus->tampil_data()->num_rows();
        // Jika jumlah paket soal lebih dari 0
        if($data > 0)
        {
            // Mengambil id soal sebelumnya
            $lastId = $this->m_jus->tampil_jurusan_akhir()->result();
            // Melakukan perulangan untuk mengambil data
            foreach($lastId as $row)
            {
                // Melakukan pemisahan huruf dengan angka pada id paket
                $rawid_jurusan = substr($row->id_jurusan,3);
                // Melakukan konversi nilai pemisahan huruf dengan angka pada id paket menjadi integer
                $id_jurusanInt = intval($rawid_jurusan);

                // Menghitung panjang id yang sudah menjadi integer
                if(strlen($id_jurusanInt) == 1)
                {
                    // jika panjang id hanya 1 angka
                    $id_jurusan = "JRS00".($id_jurusanInt + 1);
                }else if(strlen($id_jurusanInt) == 2)
                {
                    // jika panjang id hanya 2 angka
                    $id_jurusan = "JRS0".($id_jurusanInt + 1);
                }else if(strlen($id_jurusanInt) == 3)
                {
                    // jika panjang id hanya 3 angka
                    $idjurusan = "JRS".($id_jurusanInt + 1);
                }

            }
        }else
        {
            // Jika jumlah paket soal kurang dari sama dengan 0
            $id_jurusan = "JRS001";
        }

        // Mengambil data mata pelajaran menggunakan model
        
         $data= $this->m_jus->tampil_data()->result();
        
       $data = array(
            "id_jurusan" => $id_jurusan,
           
        ); 



         $this->load->view('template/header');
            $this->load->view('template/topNavbar');
               $this->load->view('template/sideNavbar');
           $this->load->view('admin/v_tambahjurusan',$data); 
        
            $this->load->view('template/footer');// menampilkan topbar ke view
    
    }

// fungsi tambah_aksi digunakan untuk mengatur proses penginputan data obat 
    function tambah_aksi(){
        $id_jurusan = $this->input->post('id_jurusan'); 
        $jurusan = $this->input->post('jurusan');

       $data = array(
            "id_jurusan" => $id_jurusan,
            'jurusan' => $jurusan
        ); 

//kemudian data yang diterima atau ditangkap di jadikan sebuah aray
       

//menginput data array ke database  dengan menggunakan fungsi input_data yang terdpat pada model m_data
//parameter petama berisi data yang akan diinpukan (array data : $data)
//parameter kedua berisi tabel tujuan untuk menyimpan data (user)
        $this->m_jus->input_data($data,'tb_jurusan'); //menginputkan data ke tabel user
        redirect('admin/crudjurusan/index'); // mengerahkan ke index
    }


                     // ======hapus data=======

// fungsi hapus data  pada controller crud.php berfungsi untuk menghapus data obat yang ada didatabase berdasarkan id yang tertampung di variabel $where mengunakan fungsi hapus_data yang terdapat di model m_data
    function hapus($id){
        $where = array('id_jurusan' => $id); //data id obat yang akan dihapus dijadikan array
        $this->m_jus->hapus_data($where,'tb_jurusan'); // mengahapus data tabel obat dengan id yang tertampung di variabel where
        redirect('admin/crudjurusan/index'); //jika proses hapus data berhasil akan diarahkan ke index
    }

                            // ======edit data========

// fungsi edit  pada controller crud.php berfungsi untuk mengambil data dari tabel obat untuk di edit di from v_edit                        
    function edit($id){
    $where = array('id_jurusan' => $id); //menjadikan id yang akan digunakan sebgai array 
    $data['jurusan'] = $this->m_jus->edit_data($where,'tb_jurusan')->result(); // mengambil data yanga akan di edit berdasaekan data array berupa id 
     $this->load->view('template/header');
            $this->load->view('template/topNavbar');
           
            $this->load->view('admin/v_editjurusan',$data);
            $this->load->view('template/footer');
           
  //memampilkan v_edit yang merupakan form untuk mengedit data

}

// fungsi update digunakan untuk mengatur proses update data  obatterbaru ke database
function update(){
        $id = $this->input->post('id_jurusan');
        $jurusan = $this->input->post('jurusan');
        
//data nama, alamat dan pekerjaan yang diterima melalui method post  kemudian dijadikan array dan disimpan pada variabel $data
    $data = array(
            'jurusan' => $jurusan,
            
            );

//smentara data id yang menjadi penentu obat mana yang mau diedit, data id tersebut di simpan di dalam variabel where dan juga dijadikan array.
    $where = array(
        'id_jurusan' => $id
    );

//mengupdate data obat ke tb-obat berdasarkan id yamg terdapat di dalam variabel whwre
    $this->m_jus->update_data($where,$data,'tb_jurusan'); // update data obat ke database
    redirect('admin/crudjurusan/index'); //mengarahkan ke index
}

}
