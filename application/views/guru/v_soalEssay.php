<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Soal Essay</title>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
        <button type="button" class="btn btn-sm btn-warning"><?php echo anchor('guru/C_soalEssay/tambah_soalEssay','Tambah Soal');?></button>               
        <button type="reset" class="btn btn-sm btn-success" title="Import Soal" onclick="$('#modal-user-import').modal('show');">Import dari Excel</button>
                <div class="modal fade" id="modal-user-import" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h3 class="modal-title"></i>Import Soal</h3>
                            </div>
                            <!-- END Modal Header -->
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form action="detailsoal/import.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                <input type="hidden" value="" name="idgroup">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="example-hf-email">Import Soal</label>
                                    <div class="col-md-9">
                                        <input type="file" name="import"> 
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" name="upload" value="import" class="btn btn-sm btn-primary">Import Data</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- END Modal Body -->
                        </div>
                    </div>
                </div>
                <a href="" title="Export Soal" class="btn btn-sm btn-success">Export Ke Excel</a>

<!-- Tabel Tampil Soal Essay -->
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Soal Essay</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Id Soal</th>
                                        <th class="text-center">Id Paket</th>
                                        <th class="text-center">Id Jenis Soal</th>
                                        <th class="text-center">Soal</th>
                                        <th width="150" class="text-center">Kunci Jawaban</th>
                                        <th width="150" class="text-center">Pembahasan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($tb_soal as $essay) { ?>
                                            <tr>
                                                <td><?=$essay->id_soal?></td>
                                                <td><?=$essay->id_paket?></td>
                                                <td><?=$essay->jenis_soal?></td>
                                                <td><?=$essay->soal?></td>
                                                <td><?=$essay->jawaban_benar?></td>
                                                <td><?=$essay->pembahasan_soal?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success"><i class="fa fa-edit"><?php echo anchor('guru/pilgan/edit/'.$u->id_soal,'Edit');?></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash"><?php echo anchor('guru/pilgan/hapus/'.$u->id_soal,'Hapus');?></i></button>
                                                <td>
                                            </tr>

                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>