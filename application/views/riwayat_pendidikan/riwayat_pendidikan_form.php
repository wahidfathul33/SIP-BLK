<div class="col-md-9">  
  <div class="box box-solid">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="pull-left header"><h2>Update Profil</h2> </li><br>
        </ul>
        <ul class="nav nav-tabs pull-left">
          <li ><a href="<?php echo base_url().'member/update/'.$this->session->userdata('id_users');?>">Data Diri</a></li>
          <li class="active"><a href="<?php echo base_url().'riwayat_pendidikan';?>" >Riwayat Pendidikan</a></li>
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
            <div class="tab-pane active">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>Tambah Riwayat Pendidikan</b> </h3>
                            </div><br>
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="col-md-12">
                            	    <div class="form-group">
                                        <label for="varchar">Nama Sekolah <?php echo form_error('nama_sekolah') ?></label>
                                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
                                    </div>
                            	    <div class="form-group">
                                        <label for="varchar">Jurusan <?php echo form_error('jurusan') ?></label>
                                        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" />
                                    </div>
                            	    <div class="form-group">
                                        <label for="int">Tahun Masuk <?php echo form_error('thn_masuk') ?></label>
                                        <input type="text" class="form-control" name="thn_masuk" id="thn_masuk" placeholder="Tahun Masuk" value="<?php echo $thn_masuk; ?>" />
                                    </div>
                            	    <div class="form-group">
                                        <label for="int">Tahun Lulus <?php echo form_error('thn_lulus') ?></label>
                                        <input type="text" class="form-control" name="thn_lulus" id="thn_lulus" placeholder="Tahun Lulus" value="<?php echo $thn_lulus; ?>" />
                                    </div>
                            	    <input type="hidden" name="id_pendidikan" value="<?php echo $id_pendidikan; ?>" /> 
                                    <!-- <input type="text" name="id_member" value="<?php echo $id_member; ?>" />  -->
                            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            	    <a href="<?php echo site_url('riwayat_pendidikan') ?>" class="btn btn-default">Cancel</a>
                                </div>
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>