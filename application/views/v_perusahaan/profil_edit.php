<div class="row">
    <?= form_error('email');?><?= form_error('kode_pos');?>
    <div class="col-12">
        <?= $this->session->flashdata('notif');?>
        <div class="card card-outline-info">
            <div class="card-body">

                <h3 class="card-header m-b-0 text-white">Profil Perusahaan</h3>
                <form class="floating-labels m-t-40" action="<?php echo base_url()?>c_perusahaan/profil_edit_act" method="post" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-12">
                        <div class=" m-b-40">
                            <h4 for="logo" class="text-center" style="padding: 4px;">Logo Perusahaan</h4>
                            <div class="">
                                <input name="logo" type="file" id="logo" class="dropify"   data-validation-required-message="Logo Perusahaan tidak boleh kosong" data-default-file="<?php echo base_url();?>uploads/images/<?=$logo?>" />
                                <p class="text-center"><small>Upload logo jpg/png *maks 1 MB</small></p> 
                                <p class="text-danger"><?= $this->session->flashdata('logo');?></p>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <input name="nama_perusahaan" type="text" class="form-control" id="nama_perusahaan" required data-validation-required-message="Nama Perusahaan tidak boleh kosong" style="padding-left: 5px;" value="<?= $nama_perusahaan;?>" />  
                                <span class="bar"></span>
                                <label for="nama_perusahaan" style="padding: 4px;">Nama Perusahaan</label>
                            </div>
                        </div>
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <input name="email" type="email" class="form-control" id="email" required    data-validation-required-message="Email Perusahaan tidak boleh kosong" data-validation-email-message="Email tidak valid" style="padding-left: 5px;" value="<?= $email;?>" />  
                                <span class="bar"></span>
                                <label for="email" style="padding: 4px;">Email Perusahaan</label>
                                <?= form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group m-b-40">
                            <h5>Skala Perusahaan</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="skala" name="skala" style="width: 100%" required data-validation-required-message="Skala Perusahaan tidak boleh kosong">
                                    <?php for ($i=0; $i < count($skala_data) ; $i++) {?>
                                        <option <?php if ($skala == $skala_data[$i]){echo "selected";}?> value="<?= $skala_data[$i];?>"><?= $skala_data[$i]?></option>
                                    <?php }?>
                                </select><span class="bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <input name="telpon" type="text" class="form-control" id="telpon" required    data-validation-required-message="Nomor Telpon Perusahaan tidak boleh kosong" style="padding-left: 5px;" value="<?= $no_telpon;?>"/>  
                                <span class="bar"></span>
                                <label for="telpon" style="padding: 4px;">Nomor Telpon Perusahaan</label>
                                <?= form_error('telpon'); ?>
                            </div>
                        </div>
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <input name="website" type="text" class="form-control" id="website" required    data-validation-required-message="Website tidak boleh kosong" style="padding-left: 5px;" value="<?= $website;?>"/>  
                                <span class="bar"></span>
                                <label for="website" style="padding: 4px;">Website</label>
                            </div>
                        </div>
                        <div class="form-group m-b-40">
                            <h5>Jenis Kepemilikan</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="pemilikan" name="pemilikan" style="width: 100%"  required data-validation-required-message="Jenis Kepemilikan tidak boleh kosong">
                                    <?php for ($i=0; $i < count($pemilikan_data) ; $i++) {?>
                                        <option <?php if ($pemilikan == $pemilikan_data[$i]){echo "selected";}?> value="<?= $pemilikan_data[$i];?>"><?= $pemilikan_data[$i]?></option>
                                    <?php }?>
                                </select><span class="bar"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="col-12">
                        <div class="form-group m-b-40">
                            <h5>Bidang Industri</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="bidang" name="bidang" style="width: 100%" required data-validation-required-message="Bidang Industri tidak boleh kosong">
                                    <?php foreach($bidang as $row){ 
                                        if($row->lv == 0){?>
                                        <option></option>   
                                        <option <?php if ($bidang_usaha == $row->nama_kategori){echo "selected";}?> value="<?= $row->nama_kategori;?>"><?= $row->nama_kategori;?></option>
                                    <?php   
                                        }else{?>
                                        <option></option>   
                                        <option <?php if ($bidang_usaha == $row->nama_kategori){echo "selected";}?> value="<?= $row->nama_kategori;?>">&nbsp&nbsp&nbsp&nbsp<?= $row->nama_kategori;?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><span class="bar"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="card-header m-b-40 text-white">Alamat Perusahaan</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <textarea class="form-control" rows="4" id="alamat" name="alamat" required    data-validation-required-message="Alamat Perusahaan tidak boleh kosong" style="padding-left: 5px;"><?= $alamat;?></textarea>
                                <span class="bar"></span>
                                <label for="alamat" style="padding-left: 5px;">Alamat</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-b-40">
                            <h5>Provinsi</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" onchange="getKota(this.value)" id="provinsi" name="provinsi" required    data-validation-required-message="Provinsi tidak boleh kosong" style="width: 100%">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        ?>
                                        <option <?php if($provinsi_data == $prov['prov_name']){echo "selected";} ?> value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-b-40">
                            <h5>Kabupaten / Kota</h5>
                            <div class="controls">
                                <input type="hidden" class="id_kota" id="id_kota" value="<?php echo $kota;?>">
                                <select class = "form-control p-0 select2" onchange="getKecamatan(this.value)" id="kota" name="kota" required data-validation-required-message="Kabupaten / Kota tidak boleh kosong" style="width: 100%">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-b-40">
                            <h5>Kecamatan</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" onchange="getKelurahan(this.value)" id="kecamatan" name="kecamatan" required    data-validation-required-message="Kecamatan tidak boleh kosong" style="width: 100%">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-b-40">
                            <h5>Kelurahan</h5>
                            <div class="controls">
                                <select class = "form-control p-0 select2" id="kelurahan" name="kelurahan" required data-validation-required-message="Kelurahan tidak boleh kosong" style="width: 100%">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <input name="kode_pos" type="text" class="form-control" id="kode_pos" required data-validation-required-message="Kode POS tidak boleh kosong" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Kode Pos tidak benar" maxlength="5" minlength="5" data-validation-minlength-message="Kode Pos tidak benar" style="padding-left: 5px;" value="<?= $kode_pos;?>" />  
                                <span class="bar"></span>
                                <label for="kode_pos" style="padding: 4px;">Kode POS</label>
                                <?= form_error('kode_pos'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="card-header m-b-40 text-white">Deskripsi Perusahaan</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group m-b-40">
                            <div class="controls">
                                <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required data-validation-required-message="Deskripsi Perusahaan tidak boleh kosong" style="padding-left: 5px;" ><?= $deskripsi;?></textarea>
                                <span class="bar"></span>
                                <label for="deskripsi" style="padding: 4px;">Deskripsi Perusahaan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="card-header m-b-40 text-white">Berkas Perusahaan</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="m-b-40">
                            <h4 for="siup" class="text-center" style="padding: 4px;">SIUP</h4>
                            <div class="">
                                <input name="siup" type="file" id="siup" class="dropify"   data-validation-required-message="SIUP tidak boleh kosong" data-default-file="<?php echo base_url();?>uploads/documents/<?=$siup?>" />
                                <p class="text-center"><small>Upload Scan SIUP jpg/png/pdf *maks 2 MB</small></p>
                                <p class="text-danger"><?= $this->session->flashdata('siup');?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="m-b-40">
                            <h4 for="npwp" class="text-center" style="padding: 4px;">NPWP</h4>
                            <div class="">
                                <input name="npwp" type="file" id="npwp" class="dropify form-control"  data-validation-required-message="NPWP tidak boleh kosong" data-default-file="<?php echo base_url();?>uploads/documents/<?=$npwp?>" />
                                <p class="text-center"><small>Upload Scan NPWP jpg/png/pdf *maks 2 MB</small></p> 
                                <p class="text-danger"><?= $this->session->flashdata('npwp');?> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-md btn-primary" id="bt" style="width: 100%">Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
