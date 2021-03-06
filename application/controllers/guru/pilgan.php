<?php

class Pilgan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_data_soal')); //controller memangguil database dari model m_data_soal 
		$this->load->helper('url'); // menggunakan helper url 
	}
	// function index yang menampilkan crud pesanggem dan berhubungang dengan function tampil data di model m_data_soal
	function index($id_paket_uri)
	{
		$idPaketSoal = $id_paket_uri;
		$data['tb_soal_pilgan'] = $this->m_data_soal->tampil_data($idPaketSoal)->result(); // pada function index dibuat variabel $data yang menampilkan data tabel user vyang diambil dari model m_data_soal
		$data['tb_soal_essay'] = $this->m_data_soal->tampil_soalEssay($idPaketSoal)->result(); // pada function index dibuat variabel $data yang menampilkan data tabel soal yang daimbil dari model m_data_soalEssay
		$data['tb_soal_sorting'] = $this->m_data_soal->tampil_data_sorting($idPaketSoal)->result();
		$data['tb_soal_benarSalah'] = $this->m_data_soal->tampil_BenarSalah($idPaketSoal)->result();
		$data['id_paket_soal'] = $idPaketSoal;
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_pilgan', $data); // view them_crud adalah template yang didalamnya terdapat v_masuk (view yang di dalamnya terdapat tabel pesanggem) 
		$this->load->view('template/footer');
	}

	// **** CONTROLLER UNTUK PAKET SOAL

	// function untuk menampilkan seluruh paket soal yang ada di dalam database
	public function tampilPaket()
	{
		$data['result_paket_soal'] = $this->m_data_soal->tampil_paket_soal()->result(); // function untuk mengambil semua data paket soal dari database
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_paketsoal', $data);
		$this->load->view('template/footer');
	}

	// function untuk menampilkan tampilan tambah paket soal 
	public function tambahPaket()
	{
		// Membuat fungsi untuk melakukan penambahan id paket soal secara otomatis
		// Mendapatkan jumlah paket soal yang ada di database
		$jumlahPaketSoal = $this->m_data_soal->tampil_paket_soal()->num_rows();
		// Jika jumlah paket soal lebih dari 0
		if ($jumlahPaketSoal > 0) {
			// Mengambil id soal sebelumnya
			$lastId = $this->m_data_soal->tampil_paket_soal_akhir()->result();
			// Melakukan perulangan untuk mengambil data
			foreach ($lastId as $row) {
				// Melakukan pemisahan huruf dengan angka pada id paket
				$rawIdPaket = substr($row->id_paket, 3);
				// Melakukan konversi nilai pemisahan huruf dengan angka pada id paket menjadi integer
				$idPaketInt = intval($rawIdPaket);

				// Menghitung panjang id yang sudah menjadi integer
				if (strlen($idPaketInt) == 1) {
					// jika panjang id hanya 1 angka
					$idPaket = "PKT00" . ($idPaketInt + 1);
				} else if (strlen($idPaketInt) == 2) {
					// jika panjang id hanya 2 angka
					$idPaket = "PKT0" . ($idPaketInt + 1);
				} else if (strlen($idPaketInt) == 3) {
					// jika panjang id hanya 3 angka
					$idPaket = "PKT" . ($idPaketInt + 1);
				}
			}
		} else {
			// Jika jumlah paket soal kurang dari sama dengan 0
			$idPaket = "PKT001";
		}

		// Mengambil data mata pelajaran menggunakan model
		$mapel = $this->m_data_soal->tampil_mapel()->result();

		$data = array(
			"id_paket_soal" => $idPaket,
			'mapel' => $mapel
		);
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_tambah_paketSoal', $data);
		$this->load->view('template/footer');
	}

	// function untuk melakukan tambah paket soal kedalam database
	function aksiTambahPaket()
	{
		// Menyimpan data yang dikirimkan user melalui form kedalam variabel
		$idPaket = $this->input->post("id_paket");
		$idJurusan = $this->input->post("id_jurusan");
		$idMapel = $this->input->post("id_mapel");
		$namaPaket = $this->input->post("nama_paket");
		$nip = $this->input->post("nip");

		// Membuat validasi form
		$this->form_validation->set_rules('id_paket', 'ID Paket', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'trim|required|strip_tags');
		$this->form_validation->set_rules('id_mapel', 'ID Mapel', 'trim|required|strip_tags');
		$this->form_validation->set_rules('nama_paket', 'Nama Paket Soal', 'trim|required|strip_tags');

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
		$this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
		$this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->tambahPaket();
		} else {
			// Apabila hasil validasi form menunjukkan tidak ada yang salah
			$data = array(
				'id_paket' => $idPaket,
				'NIP' => $nip,
				'nama_paket' => $namaPaket,
				'id_jurusan' => $idJurusan,
				'id_mapel' => $idMapel,
				'tgl_pembuatan' => date("d/m/Y")
			);

			$this->m_data_soal->tambah_paket($data, "tb_paket_soal");
			redirect('tampilPaket');
		}
	}

	// function untuk menampilkan detail data paket
	function tampilDetailPaket($idPaketUri)
	{
		// Mendapatkan Id Paket Soal dari URL
		$idPaket = $idPaketUri;
		// Membuat array untuk digunakan sebagai select
		$where = array(
			'tb_paket_soal.id_paket' => $idPaket
		);
		// Mendapatkan data paket soal tertentu melalui model
		$result = $this->m_data_soal->tampil_paket_where($where, 'tb_paket_soal')->result();
		// Menyimpan hasil dari model kedalam array
		$data = array(
			'data_paket' => $result
		);
		// Menampilkan view dengan data dari model
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_detailPaket', $data);
		$this->load->view('template/footer');
	}

	// function untuk menampilkan view mengedit paket soal
	function editPaket($idPaketUri)
	{
		// Mendapatkan Id Paket Soal dari URL
		$idPaket = $idPaketUri;
		// Membuat array untuk digunakan sebagai media select
		$where = array(
			'id_paket' => $idPaket
		);
		// Mendapatkan data paket soal tertentu melalui modal
		$result = $this->m_data_soal->tampil_paket_where_only($where, "tb_paket_soal")->result();
		// Mendapatkan data mata pelajaran melalui modal
		$resultMapel = $this->m_data_soal->tampil_mapel()->result();
		// Menyimpan hasil dari model kedalam array
		$data = array(
			'data_paket' => $result,
			'data_mapel' => $resultMapel
		);
		// Menampilkan view dengan data dari model
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_editPaket.php', $data);
		$this->load->view('template/footer');
	}

	// function untuk mengubah data paket soal
	function aksiEditPaket()
	{
		// Menyimpan input dari user kedalam variabel
		$id_paket = $this->input->post('id_paket');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_mapel = $this->input->post('id_mapel');
		$NIP = $this->input->post('NIP');
		$nama_paket = $this->input->post('nama_paket');

		// Membuat validasi form
		$this->form_validation->set_rules('id_paket', 'ID Paket', 'required|trim|strip_tags');
		$this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('id_mapel', 'ID Mapel', 'required|trim|strip_tags');
		$this->form_validation->set_rules('nama_paket', 'Nama Paket Soal', 'required|trim|strip_tags');

		// Membuat pesan error untuk validasi form
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');
		$this->form_validation->set_message('trim', 'Kolom %s berisi karakter yang dilarang.');
		$this->form_validation->set_message('strip_tags', 'Kolom %s berisi karakter yang dilarang.');

		// Menjalankan validasi form
		// apabila ditemukan sebuah kesalahan dalam menjalankan validasi form
		if ($this->form_validation->run() == false) {
			$this->editPaket($id_paket);
		} else {
			// Apabila tidak ditemukan sebuah kesalahan dalam menjalankan validasi form
			// Menyimpan semua variabel kedalam array
			$data = array(
				'id_paket' => $id_paket,
				'NIP' => $NIP,
				'nama_paket' => $nama_paket,
				'id_jurusan' => $id_jurusan,
				'id_mapel' => $id_mapel
			);
			// Menyimpan data sebagai unique key yang digunakan untuk mengupdate
			$where = array(
				'id_paket' => $id_paket
			);
			$this->m_data_soal->update_paket_soal($where, $data, 'tb_paket_soal');
			redirect('tampilPaket');
		}
	}

	// function untuk menghapus paket soal
	function hapusPaket($idPaketUri)
	{
		// Mendapatkan id paket soal yang akan dihapus
		$id_paket = $idPaketUri;
		// Menyimpan id paket soal kedalam array
		$where = array(
			'id_paket' => $id_paket
		);

		$this->m_data_soal->delete_paket_soal($where, 'tb_paket_soal');
		redirect('tampilPaket');
	}

	//***  CONTROLLER UNTUK SOAL PILGAN 

	function tambah($idUriSoal)
	{

		// Fungsi idUriSoal disini adalah sebagai id_paket_soal yang dinamis nanti dalam form

		// Membuat fungsi untuk melakukan penambahkan ID soal secara otomatis
		// Mendapatkan jumlah soal yang ada dalam database
		$jumlahSoal = $this->m_data_soal->tampil_seluruh_soal()->num_rows();
		// Jika jumlah soal lebih dari 0	
		if ($jumlahSoal > 0) {
			// Mengambil id soal sebelumnya
			$soalTerakhir = $this->m_data_soal->tampil_soal_akhir()->result();
			// Melakukan perulangan untuk mendapatkan isi dari variabel soalTerakhir
			foreach ($soalTerakhir as $row) {
				// Melakukan pemisahan huruf dengan angka pada id soal sebelumnya
				$rawIdSoal = substr($row->id_soal, 2);
				// Melakukan konversi id soal yang baru saja dipisahkan dari huruf menjadi integer
				$intIdSoal = intval($rawIdSoal);
				$intIdSoal += 1;

				// Menghitung panjang angka dari id soal yang sudah dijadikan integer
				if (strlen($intIdSoal) == 1) {
					// Jika panjangnya hanya 1 digit ( berarti antara 1 - 9)
					$idSoal = "SL00" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 2) {
					// Jika panjangnya hanya 2 digit ( berarti 10 - 99 )
					$idSoal = "SL0" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 3) {
					// Jika panjangnya hanya 3 digit ( berarti 100 - 999 )
					$idSoal = "SL" . ($intIdSoal);
				}
			}
		} else {
			// Jika jumlah soal tidak sama dengan 0
			// maka buat id soal baru
			$idSoal = "SL001";
		}

		$data = array(
			'idSoal' => $idSoal,
			'idPaketSoal' => $idUriSoal
		);

		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_tambah_pilgan', $data); // apabila fuction tambah yang dieksekusi maka akan menampilkan view v_input untuk mengimputkan data
		$this->load->view('template/footer');
	}
	//function tambah aksi adalah function yang dipanggil saat kita klik tambah pada halam tambah data pesanggem dan 
	//function ini yang mengupdate hasil tambah data baru yang ditambahakan pada tabel admin

	function tambah_aksi()
	{

		//inputan
		$id_soal = $this->input->post('id_soal'); //function melakukan post dari name field yang di inputkan
		$id_paket = $this->input->post('id_paket'); //function melakukan post dari name field yang di inputkan
		$id_jenis_soal = $this->input->post('id_jenis_soal');
		$pertanyaan = $this->input->post('pertanyaan'); //function melakukan post dari name field yang di inputkan
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$kunci_jawaban = $this->input->post('kunci_jawaban'); //function melakukan post dari name field yang di inputkan
		$pembahasan = $this->input->post('pembahasan'); //function melakukan post dari name field yang di inputkan

		// Membuat validasi form
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('opsi_a', 'Pilihan A', 'required');
		$this->form_validation->set_rules('opsi_b', 'Pilihan B', 'required');
		$this->form_validation->set_rules('opsi_c', 'Pilihan C', 'required');
		$this->form_validation->set_rules('opsi_d', 'Pilihan D', 'required');
		$this->form_validation->set_rules('opsi_e', 'Pilihan E', 'required');
		$this->form_validation->set_rules('kunci_jawaban', 'Kunci Jawaban', 'required');
		$this->form_validation->set_rules('pembahasan', 'Pembahasan', 'required');

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->tambah($id_paket);
		} else {
			$data = array(
				'id_soal' => $id_soal,
				'id_paket' => $id_paket,
				'id_jenis_soal' => $id_jenis_soal,
				'pertanyaan' => $pertanyaan,
				'opsi_a' => $opsi_a,
				'opsi_b' => $opsi_b,
				'opsi_c' => $opsi_c,
				'opsi_d' => $opsi_d,
				'opsi_e' => $opsi_e,
				'kunci_jawaban' => $kunci_jawaban,
				'pembahasan' => $pembahasan
			);


			$this->m_data_soal->input_data($data, 'tb_soal'); //dikirimkan ke model m_data_soal yang ditangkap oleh function input_data
			// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
			redirect('soal/' . $this->uri->segment(4));
		}
	}

	//function hapus adalah function yang dipanggil saat kita klik aksi hapus di tabel admin
	function hapus($id_soal, $id_paket)
	{
		//function hapus menangkap NIK dari pengiriman NIK yang ditampilkan di view masuk
		$where = array('id_soal' => $id_soal); // kemudian diubah menjadi array
		$this->m_data_soal->hapus_data($where, 'tb_soal'); //dan barulah kita kirim data array hapus tersebut pada m_data_soal yang ditangkap oleh function hapus_data
		// id paket disini merujuk pada id paket soal mana yang digunakan sekarang
		redirect('soal/' . $id_paket); // setelah itu langsung diarah kan ke function index yang menampilkan v_masuk
	}
	//function edit adalah function yang dipanggil saat kita klik aksi edit di tabel pesanggem untuk masuk ke halamn edit data pesanggem atau v_editn
	function edit($id_soal, $id_paket_uri)
	{
		// fungsi variabel id_paket_uri adalah sebagai penanda kita berada di paket soal yang mana
		//function edit menangkap NIK dari pengiriman NIKyang ditampilkan di v_masuk
		echo $id_soal;
		$where = array('id_soal' => $id_soal); // kemudian diubah menjadi array
		$data['tb_soal_pilgan'] = $this->m_data_soal->edit_data($where, 'tb_soal')->result(); //dan barulah kita kirim data array edit tersebut pada m_data_soal dan ditangkap oleh function edit_data 
		$data['id_paket_soal'] = $id_paket_uri;
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_edit_pilgan', $data); // kemudian setelah eksekusi ditrampilkan view v_edit untuk mengubah data
		$this->load->view('template/footer');
	}
	//function update adalah function yang dipanggil saat kita klik simpan pada halam edit data pesanggem dan 
	//function ini yang mengupdate hasil edit data baru yang ditambahakan pada tabel pesanggem
	function update()
	{
		$id_soal = $this->input->post('id_soal'); //function melakukan post dari name field yang di inputkan
		$pertanyaan = $this->input->post('pertanyaan'); //function melakukan post dari name field yang di inputkan
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$pembahasan = $this->input->post('pembahasan'); //function melakukan post dari name field yang di inputkan
		$kunci_jawaban = $this->input->post('kunci_jawaban'); //function melakukan post dari name field yang di inputkan

		$data = array(
			'pertanyaan' => $pertanyaan,
			'opsi_a' => $opsi_a,
			'opsi_b' => $opsi_b,
			'opsi_c' => $opsi_c,
			'opsi_d' => $opsi_d,
			'opsi_e' => $opsi_e,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
			//kemudian menjadikan data tersebut dalam bentuk array
			// kemudian menjadikaanya array data yang ditambahakan untuk ditangkap oleh model
			//yang dijadikan array khusus data yang bisa di edit 

		);

		$where = array(
			'id_soal' => $id_soal //variabel penentu NIK mana yang telah diupdate
		);

		$this->m_data_soal->update_data($where, $data, 'tb_soal'); //SELANJUTNYA KITA KIRIMKAN KE M_DATA UPDATED DATA UNTUK MENGNGUBAH DATABASE  
		// uri segment disini merujuk pada id paket soal yang dikirim melalui form
		redirect('soal/' . $this->uri->segment(4)); // setelah itu langsung diarah kan ke function index yang menampilkan v_tampil
	}


	// ***CONTROLLER UNTUK SOAL SORTING 

	//function tambh adalah function yang dipanggil saat kita klik aksi tambah data di tabel admin untuk masuk ke halamn tambah data admin atau v_input_admin
	function tambah_sorting($id_paket_soal)
	{

		// Fungsi id_paket_soal disini adalah sebagai id_paket_soal yang dinamis nanti dalam form

		// Membuat fungsi untuk melakukan penambahkan ID soal secara otomatis
		// Mendapatkan jumlah soal yang ada dalam database
		$jumlahSoal = $this->m_data_soal->tampil_seluruh_soal()->num_rows();
		// Jika jumlah soal lebih dari 0	
		if ($jumlahSoal > 0) {
			// Mengambil id soal sebelumnya
			$soalTerakhir = $this->m_data_soal->tampil_soal_akhir()->result();
			// Melakukan perulangan untuk mendapatkan isi dari variabel soalTerakhir
			foreach ($soalTerakhir as $row) {
				// Melakukan pemisahan huruf dengan angka pada id soal sebelumnya
				$rawIdSoal = substr($row->id_soal, 2);
				// Melakukan konversi id soal yang baru saja dipisahkan dari huruf menjadi integer
				$intIdSoal = intval($rawIdSoal);
				$intIdSoal += 1;

				// Menghitung panjang angka dari id soal yang sudah dijadikan integer
				if (strlen($intIdSoal) == 1) {
					// Jika panjangnya hanya 1 digit ( berarti antara 1 - 9)
					$idSoal = "SL00" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 2) {
					// Jika panjangnya hanya 2 digit ( berarti 10 - 99 )
					$idSoal = "SL0" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 3) {
					// Jika panjangnya hanya 3 digit ( berarti 100 - 999 )
					$idSoal = "SL" . ($intIdSoal);
				}
			}
		} else {
			// Jika jumlah soal tidak sama dengan 0
			// maka buat id soal baru
			$idSoal = "SL001";
		}

		$data = array(
			'idSoal' => $idSoal,
			'idPaketSoal' => $id_paket_soal
		);

		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_tambah_sorting', $data); // apabila fuction tambah yang dieksekusi maka akan menampilkan view v_input untuk mengimputkan data
		$this->load->view('template/footer');
	}

	function tambah_aksi_sorting()
	{
		//INPUTAN
		$id_soal = $this->input->post('id_soal'); //function melakukan post dari name field yang di inputkan
		$id_paket = $this->input->post('id_paket'); //function melakukan post dari name field yang di inputkan
		$id_jenis_soal = $this->input->post('id_jenis_soal');
		$pertanyaan = $this->input->post('pertanyaan'); //function melakukan post dari name field yang di inputkan
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$kunci_jawaban = $this->input->post('kunci_jawaban'); //function melakukan post dari name field yang di inputkan
		$pembahasan = $this->input->post('pembahasan'); //function melakukan post dari name field yang di inputkan

		//FORM VALIDASI
		// Membuat validasi form
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('kunci_jawaban', 'Kunci Jawaban', 'required');
		$this->form_validation->set_rules('pembahasan', 'Pembahasan', 'required');

		// Membuat pesan validasi error
		$this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong.');

		// Menjalankan form
		// Apabila hasil validasi form menunjukkan ada sesuatu yang salah
		if ($this->form_validation->run() == false) {
			$this->tambah_sorting($id_paket);
		} else {
			$data = array(
				'id_soal' => $id_soal,
				'id_paket' => $id_paket,
				'id_jenis_soal' => $id_jenis_soal,
				'pertanyaan' => $pertanyaan,
				'opsi_a' => $opsi_a,
				'opsi_b' => $opsi_b,
				'opsi_c' => $opsi_c,
				'opsi_d' => $opsi_d,
				'opsi_e' => $opsi_e,
				'kunci_jawaban' => $kunci_jawaban,
				'pembahasan' => $pembahasan
			);


			$this->m_data_soal->input_data($data, 'tb_soal'); //dikirimkan ke model m_data_soal yang ditangkap oleh function input_data
			// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
			redirect('soal/' . $this->uri->segment(4));
		}
	}
	//function hapus adalah function yang dipanggil saat kita klik aksi hapus di tabel admin
	function hapus_sorting($id_soal, $id_paket_soal)
	{
		//function hapus menangkap NIK dari pengiriman NIK yang ditampilkan di view masuk
		$where = array('id_soal' => $id_soal); // kemudian diubah menjadi array
		$this->m_data_soal->hapus_data($where, 'tb_soal'); //dan barulah kita kirim data array hapus tersebut pada m_data_soal yang ditangkap oleh function hapus_data
		// fungsi variabel id paket soal disini adalah sebagai penanda kita berada di paket soal yang mana sekarang
		redirect('soal/' . $id_paket_soal); // setelah itu langsung diarah kan ke function index yang menampilkan v_masuk
	}
	function edit_sorting($id_soal, $id_paket_soal_uri)
	{
		// fungsi variabel id_paket_soal_uri adalah sebagai penanda kita berada di paket soal yang mana sekarang
		//function edit menangkap NIK dari pengiriman NIKyang ditampilkan di v_masuk
		$where = array('id_soal' => $id_soal); // kemudian diubah menjadi array
		$data['tb_soal_sorting'] = $this->m_data_soal->edit_data($where, 'tb_soal')->result(); //dan barulah kita kirim data array edit tersebut pada m_data_soal dan ditangkap oleh function edit_data 
		$data['id_paket_soal'] = $id_paket_soal_uri;
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_edit_sorting', $data); // kemudian setelah eksekusi ditrampilkan view v_edit untuk mengubah data
		$this->load->view('template/footer');
	}
	function update_sorting()
	{
		$id_soal = $this->input->post('id_soal'); //function melakukan post dari name field yang di inputkan
		$pertanyaan = $this->input->post('pertanyaan'); //function melakukan post dari name field yang di inputkan
		$a = $this->input->post('urutana');
		$b = $this->input->post('urutanb');
		$c = $this->input->post('urutanc');
		$d = $this->input->post('urutand');
		$e = $this->input->post('urutane');
		$array = array($a, $b, $c, $d, $e);
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$pembahasan = $this->input->post('pembahasan'); //function melakukan post dari name field yang di inputkan
		$kunci_jawaban = $this->input->post('kunci_jawaban'); //function melakukan post dari name field yang di inputkan

		$data = array(
			'pertanyaan' => $pertanyaan,
			'opsi_a' => $opsi_a,
			'opsi_b' => $opsi_b,
			'opsi_c' => $opsi_c,
			'opsi_d' => $opsi_d,
			'opsi_e' => $opsi_e,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
			//kemudian menjadikan data tersebut dalam bentuk array
			// kemudian menjadikaanya array data yang ditambahakan untuk ditangkap oleh model
			//yang dijadikan array khusus data yang bisa di edit 

		);

		$where = array(
			'id_soal' => $id_soal //variabel penentu NIK mana yang telah diupdate
		);

		$this->m_data_soal->update_data($where, $data, 'tb_soal'); //SELANJUTNYA KITA KIRIMKAN KE M_DATA UPDATED DATA UNTUK MENGNGUBAH DATABASE  
		// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
		redirect('soal/' . $this->uri->segment(4)); // setelah itu langsung diarah kan ke function index yang menampilkan v_tampil
	}


	// ======= Controller Soal Essay =======

	function tambah_soalEssay($idPaketSoalUri)
	{

		// Fungsi idPaketSoalUri disini adalah sebagai id_paket_soal yang dinamis nanti dalam form

		// berfugsi untuk membuat fungsi melakukan penambahan ID soal secara otomatis
		// $jumlahSoal berfungsi untuk mendapatkan jumlah soal yang ada dalam database
		$jumlahSoal = $this->m_data_soal->tampil_seluruh_soal()->num_rows();

		//jika jumlah soal lebih dari nol
		if ($jumlahSoal > 0) {
			//maka memanggil id soal sebelumnya                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
			$soalTerakhir = $this->m_data_soal->tampil_soal_akhir()->result();

			//dilakukan untuk melakukan pengulangan untuk mendapatkan soal terakhir
			foreach ($soalTerakhir as $row) {
				// Melakukan pemisahan huruf dengan angka pada id paket
				$rawIdSoal = substr($row->id_soal, 2);
				// Melakukan konversi id soal yang baru saja dipisahkan dari huruf menjadi integer
				$intIdSoal = intval($rawIdSoal);
				$intIdSoal += 1;

				// Menghitung panjang angka dari id soal yang sudah dijadikan integer
				if (strlen($intIdSoal) == 1) {
					// Jika panjangnya hanya 1 digit ( berarti antara 1 - 9)
					$idSoal = "SL00" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 2) {
					// Jika panjangnya hanya 2 digit ( berarti 10 - 99 )
					$idSoal = "SL0" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 3) {
					// Jika panjangnya hanya 3 digit ( berarti 100 - 999 )
					$idSoal = "SL" . ($intIdSoal);
				}
			}
		} else {
			// Jika jumlah soal tidak sama dengan 0
			// maka buat id soal baru
			$idSoal = "SL001";
		}

		$data = array(
			'idSoal' => $idSoal,
			'idPaketSoal' => $idPaketSoalUri
		);

		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_tambah_soalEssay', $data); // maka setelah kondisi diatas di lakukan/eksekusi, ditampilkan view v_tambah_soalEssay untuk menambah data
		$this->load->view('template/footer');
	}

	function tambah_aksiEssay()
	{ //fungsi untuk aksi dari tambah data
		$id_soal = $this->input->post('id_soal'); //untuk post field namr yang dimasukkan berupa id_soal
		$id_paket = $this->input->post('id_paket'); //untuk post field namr yang dimasukkan berupa id_paket
		$id_jenis_soal = $this->input->post('id_jenis_soal'); //untuk post field namr yang dimasukkan berupa id_jenis_soal
		$pertanyaan = $this->input->post('pertanyaan'); //untuk post field namr yang dimasukkan berupa pertanyaan
		$kunci_jawaban = $this->input->post('kunci_jawaban'); //untuk post field namr yang dimasukkan berupa kunci_jawaban
		$pembahasan = $this->input->post('pembahasan'); //untuk post field namr yang dimasukkan berupa pembahasan

		//kemudian field yang dimasukkan disimpan dalam bentuk array berupa variable data
		$data = array(
			'id_soal' => $id_soal,
			'id_paket' => $id_paket,
			'id_jenis_soal' => $id_jenis_soal,
			'pertanyaan' => $pertanyaan,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
		);
		$this->m_data_soal->tambah_soalEssay($data, 'tb_soal'); //kemudian data tesebut di kirim ke models tambah soal untuk menambah data ke tabel soal 
		// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
		redirect('soal/' . $this->uri->segment(4)); //setelah itu langsung dialihkan ke view yang dipanggil oleh function index
	}

	function edit_soalEssay($id_soal, $id_paket_soal_uri)
	{
		//	Fungsi dari variabel id_paket_soal_uri disini adalah sebagai penanda kita berada di paket soal yang mana sekarang 
		$where = array('id_soal' => $id_soal);
		$data['tb_soal_essay'] = $this->m_data_soal->edit_soalEssay($where, 'tb_soal')->result();
		$data['id_paket_soal'] = $id_paket_soal_uri;
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_edit_soalEssay', $data);
		$this->load->view('template/footer');
	}

	function hapus_soalEssay($id_soal, $id_paket_soal)
	{
		$where = array('id_soal' => $id_soal);
		$this->m_data_soal->hapus_soalEssay($where, 'tb_soal');
		// Fungsi dari id paket soal adalah sebagai penanda kita berada di paket soal yang mana
		redirect('soal/' . $id_paket_soal);
	}

	function update_soalEssay()
	{
		$id_soal = $this->input->post('id_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$kunci_jawaban = $this->input->post('kunci_jawaban');
		$pembahasan = $this->input->post('pembahasan');

		$data = array(
			'pertanyaan' => $pertanyaan,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
		);

		$where = array(
			'id_soal' => $id_soal
		);

		$this->m_data_soal->update_soalEssay($where, $data, 'tb_soal');
		// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
		redirect('soal/' . $this->uri->segment(4));
	}

	// ===== Controller Benar Salah =====
	function tambah_benarSalah($id_paket_soal)
	{
		$jumlahSoal = $this->m_data_soal->tampil_seluruh_soal()->num_rows();

		// Fungsi id_paket_soal disini adalah sebagai id_paket_soal yang dinamis nanti dalam form

		//jika jumlah soal lebih dari nol
		if ($jumlahSoal > 0) {
			//maka memanggil id soal sebelumnya                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
			$soalTerakhir = $this->m_data_soal->tampil_soal_akhir()->result();

			//dilakukan untuk melakukan pengulangan untuk mendapatkan soal terakhir
			foreach ($soalTerakhir as $row) {
				// Melakukan pemisahan huruf dengan angka pada id paket
				$rawIdSoal = substr($row->id_soal, 2);

				// Melakukan konversi id soal yang baru saja dipisahkan dari huruf menjadi integer
				$intIdSoal = intval($rawIdSoal);
				$intIdSoal += 1;

				// Menghitung panjang angka dari id soal yang sudah dijadikan integer
				if (strlen($intIdSoal) == 1) {
					// Jika panjangnya hanya 1 digit ( berarti antara 1 - 9)
					$idSoal = "SL00" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 2) {
					// Jika panjangnya hanya 2 digit ( berarti 10 - 99 )
					$idSoal = "SL0" . ($intIdSoal);
				} else if (strlen($intIdSoal) == 3) {
					// Jika panjangnya hanya 3 digit ( berarti 100 - 999 )
					$idSoal = "SL" . ($intIdSoal);
				}
			}
		} else {
			$idSoal = "SL001";
		}

		// Jika jumlah soal tidak sama dengan 0
		// maka buat id soal baru
		$data = array(
			'idSoal' => $idSoal,
			'idPaketSoal' => $id_paket_soal
		);

		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_tambah_benarSalah', $data);
		$this->load->view('template/footer');
	}

	function tambah_aksi_benarSalah()
	{
		$id_soal = $this->input->post('id_soal');
		$id_paket = $this->input->post('id_paket');
		$id_jenis_soal = $this->input->post('id_jenis_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$kunci_jawaban = $this->input->post('kunci_jawaban');
		$pembahasan = $this->input->post('pembahasan');

		$data = array(
			'id_soal' => $id_soal,
			'id_paket' => $id_paket,
			'id_jenis_soal' => $id_jenis_soal,
			'pertanyaan' => $pertanyaan,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
		);

		$this->m_data_soal->tambah_soalEssay($data, 'tb_soal');
		// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
		redirect('soal/' . $this->uri->segment(4));
	}

	function edit_benarSalah($id_soal, $id_paket_soal_uri)
	{
		// Fungsi variabel id_paket_soal_uri disini adalah sebagai penanda kita sedang berada di paket soal yang mana
		$where = array('id_soal' => $id_soal);
		$data['tb_soal_benarSalah'] = $this->m_data_soal->edit_soalEssay($where, 'tb_soal')->result();
		$data['id_paket_soal'] = $id_paket_soal_uri;
		$this->load->view('template/header');
		$this->load->view('template/topNavbar');
		$this->load->view('template/sideNavbar');
		$this->load->view('guru/v_edit_benarSalah', $data);
		$this->load->view('template/footer');
	}

	function hapus_benarSalah($id_soal, $id_paket_soal)
	{
		$where = array('id_soal' => $id_soal);
		$this->m_data_soal->hapus_soalEssay($where, 'tb_soal');
		// Fungsi variabel id_pake_soal adalah sebagai penanda kita sedang berada di paket soal yang mana
		redirect('soal/' . $id_paket_soal);
	}

	function update_benarSalah()
	{
		$id_soal = $this->input->post('id_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$kunci_jawaban = $this->input->post('kunci_jawaban');
		$pembahasan = $this->input->post('pembahasan');

		$data = array(
			'pertanyaan' => $pertanyaan,
			'kunci_jawaban' => $kunci_jawaban,
			'pembahasan' => $pembahasan,
		);

		$where = array(
			'id_soal' => $id_soal
		);

		$this->m_data_soal->update_soalEssay($where, $data, 'tb_soal');
		// Uri Segment disini merujuk pada id paket soal yang dikirim melalui form
		redirect('soal/' . $this->uri->segment(4));
	}
}
