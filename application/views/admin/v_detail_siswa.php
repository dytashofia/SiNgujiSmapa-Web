<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Detail Data Siswa
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin/Admin/');?>">Dashboard</a></li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Detail Siswa</span>
                        </div>
                        <div class="card-body">
                            <form>
                                <?php
                                    foreach($data_siswa as $row) :
                                ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    NIS
                                                </div>
                                            </div>
                                            <input type="text" name="NIS" id="NIS" class="form-control" value="<?= $row->NIS;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Nama Siswa
                                                        </div>
                                                    </div>
                                                    <input type="text" name="Nama Siswa" id="Nama Siswa" class="form-control" value="<?= $row->nama_siswa;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Jenis Kelamin
                                                        </div>
                                                    </div>
                                                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin;?>" readonly>
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
                                                            Kelas
                                                        </div>
                                                    </div>
                                                    <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $row->kelas;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Semester
                                                        </div>
                                                    </div>
                                                    <input type="text" name="semester" id="semester" class="form-control" value="<?= $row->semester;?>" readonly>
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
                                                            Username
                                                        </div>
                                                    </div>
                                                    <input type="text" name="password_siswa" id="password_siswa" class="form-control" value="<?= $row->username_siswa;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    <div class="row">  
                                    <div class="from-group">
                                        <a href="<?= base_url('admin/Admin/tampilSiswa');?>" class="btn btn-outline-secondary p-2"> Kembali </a>
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