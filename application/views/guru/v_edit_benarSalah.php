<!DOCTYPE html>
<html lang="en">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1>
                <i class="fa fa-table"></i>Edit Soal Benar Salah
            </h1>
            <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('soal/'.$id_paket_soal);?>">Paket Soal</a></li>
                    <li class="breadcrumb-item active">Edit Soal Benar Salah</li>
            </ol>

            <div class="block full">
            <?php foreach($tb_soal_benarSalah as $benar_salah) { ?>
                <!-- Fungsi variabel idPaketSoal disini adalah sebagai penanda paket soal mana yang digunakan dan akan dirubah secara otomatis -->
                <form action="<?php echo base_url('guru/pilgan/update_benarSalah/'.$id_paket_soal);?>" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    ID SOAL
                                </div>
                            </div>
                            <input type="text" name="id_soal" id="id_soal" class="form-control" value="<?= $benar_salah->id_soal; ?>" readonly>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    ID PAKET
                                </div>
                            </div>
                            <!-- Fungsi variabel idPaketSoal disini adalah sebagai penanda paket soal mana yang digunakan dan akan dirubah secara otomatis -->
                            <input type="text" name="id_paket" id="id_paket" class="form-control" value="<?= $benar_salah->id_paket;?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    ID JENIS
                                </div>
                            </div>
                            <input type="text" name="id_jenis_soal" id="id_jenis_soal" class="form-control" value="JNS003" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><h3>Soal</h3></label>
                            <div>
                                <textarea id="textarea-ckeditor" name="pertanyaan"  class="ckeditor"><?= $benar_salah->pertanyaan;?></textarea>
                            </div>
                    </div>    
                    <br>
                    <div class="form-group">
                        <label><h3>Kunci Jawaban</h3></label>
                            <div class="form-group">
                                <div>
                                    <select name="kunci_jawaban" id="kunci_jawaban" class="form-control">
                                        <option value="true">TRUE</option>
                                        <option value="false">FALSE</option>
                                    </select>
                                </div>
                            </div>    
                    </div>
                    <br>        
                    <div class="form-group">
                        <label><h3>Pembahasan</h3></label>
                            <div>
                                <textarea id="textarea-ckeditor" rows="2" name="pembahasan"  class="ckeditor"><?= $benar_salah->pembahasan;?></textarea></div>
                            </div>
                    </div>        
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <a href="<?= base_url('soal/'.$benar_salah->id_paket);?>" class="btn btn-outline-secondary w-100">Kembali </a>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <button type="submit" class="btn btn-outline-primary w-100">Simpan</button>
                        </div>
                    </div>
                </form>   
            </div>
            <?php }; ?> 
        </div>       
    </main>
</div>    


 
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js')?>"></script>    

</html>