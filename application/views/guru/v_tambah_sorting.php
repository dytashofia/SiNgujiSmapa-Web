<!-- File ini berfungsi sebagai tampilan input soal mengurutkan -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fa fa-table mr-2"></i>Tambah Soal Mengurutkan
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?= base_url('guru');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('soal/'.$idPaketSoal);?>">Paket Soal</a></li>
                <li class="breadcrumb-item active">Tambah Soal Mengurutkan</li>
            </ol>
            
            <div class="block full">
                <form action="<?php echo base_url('guru/pilgan/tambah_aksi_sorting/'.$idPaketSoal);?>" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID SOAL
                                    </div>
                                </div>
                                <input type="text" name="id_soal" id="id_soal" class="form-control" value="<?= $idSoal;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID PAKET
                                    </div>
                                </div>
                                <input type="text" name="id_paket" id="id_paket" class="form-control" value="<?= $idPaketSoal;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ID JENIS
                                    </div>
                                </div>
                                <input type="text" name="id_jenis_soal" id="id_jenis_soal" class="form-control" value="JNS004" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea-pertanyaan"><h5> Pertanyaan <h5></label>
                            <textarea name="pertanyaan" id="textarea-ckeditor textarea-pertanyaan" class="form-control ckeditor"></textarea>
                            <p class="form-text text-muted"> Form ini wajib diisi. </p>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <select id="drop1" name="urutana" class="form-control" size="1">
                                    <option value="a">1</option>
                                    <option value="b">2</option>
                                    <option value="c">3</option>
                                    <option value="d">4</option>
                                    <option value="e">5</option>
                                </select>
                                    <input type="text" name="opsi_a" size="167" class="form-control" placeholder="pilihan A">
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <select id="drop2" name="urutanb" class="form-control" size="1">
                                    <option value="a">1</option>
                                    <option value="b">2</option>
                                    <option value="c">3</option>
                                    <option value="d">4</option>
                                    <option value="e">5</option>
                                </select>
                                    <input type="text"  name="opsi_b" size="167" class="form-control" placeholder="pilihan B">
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <select id="drop3" name="urutanc" class="form-control" size="1">
                                    <option value="a">1</option>
                                    <option value="b">2</option>
                                    <option value="c">3</option>
                                    <option value="d">4</option>
                                    <option value="e">5</option>
                                </select>
                                    <input type="text"  name="opsi_c" size="167" class="form-control" placeholder="pilihan C">
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <select id="drop4" name="urutand" class="form-control" size="1">
                                    <option value="a">1</option>
                                    <option value="b">2</option>
                                    <option value="c">3</option>
                                    <option value="d">4</option>
                                    <option value="e">5</option>
                                </select>
                                    <input type="text"  name="opsi_d" size="167" class="form-control" placeholder="pilihan D">
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <select id="drop5" name="urutane" class="form-control" size="1">
                                    <option value="a">1</option>
                                    <option value="b">2</option>
                                    <option value="c">3</option>
                                    <option value="d">4</option>
                                    <option value="e">5</option>
                                </select>
                                    <input type="text"  name="opsi_e" size="167" class="form-control" placeholder="pilihan E">
                                </div>
                        </div>
                        <br>
                        <div class="form-group">
                        <label><h5>Kunci Jawaban</h5></label>
                            <div>
                                <textarea id="textarea-ckeditor" name="kunci_jawaban"  class="ckeditor"></textarea></div>
                            </div>
                        </div>        
                        <div class="form-group">
                        <label><h5>Pembahasan</h5></label>
                            <div>
                                <textarea id="textarea-ckeditor" rows="2" name="pembahasan"  class="ckeditor"></textarea></div>
                            </div>
                            <br>
                        <div class="form-group form-actions">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2">
                                        <a href="<?= base_url('soal/'.$idPaketSoal);?>" class="btn btn-outline-secondary w-100">Kembali</a>
                                     </div>
                                    <div class="col-sm-12 col-md-2">
                                        <button type="submit" onclick="return checkDropdowns();" name="submit" class="btn btn-outline-primary w-100">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <script type="text/javascript">
                function checkDropdowns()
                {
                    // The number of dropdowns you have (use the naming convention 'dropx' as an id attribute)
                    var iDropdowns = 5; 
                    
                    var sValue;
                    var sValue2;
                    // Loop over dropdowns
                    for(var i = 1; i <= iDropdowns; ++i)
                    {
                        // Get selected value
                        sValue = document.getElementById('drop'+i).value;
                        
                        // Nested loop - loop over dropdowns again
                        for(var j = 1; j <= iDropdowns; ++j)
                        {
                            // Get selected value
                            sValue2 = document.getElementById('drop'+j).value;
                            // If we're not checking the same dropdown and the values are the same...
                            if ( i != j && sValue == sValue2 )
                            {
                                // ...we have a duplicate!
                                alert('Maaf ada data anda yang duplikat');
                                
                                return false;
                            }
                        }
                    }
                    
                    // No duplicates
                    return true;
                }
                    </script>

            </div>
        </main>