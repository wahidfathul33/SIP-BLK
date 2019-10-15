<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo base_url();?>assets/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Profil</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="#">Beranda</a></li>
                        <li>Profil</li>
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
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-xlg-12 col-md-12 m-b-20" style="width: 100%; margin-top: -60px;">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
                        <ul class="nav nav-pills">
                            <li class="nav-item active" >
                                <a class="nav-link" data-toggle="pill" href="#dashboard"><i class="fa fa-user-o"></i> Profil</a>
                            </li>
                            <li class="nav-item b-l" >
                                <a class="nav-link" data-toggle="pill" href="#lamaran"><i class="fa fa-file-o"></i> Lamaran Kerja</a>
                            </li>
                            <li class="nav-item b-l" >
                                <a class="nav-link" data-toggle="pill" href="#berita"><i class="fa fa-bell-o"></i> Berita Panggilan <?php if($jml_berita){?><span class="badge badge-danger"><?= $jml_berita; ?></span><?php } ?></a>
                            </li>
                            <li class="nav-item b-l" >
                                <a class="nav-link" data-toggle="pill" href="#setting"><i class="fa fa-cog"></i> Setting</a>
                            </li>
                            <li class="nav-item b-l" >
                                <a class="nav-link" data-toggle="pill" href="#cetakcv"><i class="fa fa-print"></i> Cetak CV</a>
                            </li>
                            <li class="nav-item b-l "><a class="nav-link text-danger" href="<?=base_url()?>c_login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <?= $this->session->flashdata('notif');?>
            <!-- Column -->
            <div class="row">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                            <?php if($foto){?>
                            <img src="<?= base_url()?>uploads/images/avatar/<?= $foto?>" class="img-circle" width="150" />
                            <?php }else{?>
                            <img src="<?= base_url()?>uploads/images/avatar/default-avatar.jpg" class="img-circle" width="150" />
                            <?php } ?>
                            <h4 class="card-title m-t-10"><?= $nama; ?></h4>
                            <h6 class="card-subtitle">Anda masuk sebagai Member <?= $jenis_user; ?></h6>
                            </center>
                        </div>
                        <div>
                        <hr> </div>
                        <div class="card-body">
                            <small class="text-muted ">NIK</small><h6><?= $nik ?></h6>
                            <small class="text-muted p-t-30 db">Umur</small><h6><?= $umur; ?> Tahun</h6>
                            <small class="text-muted p-t-30 db">Email address </small><h6><?= $email ?></h6>
                            <small class="text-muted p-t-30 db">Nomor Telepon</small><h6><?= $no_hp; ?></h6>
                            <small class="text-muted p-t-30 db">Alamat</small><h6><?= $alamat_now.', '.$kel_now.', '.$kec_now.', '.$kota_now.', '.$prov_now; ?></h6>
                            <small class="text-muted p-t-30 db">Bergabung Sejak</small><h6><?= $tgl_gabung ?></h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="tab-content">
                        <div class="tab-pane active" id="dashboard" role="tabpanel">
                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profil" role="tab">Profil</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pendidikan" role="tab">Pendidikan</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kerja" role="tab">Pengalaman Kerja</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#organisasi" role="tab">Organisasi</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kursus" role="tab">Kursus</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bahasa" role="tab">Bahasa Asing</a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profil" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row p-20">
                                                
                                                <h5 style="width: 100%"> Informasi Umum<span class="pull-right"><a href="<?= base_url()?>c_member/profil_edit" data-toggle="tooltip" data-placement="top" title="Tambah Data"><h4><i class="fa fa-edit"></i></h4></a></span></h5>
                                                <table class="table table-striped table-bordered">
                                                    <tr><td width="25%" class="font-weight-bold">NIK</td><td><?= $nik; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Nama</td><td><?= $nama; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Agama</td><td><?= $agama; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Jenis Kelamin</td><td><?= $jk; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Golongan Darah</td><td><?= $gol_darah; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Tempat Lahir</td><td><?= $tmp_lahir; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Tanggal Lahir</td><td><?= $tgl_lahir; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Tinggi Badan</td><td><?= $tinggi_badan; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Berat Badan</td><td><?= $berat_badan; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Status Nikah</td><td><?= $status_nikah; ?></td></tr>
                                                </table>
                                                <h5 style="width: 100%" class="p-t-20"> Kontak</h5>
                                                <table class="table table-striped table-bordered">
                                                    <tr><td width="25%" class="font-weight-bold">Nomor Hp</td><td><?= $no_hp; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Nomor Whatsapp</td><td><?= $no_wa; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Email</td><td><?= $email; ?></td></tr>
                                                </table>
                                                <h5 style="width: 100%" class="p-t-20"> Alamat Pada KTP</h5>
                                                <table class="table table-striped table-bordered">
                                                    <tr><td width="25%" class="font-weight-bold">Alamat Pada KTP</td><td><?= $alamat_ktp.', '.$kel_ktp.', '.$kec_ktp; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Kota/Kabupaten</td><td><?= $kota_ktp; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Provinsi</td><td><?= $prov_ktp; ?></td></tr>
                                                </table>
                                                <h5 style="width: 100%" class="p-t-20"> Alamat Sekarang</h5>
                                                <table class="table table-striped table-bordered">
                                                    <tr><td width="25%" class="font-weight-bold">Alamat Sekarang</td><td><?= $alamat_now.', '.$kel_now.', '.$kec_now; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Kota/Kabupaten</td><td><?= $kota_now; ?></td></tr>
                                                    <tr><td width="25%" class="font-weight-bold">Provinsi</td><td><?= $prov_now; ?></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-pane" id="pendidikan" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row p-20">
                                                <h5 style="width: 100%" class="b-b"> Riwayat Pendidikan<span class="pull-right"><a href="#" data-toggle="modal" data-target="#pendidikanModal" data-toggle="tooltip" data-placement="top" title="Tambah Data"><h3><i class="fa fa-plus-circle"></i></h3></a></span></h5>
                                                <?php if ($riwayat_pendidikan_data) { ?>
                                                <table class="table table-striped table-bordered">
                                                    
                                                    <tr>
                                                        <th>Nama Sekolah</th>
                                                        <th>Jurusan</th>
                                                        <th>Tahun Masuk</th>
                                                        <th>Tahun Lulus</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    
                                                    <?php foreach ($riwayat_pendidikan_data as $pendidikan) :?>
                                                    <tr>
                                                        <td><?php echo $pendidikan->nama_sekolah ?></td>
                                                        <td><?php echo $pendidikan->jurusan ?></td>
                                                        <td><?php echo $pendidikan->thn_masuk ?></td>
                                                        <td><?php echo $pendidikan->thn_lulus ?></td>
                                                        <td>
                                                            <a href="<?= base_url().'c_member/pendidikan_del/'.$pendidikan->id_pendidikan;?>" class="btn btn-sm btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    
                                                </table>
                                                <?php }else { echo 'Data Tidak Ditemukan'; } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-pane" id="kerja" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row p-20">
                                                <h5 style="width: 100%" class="b-b"> Pengalaman Kerja<span class="pull-right"><a href="#" data-toggle="modal" data-target="#kerjaModal" data-toggle="tooltip" data-placement="top" title="Tambah Data"><h3><i class="fa fa-plus-circle"></i></h3></a></span></h5>
                                                <?php if ($riwayat_kerja_data) { ?>
                                                <table class="table table-striped table-bordered">
                                                    
                                                    <tr>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Jabatan</th>
                                                        <th>Tanggal Mulai</th>
                                                        <th>Tanggal Selesai</th>
                                                        <th>Alasan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($riwayat_kerja_data as $kerja) :?>
                                                    <tr>
                                                        <td><?php echo $kerja->nama_perusahaan ?></td>
                                                        <td><?php echo $kerja->jabatan ?></td>
                                                        <td><?php echo $kerja->tgl_mulai ?></td>
                                                        <td><?php echo $kerja->tgl_selesai ?></td>
                                                        <td><?php echo $kerja->alasan ?></td>
                                                        <td>
                                                            <a href="<?= base_url().'c_member/kerja_del/'.$kerja->id_pekerjaan;?>" class="btn btn-sm btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                                <?php }else { echo 'Data Tidak Ditemukan'; } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-pane" id="kursus" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row p-20">
                                                <h5 style="width: 100%" class="b-b"> Kursus/Pelatihan<span class="pull-right"><a href="#" data-toggle="modal" data-target="#kursusModal" data-toggle="tooltip" data-placement="top" title="Tambah Data"><h3><i class="fa fa-plus-circle"></i></h3></a></span></h5>
                                                <?php  if ($kursus_data) { ?>
                                                <table class="table table-striped table-bordered">
                                                    
                                                    <tr>
                                                        <th>Nama Tempat</th>
                                                        <th>Nama Pelatihan</th>
                                                        <th>Tahun Mulai</th>
                                                        <th>Tahun Selesai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($kursus_data as $kursus) :?>
                                                    <tr>
                                                        <td><?php echo $kursus->tempat ?></td>
                                                        <td><?php echo $kursus->nama_pelatihan ?></td>
                                                        <td><?php echo $kursus->tgl_mulai ?></td>
                                                        <td><?php echo $kursus->tgl_selesai ?></td>
                                                        <td>
                                                            <a href="<?= base_url().'c_member/kursus_del/'.$kursus->id_kursus;?>" class="btn btn-sm btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                                <?php }else { echo 'Data Tidak Ditemukan'; } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-pane" id="organisasi" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row p-20">
                                                <h5 style="width: 100%" class="b-b"> Riwayat Organisasi<span class="pull-right"><a href="#" data-toggle="modal" data-target="#organisasiModal" data-toggle="tooltip" data-placement="top" title="Tambah Data"><h3><i class="fa fa-plus-circle"></i></h3></a></span></h5>
                                                <?php if ($organisasi_data) { ?>
                                                <table class="table table-striped table-bordered">
                                                    
                                                    <tr>
                                                        <th>Nama Organisasi</th>
                                                        <th>Tempat</th>
                                                        <th>Jabatan</th>
                                                        <th>Periode</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($organisasi_data as $organisasi) :?>
                                                    <tr>
                                                        <td><?php echo $organisasi->nama_organisasi ?></td>
                                                        <td><?php echo $organisasi->tempat ?></td>
                                                        <td><?php echo $organisasi->jabatan ?></td>
                                                        <td><?php echo $organisasi->periode ?></td>
                                                        <td>
                                                            <a href="<?= base_url().'c_member/organisasi_del/'.$organisasi->id_organisasi;?>" class="btn btn-sm btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                                <?php }else { echo 'Data Tidak Ditemukan'; } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-pane" id="bahasa" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row p-20">
                                                <h5 style="width: 100%" class="b-b"> Kemampuan Bahasa Asing<span class="pull-right"><a href="#" data-toggle="modal" data-target="#bahasaModal" data-toggle="tooltip" data-placement="top" title="Tambah Data"><h3><i class="fa fa-plus-circle"></i></h3></a></span></h5>
                                                <?php if ($bahasa_data) { ?>
                                                <table class="table table-striped table-bordered">
                                                    
                                                    <tr>
                                                        <th>Bahasa</th>
                                                        <th>Bicara</th>
                                                        <th>Membaca</th>
                                                        <th>Mendengar</th>
                                                        <th>Menulis</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($bahasa_data as $bahasa) :?>
                                                    <tr>
                                                        <td><?php echo $bahasa->bahasa ?></td>
                                                        <td><?php echo $bahasa->bicara ?></td>
                                                        <td><?php echo $bahasa->membaca ?></td>
                                                        <td><?php echo $bahasa->mendengar ?></td>
                                                        <td><?php echo $bahasa->menulis ?></td>
                                                        <td>
                                                            <a href="<?= base_url().'c_member/bahasa_del/'.$bahasa->id_bhs;?>" class="btn btn-sm btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                                <?php }else { echo 'Data Tidak Ditemukan'; } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane" id="lamaran" role="tabpanel">
                            <div class="card card-outline-info">
                                <div class="card-header text-white h5"><i class="fa fa-file-o"></i> Lamaran Kerja</div>
                                <div class="card-body">
                                    <div class="row p-20">
                                        <?php if ($lamaran_data) {?>
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th style="width: 10px">No.</th>
                                                <th>Tanggal</th>
                                                <th>Perusahaan</th>
                                                <th>Lowongan</th>
                                                <th>Status</th>
                                            </tr>
                                            <?php
                                                $start = 0;
                                                foreach ($lamaran_data as $lamaran) :
                                                    $d = explode(' ',$lamaran->tgl_apply);
                                                    $tgl = $d[0];
                                                    $time = $d[1];
                                            ?>
                                            <tr>
                                                <td width="80px"><?php echo ++$start ?></td>
                                                <td><?php echo date(('d F Y'), strtotime($tgl)) ?></td>
                                                <td><?php echo $lamaran->nama_perusahaan ?></td>
                                                <td><?php echo $lamaran->judul ?></td>
                                                <td>
                                                    <div class="bg-green-active color-palette"><?php echo $lamaran->status ?></div>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </table>
                                        <?php }else{ echo "<p>Data tidak ditemukan</p>"; } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane" id="berita" role="tabpanel">
                            <div class="card card-outline-danger">
                                <div class="card-header text-white h5"><i class="fa fa-bell-o"></i> Berita Panggilan</div>
                                <div class="card-body">
                                    <div class="row p-20">
                                        <?php if ($berita_data) {?>
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th style="width: 10px">No.</th>
                                                <th>Judul</th>
                                                <th>Jenis Tes</th>
                                                <th>Tanggal</th>
                                                <th>Lokasi</th>
                                            </tr>
                                            <?php
                                                $start = 0;
                                                foreach ($berita_data as $berita) : ?>
                                            <tr>
                                                <td width="80px"><?php echo ++$start ?></td>
                                                <td><?php echo $berita->header ?></td>
                                                <td><?php echo $berita->jenis_tes ?></td>
                                                <td><?php echo $berita->tanggal ?></td>
                                                <td><?php echo $berita->lokasi ?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </table>
                                        <?php }else{ echo "<p>Data tidak ditemukan</p>"; } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane" id="setting" role="tabpanel">
                            <div class="card card-outline-inverse">
                                <div class="card-header text-white h5"><i class="fa fa-cog"></i> Setting</div>
                                <div class="card-body">
                                    <div class="col-12 h5">Ubah Password</div>
                                    <form class="m-t-40" action="<?php echo base_url()?>c_member/ubah_password" method="post" novalidate>
                                        <div class="col-md-6 form-group">
                                            <div class="controls">
                                                <label class="font-weight-700 font-weight-bold" for="password">Password Lama <span class="text-danger">*</span></label>
                                                <input name="password_old" type="password" class="form-control" id="password_old"   required data-validation-required-message="Password tidak boleh kosong" placeholder="Password Lama">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="controls">
                                                <label class="font-weight-700 font-weight-bold" for="password">Password Baru <span class="text-danger">*</span></label>
                                                <input name="password_new" type="password" class="form-control" id="password"   required data-validation-required-message="Password Baru tidak boleh kosong" minlength="6" data-validation-minlength-message="Password minimal 6 karakter" placeholder="Password Baru">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="controls">
                                                <label class="font-weight-700 font-weight-bold" for="passconf">Ulangi Password <span class="text-danger">*</span></label>
                                                <input name="passconf" type="password" class="form-control" id="passconf"   required data-validation-required-message="Ulangi password baru tidak boleh kosong" data-validation-match-match="password_new" data-validation-match-message="Password tidak sama" placeholder="Ulangi Password Baru">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" class="filled-in" id="show_pass" onclick="Toggle()" />
                                                <label for="show_pass">Lihat password</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="bt">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane" id="cetakcv" role="tabpanel">
                            <div class="card card-outline-primary">
                                <div class="card-header text-white h5"><i class="fa fa-print"></i> Cetak CV</div>
                                <div class="card-body">
                                    <div class="row p-20">
                                        Cetak CV
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- tab pane -->
                    </div>
                    <!-- tabpanel -->
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
        </div>
    </div>
</div>
<!-- modal -->
<!-- pendidikan modal -->
<div class="modal fade" id="pendidikanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Riwayat Pendidikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>c_member/pendidikan_input" method="post" novalidate>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Nama Sekolah</h6>
                            <input name="sekolah" type="text" class="form-control" required data-validation-required-message="Nama Sekolah tidak boleh kosong" placeholder="Nama Sekolah" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Jurusan</h6>
                            <input name="jurusan" type="text" class="form-control" required data-validation-required-message="Jurusan tidak boleh kosong" placeholder="Jurusan" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tahun Masuk</h6>
                            <input name="thn_masuk" type="text" class="form-control" required data-validation-required-message="Tahun Masuk tidak boleh kosong" placeholder="Tahun Masuk" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tahun Lulus</h6>
                            <input name="thn_lulus" type="text" class="form-control" required data-validation-required-message="Tahun Lulus tidak boleh kosong" placeholder="Tahun Lulus" style="padding-left: 5px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- pengalaman kerja modal -->
<div class="modal fade" id="kerjaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Pengalaman Kerja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>c_member/kerja_input" method="post" novalidate>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Perusahaan</h6>
                            <input name="perusahaan" type="text" class="form-control" required data-validation-required-message="Perusahaan tidak boleh kosong" placeholder="Perusahaan" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Posisi/Jabatan</h6>
                            <input name="jabatan" type="text" class="form-control" required data-validation-required-message="Posisi/Jabatan tidak boleh kosong" placeholder="Posisi/Jabatan" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tanggal tgl_mulai</h6>
                            <input name="tgl_mulai" type="text" class="form-control datepicker" required data-validation-required-message="Tanggal tgl_mulai tidak boleh kosong" placeholder="Tanggal tgl_mulai" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tanggal Selesai</h6>
                            <input name="tgl_selesai" type="text" class="form-control datepicker" required data-validation-required-message="Tanggal Selesai tidak boleh kosong" placeholder="Tanggal Selesai" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Alasan</h6>
                            <textarea name="alasan" type="text" class="form-control" required data-validation-required-message="Alasan tidak boleh kosong" style="padding-left: 5px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- organisasi modal -->
<div class="modal fade" id="organisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Riwayat Organisasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>c_member/organisasi_input" method="post" novalidate>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Nama Organisasi</h6>
                            <input name="nama_org" type="text" class="form-control" required data-validation-required-message="Nama Organisasi tidak boleh kosong" placeholder="Nama Organisasi" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tempat</h6>
                            <input name="tempat" type="text" class="form-control" required data-validation-required-message="Tempat tidak boleh kosong" placeholder="Tempat" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Jabatan</h6>
                            <input name="jabatan" type="text" class="form-control" required data-validation-required-message="Jabatan tidak boleh kosong" placeholder="Jabatan" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Periode</h6>
                            <input name="periode" type="text" class="form-control" required data-validation-required-message="Periode tidak boleh kosong" placeholder="Periode" style="padding-left: 5px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- kursus modal -->
<div class="modal fade" id="kursusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Riwayat Pendidikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>c_member/kursus_input" method="post" novalidate>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tempat</h6>
                            <input name="tempat" type="text" class="form-control" required data-validation-required-message="Tempat tidak boleh kosong" placeholder="Tempat" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Nama Pelatihan</h6>
                            <input name="nama_pelatihan" type="text" class="form-control" required data-validation-required-message="Nama Pelatihan tidak boleh kosong" placeholder="Nama Pelatihan" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tanggal Mulai</h6>
                            <input name="tgl_mulai" type="text" class="form-control datepicker" required data-validation-required-message="Tanggal Mulai tidak boleh kosong" placeholder="Tanggal Mulai" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Tanggal Selesai</h6>
                            <input name="tgl_selesai" type="text" class="form-control datepicker" required data-validation-required-message="Tanggal Selesai tidak boleh kosong" placeholder="Tanggal Selesai" style="padding-left: 5px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- bahasa modal -->
<div class="modal fade" id="bahasaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Kemampuan Bahasa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>c_member/bahasa_input" method="post" novalidate>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Bahasa</h6>
                            <input name="bahasa" type="text" class="form-control" required data-validation-required-message="Bahasa tidak boleh kosong" placeholder="Bahasa" style="padding-left: 5px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Bicara</h6>
                            <select name="bicara" type="text" class="form-control" required data-validation-required-message="Bicara tidak boleh kosong" placeholder="NIK" style="padding-left: 5px;">
                                <option value="">Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Pasif">Pasif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Membaca</h6>
                            <select name="membaca" type="text" class="form-control" required data-validation-required-message="Membaca tidak boleh kosong" placeholder="NIK" style="padding-left: 5px;">
                                <option value="">Pilih</option>
                                <option value="Bisa">Bisa</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Mendengar</h6>
                            <select name="mendengar" type="text" class="form-control" required data-validation-required-message="Mendengar tidak boleh kosong" placeholder="NIK" style="padding-left: 5px;">
                                <option value="">Pilih</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <h6>Menulis</h6>
                            <select name="menulis" type="text" class="form-control" required data-validation-required-message="Menulis tidak boleh kosong" placeholder="NIK" style="padding-left: 5px;">
                                <option value="">Pilih</option>
                                <option value="Bisa">Bisa</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>