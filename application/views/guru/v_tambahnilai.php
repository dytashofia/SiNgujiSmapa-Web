<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i> Tambah Nilai
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>guru/crudnilai/tampil/">NIilai</a></li>
                <li class="breadcrumb-item active">Tambah Nilai</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Tambah Nilai</span>
                        </div>
                        <div class="card-body">

                        
                            <form action="<?php echo base_url().'guru/crudnilai/tambah_aksi';?>"method="post">
                               
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Nilai
                                                </div>
                                            </div>
                                            <input type="text" name="id_nilai" id="id_nilai" class="form-control" value="<?= $id_nilai;?>" readonly>
                                        </div>
                                    </div>

                          <div class="form-group">
                                    <label for="id_mapel"> ID ujian </label>
                                    <select name="id_ujian" id="id_ujian" class="custom-select">
                                        <option value=""> Pilih id_ujian </option>
                                       <?php
                                            foreach($id_ujian as $u) :
                                        ?>
                                            <option value="<?= $u->id_ujian;?>"><?= $u->id_ujian;?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                    </select>
                                    <?= form_error('id_mapel','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                </div>

                                      <div class="form-group">
                                        <label for="nama_paket"> NIS </label>
                                     <select name="NIS" id="NIS" class="custom-select">
                                        <option value=""> Pilih NIS </option>
                                       <?php
                                            foreach($NIS as $N) :
                                        ?>
                                            <option value="<?= $N->NIS;?>"><?= $N->NIS;?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                    </select>
                                        <?= form_error('nama_paket','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>
                                


                              <div class="form-group">
                                        <label for="nama_paket"> Nilai </label>
                                        <input type="text" name="nilai" id="nilai" class="form-control" placeholder="Masukkan Nilai...">
                                        <?= form_error('nama_paket','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>

                           <div class="form-group">
                                        <label for="nama_paket"> Tanggal Nilai </label>
                                        <input type="date" name="tanggal_nilai" id="tanggal_niali" class="form-control" placeholder="Masukkan Tanggal Nilai...">
                                        <?= form_error('nama_paket','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>

                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?php echo base_url('nilai'); ?>"class="btn btn-outline-secondary p-2 w-100">Kembali</a>
                                            </div>
                                              <div class="col-sm-12 col-md-2">
                                                <button type="submit" class="btn btn-primary p-2 w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                              
                                
                            </form>
                              
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>