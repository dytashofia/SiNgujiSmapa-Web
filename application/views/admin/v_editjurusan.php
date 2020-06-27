<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i> Edit Jurusan
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/crudjurusan/tampil/">Jurusan</a></li>
                <li class="breadcrumb-item active">Edit Jurusan</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Edit Jurusan</span>
                        </div>
                        <div class="card-body">

                        
                            <form action="<?php echo base_url().'admin/crudjurusan/update';?>"method="post">
                                <?php foreach($jurusan as $j){ ?>
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Jurusan
                                                </div>
                                            </div>
                                            <input type="text" name="id_jurusan" id="id_jurusan" class="form-control" value="<?= $j->id_jurusan;?>" readonly>
                                        </div>
                                    </div>
                           <div class="form-group">
                                        <label for="nama_paket"> Nama Jurusan </label>
                                        <input type="text" name="jurusan" id="jurusant" class="form-control" value="<?= $j->jurusan;?>">
                                        <?= form_error('nama_paket','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>

                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?php echo base_url('jurusan'); ?>"class="btn btn-outline-secondary p-2 w-100">Kembali</a>
                                            </div>
                                              <div class="col-sm-12 col-md-2">
                                                <button type="submit" class="btn btn-primary p-2 w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                              <?php } ?>
                                
                            </form>
                              
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>