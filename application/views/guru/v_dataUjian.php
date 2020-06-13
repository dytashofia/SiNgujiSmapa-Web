<!-- File ini berfungsi sebagai tampilan daftar pake soal dan tambah paket soal -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="my-4">
                <i class="fa fa-table mr-2"></i>Daftar Data Ujian
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('guru'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Ujian</li>
            </ol>
            <div class="row my-2">
                <div class="col-sm-12 col-md-4">
                    <a href="<?= base_url('guru/setUjian/tambahDujian'); ?>" class="btn btn-outline-success p-2">Tambah Data Ujian</a>
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
                                            <th class="text-center">Token</th>
                                            <th class="text-center">Group Soal</th>
                                            <th class="text-center">Mapel</th>
                                            <th class="text-center">Waktu Mengerjkan</th>
                                            <th class="text-center">Waktu Mulai</th>
                                            <th class="text-center">Jumlah Soal</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $noUrut = 1;
                                        foreach ($result_set_ujian as $paket) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $noUrut; ?></td>
                                                <td class="text-center"><?= $paket->token_soal; ?></td>
                                                <td class="text-center"><?= $paket->id_jenis_soal; ?></td>
                                                <td class="text-center"><?= $paket->id_mapel; ?></td>
                                                <td class="text-center"><?= $paket->waktu_mengerjakan; ?> Menit</td>
                                                <td class="text-center"><?= $paket->waktu_mulai; ?></td>
                                                <td class="text-center"><?= $paket->jumlah_soal; ?> Soal</td>
                                                <td class="text-center">
                                                    <?php if ($paket->status_ujian == 'Aktif') {
                                                        echo '<span class="badge badge-primary">Aktif</span>';
                                                    } else {
                                                        echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                                    } ?></td>

                                                <td colspan="3">
                                                    <div class="row justify-content-around mt-2">
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?= base_url('soal/' . $paket->id_ujian); ?>" class="btn btn-info btn-sm">
                                                                <i class="fas fa-clipboard-list"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?= base_url('detailPaket/' . $paket->id_ujian); ?>" class="btn btn-success btn-sm">
                                                                <i class="fas fa-info-circle"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-around mt-2">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" data-toggle="modal" data-target="#deletePaketModal<?= $paket->id_ujian; ?>" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <a href="<?= base_url('editPaket/' . $paket->id_ujian); ?>" class="btn btn-primary btn-sm">
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
    foreach ($result_set_ujian as $row) :
    ?>
        <!-- Modal -->
        <div class="modal fade" id="deletePaketModal<?= $row->id_ujian ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="deletePaketModalTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePaketModalTitle">Hapus Data Ujian</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-justify">Apakah anda yakin akan menghapus data ujian <em><strong><?= $row->id_ujian; ?></strong></em></h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Batal </button>
                        <a href="<?= base_url('guru/setUjian/hapusDujian/' . $row->id_ujian); ?>" role="button" class="btn btn-success"> Ya </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>