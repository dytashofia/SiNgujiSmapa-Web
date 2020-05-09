<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Paket Soal
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/pilgan/tampilPaket');?>">Paket Soal</a></li>
                <li class="breadcrumb-item active">Tambah Paket Soal</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Tambah Paket</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/guru/pilgan/aksiEditPaket/');?>" method="post">
                                <?php
                                    foreach($data_paket as $row) :
                                ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Paket
                                                </div>
                                            </div>
                                            <input type="text" name="id_paket" id="id_paket" class="form-control" value="<?= $row->id_paket;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Jurusan
                                                </div>
                                            </div>
                                            <input type="text" name="id_jurusan" id="id_jurusan" class="form-control" value="<?= $row->id_jurusan;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_mapel"> Mata Pelajaran </label>
                                        <select name="id_mapel" id="id_mapel" class="custom-select">
                                           <?php
                                                foreach($data_mapel as $opt_mapel) :
                                                    if($opt_mapel->id_mapel == $row->id_mapel)
                                                    {
                                                        ?>
                                                            <option value="<?= $opt_mapel->id_mapel;?>" selected><?= $opt_mapel->mata_pelajaran;?></option>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <option value="<?= $opt_mapel->id_mapel;?>"><?= $opt_mapel->mata_pelajaran;?></option>
                                                        <?php
                                                    }
                                                endforeach;
                                           ?>
                                        </select>
                                        <?= form_error('id_mapel','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_paket"> Nama Paket </label>
                                        <input type="text" name="nama_paket" id="nama_paket" class="form-control" value="<?= $row->nama_paket;?>">
                                        <?= form_error('nama_paket','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>
                                    <input type="hidden" name="NIP" id="NIP" value="<?= $row->NIP;?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?= base_url('/guru/pilgan/tampilPaket/');?>" class="btn btn-outline-secondary p-2 w-100">Kembali</a>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <button type="submit" class="btn btn-primary p-2 w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>