<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Detail Paket Soal
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/pilgan/tampilPaket');?>">Paket Soal</a></li>
                <li class="breadcrumb-item active">Detail Paket Soal</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Detail Paket</span>
                        </div>
                        <div class="card-body">
                            <form>
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
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
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
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Jurusan
                                                        </div>
                                                    </div>
                                                    <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $row->jurusan;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            ID Mapel
                                                        </div>
                                                    </div>
                                                    <input type="text" name="id_mapel" id="id_mapel" class="form-control" value="<?= $row->id_mapel;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Mata Pelajaran
                                                        </div>
                                                    </div>
                                                    <input type="text" name="mapel" id="mapel" class="form-control" value="<?= $row->mata_pelajaran;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            NIP
                                                        </div>
                                                    </div>
                                                    <input type="text" name="NIP" id="NIP" class="form-control" value="<?= $row->NIP;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Nama Guru
                                                        </div>
                                                    </div>
                                                    <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?= $row->nama_guru;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Nama Paket
                                                        </div>
                                                    </div>
                                                    <input type="text" name="nama_paket" id="nama_paket" class="form-control" value="<?= $row->nama_paket;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Tanggal Pembuatan
                                                        </div>
                                                    </div>
                                                    <input type="text" name="tgl_pembuatan" id="tbl_pembuatan" class="form-control" value="<?= $row->tgl_pembuatan;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <a href="<?= base_url('/guru/pilgan/tampilPaket/');?>" class="btn btn-outline-secondary p-2"> Kembali </a>
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