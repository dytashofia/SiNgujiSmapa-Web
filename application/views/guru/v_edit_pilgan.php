<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Soal Pilihan Ganda
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru/home');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/pilgan/tampilPaket');?>">Paket Soal</a></li>
                <li class="breadcrumb-item active">Edit Soal Pilihan Ganda</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <?php foreach($tb_soal_pilgan as $soal){?>
                    <form action="<?= base_url('guru/pilgan/update');?>" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID SOAL
                                    </div>
                                </div>
                                <input type="text" name="id_soal" id="id_soal" class="form-control" value="<?= $soal->id_soal;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea-pertanyaan"> Pertanyaan </label>
                            <textarea name="pertanyaan" id="textarea-ckeditor textarea-pertanyaan" class="form-control ckeditor"><?= $soal->pertanyaan;?></textarea>
                            <p class="form-text text-muted"> Form ini wajib diisi. </p>
                        </div>
                        <div class="form-group">
                            <label for="opsi_a"> Pilihan A </label>
                            <textarea name="opsi_a" id="textarea-ckeditor opsi_a" class="form-control ckeditor" ><?= $soal->opsi_a;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="opsi_b"> Pilihan B </label>
                            <textarea name="opsi_b" id="textarea-ckeditor opsi_b" class="form-control ckeditor"><?= $soal->opsi_b;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="opsi_c"> Pilihan C </label>
                            <textarea name="opsi_c" id="textarea-ckeditor opsi_c" class="form-control ckeditor"><?= $soal->opsi_c;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="opsi_d"> Pilihan D </label>
                            <textarea name="opsi_d" id="textarea-ckeditor opsi_d" class="form-control ckeditor"><?= $soal->opsi_d;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="opsi_e"> Pilihan E </label>
                            <textarea name="opsi_e" id="textarea-ckeditor opsi_e" class="form-control ckeditor"><?= $soal->opsi_e;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kunci_jawaban"> Kunci Jawaban </label>
                            <input type="text" name="kunci_jawaban" id="kunci_jawaban" class="form-control" value="<?= $soal->kunci_jawaban;?>"> 
                        </div>
                        <div class="form-group">
                            <label for="pembahasan"> Pembahasan </label>
                            <textarea name="pembahasan" id="textarea-ckeditor pembahasan" class="form-control ckeditor"><?= $soal->pembahasan;?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <a href="<?= base_url('guru/pilgan');?>" class="btn btn-outline-secondary w-100"> Kembali </a>
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
    