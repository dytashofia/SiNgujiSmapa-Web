<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Edit Data Guru
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin/Admin/');?>">Dashboard</a></li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Edit Data Guru</span>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/Admin/aksiEditGuru/');?>" method="post">
                                <?php
                                    foreach($data_guru as $guru) :
                                ?>
                                    <div class="form-group">
                                        <label for="NIP"> NIP </label>
                                        <input type="text" name="NIP" id="NIP" class="form-control" value="<?= $guru->NIP;?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="id_mapel"> Mata Pelajaran </label>
                                        <select name="id_mapel" id="id_mapel" class="custom-select">
                                           <?php
                                                foreach($data_mapel as $opt_dataMapel) :
                                                    if($opt_dataMapel->id_mapel == $guru->id_mapel)
                                                    {
                                                        ?>
                                                            <option value="<?= $opt_dataMapel->id_mapel;?>" selected><?= $opt_dataMapel->mata_pelajaran?></option>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <option value="<?= $opt_dataMapel->id_mapel;?>"><?= $opt_dataMapel->mata_pelajaran;?></option>
                                                        <?php
                                                    }
                                                endforeach;
                                           ?>
                                        </select>
                                        <?= form_error('id_mapel','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
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
                                        <?= form_error('id_jurusan','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_guru"> Nama Guru </label>
                                        <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?= $guru->nama_guru;?>">
                                        <?= form_error('kelas','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>
                                    <div class="form-group">
                                    <label for="status"> Status </label>
                                    <select name="status" id="status" class="custom-select">
                                    <?php
                                                
                                                    if($guru->status == "Administrator")
                                                    {
                                                        ?>
                                                            <option value="Administrator" selected> Administrator </option>
                                                            <option value="Guru">Guru</option>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <option value="Guru"selected>Guru</option>
                                                            <option value="Administrator">Administrator</option>
                                                        <?php
                                                    }

                                           ?>
                                    </select> 
                                    <?= form_error('semester','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="username_guru"> Username Guru </label>
                                        <input type="text" name="username_guru" id="username_guru" class="form-control" value="<?= $guru->username_guru;?>">
                                        <?= form_error('username_guru','<small class="text-form text-danger mt-2 ml-2">','</small>');?>
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
                                                <?php endforeach; ?>                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>