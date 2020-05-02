<?php 

class Pilgan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model(array('m_data_soal'));//controller memangguil database dari model m_data_soal 
				$this->load->helper('url');// menggunakan helper url 
	}
// function index yang menampilkan crud pesanggem dan berhubungang dengan function tampil data di model m_data_soal
	function index(){
		$data['tb_soal'] = $this->m_data_soal->tampil_data()->result();// pada function index dibuat variabel $data yang menampilkan data tabel user vyang diambil dari model m_data_soal
		$this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
		$this->load->view('guru/v_pilgan',$data);// view them_crud adalah template yang didalamnya terdapat v_masuk (view yang di dalamnya terdapat tabel pesanggem) 
        $this->load->view('template/footer');
	}
//function hapus adalah function yang dipanggil saat kita klik aksi hapus di tabel admin
    function hapus($id_soal){
		//function hapus menangkap NIK dari pengiriman NIK yang ditampilkan di view masuk
		$where = array('id_soal' => $id_soal);// kemudian diubah menjadi array
		$this->m_data_soal->hapus_data($where,'tb_soal');//dan barulah kita kirim data array hapus tersebut pada m_data_soal yang ditangkap oleh function hapus_data
		redirect('guru/pilgan/index');// setelah itu langsung diarah kan ke function index yang menampilkan v_masuk
    }
//function edit adalah function yang dipanggil saat kita klik aksi edit di tabel pesanggem untuk masuk ke halamn edit data pesanggem atau v_editn
    function edit($id_soal){
		//function edit menangkap NIK dari pengiriman NIKyang ditampilkan di v_masuk
        $where = array('id_soal' => $id_soal);// kemudian diubah menjadi array
        $data['tb_soal'] = $this->m_data_soal->edit_data($where,'tb_soal')->result();//dan barulah kita kirim data array edit tersebut pada m_data_soal dan ditangkap oleh function edit_data 
        $this->load->view('v_edit_pilgan',$data);// kemudian setelah eksekusi ditrampilkan view v_edit untuk mengubah data
	}
//function tambh adalah function yang dipanggil saat kita klik aksi tambah data di tabel admin untuk masuk ke halamn tambah data admin atau v_input_admin
	function tambah(){
		$this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
		$this->load->view('guru/v_tambah_pilgan');// apabila fuction tambah yang dieksekusi maka akan menampilkan view v_input untuk mengimputkan data
		$this->load->view('template/footer');
	}
//function tambah aksi adalah function yang dipanggil saat kita klik tambah pada halam tambah data pesanggem dan 
//function ini yang mengupdate hasil tambah data baru yang ditambahakan pada tabel admin
	function tambah_aksi(){
		$id_soal = $this->input->post('id_soal');//function melakukan post dari name field yang di inputkan
		$id_paket = $this->input->post('id_paket');//function melakukan post dari name field yang di inputkan
		$pertanyaan = $this->input->post('pertanyaan');//function melakukan post dari name field yang di inputkan
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$kunci_jawaban = $this->input->post('kunci_jawaban');//function melakukan post dari name field yang di inputkan
		$pembahasan = $this->input->post('pembahasan');//function melakukan post dari name field yang di inputkan
		
		$data = array(
			'id_soal' => $id_soal,
			'id_paket' => $id_paket,
			'pertanyaan' => $pertanyaan,
			'opsi_a' => $opsi_a,
			'opsi_b' => $opsi_b,
			'opsi_c' => $opsi_c,
			'opsi_d' => $opsi_d,
			'opsi_e' => $opsi_e,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
		);
		$this->m_data_soal->input_data($data,'tb_soal');//dikirimkan ke model m_data_soal yang ditangkap oleh function input_data
		redirect('guru/pilgan/index');//apabila ekseskusi selesai akan di arahkan ke halaman crud/index (crud pesanggem)
	}
//function update adalah function yang dipanggil saat kita klik simpan pada halam edit data pesanggem dan 
//function ini yang mengupdate hasil edit data baru yang ditambahakan pada tabel pesanggem
	function update(){
		$id_soal = $this->input->post('id_soal');//function melakukan post dari name field yang di inputkan
		$pertanyaan = $this->input->post('pertanyaan');//function melakukan post dari name field yang di inputkan
		$kunci_jawaban = $this->input->post('kunci_jawaban');//function melakukan post dari name field yang di inputkan
		$pembahasan = $this->input->post('pembahasan');//function melakukan post dari name field yang di inputkan
		
		$data = array(

			'pertanyaan' => $pertanyaan,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
			//kemudian menjadikan data tersebut dalam bentuk array
			// kemudian menjadikaanya array data yang ditambahakan untuk ditangkap oleh model
			//yang dijadikan array khusus data yang bisa di edit 
			
		);
	
		$where = array(
			'id_soal' => $id_soal//variabel penentu NIK mana yang telah diupdate
		);
	
		$this->m_data_soal->update_data($where,$data,'tb_soal');//SELANJUTNYA KITA KIRIMKAN KE M_DATA UPDATED DATA UNTUK MENGNGUBAH DATABASE  
		redirect('guru/v_pilgan/index');// setelah itu langsung diarah kan ke function index yang menampilkan v_tampil
	}
}