<!-- File ini berfungsi sebagai tampilan daftar pake soal dan tambah paket soal -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Nilai 
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Nilai</li>
            </ol>
            <div class="row my-2">
                <div class="col-sm-12 col-md-4">
                    <a href="<?= base_url('guru/crudnilai/tambah');?>" class="btn btn-outline-success p-2">Tambah Nilai</a>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-2"></i>
                           Nilai Siswa
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                        
                                                           <th class="text-center">No</th>
                                                            <th class="text-center">ID Nilai</th>
                                                            <th class="text-center" >ID Ujian</th>
                                                            <th class="text-center" >NIS</th>
                                                            <th class="text-center">Nama Siswa</th>
                                                            <th class="text-center">kelas</th>
                                                            <th class="text-center">Nilai</th>
                                                            <th class="text-center">Tanggal Nilai</th>
                                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $noUrut = 1;
                                            foreach($nilai as $n) :
                                        ?>
                                            <tr>
                                               <td class="text-center"><?= $noUrut;?></td>
                                                 <td class="text-center"><?= $n->id_nilai;?></td>
                                                <td class="text-center"><?= $n->id_ujian;?></td>
                                                 <td class="text-center"><?= $n->NIS;?></td>
                                                <td class="text-center"><?= $n->nama_siswa;?></td>
                                                <td class="text-center"><?= $n->kelas;?></td>
                                                <td class="text-center"><?= $n->nilai;?></td>
                                                <td class="text-center"><?= $n->tanggal_nilai;?></td>
                                                <td colspan="3">
                                
                                                    <div class="row justify-content-around mt-2">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" data-toggle="modal" data-target="#deletePaketModal<?=$n->id_nilai;?>" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?php echo base_url() ?>guru/crudnilai/edit/<?php echo $n->id_nilai ?>" class="btn btn-primary btn-sm">
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
        foreach($nilai as $row) :    
    ?>
        <!-- Modal -->
        <div class="modal fade" id="deletePaketModal<?= $row->id_nilai?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="deletePaketModalTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePaketModalTitle">Hapus Jurusan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-justify">Apakah anda yakin akan menghapus nilai dari<em><strong> <?= $row->nama_siswa;?></strong></em></h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Batal </button>
                        <a href="<?php echo base_url() ?>guru/crudnilai/hapus/<?php echo $row->id_nilai ?>" role="button" class="btn btn-success"> Ya </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        endforeach;
    ?>