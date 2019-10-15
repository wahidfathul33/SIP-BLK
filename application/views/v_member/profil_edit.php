<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo base_url();?>assets/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Update data Member</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="#">Home</a></li>
						<li>Member</li>
						<li>Update Data</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
		<!-- Submit Resume -->
		<div class="section-full content-inner shop-account">
			<div class="container">
				<div class="row">
				<div class="col-md-12 text-center">
					<h3 class="font-weight-700 m-t0 m-b20">Update Profil Member</h3>
				</div>
			</div>
		        <?php echo $this->session->flashdata('notif');?>
		        <div class="card card-outline-info">
		            <div class="card-body">
		                <h4 class="card-header m-b-0 text-white">Informasi Umum</h4>
		                <form class="m-t-40 tab-pane active" action="<?= base_url()?>c_member/profil_edit_act" method="post" enctype="multipart/form-data" novalidate>
			                <div class="row">
			                    <div class="col-12 form-group m-b-40">
			                        <h6 for="foto" class="text-center" style="padding: 4px;">Foto</h6>
			                        <div class="controls">
			                            <input name="foto" type="file" id="foto" class="dropify" data-default-file="<?php echo base_url();?>uploads/images/avatar/<?=$foto?>"/>
			                            <p class="text-center"><small>Upload foto *maks 1 MB</small></p>  
			                            <p class="text-danger"><?= $this->session->flashdata('foto');?></p>   
			                        </div>
			                    </div>

			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nomor Induk Kependudukan (NIK)</h6>
			                            <input name="nik" type="text" class="form-control" required data-validation-required-message="Nomor Induk Kependudukan (NIK) tidak boleh kosong" placeholder="NIK" value="<?= $nik?>" style="padding-left: 5px;" readonly>  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nama Lengkap</h6>
			                            <input name="nama" type="text" class="form-control" required data-validation-required-message="Nama Lengkap tidak boleh kosong" placeholder="Nama Lengkap" value="<?= $nama?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
		                            <h6>Agama</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="agama" required data-validation-required-message="Agama tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option <?php if($agama =='Islam'){echo 'selected';} ?> value="Islam">Islam</option>
		                                    <option <?php if($agama =='Kristen Protestan'){echo 'selected';} ?> value="Kristen Protestan">Kristen Protestan</option>
		                                    <option <?php if($agama =='Katolik'){echo 'selected';} ?> value="Katolik">Katolik</option>
		                                    <option <?php if($agama =='Hindu'){echo 'selected';} ?> value="Hindu">Hindu</option>
		                                    <option <?php if($agama =='Buddha'){echo 'selected';} ?> value="Buddha">Buddha</option>
		                                    <option <?php if($agama =='Kong Hu Cu'){echo 'selected';} ?> value="Kong Hu Cu">Kong Hu Cu</option>
		                                </select>
		                            </div>
		                        </div>
			                    <div class="col-md-6 form-group m-b-40">
		                            <h6>Status Nikah</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="nikah" required data-validation-required-message="Status Nikah tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option <?php if($nikah =='Sudah Menikah'){echo 'selected';} ?> value="Sudah Menikah">Sudah Menikah</option>
		                                    <option <?php if($nikah =='Belum Menikah'){echo 'selected';} ?> value="Belum Menikah">Belum Menikah</option>
		                                </select>
		                            </div>
		                        </div>
			                    <div class="col-md-6 form-group m-b-40">
		                            <h6>Jenis Kelamin</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="jk" required data-validation-required-message="Jenis Kelamin tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option <?php if($jk =='Laki-laki'){echo 'selected';} ?> value="Laki-laki">Laki-laki</option>
		                                    <option <?php if($jk =='Perempuan'){echo 'selected';} ?> value="Perempuan">Perempuan</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Golongan Darah</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="gol_darah" required data-validation-required-message="Golongan Darah tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option <?php if($gol_darah =='A'){echo 'selected';} ?> value="A">A</option>
		                                    <option <?php if($gol_darah =='AB'){echo 'selected';} ?> value="AB">AB</option>
		                                    <option <?php if($gol_darah =='B'){echo 'selected';} ?> value="B">B</option>
		                                    <option <?php if($gol_darah =='O'){echo 'selected';} ?> value="O">O</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Tempat Lahir</h6>
			                            <input name="tmp_lahir" type="text" class="form-control" required data-validation-required-message="Tempat Lahir tidak boleh kosong" placeholder="Tempat Lahir" value="<?= $tmp_lahir?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Tanggal Lahir</h6>
			                            <input name="tgl_lahir" type="text" class="form-control datepicker" required data-validation-required-message="Tanggal Lahir tidak boleh kosong" placeholder="Tanggal Lahir" value="<?= $tgl_lahir?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Tinggi Badan</h6>
			                            <input name="tinggi" type="text" class="form-control" required data-validation-required-message="Tinggi Badan tidak boleh kosong" placeholder="Tinggi Badan" value="<?= $tinggi?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Berat Badan</h6>
			                            <input name="berat" type="text" class="form-control" required data-validation-required-message="Berat Badan tidak boleh kosong" placeholder="Berat Badan" value="<?= $berat?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                </div>
			                <h4 class="card-header m-b-40 text-white">Kontak</h4>
			                <div class="row">
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nomor HP</h6>
			                            <input name="no_hp" type="text" class="form-control" required data-validation-required-message="Nomor HP tidak boleh kosong" placeholder="Nomor HP" value="<?= $no_hp?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nomor Whatsapp</h6>
			                            <input name="no_wa" type="text" class="form-control" required data-validation-required-message="Nomor Whatsapp tidak boleh kosong" placeholder="Nomor Whatsapp" value="<?= $no_wa?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>		
			                    <div class="col-md-12 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Email</h6>
			                            <input name="email" type="email" class="form-control" required data-validation-required-message="Email tidak boleh kosong" data-validation-email-message="Email tidak valid" value="<?= $email?>" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>			                        
			                </div>
			                <h4 class="card-header m-b-40 text-white">Alamat Sesuai KTP</h4>
			                <div class="row">
		                        <div class="col-12 form-group m-b-40">
		                            <div class="controls">
		                            	<h6>Alamat Sesuai KTP</h6>
		                                <textarea class="form-control" rows="4" name="alamat_ktp" required    data-validation-required-message="Alamat Sesuai KTP tidak boleh kosong"  style="padding-left: 5px;"><?= $alamat_ktp?></textarea>
		                                <span class="bar"></span>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Provinsi</h6>
		                            <div class="controls">

		                                <select class = "form-control p-0 select2" onchange="getKota(this.value)" id="provinsi" name="provinsi_ktp" required    data-validation-required-message="Provinsi tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <?php foreach ($provinsi as $prov) :
		                                        ?>
		                                        <option <?php if($prov_ktp == $prov['prov_name']){echo "selected";} ?> value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_name'] ?></option>
		                                    <?php endforeach; ?>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Kabupaten / Kota</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" onchange="getKecamatan(this.value)" id="kota" name="kota_ktp" required data-validation-required-message="Kabupaten / Kota tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Kecamatan</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" onchange="getKelurahan(this.value)" id="kecamatan" name="kecamatan_ktp" required    data-validation-required-message="Kecamatan tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Kelurahan</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" id="kelurahan" name="kelurahan_ktp" required data-validation-required-message="Kelurahan tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                </select>
		                            </div>
		                        </div>
			                </div>
			                <h4 class="card-header m-b-40 text-white">Alamat Sekarang</h4>
			                <div class="row">
		                        <div class="col-12 form-group m-b-40">
		                            <div class="controls">
		                            	<h6>Alamat Sekarang</h6>
		                                <textarea class="form-control" rows="4" name="alamat_now" required    data-validation-required-message="Alamat Sekarang tidak boleh kosong" style="padding-left: 5px;"><?= $alamat_now?></textarea>
		                                <span class="bar"></span>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Provinsi</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" onchange="getKotaNow(this.value)" id="provinsiNow" name="provinsi_now" required dNowata-validation-required-message="Provinsi tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <?php foreach ($provinsi as $prov) :
		                                        ?>
		                                        <option <?php if($prov_now == $prov['prov_name']){echo "selected";} ?> value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_name'] ?></option>
		                                    <?php endforeach; ?>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Kabupaten / Kota</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" onchange="getKecamatanNow(this.value)" id="kotaNow" name="kota_now" required data-validation-required-message="Kabupaten / Kota tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Kecamatan</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" onchange="getKelurahanNow(this.value)" id="kecamatanNow" name="kecamatan_now" required    data-validation-required-message="Kecamatan tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Kelurahan</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" id="kelurahanNow" name="kelurahan_now" required data-validation-required-message="Kelurahan tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                </select>
		                            </div>
		                        </div>
			                </div>
			                <div class="row justify-content-center">
			                    <div class="col-3">
			                        <button type="submit" class="site-button" id="bt" style="width: 100%">Simpan</button>
			                    </div>
			                </div>
			                			<input type="hidden" id="kotaID" value="<?php echo $idkota_ktp;?>">

		                            	<input type="hidden" id="kecID" value="<?php echo $idkec_ktp;?>">

		                            	<input type="hidden" id="kelID" value="<?php echo $idkel_ktp;?>">

                                		<input type="hidden" id="kotaIDnow" value="<?php echo $idkota_now;?>">

		                            	<input type="hidden" id="kecIDnow" value="<?php echo $idkec_now;?>">

		                            	<input type="hidden" id="kelIDnow" value="<?php echo $idkel_now;?>">

			            </form>
			        </div>
		        </div>
			</div>
		</div>
        <!-- Submit Resume END -->
	</div>
</div>