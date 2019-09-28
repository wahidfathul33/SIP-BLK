
<!-- /.col -->
<div class="col-md-9">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-user"></i> Update Profil</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
     <form action="<?php echo $action; ?>" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border">
            <h3 class="box-title"> Informasi Umum</h3>
          </div><br>
          <div class="col-md-6">
            <div class="form-group">
                  <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
            </div>
            <div class="form-group">
                  <label for="varchar">Agama <?php echo form_error('agama') ?></label>
                  <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
              </div>
            <div class="form-group">
                  <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                  <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
            </div>
            <div class="form-group">
                  <label for="varchar">Tmp Lahir <?php echo form_error('tmp_lahir') ?></label>
                  <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" placeholder="Tmp Lahir" value="<?php echo $tmp_lahir; ?>" />
            </div>
            <div class="form-group">
                  <label for="varchar">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="varchar">Gol Darah <?php echo form_error('gol_darah') ?></label>
                <input type="text" class="form-control" name="gol_darah" id="gol_darah" placeholder="Gol Darah" value="<?php echo $gol_darah; ?>" />
            </div>            
            <div class="form-group">
                  <label for="varchar">Tinggi Badan <?php echo form_error('tinggi_badan') ?></label>
                  <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Berat Badan <?php echo form_error('berat_badan') ?></label>
                <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Status Nikah <?php echo form_error('status_nikah') ?></label>
                <input type="text" class="form-control" name="status_nikah" id="status_nikah" placeholder="Status Nikah" value="<?php echo $status_nikah; ?>" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>