<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
             <h4 class="card-title m-b-0 p-20 jumbotron jumbotron-fluid" style="border-bottom: solid 1px #c4c4c4;"><span><i class="fa fa-edit"></i></span> Ubah Password</h4>
            <div class="card-body">
                <?= $this->session->flashdata('notif'); ?>
                <form class="floating-labels m-t-40" action="<?php echo base_url()?>c_perusahaan/ubah_pwd_act" method="post" novalidate>
                    <div class="row">
                        <div class="col-12 form-group m-b-40">
                            <div class="controls">
                                <input name="pass_old" type="password" class="form-control" id="pass_old"   required data-validation-required-message="Password Lama tidak boleh kosong" style="padding-left: 5px;">
                                <span class="bar"></span>
                                <label for="pass_old" style="padding: 5px;">Password Lama</label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                        	<div class="controls">
                            	<input name="password" type="password" class="form-control" id="password" 	required data-validation-required-message="Password Baru tidak boleh kosong" style="padding-left: 5px;" minlength="6" data-validation-minlength-message="Password minimal 6 karakter">	
                            	<span class="bar"></span>
                            	<label for="password" style="padding: 5px;">Password Baru</label>
                                <small><?php echo form_error('password') ?></small>
                            </div>
                        </div>
                        <div class="col-md-6 form-group m-b-40">
                        	<div class="controls">
                            	<input name="passconf" type="password" class="form-control" id="passconf" required data-validation-required-message="Ulangi password tidak boleh kosong" style="padding-left: 5px;" data-validation-match-match="password" data-validation-match-message="Password harus sama">
                            	<span class="bar"></span>
    	                        <label for="passconf" style="padding: 5px;">Ulangi Password</label>
                                <small><?php echo form_error('passconf') ?></small>
                        	</div>
                        </div>
                        
                    </div>
                    <div class="demo-checkbox">
                        <input type="checkbox" id="basic_checkbox_1" onclick="Toggle()" />
                        <label for="basic_checkbox_1">Lihat password</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-2" id="bt">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
