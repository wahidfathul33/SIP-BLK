 <!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Cari Lowongan</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="#">Beranda</a></li>
						<li>Cari Lowongan</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
		<!-- Browse Jobs -->
		<div class="section-full bg-white browse-job content-inner-2">
			<div class="container">
				<p class="font-italic"><?= $this->session->flashdata('pencarian')?></p>
				<div class="row">
					<div class="col-xl-9 col-lg-8">
						<?php if (!$loker_data) { ?>
						<h2>Data tidak ditemukan</h2>
						<?php }else{?>
						<h5 class="widget-title font-weight-700 text-uppercase">Lowongan</h5>
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
						<div class="pagination-bx m-t30">
							<div class="d-flex pagging">
								<?php echo $pagination ?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="col-xl-3 col-lg-4">
						<form class="dezPlaceAni" action="<?= base_url()?>c_loker/loker_cari" method="get">	
							<div class="sticky-top">
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">Keywords</h5>
									<div class="">
										<input type="text" name="keyword" class="form-control" placeholder="Search">
									</div>
								</div>
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 m-t0 text-uppercase">Lokasi</h5>
									<select class="select2" name="lokasi" style="width: 100%">
	                                    <option value="">Please Select</option>
	                                    <?php foreach ($lokasi as $lokasi) :
	                                        ?>
	                                        <option value="<?php echo $lokasi['kota_name']; ?>"><?php echo $lokasi['kota_name'] ?></option>
	                                    <?php endforeach; ?>
                                	</select>
								</div>
								
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">Kategori</h5>
									<select class="select2" name="kategori" style="width: 100%">
										<option value="">Please Select</option>
	                                    <?php foreach ($kategori as $kategori) :
	                                        ?>
	                                        <option value="<?php echo $kategori->nama_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
	                                    <?php endforeach; ?>
									</select>
								</div>
								<div class="clearfix">
									<button type="submit" class="site-button btn-block">Cari</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <!-- Browse Jobs END -->
	</div>
</div>
<!-- Content END