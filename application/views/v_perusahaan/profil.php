<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <?php echo $this->session->flashdata('notif');?>
                <h3 class="box-title">Info Perusahaan <span><a href="<?= base_url()?>c_perusahaan/profil_edit" class="float-right btn btn-primary"><i class="fa fa-edit"></i> Edit profil</a></span></h3>

                <hr class="m-t-0 m-b-40">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?= base_url()?>uploads/images/<?= $logo?>" class="w-100" alt="logo-perusahaan">
                        <div class="caption">
                          <p class="text-center">Logo Perusahaan</p>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-8">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Nama Perusahaan</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p><?= $nama_perusahaan;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label text-left col-md-3">Skala Perusahaan</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-7">
                                <p><?= $skala;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label text-left col-md-3">Bidang Industri</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-7">
                                <p><?= $bidang_usaha;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label text-left col-md-3">Email</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-7">
                                <p><?= $email;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label text-left col-md-3">Nomor Telepon</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-7">
                                <p><?= $no_telpon;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label text-left col-md-3">Website</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-7">
                                <p><?= $website;?></p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="box-title m-t-15">Alamat</h3>
                <hr class="m-t-0 m-b-40">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Alamat</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p class="text-left"> <?= $alamat ?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Kode Pos</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p class="text-left"> <?= $kode_pos ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Kelurahan</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p class="text-left"> <?= $kelurahan ?> </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Kecamatan</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p class="text-left"> <?= $kecamatan ?> </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Kab. / Kota</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p class="text-left"> <?= $kota ?> </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label text-left col-md-3">Provinsi</label>
                            <label class="control-label text-left">:</label>
                            <div class="col-md-8">
                                <p class="text-left"> <?= $provinsi ?> </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <h3 class="box-title m-t-15">Deskripsi Perusahaan</h3>
                <hr class="m-t-0 m-b-40">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-justify"><?= $deskripsi?></p>
                    </div>
                </div>
                <h3 class="box-title m-t-15">Berkas Perusahaan</h3>
                <hr class="m-t-0 m-b-40">
                <div class="row">
                    <div class="col-md-12 " align="center">
                        <a href="<?= base_url()?>uploads/documents/<?= $siup?>" target="_blank" style="text-decoration: none; color: white;">
                        <div class="col-md-5 b-all btn btn-info bg-inverse p-20" style="height: 60px">
                            Lihat SIUP
                        </div></a>
                        <a href="<?= base_url()?>uploads/documents/<?= $npwp?>" target="_blank" style="text-decoration: none; color: white;">
                        <div class="col-md-5 b-all btn btn-info bg-inverse p-20" style="height: 60px">
                            Lihat NPWP
                        </div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->