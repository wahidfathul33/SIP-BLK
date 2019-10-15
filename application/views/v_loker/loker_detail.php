<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Detail Lowongan</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="#">Beranda</a></li>
						<li>Detail Lowongan</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Job Detail -->
		<div class="section-full content-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="sticky-top">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<div class="m-b30">
										<img src="<?= base_url().'uploads/images/'.$loker->logo;?>" alt="">
									</div>
								</div>
								<div class="col-lg-12 col-md-6">
									<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
										<h4 class="text-black font-weight-700 p-t10 m-b15">Detail Lowongan</h4>
										<ul>
											<li><i class="fa fa-building-o"></i><strong class="font-weight-700 text-black">Perusahaan</strong><span class="text-black-light"> <?= $loker->nama_perusahaan ?> </span></li>
											<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Alamat</strong><span class="text-black-light"> <?php $alamat = json_decode($loker->alamat_perusahaan); echo $alamat->alamat.', '.$alamat->kelurahan.', '.$alamat->kecamatan.', '.$alamat->kota.', '.$alamat->provinsi; ?> </span></li>
											<li><i class="ti-money"></i><strong class="font-weight-700 text-black">Gaji</strong> <?= $loker->gaji ?></li>
											<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Pengalaman</strong><?= $loker->thn_pengalaman ?></li>
										</ul>
									</div>
								</div>
							</div>
                        </div>
					</div>
					<div class="col-lg-8">
						<div class="job-info-box">
							<h3 class="m-t0 m-b10 font-weight-700 title-head">
								<a href="#" class="text-secondry m-r30"><?= $loker->judul ?></a>
							</h3>
							<ul class="job-info">
								<li><strong>Pendidikan:</strong> <?= $loker->pendidikan ?></li>
								<li><strong>Tutup:</strong> <?= $loker->tgl_tutup ?></li>
								<li><i class="ti-location-pin text-black m-r5"></i> <?= $loker->lokasi_kerja ?> </li>
							</ul><br>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<?= $loker->ket_lowongan ?>
							<?php if($this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){if(!$cek_daftar){?>
							<a href="<?= base_url().'c_loker/lamaran/'.$loker->id_lowongan ?>" class="site-button">Daftar</a>
							<?php }else{?>
							<button class="site-button">Anda Telah Terdaftar</button>
							<?php }}else{} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>