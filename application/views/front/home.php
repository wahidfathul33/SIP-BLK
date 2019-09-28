<!-- /.col -->
<div class="col-md-9">
  <div class="box box-solid">
<!--     <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-users"></i><?php echo $this->session->userdata('namalv');?></h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body">
    	<h1 class="h2 margin-remove"><b>Sistem Informasi Pasar kerja BLK Surakarta</b></h1>
   		<p>Di sini anda bisa mendapat informasi lowongan pekerjaan. Anda juga dapat memasang lowongan pekerjaan dari perusahaan anda dan mencari calon pekerja.</p>
   		<hr>
<!--    		<div class="col-md-12">
   			<div class="col-md-2" style="border: solid; height:140px;width:140px;">
   				<img src="https://cdc.uns.ac.id/uploads/image/2019-04-09-Fii9gIth1-ETxJz3Ff9aAzPk1V3Y7RPH.jpg" style="height: 140px;width:140px;"> 
   			</div>
   			<div class="col-md-10" style="border: solid; height:140px;">
   				<h2>asdasdasd</h2>
   				<p>Di sini anda bisa mendapat informasi lowongan pekerjaan. Anda juga dapat memasang lowongan pekerjaan dari perusahaan anda dan mencari calon pekerja.</p>
   			</div>
   		</div>
 -->
		<div class="col-md-12">
          <!-- The time line -->
          	<?php
     //      			$tanggal = $lowongan_data->tgl_posting;
					// $d = explode(' ',$tanggal)
					// $tgl = $d[0];
					// $time = $d[1];

		            foreach ($lowongan_data as $lowongan)
		            {
		            	$mytimestamp = $lowongan->tgl_posting;
		            	$d = explode(' ',$mytimestamp);
		            	$tgl = $d[0];
		            	$time = $d[1];

		            	$string = $lowongan->ket_lowongan;
						if (strlen($string) > 100) {

						    // truncate string
						    $stringCut = substr($string, 0, 250);
						    $endPoint = strrpos($stringCut, ' ');

						    //if the string doesn't contain any space then it will cut without word basis.
						    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
						    $string .= '.....';
						}
		                ?>
	        <ul class="timeline">
	            <!-- timeline time label -->
	            <li class="time-label">
	                  <span class="bg-red">
	                    <?php echo date(('d F Y'), strtotime($tgl)) ?>
	                  </span>
	            </li>
	            <!-- /.timeline-label -->
	            <!-- timeline item -->
	            <li>
	              <div class="timeline-item">
	                <span class="time"><i class="fa fa-clock-o"></i> <?php echo date(('H:m'), strtotime($time)) ?></span>

	                <h3 class="timeline-header"><a href="#"><?php echo $lowongan->judul ?></a></h3>

	                <div class="timeline-body">
	                  <?php echo $string ?>
	                </div>
	                <div class="timeline-footer">
	                	<?php 
						echo anchor(site_url('lowongan/read_front/'.$lowongan->id_lowongan),'Read more', 'class="btn btn-primary btn-xs"'); ?>
	                </div>
	              </div>
	            </li>
	        </ul>

		        <?php 
		    		}
		        ?>
	    </div>
    </div>
  </div>
</div>