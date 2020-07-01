<!-- File ini berfungsi sebagai tampilan input soal pilihan ganda -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Detail Data Guru
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('admin/Admin/');?>">Dashboard</a></li>
            </ol>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="text-muted">Detail Guru</span>
                        </div>
                        <div class="card-body">
                            <form>
                                <?php
                                    foreach($data_guru as $row) :
                                ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    NIP
                                                </div>
                                            </div>
                                            <input type="text" name="NIP" id="NIP" class="form-control" value="<?= $row->NIP;?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Nama Guru
                                                        </div>
                                                    </div>
                                                    <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?= $row->nama_guru;?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Status
                                                        </div>
                                                    </div>
                                                    <input type="text" name="status" id="status" class="form-control" value="<?= $row->status;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
     
                                         <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Username
                                                        </div>
                                                    </div>
                                                    <input type="text" name="username_guru" id="username_guru" class="form-control" value="<?= $row->username_guru;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                   

                                    <div class="row">  
                                        <div class="from-group">
                                            <a href="<?= base_url('admin/Admin/tampilDataGuru');?>" class="btn btn-outline-secondary p-2"> Kembali </a>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </main>