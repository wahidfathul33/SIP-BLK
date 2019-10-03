<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo base_url();?>assets/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Isi data Member</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="#">Home</a></li>
						<li>Member</li>
						<li>Isi Data</li>
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
					<h3 class="font-weight-700 m-t0 m-b20">Isi Profil Member</h3>
				</div>
			</div>
		        <?php echo $this->session->flashdata('notif');?>
		        <div class="card card-outline-info">
		            <div class="card-body">
		                <h4 class="card-header m-b-0 text-white">Informasi Umum</h4>
		                <form class="m-t-40 tab-pane active" action="<?= base_url()?>c_member/profil_input_act" method="post" enctype="multipart/form-data" novalidate>
			                <div class="row">
			                    <div class="col-12 form-group m-b-40">
			                        <h6 for="foto" class="text-center" style="padding: 4px;">Foto</h6>
			                        <div class="controls">
			                            <input name="foto" type="file" id="foto" class="dropify" required data-validation-required-message="Foto tidak boleh kosong"/>
			                            <p class="text-center"><small>Upload foto *maks 1 MB</small></p>  
			                            <p class="text-danger"><?= $this->session->flashdata('foto');?></p>   
			                        </div>
			                    </div>

			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nomor Induk Kependudukan (NIK)</h6>
			                            <input name="nik" type="text" class="form-control" required data-validation-required-message="Nomor Induk Kependudukan (NIK) tidak boleh kosong" placeholder="NIK" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nama Lengkap</h6>
			                            <input name="nama" type="text" class="form-control" required data-validation-required-message="Nama Lengkap tidak boleh kosong" placeholder="Nama Lengkap" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
		                            <h6>Agama</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="agama" required data-validation-required-message="Agama tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option value="Islam">Islam</option>
		                                    <option value="Kristen Protestan">Kristen Protestan</option>
		                                    <option value="Katolik">Katolik</option>
		                                    <option value="Hindu">Hindu</option>
		                                    <option value="Hindu">Hindu</option>
		                                    <option value="Buddha">Buddha</option>
		                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
		                                </select>
		                            </div>
		                        </div>
			                    <div class="col-md-6 form-group m-b-40">
		                            <h6>Status Nikah</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="nikah" required data-validation-required-message="Status Nikah tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option value="Sudah Menikah">Sudah Menikah</option>
		                                    <option value="Belum Menikah">Belum Menikah</option>
		                                </select>
		                            </div>
		                        </div>
			                    <div class="col-md-6 form-group m-b-40">
		                            <h6>Jenis Kelamin</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="jk" required data-validation-required-message="Jenis Kelamin tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option value="Laki-laki">Laki-laki</option>
		                                    <option value="Perempuan">Perempuan</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
		                            <h6>Golongan Darah</h6>
		                            <div class="controls">
		                                <select class = "form-control p-0 select2" name="gol_darah" required data-validation-required-message="Golongan Darah tidak boleh kosong" style="width: 100%">
		                                    <option value="">Please Select</option>
		                                    <option value="A">A</option>
		                                    <option value="AB">AB</option>
		                                    <option value="B">B</option>
		                                    <option value="O">O</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Tempat Lahir</h6>
			                            <input name="tmp_lahir" type="text" class="form-control" required data-validation-required-message="Tempat Lahir tidak boleh kosong" placeholder="Tempat Lahir" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Tanggal Lahir</h6>
			                            <input name="tgl_lahir" type="text" class="form-control datepicker" required data-validation-required-message="Tanggal Lahir tidak boleh kosong" placeholder="Tanggal Lahir" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Tinggi Badan</h6>
			                            <input name="tinggi" type="text" class="form-control" required data-validation-required-message="Tinggi Badan tidak boleh kosong" placeholder="Tinggi Badan" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Berat Badan</h6>
			                            <input name="berat" type="text" class="form-control" required data-validation-required-message="Berat Badan tidak boleh kosong" placeholder="Berat Badan" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                </div>
			                <h4 class="card-header m-b-40 text-white">Kontak</h4>
			                <div class="row">
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nomor HP</h6>
			                            <input name="no_hp" type="text" class="form-control" required data-validation-required-message="Nomor HP tidak boleh kosong" placeholder="Nomor HP" style="padding-left: 5px;">  
			                            <span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="col-md-6 form-group m-b-40">
			                        <div class="controls">
			                        	<h6>Nomor Whatsapp</h6>
			                            <input name="no_wa" type="text" class="form-control" required data-validation-required-message="Nomor Whatsapp tidak boleh kosong" placeholder="Nomor Whatsapp" style="padding-left: 5px;">  
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
		                                <textarea class="form-control" rows="4" name="alamat_ktp" required    data-validation-required-message="Alamat Sesuai KTP tidak boleh kosong" style="padding-left: 5px;"></textarea>
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
		                                        <option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_name'] ?></option>
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
		                                <textarea class="form-control" rows="4" name="alamat_now" required    data-validation-required-message="Alamat Sekarang tidak boleh kosong" style="padding-left: 5px;"></textarea>
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
		                                        <option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_name'] ?></option>
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
			                <div class="row">
			                    <div class="col-12">
			                        <button type="submit" class="btn btn-md btn-primary" id="bt" style="width: 100%">Simpan</button>
			                    </div>
			                </div>
			            </form>
			        </div>
		        </div>
			</div>
		</div>
        <!-- Submit Resume END -->
	</div>
</div>