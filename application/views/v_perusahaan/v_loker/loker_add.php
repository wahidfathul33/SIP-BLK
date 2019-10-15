<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
             <h4 class="card-title m-b-0 p-20 jumbotron jumbotron-fluid" style="border-bottom: solid 1px #c4c4c4;"><span><i class="fa fa-plus"></i></span> Posting Lowongan Kerja</h4>
            <div class="card-body">
                <form class="m-t-40" action="<?php echo base_url()?>c_perusahaan/loker_add_act" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <label for="judul">Judul</label>
                                <input name="judul" type="text" class="form-control" id="judul"   required data-validation-required-message="Judul tidak boleh kosong" placeholder="Judul">
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <label for="posisi">Posisi</label>

                                <input name="posisi" type="text" class="form-control" id="posisi"   required data-validation-required-message="Posisi tidak boleh kosong" placeholder="Posisi">
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <label for="pendidikan">Pendidikan</label>
                                <input name="pendidikan" type="text" class="form-control" id="pendidikan"   required data-validation-required-message="Pendidikan tidak boleh kosong" placeholder="Pendidikan">
                                <span class="bar"></span>
                                <small>Misalnya SMA sederajat atau pendidikan akhir lainnya</small>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <label for="jurusan">Jurusan</label>
                                <input name="jurusan" type="text" class="form-control" id="jurusan"   required data-validation-required-message="Jurusan tidak boleh kosong" placeholder="Jurusan">
                                <span class="bar"></span>
                                <small>Misalnya semua jurusan atau sebutkan jurusan spesifik</small>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <h5>Jenis Kontrak</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="jns_kontrak" name="jns_kontrak" style="width: 100%" required data-validation-required-message="Jenis Kontrak tidak boleh kosong">
                                    <?php for ($i=0; $i < count($jns_kontrak) ; $i++) {?>
                                        <option value="<?= $jns_kontrak[$i];?>"><?= $jns_kontrak[$i]?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-12 form-group m-b-40">
                            <div class="controls">
                                <input name="gaji" type="text" class="form-control" id="gaji"   required data-validation-required-message="Gaji tidak boleh kosong">
                                <span class="bar"></span>
                                <label for="gaji">Gaji</label>
                            </div>
                        </div> -->
                        
                        <div class="col-md-6 form-group m-b-40">
                            <h5>Kategori</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="kategori" name="kategori" style="width: 100%" required data-validation-required-message="Kategori tidak boleh kosong">
                                    <?php foreach($kategori as $row) : 
                                        if($row->lv == 0){?>
                                        <option></option>   
                                        <option value="<?= $row->nama_kategori;?>"><?= $row->nama_kategori;?></option>
                                    <?php   
                                        }else{?>
                                        <option></option>   
                                        <option value="<?= $row->nama_kategori;?>">&nbsp&nbsp&nbsp&nbsp<?= $row->nama_kategori;?></option>
                                    <?php } endforeach; ?>
                                </select><span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-6 form-group m-b-40">
                            <h5>Lokasi</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="lokasi" name="lokasi" required    data-validation-required-message="Lokasi tidak boleh kosong" style="width: 100%">
                                    <option value="">Please Select</option>
                                    <?php foreach ($lokasi as $row) :
                                        ?>
                                        <option value="<?php echo $row['kota_name'] ?>"><?php echo $row['kota_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 form-group m-b-40">
                            <h5>Tahun Pengalaman</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="lokasi" name="pengalaman" required    data-validation-required-message="Tahun Pengalaman tidak boleh kosong" style="width: 100%">
                                    <option value="">Please Select</option>
                                    <option value="Fresh Graduate">Fresh Graduate</option>
                                    <?php for($i=1; $i<11; $i++){?>
                                        <option value="<?= $i?> Tahun"><?= $i?> Tahun</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <label for="gaji">Gaji</label>

                                <input name="gaji" type="text" class="form-control" id="gaji"   required data-validation-required-message="Gaji tidak boleh kosong" placeholder="Gaji">
                                <span class="bar"></span>
                                <small>Misalnya negosiasi atau sebutkan range angkanya</small>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <label for="batas_kuota">Batas Kuota</label>
                                <input name="batas_kuota" type="number" class="form-control" id="batas_kuota" required data-validation-required-message="Batas Kuota tidak boleh kosong" placeholder="Batas Kuota">
                                <span class="bar"></span>
                                <small>Jumlah maksimal pelamar diterima</small>
                            </div>
                        </div>
                        <div class="col-12 form-group m-b-40">
                            <h5 >Tanggal Tutup</h5>
                            <div class="controls">
                               <input type="text" name="tgl_tutup" class="form-control" id="datepicker-autoclose" placeholder="yyyy-mm-dd" required data-validation-required-message="Tanggal Tutup tidak boleh kosong">
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-12 form-group m-b-40">
                            <div class="controls">
                                <textarea class="summernote" name="deskripsi" required data-validation-required-message="Deskripsi Lowongan tidak boleh kosong"><h4>Deskripsi Lowongan</h4></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-2" id="bt">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
