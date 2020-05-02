<!DOCTYPE html>
<html lang="en">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
        <button type="button" class="btn btn-sm btn-warning"><?php echo anchor('guru/pilgan/tambah','Tambah Soal');?></button>               
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
            

            <div class="card mb-4">
                <div class="card-body">
                <div class="table-responsive">
                <table id="example-datatable" class="soalpilihanganda table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center"></th>
                            <th class="">Id Soal</th>
                            <th class="">Id Paket</th>
                            <th class="">Pertanyaan</th>
                            <th width="150" class="text-center">Kunci Jawaban</th>
                            <th width="300" class="">Pembahasan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach($tb_soal as $u){ //mengganti variabel $admin menjadi variabel $ u pada view agar tidak tertukar 
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++; ?></td>
                                    <td><?php echo $u->id_soal ?></td>
                                    td
                                    <td><?php echo $u->pertanyaan ?></td>
									<td><?php echo $u->kunci_jawaban?></td>
                                    <td><?php echo $u->pembahasan ?></td>
									<td>
									<button type="button" class="btn btn-success"><i class="fa fa-edit"><?php echo anchor('guru/pilgan/edit/'.$u->id_soal,'Edit');//link ini bertrujuan untuk memanggil function edit dan berisi pengiriman data nik pada segment 3 nya
				 					// funtion anchor digunakan untukhyperlink ke halam lain misalnya karena edit berupa linkn ?></i></button>
							  		<button type="button" class="btn btn-danger"><i class="fa fa-trash"><?php echo anchor('guru/pilgan/hapus/'.$u->id_soal,'Hapus');//link ini bertrujuan untuk memanggil function hapus dan berisi pengiriman data nik pada segment 3 nya
                                      // funtion anchor digunakan untukhyperlink ke halam lain misalnya karena hapus berupa link ?></i></button>
                                    <td>
								</tr>
								<?php } ?>      
                    </tbody>
                </table>
       
<script src="js/pages/tablesDatatables.js"></script>
<script type="text/javascript">
    $(function () {
        TablesDatatables.init();
    });
</script>
</div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
</body>
</html>
