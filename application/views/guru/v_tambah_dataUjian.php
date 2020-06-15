<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2 mt-4"></i>Tambah Data Ujian
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/setUjian/tampilDujian'); ?>">Data Ujian</a></li>
                <li class="breadcrumb-item active">Tambah Data Ujian</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Tambah Ujian</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/guru/setUjian/aksiTambahDujian'); ?>" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                ID Ujian
                                            </div>
                                        </div>
                                        <input type="text" name="id_ujian" id="id_ujian" class="form-control" value="<?= $id_ujian; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                NIP
                                            </div>
                                        </div>
                                        <input type="text" name="nip" id="nip" class="form-control" value="<?= $_SESSION['nip']; ?>" readonly>
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
                                            if ($mapel->id_mapel == $_SESSION['id_mapel']) {
                                                echo '<input type="text" name="" id="" class="form-control" value="' . $mapel->mata_pelajaran . '" readonly>';
                                            }
                                        }

                                        ?>
                                        <input type="hidden" name="id_mapel" id="id_mapel" class="form-control" value="<?= $_SESSION['id_mapel']; ?>" readonly>
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
                                            if ($jurusan->id_jurusan == $_SESSION['id_jurusan']) {
                                                echo '<input type="text" name="" id="" class="form-control" value="' . $jurusan->jurusan . '" readonly>';
                                            }
                                        }

                                        ?>
                                        <input type="hidden" name="id_jurusan" id="id_jurusan" class="form-control" value="<?= $_SESSION['id_jurusan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis"> Jenis Soal </label>
                                    <select name="id_jenis_soal" id="id_jenis_soal" class="custom-select">
                                        <option value=""> Pilih Jenis Soal </option>
                                        <?php
                                        foreach ($jenis_soal as $detailJenis) :
                                        ?>
                                            <option value="<?= $detailJenis->id_jenis_soal; ?>"><?= $detailJenis->jenis; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?= form_error('id_jenis_soal', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis"> Tipe Ujian</label>
                                    <select name="id_tipe" id="id_tipe" class="custom-select">
                                        <option value=""> Pilih Tipe Ujian </option>
                                        <?php
                                        foreach ($tipe as $detailTipe) :
                                        ?>
                                            <option value="<?= $detailTipe->id_tipe; ?>"><?= $detailTipe->tipe_ujian; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?= form_error('id_tipe', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_soal"> Jumlah Soal </label>
                                    <input type="number" name="jumlah_soal" id="jumlah_soal" class="form-control" placeholder="Masukkan jumlah soal...">
                                    <?= form_error('jumlah_soal', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="wkatu_mengerjakan"> Waktu Mengerjakan </label>
                                    <input type="number" name="wkatu_mengerjakan" id="wkatu_mengerjakan" class="form-control" placeholder="Masukkan Waktu Mengerjakan...">
                                    <?= form_error('wkatu_mengerjakan', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="wkatu_mulai"> Waktu Mulai </label>
                                    <input type="number" name="wkatu_mulai" id="wkatu_mulai" class="form-control" placeholder="Masukkan Waktu mulai...">
                                    <?= form_error('wkatu_mulai', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="token_soal"> Token Ujian </label>
                                    <input type="text" name="token_soal" id="token_soal" class="form-control" placeholder="Masukkan TOKEN UJIAN...">
                                    <?= form_error('token_soal', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status"> Status</label>
                                    <select name="status" id="status" class="custom-select">
                                        <option value=""> Aktif </option>
                                        <option value=""> Non - Aktif </option>
                                    </select>
                                    <?= form_error('id_tipe', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-2">
                                            <a href="<?= base_url('guru/setUjian/tampilDujian'); ?>" class="btn btn-outline-secondary p-2 w-100"> Kembali </a>
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