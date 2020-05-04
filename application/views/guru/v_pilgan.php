<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Soal
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('pilgan/');?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url('pilgan/tampilPaket');?>">Paket Soal</a>
                </li>
                <li class="breadcrumb-item active">Tambah Soal</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Menu Tambah Soal</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="soal_pilgan_tab" data-toggle="tab" href="#tab_soal_pilgan" role="tab" aria-controls="tab_soal_pilgan" aria-selected="true"><i class="fas fa-list mr-2"></i>Soal Pilihan Ganda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="soal_essay_tab" data-toggle="tab" href="#tab_soal_essay" role="tab" aria-controls="tab_soal_essay" aria-selected="false"><i class="fas fa-align-justify mr-2"></i>Soal Essay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="soal_benarsalah_tab" data-toggle="tab" href="#tab_soal_benarsalah" role="tab" aria-controls="tab_soal_benarsalah" aria-selected="false"><i class="fas fa-check mr-2"></i>Soal Benar Salah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="soal_urut_tab" data-toggle="tab" href="#tab_soal_urut" role="tab" aria-controls="tab_soal_urut" aria-selected="false"><i class="fas fa-list-ol mr-2"></i>Soal Mengurutkan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tablSoal">
                                <div class="tab-pane fade show active" id="tab_soal_pilgan" role="tabpanel" aria-labelledby="soal_pilgan_tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Soal Pilihan Ganda
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-sm-12 col-md-4">
                                                    <a href="<?= base_url('guru/pilgan/tambah');?>" class="btn btn-outline-success">Tambah Soal</a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered w-100 display">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>Pertanyaan</td>
                                                            <td>Kunci Jawaban</td>
                                                            <td>Pembahasan</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $noUrut = 1;
                                                            foreach($tb_soal_pilgan as $soal) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $noUrut;?></td>
                                                                <td><?= $soal->pertanyaan;?></td>
                                                                <td><?= $soal->kunci_jawaban;?></td>
                                                                <td><?= $soal->pembahasan;?></td>
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
                                <div class="tab-pane fade" id="tab_soal_essay" role="tabpanel" aria-labelledby="soal_essay_tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Soal Essay
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered w-100 display">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>Pembuat</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_soal_benarsalah" role="tabpanel" aria-labelledby="soal_benarsalah_tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Soal Benar Salah
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered w-100 display">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>Pembuat</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_soal_urut" role="tabpanel" aria-labelledby="soal_urut_tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Soal Mengurutkan
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered w-100 display">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

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