<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Edit Data Siswa
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin');?>">Dashboard</a></li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Edit Data Siswa</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/admin/aksiEditSiswa/');?>" method="post">
                                <?php
                                    foreach($tb_siswa as $siswa) :
                                ?>
                                    <div class="form-group">
                                        <label for="NISN"> NISN </label>
                                        <input type="text" name="NISN" id="NISN" class="form-control" value="<?= $siswa->NISN;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa </label>
                                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= $siswa->nama_siswa;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin"> Jenis Kelamin </label>
                                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?= $siswa->nama_siswa;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan"> Jurusan</label>
                                        <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $siswa->jurusan;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas"> Kelas</label>
                                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $siswa->kelas;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Semester"> Semester </label>
                                        <input type="text" name="semester" id="semester" class="form-control" value="<?= $siswa->semester;?>"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="username_siswa"> Username </label>
                                        <input type="text" name="username_siswa" id="username_siswa" class="form-control" value="<?= $siswa->username_siswa;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_siswa"> Password </label>
                                        <input type="text" name="password_siswa" id="password_siswa" class="form-control" value="<?= $siswa->password_siswa;?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?= base_url('tampilSiswa');?>" class="btn btn-outline-secondary p-2 w-100">Kembali</a>
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