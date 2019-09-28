<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
             <h4 class="card-title m-b-0 p-20 jumbotron jumbotron-fluid" style="border-bottom: solid 1px #c4c4c4;"><span><i class="fa fa-plus"></i></span>  Tambah Berita</h4>
            <div class="card-body">
                <form class="m-t-40 floating-labels" action="<?php echo base_url()?>c_perusahaan/berita_edit_act/<?= $id_panggilan?>" method="post" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <input type="hidden" name="id_lowongan" value="<?= $id_lowongan?>">
                        <div class="col-md-12 form-group m-b-40">
                            <div class="controls">
                                <label for="loker">Lowongan</label>
                                <input name="loker" type="text" class="form-control" id="loker" value="<?= $judul_loker ?>" readonly style="padding:5px">
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-12 form-group m-b-40">
                            <div class="controls">   
                                <input name="header" type="text" class="form-control" id="judul"   required data-validation-required-message="Judul tidak boleh kosong" style="padding-left:5" value="<?= $header ?>">
                                <span class="bar"></span>
                                <label for="judul" style="padding:4px">Judul Berita <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group m-b-40">
                            <h5>Jenis Tes <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="jns_tes" name="jns_tes" style="width: 100%" required data-validation-required-message="Jenis Tes tidak boleh kosong">
                                    <?php for ($i=0; $i < count($jns_tes) ; $i++) {?>
                                        <option <?php if($jns_tes_data == $jns_tes[$i]){ echo "selected";}?> value="<?= $jns_tes[$i];?>"><?= $jns_tes[$i]?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <input name="waktu_mulai" type="text" class="form-control" id="waktu_mulai" required data-validation-required-message="Waktu Mulai tidak boleh kosong" style="padding-left: 5px;" value="<?= $waktu_mulai ?>">  
                                <span class="bar"></span>
                                <label for="waktu_mulai" style="padding: 4px;">Waktu Mulai <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <input name="waktu_selesai" type="text" class="form-control" id="waktu_selesai" required data-validation-required-message="Waktu Selesai tidak boleh kosong" style="padding-left: 5px;" value="<?= $waktu_selesai ?>">  
                                <span class="bar"></span>
                                <label for="waktu_selesai" style="padding: 4px;">Waktu Selesai <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <input name="lokasi" type="text" class="form-control" id="lokasi" required data-validation-required-message="Lokasi tidak boleh kosong" style="padding-left: 5px;" value="<?= $lokasi ?>">  
                                <span class="bar"></span>
                                <label for="lokasi" style="padding: 4px;">Lokasi <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                            <div class="controls">
                                <input name="maps_lokasi" type="text" class="form-control" id="maps_lokasi" style="padding-left: 5px;" value="<?= $maps ?>">  
                                <span class="bar"></span>
                                <label for="maps_lokasi" style="padding: 4px;">Maps Lokasi</label>
                            </div>
                        </div>
                        <div class="col-12 form-group m-b-40">
                            <h5 >Tanggal <span class="text-danger">*</span></h5>
                            <div class="controls">
                               <input type="text" name="tanggal" class="form-control" id="datepicker-autoclose"  required data-validation-required-message="Tanggal tidak boleh kosong" placeholder="yyyy-mm-dd" style="padding-left:5px" value="<?= $tanggal ?>">
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        
                        <div class="col-12 form-group m-b-40">
                            <div class="controls">
                                <textarea class="summernote" name="keterangan" required data-validation-required-message="Isi Berita tidak boleh kosong"> <?= $keterangan ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 form-group m-b-40">
                            <h4 for="lampiran" style="padding: 4px;">Lampiran <span class="text-danger">* <?= $this->session->flashdata('lampiran');?></span></h4>
                            <div class="controls">
                                <input name="lampiran" type="file" id="lampiran" class="dropify"  required data-validation-required-message="Lampiran Perusahaan tidak boleh kosong" data-default-file="<?php echo base_url();?>uploads/images/<?=$lampiran?>" />
                                <p class="text-center"><small>Upload lampiran .pdf </small></p> 
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-2" id="bt">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
