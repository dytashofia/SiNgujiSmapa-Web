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
                            <form action="<?= base_url('/admin/Admin/aksiEditSiswa/');?>" method="post">
                                <?php
                                    foreach($data_siswa as $siswa) :
                                ?>
                                    <div class="form-group">
                                        <label for="NIS"> NIS </label>
                                        <input type="text" name="NIS" id="NIS" class="form-control" value="<?= $siswa->NIS;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa </label>
                                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= $siswa->nama_siswa;?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="jenis_kelamin"> Jenis Kelamin </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                                    <?php
                                                
                                                    if($siswa->jenis_kelamin == "Laki-Laki")
                                                    {
                                                        ?>
                                                            <option value="Laki-Laki" selected>Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <option value="Perempuan"selected>Perempuan</option>
                                                            <option value="Laki-laki">Laki-Laki</option>
                                                        <?php
                                                    }
                                                endforeach;
                                           ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="id_jurusan"> Jurusan </label>
                                        <select name="id_jurusan" id="id_jurusan" class="custom-select">
                                           <?php
                                                foreach($data_jurusan as $opt_jurusan) :
                                                    if($opt_jurusan->id_jurusan == $siswa->id_jurusan)
                                                    {
                                                        ?>
                                                            <option value="<?= $opt_jurusan->id_jurusan;?>" selected><?= $opt_jurusan->jurusan?></option>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <option value="<?= $opt_jurusan->id_jurusan;?>"><?= $opt_jurusan->jurusan;?></option>
                                                        <?php
                                                    }
                                                endforeach;
                                           ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas"> Kelas</label>
                                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $siswa->kelas;?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="semester"> Semester </label>
                                    <select name="semester" id="semester" class="custom-select">
                                    <?php
                                                
                                                    if($siswa->semester == "Genap")
                                                    {
                                                        ?>
                                                            <option value="Genap" selected>Genap</option>
                                                            <option value="Ganjil">Ganjil</option>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <option value="Ganjil"selected>Ganjil</option>
                                                            <option value="Genap">Genap</option>
                                                        <?php
                                                    }

                                           ?>
                                    </select> 
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>