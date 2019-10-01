<div class="page-content bg-white">
    <!-- inner page banner --> 
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo base_url();?>assets/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Register</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="#">Beranda</a></li>
						<li>Register</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner shop-account">
        <!-- Product -->
        <div class="container">
            <div class="row">
				<div class="col-md-12 text-center">
					<!-- <h3 class="font-weight-700 m-t0 m-b20">Gabung Sekarang</h3> -->
				</div>
			</div>
            <div class="row">
				<div class="col-md-12 m-b30">
					<div class="p-a30 border-1  max-w500 m-auto">
						<div class="tab-contentr">
							<form class="tab-pane active" action="<?= base_url()?>c_user/register_action" method="post" novalidate>
								<?= $this->session->flashdata('alert')?>
								<div class="alert alert-success">Anda sudah memiliki akun? <a href="<?=base_url()?>c_login/login">Klik disini untuk login.</a></div>
								<?= $this->session->flashdata('gagal')?>
								<h4 class="font-weight-700">LOGIN INFORMATION</h4>
								<hr>
								<div class="form-group">
			                    	<div class="controls">
										<label class="font-weight-700 font-weight-bold" for="email">Email <span class="text-danger">*</span></label>
			                        	<input name="email" type="email" class="form-control" id="email" required	 data-validation-required-message="Email tidak boleh kosong" data-validation-email-message="Email tidak valid" placeholder="Email">	
			                        	<span class="bar"></span>
			                        </div>
			                    </div>

			                    <div class="form-group">
			                    	<div class="controls">
			                    		<label class="font-weight-700 font-weight-bold" for="password">Password <span class="text-danger">*</span></label>
			                        	<input name="password" type="password" class="form-control" id="password" 	required data-validation-required-message="Password tidak boleh kosong" minlength="6" data-validation-minlength-message="Password minimal 6 karakter" placeholder="Password">	
			                        	<span class="bar"></span>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                    	<div class="controls">
			                    		<label class="font-weight-700 font-weight-bold" for="passconf">Ulangi Password <span class="text-danger">*</span></label>
			                        	<input name="passconf" type="password" class="form-control" id="passconf" 	required data-validation-required-message="Ulangi password tidak boleh kosong" data-validation-match-match="password" data-validation-match-message="Password tidak sama" placeholder="Ulangi Password">
			                        	<span class="bar"></span>
			                    	</div>
			                    </div>
			                    <div class="demo-checkbox">
			                        <input type="checkbox" class="filled-in" id="show_pass" onclick="Toggle()" />
			                        <label for="show_pass">Lihat password</label>
			                    </div>
			                    <input type="hidden" name="role" value="<?= $role?>">
			                    
								<div class="g-recaptcha" data-sitekey="6LfpWrcUAAAAAAVfY1drweRAoCU-rti9ih1g7C7A"></div>
								<br>
								<div class="text-left">
									<button class="site-button button-lg outline outline-2">CREATE</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- Product END -->
	</div>
	<!-- contact area  END -->
</div>