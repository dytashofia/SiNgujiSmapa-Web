<!DOCTYPE html>
<html lang="en">
<div id="layoutSidenav_content">
         <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Soal Essay
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru/home');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/pilgan/tampilPaket');?>">Paket Soal</a></li>
                <li class="breadcrumb-item active">Edit Soal Essay</li>
            </ol>
            <div class="block full">
           <?php foreach($tb_soal_essay as $soal_essay){?>
                <form action="<?php= base_url('guru/C_soalEssay/update_soalEssay');?>" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    ID SOAL
                                </div>
                            </div>
                            <input type="text" name="id_soal" id="id_soal" class="form-control" value="<?php print_r $soal_essay->id_soal; ?>" readonly>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    ID PAKET
                                </div>
                            </div>
                            <input type="text" name="id_paket" id="id_paket" class="form-control" value="<?= $soal_essay->id_paket; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    ID JENIS
                                </div>
                            </div>
                            <input type="text" name="id_jenis_soal" id="id_jenis_soal" class="form-control" value="JNS002" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><h3>Soal</h3></label>
                            <div>
                                <textarea id="textarea-ckeditor" name="pertanyaan"  class="ckeditor"></textarea>
                            </div>
                    </div>    
                    <br>
                    <div class="form-group">
                        <label><h3>Kunci Jawaban</h3></label>
                            <div>
                                <textarea id="textarea-ckeditor" name="kunci_jawaban"  class="ckeditor"></textarea></div>
                            </div>
                    </div>
                    <br>        
                    <div class="form-group">
                        <label><h3>Pembahasan</h3></label>
                            <div>
                                <textarea id="textarea-ckeditor" rows="2" name="pembahasan"  class="ckeditor"></textarea></div>
                            </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <a href="" class="btn btn-outline-secondary w-100"> Kembali </a>
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


</body>
</html>