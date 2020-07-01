<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Data Guru
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin/Admin/');?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Menu Tambah Guru</li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Tambah Data Guru</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/Admin/aksiTambah_guru/');?>" method="post">
                                    <div class="form-group">
                                        <label for="NIP"> NIP </label>
                                        <input type="text" name="NIP" id="NIP" class="form-control" value="<?= set_value('NIP'); ?>" placeholder="Masukkan NIP Guru">
                                        <?= form_error('NIP', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                    <label for="id_mapel"> Mata Pelajaran </label>
                                    <select name="id_mapel" id="id_mapel" class="custom-select">
                                        <option value=""> Pilih Mata Pelajaran </option>
                                        <?php
                                        foreach ($mata_pelajaran as $detailMapel) :
                                        ?>
                                            <option value="<?= $detailMapel->id_mapel; ?>"><?= $detailMapel->mata_pelajaran; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?= form_error('id_mapel', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                    <label for="id_mapel"> Jurusan </label>
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
                                        <label for="kelas"> Nama Guru</label>
                                        <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?= set_value('nama_guru'); ?>" placeholder="Masukkan Nama ......" >
                                    </div>
                                    <div class="form-group">
                                        <label for="status"> Status </label>
                                        <select name="status" id="status" class="custom-select">
                                            <option value=""> Pilih Status Anda </option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Guru">Guru</option>
                                        </select>
                                        <?= form_error('Administrator', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="username_guru"> Username Guru </label>
                                        <input type="text" name="username_guru" id="username_guru" class="form-control" value="<?= set_value('username_guru'); ?>" placeholder="Masukkan Username ..." >
                                        <?= form_error('username_guru', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_guru"> Password Guru </label>
                                        <input type="text" name="password_guru" id="password_guru" class="form-control" value="<?= set_value('password_guru'); ?>" placeholder="Masukkan Password ..." >
                                        <?= form_error('password_guru', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="foto_guru"> Foto Guru </label>
                                        <div class="custom-file mb-5 ">
                                            <input type="file" name="foto_guru" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept=".jpg, .jpeg, .png"value="<?= set_value('foto_guru'); ?>" >
                                            <label class="custom-file-label" for="inputGroupFile01">Unggah Foto Guru</label>
                                            <p class="form-text text-muted"> Silakan Unggah Foto Disini </p>
                                        </div>
                                        <?= form_error('foto_guru', '<small class="text-form text-danger mt-2 ml-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2">
                                                <a href="<?= base_url('admin/Admin/tampilDataGuru');?>" class="btn btn-outline-secondary p-2 w-100">Kembali</a>
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