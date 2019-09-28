<div class="col-md-9">  
  <div class="box box-solid">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="pull-left header"><h2>Update Profil</h2> </li><br>
        </ul>
        <ul class="nav nav-tabs pull-left">
          <li ><a href="<?php echo base_url().'member/update/'.$this->session->userdata('id_users');?>">Data Diri</a></li>
          <li ><a href="<?php echo base_url().'riwayat_pendidikan';?>" >Riwayat Pendidikan</a></li>
          <li class="active"><a href="<?php echo base_url().'riwayat_kerja';?>" >Riwayat Kerja</a></li>
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
                            <div class="col-md-12">
                                <form action="<?php echo $action; ?>" method="post">
                            	    <div class="form-group">
                                        <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
                                        <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
                                    </div>
                            	    <div class="form-group">
                                        <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
                                    </div>
                            	    <div class="form-group">
                                        <label for="varchar">Masa Kerja <?php echo form_error('masa_kerja') ?></label>
                                        <input type="text" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja" value="<?php echo $masa_kerja; ?>" />
                                    </div>
                            	    <input type="hidden" name="id_pekerjaan" value="<?php echo $id_pekerjaan; ?>" /> 
                            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            	    <a href="<?php echo site_url('riwayat_kerja') ?>" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>