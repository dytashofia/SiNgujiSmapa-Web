<!DOCTYPE html>
<html lang="en">
<div id="layoutSidenav_content">
    <main>
    <form>
        <div class="container-fluid">
        <h1>
            <i class="fa fa-table"></i>Edit Soal Essay
        <div class="block full">
        <form action="<?php echo base_url().'guru/C_soalEssay/edit_soalEssay';?>" method="post">
        <div class="card-body p-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">ID SOAL </span>
                <input type="text" name="id_soal">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">ID paket </span>
                <input type="text" name="id_paket">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">ID Jenis Soal </span>
                <input type="text" name="id_jenis_soal">
                </div>
            </div>
<body>
    <h1>Edit Soal Essay</h1>

    <div class="form-group">
            <label><h3>Soal</h3></label>
            <div>
            <textarea id="textarea-ckeditor" name="soal"  class="ckeditor"></textarea>
            </div>
    </div>    
<br>
    <div class="form-group">
            <label><h3>Kunci Jawaban</h3></label>
            <div>
            <textarea id="textarea-ckeditor" name="soal"  class="ckeditor"></textarea></div>
            </div>
        </div>
<br>        
        <div class="form-group">
            <label><h3>Pembahasan</h3></label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="pembahasan"  class="ckeditor"></textarea></div>
        </div>
        <br>
        <div class="form-group form-actions">
             <div class="modal-footer">
                <button type="button" class="btn btn-warning ml-2"><?php echo anchor('guru/C_soalEssay/index/','Kembali');?></button>
                <input type="submit" value="Tambah" class="btn btn-primary font-m-med">
            </div>
        </div>

<script src="<?php echo base_url('assets/ckeditor/ckeditor.js')?>"></script>        


</body>
</html>