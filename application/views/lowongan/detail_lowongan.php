<div class="col-md-9">
    <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-dashboard"></i> Detail Lowongan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-12"">
          <div class="row">
          	<div class="col-md-12"">
          		<h2><?php echo $judul; ?></h2>
          		<p><?php echo $ket_lowongan; ?></p>
          		<div class="col-md-12 text-center">
          			<?php 
						echo anchor(site_url('pelamar/create_action/'.$id_lowongan),'Daftar', 'class="btn btn-primary"'); ?>
          		</div>
          	</div>
          </div>
      	</div>
      </div>
 	</div>
 </div>