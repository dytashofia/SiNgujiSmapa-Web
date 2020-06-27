<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Edit Data Guru
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin');?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Data Guru</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <?php foreach($tb_data_guru as $data_guru){?>
                    <!-- Fungsi variabel idPaketSoal disini adalah sebagai penanda paket soal mana yang digunakan dan akan dirubah secara otomatis -->
                    <form action="<?= base_url('admin/Admin/updateGuru/'.$NIP);?>" method="post">
                        <div class="form-group">
                            <label for="NIP">  </label>
                            <input type="text" name="NIP" id="NIP" class="form-control" value="<?= $data_guru->NIP;?>"> 
                        </div>

                        <p class="form-text text-muted"> Form ini wajib diisi. </p>
                        <div class="form-group">
                            <label for="mata_pelajaran"> Mata Pelajaran </label>
                            <input type="text" name="id_mapel" id="id_mapel" class="form-control" value="<?= $data_guru->id_mapel;?>"> 
                        </div>

                        <p class="form-text text-muted"> Form ini wajib diisi. </p>
                        <div class="form-group">
                            <label for="id_jurusan"> Jurusan </label>
                            <input type="text" name="id_jurusan" id="id_jurusan" class="form-control" value="<?= $data_guru->id_jurusan;?>"> 
                        </div>

                       <p class="form-text text-muted"> Form ini wajib diisi. </p>
                        <div class="form-group">
                            <label for="nama_guru"> Jurusan </label>
                            <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?= $data_guru->nama_guru;?>"> 
                        </div>


                        <div class="form-group">
                            <label for="pembahasan"> Pembahasan </label>
                            <textarea name="pembahasan" id="textarea-ckeditor pembahasan" class="form-control ckeditor"><?= $soal->pembahasan;?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <a href="<?= base_url('soal/'.$id_paket_soal);?>" class="btn btn-outline-secondary w-100"> Kembali </a>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <button type="submit" class="btn btn-outline-primary w-100">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
    