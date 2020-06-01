<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Soal Pilihan Ganda
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('soal/'.$idPaketSoal);?>">Paket Soal</a></li>
                <li class="breadcrumb-item active">Input Soal Pilihan Ganda</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <!-- Fungsi variabel idPaketSoal disini adalah sebagai penanda paket soal mana yang digunakan dan akan dirubah secara otomatis -->
                    <form action="<?= base_url('guru/pilgan/tambah_aksi/'.$idPaketSoal);?>" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID SOAL
                                    </div>
                                </div>
                                <input type="text" name="id_soal" id="id_soal" class="form-control" value="<?= $idSoal;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID PAKET
                                    </div>
                                </div>
                                <!-- Disini variabel idPaketSoal juga berperan sebagai penanda paket soal mana yang digunakan dan akan dirubah secara otomatis -->
                                <input type="text" name="id_paket" id="id_paket" class="form-control" value="<?= $idPaketSoal;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID JENIS
                                    </div>
                                </div>
                                <input type="text" name="id_jenis_soal" id="id_jenis_soal" class="form-control" value="JNS001" readonly>
                            </div>
                        </div>
                        <p class="form-text text-muted"> Form ini wajib diisi. </p>
                        <div class="form-group<?=form_error('pertanyaan') ? 'has-error' : null?>">
                            <label for="textarea-pertanyaan"> Pertanyaan </label>
                            <textarea name="pertanyaan" id="textarea-ckeditor textarea-pertanyaan" class="form-control ckeditor"><?=set_value('pertanyaan');?></textarea>
                            <?=form_error('pertanyaan','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="form-group<?=form_error('opsi_a') ? 'has-error' : null?>">
                            <label for="opsi_a"> Pilihan A </label>
                            <textarea name="opsi_a" id="textarea-ckeditor opsi_a" class="form-control ckeditor"><?=set_value('opsi_a');?></textarea>
                            <?=form_error('opsi_a','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="form-group<?=form_error('opsi_b') ? 'has-error' : null?>">
                            <label for="opsi_b"> Pilihan B </label>
                            <textarea name="opsi_b" id="textarea-ckeditor opsi_b" class="form-control ckeditor"><?=set_value('opsi_b');?></textarea>
                            <?=form_error('opsi_b','<small class="text-form text-danger mt-2 ml-2">','</small>');?>                        
                        </div>
                        <div class="form-group<?=form_error('opsi_c') ? 'has-error' : null?>">
                            <label for="opsi_c"> Pilihan C </label>
                            <textarea name="opsi_c" id="textarea-ckeditor opsi_c" class="form-control ckeditor"><?=set_value('opsi_c');?></textarea>
                            <?=form_error('opsi_c','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="form-group<?=form_error('opsi_d') ? 'has-error' : null?>">
                            <label for="opsi_d"> Pilihan D </label>
                            <textarea name="opsi_d" id="textarea-ckeditor opsi_d" class="form-control ckeditor"><?=set_value('opsi_d');?></textarea>
                            <?=form_error('opsi_d','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="form-group<?=form_error('opsi_e') ? 'has-error' : null?>">
                            <label for="opsi_e"> Pilihan E </label>
                            <textarea name="opsi_e" id="textarea-ckeditor opsi_e" class="form-control ckeditor"><?=set_value('opsi_e');?></textarea>
                            <?=form_error('opsi_e','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="form-group<?=form_error('kunci_jawaban') ? 'has-error' : null?>">
                            <label for="kunci_jawaban"> Kunci Jawaban </label>
                            <select name="kunci_jawaban" id="kunci_jawaban" class="custom-select">
                                <!--set value diberi kondisi agar yang tampil sesuai dengan yang dipilih-->
                                <option value="A">Pilihan A</option>
                                <option value="B">Pilihan B</option>
                                <option value="C">Pilihan C</option>
                                <option value="D">Pilihan D</option>
                                <option value="E">Pilihan E</option>
                            </select>
                            <?=form_error('kunci_jawaban','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="form-group"<?=form_error('pembahasan') ? 'has-error' : null?>>
                            <label for="pembahasan"> Pembahasan </label>
                            <textarea name="pembahasan" id="textarea-ckeditor pembahasan" class="form-control ckeditor"><?=set_value('pembahasan');?></textarea>
                            <?=form_error('pembahasan','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <a href="<?= base_url('soal/'.$idPaketSoal);?>" class="btn btn-outline-secondary w-100"> Kembali </a>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <button type="submit" class="btn btn-outline-primary w-100">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </main>