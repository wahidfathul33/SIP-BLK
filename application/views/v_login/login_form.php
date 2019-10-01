<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo base_url();?>assets/frontend/images/banner/bnr2.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Login</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Beranda</a></li>
							<li>Login</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="section-full content-inner-2 shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 text-center">
						<!-- <h3 class="font-weight-700 m-t0 m-b20"></h3> -->
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="max-w500 m-auto">
							<div class="p-a30 border-1 seth">
								<div class="tab-content nav">
									<div style="width: 100%"><?= $this->session->flashdata('alert');?></div>
									<form id="login" class="tab-pane active col-12 p-a0"  action="<?= base_url()?>c_login/auth" method="post" novalidate>
										<h4 class="font-weight-700">Masuk Ke SIP BLK Surakarta</h4>
										<p class="font-weight-600">Jika anda sudah bergabung dengan kami, silakan login untuk masuk ke sistem.</p>
										<div class="form-group">
					                    	<div class="controls">
													<label class="font-weight-700 font-weight-bold" for="email">Email <span class="text-danger">*</span></label>
						                        	<input name="email" type="email" class="form-control" id="email" required data-validation-required-message="Email tidak boleh kosong" data-validation-email-message="Email tidak valid" placeholder="Email">
						                        	<span class="bar"></span>
						                        </div>
						                    </div>
										<div class="form-group">
					                    	<div class="controls">
					                    		<label class="font-weight-700 font-weight-bold" for="password">Password <span class="text-danger">*</span></label>
					                        	<input name="password" type="password" class="form-control" id="password" 	required data-validation-required-message="Password tidak boleh kosong" placeholder="Password">	
					                        	<span class="bar"></span>
					                        </div>
					                    </div>
					                    <div class="demo-checkbox">
					                        <input type="checkbox" class="filled-in" id="show_pass" onclick="Toggle()" />
					                        <label for="show_pass">Lihat password</label>
					                    </div>
										<div class="text-left">
											<button class="site-button m-r5 button-lg">login</button>
											<a data-toggle="tab" href="#forgot-password" class="m-l5"><i class="fa fa-unlock-alt"></i> Lupa Password</a> 								
										</div><br>	
										<div class="text-left">
											<a data-toggle="tab" href="#resend-activation" class="m-l5"><i class="fa fa-envelope"></i> Kirim ulang email verifikasi</a> 
										</div>
									</form>
									<form id="forgot-password" class="tab-pane fade  col-12 p-a0" action="<?= base_url()?>c_user/forgot_password" method="post" novalidate>
										<h4 class="font-weight-700">LUPA PASSWORD ?</h4>
										<p class="font-weight-600">Kami akan mengirimkan email untuk mereset password anda. </p>
										<div class="form-group">
					                    	<div class="controls">
												<label class="font-weight-700 font-weight-bold" for="email">Email <span class="text-danger">*</span></label>
					                        	<input name="email" type="email" class="form-control" id="email" required	 data-validation-required-message="Email tidak boleh kosong" data-validation-email-message="Email tidak valid" placeholder="Email">	
					                        	<span class="bar"></span>
					                        </div>
					                    </div>
										<div class="text-left"> 
											<a class="site-button outline gray button-lg" data-toggle="tab" href="#login">Back</a>
											<button class="site-button pull-right button-lg">Submit</button>
										</div>
									</form>
									<form id="resend-activation" class="tab-pane fade  col-12 p-a0" action="<?= base_url()?>c_user/resend_verif_email" method="post" novalidate	>
										<h4 class="font-weight-700">Verifikasi</h4>
										<p class="font-weight-600">Kami akan mengirimkan email untuk verifikasi akun anda. </p>
										<div class="form-group">
					                    	<div class="controls">
												<label class="font-weight-700 font-weight-bold" for="email">Email <span class="text-danger">*</span></label>
					                        	<input name="email" type="email" class="form-control" id="email" required	 data-validation-required-message="Email tidak boleh kosong" data-validation-email-message="Email tidak valid" placeholder="Email">	
					                        	<span class="bar"></span>
					                        </div>
					                    </div>
										<div class="text-left"> 
											<a class="site-button outline gray button-lg" data-toggle="tab" href="#login">Back</a>
											<button class="site-button pull-right button-lg">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="max-w500 m-auto">
							<div class="p-a30 border-1 seth">
								<div class="tab-content nav">
									<div style="width: 100%"><?= $this->session->flashdata('alert');?></div>
									<h4 class="font-weight-700">Pengguna Baru</h4>
									<p class="font-weight-600">Jika Anda belum memiliki akun, silakan mendaftar terlebih dahulu sebagai Pencari Kerja atau Perusahaan.</p>
									
									<div class="text-left">
										<a class="site-button m-r5 button-lg" href="<?= base_url()?>c_user/register"><i class="fa fa-user"></i> Sign Up</a>
									</div><br>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Product END -->
		</div>
		<!-- contact area  END -->
    </div>