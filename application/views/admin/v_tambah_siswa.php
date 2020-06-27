<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Data Siswa
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin/Admin/');?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Menu Tambah Siswa</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Tambah Data Siswa</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/Admin/aksiTambahSiswa/');?>" method="post">
                                    <div class="form-group">
                                        <label for="NIS"> NIS </label>
                                        <input type="text" name="NIS" id="NIS" class="form-control" value="<?= set_value('NIS'); ?>" placeholder="Masukkan NIS...">
                                        <?= form_error('NIS', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa </label>
                                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= set_value('nama_siswa'); ?>" placeholder="Masukkan Nama Siswa...">
                                    </div>
                                    <div class="form-group">
                                    <label for="jenis_kelamin"> Jenis Kelamin </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                                        <option value=""> Pilih Jenis Kelamin </option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                    <label for="id_jurusan"> Jurusan </label>
                                    <select name="id_jurusan" id="id_jurusan" class="custom-select">
                                        <option value=""> Pilih Jurusan </option>
                                        <?php
                                        foreach ($jurusan as $detailJurusan) :
                                        ?>
                                            <option value="<?= $detailJurusan->id_jurusan; ?>"><?= $detailJurusan->jurusan; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?= form_error('id_jurusan', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas"> Kelas</label>
                                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= set_value('kelas'); ?>" placeholder="Masukkan Kelas..." >
                                    </div>
                                    <div class="form-group">
                                        <label for="semester"> Semester </label>
                                        <select name="semester" id="semester" class="custom-select">
                                            <option value=""> Pilih Semester saat ini </option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                        <?= form_error('semester', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="username_siswa"> Username </label>
                                        <input type="text" name="username_siswa" id="username_siswa" class="form-control" value="<?= set_value('username_siswa'); ?>" placeholder="Masukkan username ..." >
                                        <?= form_error('username_siswa', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_siswa"> Password </label>
                                        <input type="text" name="password_siswa" id="password_siswa" class="form-control" value="<?= set_value('password_siswa'); ?>" placeholder="Masukkan Password ..." >
                                        <?= form_error('password_siswa', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto_siswa"> Foto Siswa </label>
                                        <div class="custom-file mb-5 ">
                                            <input type="file" name="foto_siswa" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept=".jpg, .jpeg, .png"value="<?= set_value('foto_siswa'); ?>" >
                                            <label class="custom-file-label" for="inputGroupFile01">Unggah Foto Siswa</label>
                                            <p class="form-text text-muted"> Silakan Unggah Foto Disini </p>
                                        </div>
                                        <?= form_error('foto_siswa', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?= base_url('admin/Admin/tampilSiswa');?>" class="btn btn-outline-secondary p-2 w-100">Kembali</a>
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