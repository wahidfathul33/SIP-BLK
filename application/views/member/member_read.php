<div class="col-md-9">  
  <div class="box box-solid">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="pull-left header"><h2><span><i class="fa fa-user"></i></span> Profil <?php echo $nama; ?></h2></li><br>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="row">
                            <ul class="nav nav-tabs">
					          <li class="pull-left header"><h3><span><i class="fa fa-info-circle"></i></span> Informasi Umum </h3></li><br>
					          <?php if ($this->session->userdata('jenis_users') == '2' || $this->session->userdata('jenis_users') == '3') {
					          	echo '<li class="pull-right header"><a href="'?><?php echo base_url().'member/update/'.$this->session->userdata('id_users');?><?php echo'"><span><i class="fa fa-edit"></i></span></li></a><br>';
					          }
					          ?>
					        </ul><br>
						    <table class="table table-striped table-bordered table-hover">
							    <tr><td width="25%">Id member</td><td><?php echo $id_member; ?></td></tr>
							    <tr><td width="25%">Nama</td><td><?php echo $nama; ?></td></tr>
							    <tr><td width="25%">Agama</td><td><?php echo $agama; ?></td></tr>
							    <tr><td width="25%">Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
							    <tr><td width="25%">Gol Darah</td><td><?php echo $gol_darah; ?></td></tr>
							    <tr><td width="25%">Tmp Lahir</td><td><?php echo $tmp_lahir; ?></td></tr>
							    <tr><td width="25%">Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
							    <tr><td width="25%">Tinggi Badan</td><td><?php echo $tinggi_badan; ?></td></tr>
							    <tr><td width="25%">Berat Badan</td><td><?php echo $berat_badan; ?></td></tr>
							    <tr><td width="25%">Status Nikah</td><td><?php echo $status_nikah; ?></td></tr>
							    <tr><td width="25%">Alamat Ktp</td><td><?php echo $alamat_ktp; ?></td></tr>
							    <tr><td width="25%">Alamat Now</td><td><?php echo $alamat_now; ?></td></tr>
							    <tr><td width="25%">No Hp</td><td><?php echo $no_hp; ?></td></tr>
							    <tr><td width="25%">No Wa</td><td><?php echo $no_wa; ?></td></tr>
							    <tr><td width="25%">Pendidikan</td><td><?php echo $pendidikan; ?></td></tr>
							    <tr><td width="25%">Sekolah</td><td><?php echo $sekolah; ?></td></tr>
							    <tr><td width="25%">Jurusan</td><td><?php echo $Jurusan; ?></td></tr>
							    <tr><td width="25%">Pbk Tahun</td><td><?php echo $pbk_tahun; ?></td></tr>
							    <tr><td width="25%">Pbk Angkatan</td><td><?php echo $pbk_angkatan; ?></td></tr>
							    <tr><td width="25%">Foto</td><td align="left"><img align="left" class="profile-user-img img-responsive" src="<?php echo base_url().'/uploads/img/'.$foto?>" alt="User profile picture"></td></tr>
							</table>
						</div>
					</div>
					<div class="col-md-12">
                        <div class="row">
                            <ul class="nav nav-tabs">
					          <li class="pull-left header"><h3><span><i class="fa fa-graduation-cap"></i></span> Riwayat Pendidikan </h3></li><br>
					          <?php if ($this->session->userdata('jenis_users') == '2' || $this->session->userdata('jenis_users') == '3') {
					          	echo '<li class="pull-right header"><a href="'?><?php echo base_url().'riwayat_pendidikan/read/'.$this->session->userdata('id_users');?><?php echo'"><span><i class="fa fa-edit"></i></span></li></a><br>';
					          }
					          ?>
					        </ul><br>
						    <table class="table table-striped table-bordered table-hover">
	                            <tr>
			                		<th>Nama Sekolah</th>
			                		<th>Jurusan</th>
			                		<th>Thn Masuk</th>
			                		<th>Thn Keluar</th>
			                	</tr><?php 
			                	if ($riwayat_pendidikan_data) {
	                            foreach ($riwayat_pendidikan_data as $riwayat_pendidikan)
	                            {
	                                ?>
	                            <tr>
		                			<td><?php echo $riwayat_pendidikan->nama_sekolah ?></td>
		                			<td><?php echo $riwayat_pendidikan->jurusan ?></td>
		                			<td><?php echo $riwayat_pendidikan->thn_masuk ?></td>
		                			<td><?php echo $riwayat_pendidikan->thn_lulus ?></td>
		                		</tr><?php
					            }
					        	}else {
					        		echo 'Data Tidak Ditemukan';
					        	}
					            ?>
							</table>
						</div>
					</div>
					<div class="col-md-12">
                        <div class="row">
                            <ul class="nav nav-tabs">
					          <li class="pull-left header"><h3><span><i class="fa fa-black-tie"></i></span> Riwayat Kerja </h3></li><br>
					          <?php if ($this->session->userdata('jenis_users') == '2' || $this->session->userdata('jenis_users') == '3') {
					          	echo '<li class="pull-right header"><a href="'?><?php echo base_url().'riwayat_kerja/read/'.$this->session->userdata('id_users');?><?php echo'"><span><i class="fa fa-edit"></i></span></li></a><br>';
					          }
					          ?>
					        </ul><br>
						    <table class="table table-striped table-bordered table-hover">
                            <tr>
		                		<th>Nama Perusahaan</th>
		                		<th>Jabatan</th>
		                		<th>Masa Kerja</th>
                            </tr><?php
                            if ($riwayat_kerja_data) {
                            foreach ($riwayat_kerja_data as $riwayat_kerja)
                            {
                                ?>
                            <tr>
	                			<td><?php echo $riwayat_kerja->nama_perusahaan ?></td>
	                			<td><?php echo $riwayat_kerja->jabatan ?></td>
	                			<td><?php echo $riwayat_kerja->masa_kerja ?></td>
                			</tr>
                            <?php
                            }
                        	}else{
                        		echo 'Data Tidak Ditemukan';
                        	}
                            ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>