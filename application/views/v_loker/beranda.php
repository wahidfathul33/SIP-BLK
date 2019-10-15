<!-- Content -->
<!-- Section Banner -->
<div class="dez-bnr-inr dez-bnr-inr-md overlay-black-dark" style="background-image:url(<?= base_url()?>assets/frontend/images/main-slider/slide1.jpg);">
    <div class="container">
        <div class="dez-bnr-inr-entry align-m ">
			<div class="find-job-bx">
				<h2 class="text-white">Cari Lowongan Kerja</h2><h3 class="text-white">Temukan Pekerjaan Impianmu</h3>
				
				<form class="dezPlaceAni" action="<?= base_url()?>c_loker/loker_cari" method="get">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="keyword" class="form-control" placeholder="Cari Posisi, Perusahaan, Kata Kunci">
									<div class="input-group-append">
									  <span class="input-group-text"><i class="fa fa-search"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<select name="lokasi" class="selectpicker" data-live-search="true">
                                    <option value="">Pilih Lokasi</option>
                                    <?php foreach ($lokasi as $lokasi) :
                                        ?>
                                        <option value="<?php echo $lokasi['kota_name'] ?>"><?php echo $lokasi['kota_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<select name="kategori" class="selectpicker" data-live-search="true">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $kategori) :
                                        ?>
                                        <option value="<?php echo $kategori->nama_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
						</div>
						<div class="col-lg-2 col-md-6">
							<button type="submit" class="site-button btn-block">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Section Banner END -->
<!-- About Us -->
<div class="section-full job-categories content-inner-2 bg-white" style="background-image:url(<?= base_url()?>assets/frontend/images/pattern/pic1.html);">
	<div class="container">
		<div class="section-head text-center">
			<h2 class="m-b5">Kategori Populer</h2>
		</div>
		<div class="row sp20">
			<?php foreach ($jml_kategori_data as $kategori) :?>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="icon-bx-wraper">
					<div class="icon-content">
						<div class="icon-md text-primary m-b20"><i class="fa fa-file"></i></div>
						<a href="#" class="dez-tilte"><?= $kategori['kategori_loker']?></a>
						<p class="m-a0"><?= $kategori['jml']?> Lowongan</p>
						<div class="rotate-icon"><i class="fa fa-file"></i></div> 
					</div>
				</div>				
			</div>
			<?php endforeach?>
		</div>
	</div>
</div>
<!-- About Us END -->
<!-- Call To Action -->
<div class="section-full content-inner-2 call-to-action overlay-black-dark text-white text-center bg-img-fix" style="background-image: url(images/background/bg4.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="m-b10">Gabung Dengan Kami Sekarang!</h2>
				<p class="m-b0">Daftar sebagai Pencari Kerja dan temukan pekerjaan impianmu atau daftar sebagai Perusahaan dan temukan kandidat potensial</p>
				<a href="<?= base_url() ?>c_user/register" class="site-button m-t20 outline outline-2 radius-xl">Buat Akun</a>
			</div>
		</div>
	</div>
</div>
<!-- Call To Action END -->
<!-- Our Job -->
<div class="section-full bg-white content-inner-2">
	<div class="container">
		<div class="d-flex job-title-bx section-head">
			<div class="mr-auto">
				<h2 class="m-b5">Lowongan Terbaru</h2>
			</div>
			<div class="align-self-end">
				<a href="<?= base_url().'c_loker/loker_cari' ?>" class="site-button button-sm">Lihat semua lowongan <i class="fa fa-long-arrow-right"></i></a>
			</div>
		</div>
		<div class="row">
			<?php if(! $this->session->userdata('role')){?>
			<div class="col-lg-9">
				<ul class="post-job-bx">
					<?php foreach ($loker_data as $loker) :?>
					<li>
						<a href="<?= base_url().'c_loker/loker_detail/'.$loker->id_lowongan;?>">
							<div class="d-flex m-b30">
								<div class="job-post-company">
									<span><img src="images/logo/icon1.png"/></span>
								</div>
								<div class="job-post-info">
									<h4><?= $loker->judul?></h4>
									<ul>
										<li><i class="fa fa-map-marker"></i> <?= $loker->lokasi_kerja ?></li>
										<li><i class="fa fa-bookmark-o"></i> <?= $loker->jns_kontrak?></li>
										<li><i class="fa fa-clock-o"></i> <?= $loker->tgl_posting ?></li>
									</ul>
								</div>
							</div>
							<div class="d-flex">
								<div class="job-time mr-auto">
									<?php if(date('Y-m-d') > $loker->tgl_tutup){ ?>
									<span>Tutup</span>
									<?php }else{?>
									<span>Buka</span>
									<?php } ?>
								</div>
								<div class="salary-bx">
									<span><?= $loker->gaji?></span>
								</div>
							</div>
							<!-- <span class="post-like fa fa-heart-o"></span> -->
						</a>
					</li>
					<?php endforeach;?>
				</ul>
				<div class="m-t30">
					<div class="d-flex pagging">
						<?php echo $pagination ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="sticky-top">
					<div class="quote-bx">
						<div class="quote-info">
							<h4>Daftar Sebagai Pencari Kerja</h4>
							<p>Buat resume online Gratis untuk peroleh peluang kerja lebih baik.</p>
							<a href="<?= base_url() ?>c_user/register" class="site-button">Buat Akun</a>
						</div>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="col-lg-12">
				<ul class="post-job-bx">
					<?php foreach ($loker_data as $loker) :?>
					<li>
						<a href="<?= base_url().'c_loker/loker_detail/'.$loker->id_lowongan;?>">
							<div class="d-flex m-b30">
								<div class="job-post-company">
									<span><img src="<?= base_url().'uploads/images/'.$loker->logo;?>"/></span>
								</div>
								<div class="job-post-info">
									<h4><?= $loker->judul?></h4>
									<ul>
										<li><i class="fa fa-map-marker"></i> <?= $loker->lokasi_kerja ?></li>
										<li><i class="fa fa-bookmark-o"></i> <?= $loker->jns_kontrak?></li>
										<li><i class="fa fa-clock-o"></i> <?= $loker->tgl_posting ?></li>
									</ul>
								</div>
							</div>
							<div class="d-flex">
								<div class="job-time mr-auto">
									<?php if(date('Y-m-d') > $loker->tgl_tutup){ ?>
									<span class="text-danger">Tutup</span>
									<?php }else{?>
									<span>Buka</span>
									<?php } ?>
								</div>
								<div class="salary-bx">
									<span><?= $loker->gaji?></span>
								</div>
							</div>
							<!-- <span class="post-like fa fa-heart-o"></span> -->
						</a>
					</li>
					<?php endforeach;?>
				</ul>
				<div class="m-t30">
					<div class="d-flex pagging">
						<?php echo $pagination ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Our Job END -->	