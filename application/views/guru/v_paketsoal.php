<!-- File ini berfungsi sebagai tampilan daftar pake soal dan tambah paket soal -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Paket Soal
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Paket Soal</li>
            </ol>
            <div class="row my-2">
                <div class="col-sm-12 col-md-4">
                    <a href="<?= base_url('tambahPaket');?>" class="btn btn-outline-success p-2">Tambah Paket Soal</a>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-2"></i>
                            Paket Soal
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Paket Soal</th>
                                            <th class="text-center">Mata Pelajaran</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center" colspan="2">Pembuat</th>
                                            <th class="text-center">Tanggal Pembuatan</th>
                                            <th class="text-center" colspan="3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $noUrut = 1;
                                            foreach($result_paket_soal as $paket) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $noUrut;?></td>
                                                <td class="text-center"><?= $paket->nama_paket;?></td>
                                                <td class="text-center"><?= $paket->mata_pelajaran;?></td>
                                                <td class="text-center"><?= $paket->jurusan;?></td>
                                                <td colspan="2"><?= $paket->nama_guru;?></td>
                                                <td class="text-center"><?= $paket->tgl_pembuatan;?></td>
                                                <td colspan="3">
                                                    <div class="row justify-content-around mt-2">
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?= base_url('soal/'.$paket->id_paket);?>" class="btn btn-info btn-sm">
                                                                <i class="fas fa-clipboard-list"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?= base_url('detailPaket/'.$paket->id_paket);?>" class="btn btn-success btn-sm">
                                                                <i class="fas fa-info-circle"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-around mt-2">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" data-toggle="modal" data-target="#deletePaketModal<?=$paket->id_paket;?>" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?= base_url('editPaket/'.$paket->id_paket);?>" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
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
    </main>
    <?php
        foreach($result_paket_soal as $row) :    
    ?>
        <!-- Modal -->
        <div class="modal fade" id="deletePaketModal<?= $row->id_paket?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="deletePaketModalTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePaketModalTitle">Hapus Paket Soal</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-justify">Apakah anda yakin akan menghapus paket soal <em><strong><?= $row->nama_paket;?></strong></em></h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Batal </button>
                        <a href="<?= base_url('hapusPaket/'.$row->id_paket);?>" role="button" class="btn btn-success"> Ya </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        endforeach;
    ?>
