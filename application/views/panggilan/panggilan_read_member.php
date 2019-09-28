<div class="col-md-9">
    <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-dashboard"></i> Detail Panggilan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-12"">
          <div class="row">
          	<div class="col-md-12"">
          		<h2><?php echo $header;; ?></h2>
          		<p><?php echo $tanggal; ?></p>
              <p><?php echo $waktu_mulai; ?></p>
              <p><?php echo $waktu_selesai; ?></p>
              <p><?php echo $lokasi; ?></p>
              <p><?php echo $jenis_tes; ?></p>
              <p><?php echo $keterangan; ?></p>

          		<div class="col-md-12 text-center">
          			<?php 
						    echo anchor(site_url('panggilan/show_list'),'Kembali', 'class="btn btn-primary"'); ?>
          		</div>
          	</div> 
          </div>
      	</div>
      </div>
 	</div>
 </div>