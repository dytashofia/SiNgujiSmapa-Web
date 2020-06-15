<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2 mt-4"></i>Detail Data Ujian
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/setUjian/tampilDujian'); ?>">Data Ujian</a></li>
                <li class="breadcrumb-item active">Detail Data Ujian</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Detail Ujian</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/guru/setUjian/aksiEditUjian'); ?>" method="post">
                                <?php
                                foreach ($data_ujian as $row) :
                                ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Ujian
                                                </div>
                                            </div>
                                            <input type="text" name="id_ujian" id="id_ujian" class="form-control" value="<?= $row->id_ujian; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    NIP
                                                </div>
                                            </div>
                                            <input type="text" name="nip" id="nip" class="form-control" value="<?= $row->NIP; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Mapel
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($nama_mapel as $mapel) {
                                                if ($mapel->id_mapel == $row->id_mapel) {
                                                    echo '<input type="text" name="" id="" class="form-control" value="' . $mapel->mata_pelajaran . '" readonly>';
                                                }
                                            }

                                            ?>
                                            <input type="hidden" name="id_mapel" id="id_mapel" class="form-control" value="<?= $row->id_mapel; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    ID Jurusan
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($nama_jurusan as $jurusan) {
                                                if ($jurusan->id_jurusan == $row->id_jurusan) {
                                                    echo '<input type="text" name="" id="" class="form-control" value="' . $jurusan->jurusan . '" readonly>';
                                                }
                                            }

                                            ?>
                                            <input type="hidden" name="id_jurusan" id="id_jurusan" class="form-control" value="<?= $row->id_jurusan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Jenis Soal
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($nama_jenis as $jenis) {
                                                if ($jenis->id_jenis_soal == $row->id_jenis_soal) {
                                                    echo '<input type="text" name="" id="" class="form-control" value="' . $jenis->jenis . '" readonly>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Tipe Ujian
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($tipe_ujian as $tipe) {
                                                if ($tipe->id_tipe == $row->id_tipe) {
                                                    echo '<input type="text" name="" id="" class="form-control" value="' . $tipe->tipe_ujian . '" readonly>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Jumlah Soal
                                                </div>
                                            </div>
                                            <input type="number" name="jumlah_soal" id="jumlah_soal" class="form-control" value="<?= $row->jumlah_soal; ?>" placeholder="Masukkan jumlah soal..." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Waktu Mengerjakan
                                                </div>
                                            </div>
                                            <input type="number" name="wkatu_mengerjakan" id="wkatu_mengerjakan" class="form-control" value="<?= $row->waktu_mengerjakan; ?>" placeholder="Masukkan Waktu Mengerjakan..." readonly>
                                            <?= form_error('wkatu_mengerjakan', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Waktu Mulai
                                                </div>
                                            </div>
                                            <input type="number" name="wkatu_mulai" id="wkatu_mulai" class="form-control" value="<?= $row->waktu_mulai; ?>" placeholder="Masukkan Waktu mulai..." readonly>
                                            <?= form_error('wkatu_mulai', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Token Soal
                                                </div>
                                            </div>
                                            <input type="text" name="token_soal" id="token_soal" class="form-control" value="<?= $row->token_soal; ?>" placeholder=" Masukkan TOKEN UJIAN..." readonly>
                                            <?= form_error('token_soal', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Status Ujian
                                                </div>
                                            </div>
                                            <input type="text" name="token_soal" id="token_soal" class="form-control" value="<?= $row->status_ujian; ?>" placeholder=" Masukkan TOKEN UJIAN..." readonly>
                                            <?= form_error('id_tipe', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?= base_url('guru/setUjian/tampilDujian'); ?>" class="btn btn-outline-secondary p-2 w-100"> Kembali </a>
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