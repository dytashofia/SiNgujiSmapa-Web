<!DOCTYPE html>
<html lang="en">
<div id="layoutSidenav_content">
    <main>
    <form>
        <div class="container-fluid">
        <h1>
            <i class="fa fa-table"></i>Tambah Soal Pilihan Ganda
        </h1>
        <div class="block full">
        <form action="<?php echo base_url().'guru/pilgan/tambah_aksi';?>" method="post">
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
                <span class="input-group-text">ID jenis soal </span>
                <input type="text" name="id_jenis_soal">
                </div>
            </div>

        <div class="form-group">
            <label>Pertanyaan</label>
            <div>
            <textarea id="textarea-ckeditor" name="pertanyaan"  class="ckeditor"></textarea></div>
        </div>
        <div class="form-group">
            <label>Pilihan A</label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="opsi_a"  class="ckeditor"></textarea></div>
        </div>
        <div class="form-group">
            <label>Pilihan B</label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="opsi_b"  class="ckeditor"></textarea></div>
        </div>
        <div class="form-group">
            <label>Pilihan C</label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="opsi_c"  class="ckeditor"></textarea></div>
        </div>
        <div class="form-group">
            <label>Pilihan D</label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="opsi_d"  class="ckeditor"></textarea></div>
        </div>
        <div class="form-group">
            <label>Pilihan E</label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="opsi_e"  class="ckeditor"></textarea></div>
        </div>
        <div class="form-group">
            <label>Kunci Jawaban</label>
            <div>
                <select name="kunci_jawaban" class="form-control">
                    <option value="a">pilihan A</option>
                    <option value="b">Pilihan B</option>
                    <option value="c">Pilihan C</option>
                    <option value="d">Pilihan D</option>
                    <option value="e">Pilihan E</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Pembahasan</label>
            <div>
            <textarea id="textarea-ckeditor" rows="2" name="pembahasan"  class="ckeditor"></textarea></div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-warning ml-2"><?php echo anchor('guru/pilgan/index/','Kembali');?></button>
        <input type="submit" value="Tambah" class="btn btn-primary font-m-med">
        </div>
            
</div>
<script src="<?php echo base_url();?>/js/helpers/ckeditor/ckeditor.js"></script>
</form>