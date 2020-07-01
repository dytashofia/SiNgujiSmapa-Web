<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Guru
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/Admin');?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Menu Guru</li>
            </ol>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Master Data Guru
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-sm-12 col-md-4">
                                                    <a href="<?= base_url('admin/Admin/tambahdataGuru');?>" class="btn btn-outline-success">Tambah Data Guru</a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered w-100 display">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>NIP</td>
                                                            <td>Mata Pelajaran</td>
                                                            <td>Jurusan</td>
                                                            <td>Nama Guru</td>
                                                            <td>Status</td>
                                                            <td>Foto</td>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $noUrut = 1;
                                                            foreach($tb_guru as $guru) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $noUrut ?></td>
                                                                <td><?= $guru->NIP;?></td>
                                                                <td><?= $guru->mata_pelajaran;?></td>
                                                                <td><?= $guru->jurusan;?></td>
                                                                <td><?= $guru->nama_guru;?></td>
                                                                <td><?= $guru->status?></td>
                                                                <td><?= $guru->foto_guru;?></td>
                                                                <td>
                                                                <div class="row justify-content-around mt-2">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <a href="<?= base_url('admin/Admin/detailGuru/'.$guru->NIP);?>" class="btn btn-info btn-sm">
                                                                            <i class="fas fa-info-circle"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <a href="<?= base_url('admin/Admin/editDataGuru/'.$guru->NIP);?>" class="btn btn-primary btn-sm">
                                                                            <i class="fas fa-pen"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                    <div class="row justify-content-around mt-2">
                                                                        <div class="col-sm-12 col-md-6">
                                                                            <button type="button" data-toggle="modal" data-target="#deletePaketModal<?=$guru->NIP;?>" class="btn btn-danger btn-sm">
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
        foreach($tb_guru as $row) :    
    ?>
        <!-- Modal -->
        <div class="modal fade" id="deletePaketModal<?= $row->NIP?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="deletePaketModalTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePaketModalTitle">Hapus Data Guru</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-justify">Apakah anda yakin akan menghapus Data Guru <em><strong><?= $row->nama_guru;?></strong></em></h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Batal </button>
                        <a href="<?= base_url('admin/Admin/hapusDataGuru/'.$row->NIP);?>" role="button" class="btn btn-success"> Ya </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        endforeach;
    ?>