<!DOCTYPE html>
<html lang="en">

<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
        <button type="button" class="btn btn-outline-primary"><?php echo anchor('admin/Admin/tambahdataGuru','Tambah Data Guru');?></button>
                               

<!-- Tabel Tampil Soal Essay -->
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Guru</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">NIP</th>
                                        <th class="text-center">Mata Pelajaran</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Nama Guru</th>
                                        <th width="150" class="text-center">Status</th>
                                        <th width="150" class="text-center">Username Guru</th>
                                        <th width="150" class="text-center">Password Guru</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($tb_guru as $guru) { ?>
                                            <tr>
                                                <td><?=$guru->NIPl?></td>
                                                <td><?=$guru->id_mapel?></td>
                                                <td><?=$guru->id_jurusanl?></td>
                                                <td><?=$guru->nama_guru?></td>
                                                <td><?=$guru->status?></td>
                                                <td><?=$guru->username_guru?></td>
                                                <td><?=$guru->password_guru?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success"><i class="fa fa-edit"><?php echo anchor('Admin/admin/editDataGuru/'.$guru->NIP,'Edit');?></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash"><?php echo anchor('Admin/admin/hapusDataGuru/'.$guru->NIP,'Hapus');?></i></button>
                                                <td>
                                            </tr>

                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </main>        
</div>            
</body>
</html>