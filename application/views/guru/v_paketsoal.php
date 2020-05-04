<!-- File ini berfungsi sebagai tampilan daftar pake soal dan tambah paket soal -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Paket Soal
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Paket Soal</li>
            </ol>
            <div class="row my-2">
                <div class="col-sm-12 col-md-4">
                    <a href="<?= base_url('/pilgan/');?>" class="btn btn-outline-success p-2">Tambah Paket Soal</a>
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
                                <table class="table table-bordered w-100" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Paket Soal</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Jurusan</th>
                                            <th>Pembuat</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $noUrut = 1;
                                            foreach($result_paket_soal as $paket) :
                                        ?>
                                            <tr>
                                                <td><?= $noUrut;?></td>
                                                <td><?= $paket->nama_paket;?></td>
                                                <td><?= $paket->mata_pelajaran;?></td>
                                                <td><?= $paket->jurusan;?></td>
                                                <td><?= $paket->nama_guru;?></td>
                                                <td><?= $paket->tgl_pembuatan;?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a href="" class="btn btn-success">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="" class="btn btn-primary">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto"></div>
                                                        <div class="col-auto"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
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