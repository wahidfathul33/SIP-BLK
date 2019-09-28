<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah User</h4>
                <form class="floating-labels m-t-40" action="<?php echo base_url()?>c_admin/user_add_act" method="post" novalidate>
                    <?php if ($level == 2 || $level == 3) {?>
                    <div class="form-group m-b-40">
                        <div class="controls">
                            <input name="nik" type="text" class="form-control" id="input0" required    data-validation-required-message="NIK tidak boleh kosong" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="NIK tidak benar" minlength="16" data-validation-minlength-message="Masukkan 16 angka NIK" style="padding-left: 5px;">  
                            <span class="bar"></span>
                            <label for="input0" style="padding: 5px;">NIK</label>
                            <small><?php echo form_error('nik') ?></small>
                        </div>
                    </div>
                    <?php }?>
                	<?php if ($level != 1) {?>
                    <div class="form-group m-b-40">
                    	<div class="controls">
                        	<input name="nama" type="text" class="form-control" id="input1" required 	data-validation-required-message="Nama tidak boleh kosong" style="padding-left: 5px;">	
                        	<span class="bar"></span>
                        	<label for="input1" style="padding: 5px;">Nama</label>
                        </div>
                    </div>
                    <?php }?>
                    <div class="form-group m-b-40">
                    	<div class="controls">
                        	<input name="email" type="email" class="form-control" id="input2" required	 data-validation-required-message="Email tidak boleh kosong" data-validation-email-message="Email tidak valid" style="padding-left: 5px;">	
                        	<span class="bar"></span>
                        	<label for="input2" style="padding: 5px;">Email</label>
                        	<small><?php echo form_error('email') ?></small>
                        </div>
                    </div>

                    <div class="form-group m-b-40">
                    	<div class="controls">
                        	<input name="password" type="password" class="form-control" id="password" 	required data-validation-required-message="Password tidak boleh kosong" minlength="6" data-validation-minlength-message="Password minimal 6 karakter" style="padding-left: 5px;">	
                        	<span class="bar"></span>
                        	<label for="password" style="padding: 5px;">Password</label>
                            <small><?php echo form_error('password') ?></small>
                        </div>
                    </div>
                    <div class="form-group m-b-40">
                    	<div class="controls">
                        	<input name="passconf" type="password" class="form-control" id="passconf" 	required data-validation-required-message="Ulangi password tidak boleh kosong" data-validation-match-match="password" data-validation-match-message="Password tidak sama" tidakstyle="padding-left: 5px;">
                        	<span class="bar"></span>
	                        <label for="passconf" style="padding: 5px;">Ulangi Password</label>
                            <small><?php echo form_error('passconf') ?></small>
                    	</div>
                    </div>
                    <div class="demo-checkbox">
                    <input type="checkbox" id="basic_checkbox_1" onclick="Toggle()" />
                    <label for="basic_checkbox_1">Lihat password</label>
                </div>
                    <input type="hidden" name="level" value="<?php echo $level;?>">
                    <button type="submit" class="btn btn-primary" id="bt">Simpan</button>
                </form>
        </div>
    </div>
</div>
