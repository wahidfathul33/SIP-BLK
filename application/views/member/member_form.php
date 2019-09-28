
<!-- /.col -->
<div class="col-md-9">  
  <div class="box box-solid">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="pull-left header"><h2>Update Profil</h2> </li><br>
        </ul>
        <ul class="nav nav-tabs pull-left">
          <li class="active"><a href="<?php echo base_url().'member/update/'.$this->session->userdata('id_users');?>">Data Diri</a></li>
          <li><a href="<?php echo base_url().'riwayat_pendidikan';?>" >Riwayat Pendidikan</a></li>
          <li ><a href="<?php echo base_url().'riwayat_kerja';?>" >Riwayat Kerja</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url().'member/create';?>">Action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
                <div class="box-body">
                 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <div class="form-group">
                                    <label for="foto">Foto <?php echo form_error('foto') ?></label>
                                    <input class="form-control" type="file" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" required="required"/>
                                </div>
                            </div><br>
                            <div class="box-header with-border">
                              <h3 class="box-title"><b>Informasi Umum</b> </h3>
                            </div><br>
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="id_users" id="id_users" placeholder="" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                <div class="form-group">
                                    <label for="int">NIK <?php echo form_error('id_member') ?></label>
                                    <input type="text" class="form-control" name="id_member" id="id_member" placeholder="NIK" value="<?php echo $id_member; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Nama Lengkap <?php echo form_error('nama') ?></label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Agama <?php echo form_error('agama') ?></label>
                                    <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="varchar">Tempat Lahir <?php echo form_error('tmp_lahir') ?></label>
                                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir" value="<?php echo $tmp_lahir; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="varchar">Tinggi Badan <?php echo form_error('tinggi_badan') ?></label>
                                    <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>">
                                        <option>-Pilih jenis kelamin-</option>
                                        <option value="Laki-laki" <?php if ($jenis_kelamin == 'Laki-laki') {
                                            echo 'selected="selected"';
                                        }?>>Laki-laki</option>
                                        <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') {
                                            echo 'selected="selected"';
                                        }?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Golongan Darah <?php echo form_error('gol_darah') ?></label>
                                    <select class="form-control" name="gol_darah" id="gol_darah" placeholder="Gol Darah" value="<?php echo $gol_darah; ?>">
                                        <option>-Pilih golongan darah-</option>
                                        <option value="A" <?php if ($gol_darah == 'A') {
                                            echo 'selected="selected"';
                                        }?>>A</option>
                                        <option value="B" <?php if ($gol_darah == 'B') {
                                            echo 'selected="selected"';
                                        }?>>B</option>
                                        <option value="AB" <?php if ($gol_darah == 'AB') {
                                            echo 'selected="selected"';
                                        }?>>AB</option>
                                        <option value="O" <?php if ($gol_darah == 'O') {
                                            echo 'selected="selected"';
                                        }?>>O</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Status Nikah <?php echo form_error('status_nikah') ?></label>
                                    <input type="text" class="form-control" name="status_nikah" id="status_nikah" placeholder="Status Nikah" value="<?php echo $status_nikah; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Berat Badan <?php echo form_error('berat_badan') ?></label>
                                    <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                      <hr>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="box-header with-border">
                               <h3 class="box-title"><b>Nomor Kontak</b> </h3>
                          </div><br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="int">Nomor Handphone <?php echo form_error('no_hp') ?></label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone" value="<?php echo $no_hp; ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="int">Nomor WhatsApp <?php echo form_error('no_wa') ?></label>
                                    <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="Nomor WhatsApp" value="<?php echo $no_wa; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="box-header with-border">
                               <h3 class="box-title"><b>Alamat</b> </h3>
                          </div><br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_ktp">Alamat Ktp <?php echo form_error('alamat_ktp') ?></label>
                                    <textarea class="form-control" rows="3" name="alamat_ktp" id="alamat_ktp" placeholder="Alamat Ktp"><?php echo $alamat_ktp; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_now">Alamat Sekarang <?php echo form_error('alamat_now') ?></label>
                                    <textarea class="form-control" rows="3" name="alamat_now" id="alamat_now" placeholder="Alamat Now"><?php echo $alamat_now; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                        <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>Pendidikan Terakhir</b> </h3>
                            </div><br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="varchar">Pendidikan Terakhir<?php echo form_error('pendidikan') ?></label>
                                    <select class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan">
                                        <option>- Pilih -</option>
                                        <option value="SLTA" <?php if ($pendidikan == 'SLTA') {
                                            echo 'selected="selected"';
                                        }?> >SLTA</option>
                                        <option value="Diploma" <?php if ($pendidikan == 'Diploma') {
                                            echo 'selected="selected"';
                                        }?>>Diploma</option>
                                        <option value="Sarjana" <?php if ($pendidikan == 'Sarjana') {
                                            echo 'selected="selected"';
                                        }?>>Sarjana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="varchar">Sekolah <?php echo form_error('sekolah') ?></label>
                                    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Sekolah"  value="<?php echo $sekolah?>" />
                                </div>
                                <div class="form-group">
                                    <label for="int">Tahun Masuk <?php echo form_error('pbk_angkatan') ?></label>
                                    <input type="text" class="form-control" name="pbk_angkatan" id="Tahun Masuk" placeholder="Pbk Angkatan" value="<?php echo $pbk_angkatan; ?>" />
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    if ($this->session->userdata('jenis_users') == '2') {
                                        echo '
                                                <div class="form-group">
                                                    <label for="varchar">Jurusan'.form_error('Jurusan').'</label>
                                                    <input type="text" class="form-control" name="Jurusan" id="Jurusan" placeholder="Jurusan" value="'.$Jurusan.'" />
                                                </div>
                                        ';
                                    }else{
                                        echo '
                                                <div class="form-group">
                                                    <label for="varchar">Jurusan'.form_error('Jurusan').'</label>
                                                    <input type="text" class="form-control" name="Jurusan" id="Jurusan" placeholder="Jurusan" value="'. $Jurusan.'" />
                                                </div>
                                        ';
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="int">Tahun Lulus<?php echo form_error('pbk_tahun') ?></label>
                                    <input type="text" class="form-control" name="pbk_tahun" id="pbk_tahun" placeholder="Pbk Tahun" value="<?php echo $pbk_tahun; ?>" />
                                </div>
                                
                            </div>
                        </div>
                    </div>      
                 </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>