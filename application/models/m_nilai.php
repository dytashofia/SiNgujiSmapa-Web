
<?php 

class M_nilai extends CI_Model{

// function tampil_data pada model m_niali digunakan untuk mengambil data dari database.untuk pada function ino saya akan mengambil data dari tabel obat untuk ditampilkan ke v_tampilnilai maka dari itu tabel admin sebagai parameter.
	function tampil_data(){
		return $this->db->get('tb_nilai');
	}

function nilai(){

 $query= $this->db->query("SELECT tb_nilai.id_nilai, tb_nilai.id_ujian, tb_nilai.NIS, tb_siswa.nama_siswa, Tb_siswa.kelas, tb_nilai.nilai, tb_nilai.tanggal_nilai FROM tb_nilai JOIN tb_siswa ON tb_siswa.NIS=tb_nilai.NIS;");
    return $query;
  
}




	 function tampil_nilai_akhir()
  {
    // Mengurutkan data yang ditampilkan menurut idnya, data diurutkan dari yang paling besar
    $this->db->order_by('id_nilai','DESC');
    // Mengambil hanya 1 data dari tabel
    return $this->db->get('tb_nilai',1);
  }

// function input_data  pada model m_nilai berfungsi untuk menyimpan data yang di diterima dari form inputan ke tabel yang dituju.
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

// function hapus_data berfungsi untuk meghapus tabel yang ada di database, berdasarkan data yang ada pada variabel where
	function hapus_data($where,$table){
		$this->db->where($where); 
		$this->db->delete($table);
	}

// function edit data berfungsi untuk menyeleksi data nilai yang akan di edit berdasarkan id yang di simpan divariabel where
	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}

// function update berfungsi melakukan update data nilai yang sudah di edit ke database.
	function update_data($where,$data,$table){
		$this->db->where($where); //
		$this->db->update($table,$data); // update data ke tabel yang dituju
	}	




  }



