<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Soal
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin');?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Menu Tambah Siswa</li>
            </ol>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Master Siswa
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-sm-12 col-md-4">
                                                    <a href="<?= base_url('tambahsiswa');?>" class="btn btn-outline-success">Tambah Siswa</a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered w-100 display">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>NIS</td>
                                                            <td>Nama Siswa</td>
                                                            <td>Jenis Kelamin</td>
                                                            <td>Jurusan</td>
                                                            <td>Kelas</td>
                                                            <td>Semester</td>
                                                            <td>Foto</td>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $noUrut = 1;
                                                            foreach($tb_siswa as $siswa) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $noUrut;?></td>
                                                                <td><?= $siswa->NIS;?></td>
                                                                <td><?= $siswa->nama_siswa;?></td>
                                                                <td><?= $siswa->jenis_kelamin;?></td>
                                                                <td><?= $siswa->jurusan;?></td>
                                                                <td><?= $siswa->kelas;?></td>
                                                                <td><?= $siswa->semester;?></td>
                                                                <td><?= $siswa->foto_siswa;?></td>
                                                                <td>
                                                                <div class="row justify-content-around mt-2">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <a href="<?= base_url('editSiswa/'.$siswa->NIS);?>" class="btn btn-primary btn-sm">
                                                                            <i class="fas fa-pen"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <button type="button" data-toggle="modal" data-target="#deletePaketModal<?=$siswa->NIS;?>" class="btn btn-danger btn-sm">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $noUrut++;
                                                            endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        foreach($tb_siswa as $row) :    
    ?>
        <!-- Modal -->
        <div class="modal fade" id="deletePaketModal<?= $row->NIS?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="deletePaketModalTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePaketModalTitle">Hapus Data Siswa</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-justify">Apakah anda yakin akan menghapus Data Siswa <em><strong><?= $row->nama_siswa;?></strong></em></h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Batal </button>
                        <a href="<?= base_url('hapusPaket/'.$row->NIS);?>" role="button" class="btn btn-success"> Ya </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        endforeach;
    ?>