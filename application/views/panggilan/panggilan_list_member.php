        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-dashboard"></i> Panggilan</h3>
            </div>


<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-file-text-o"></i> Riwayat Lamaran</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Tanggal</th>
                  <th>Perusahaan</th>
                  <th>Lowongan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr><?php
                if ($panggilan_data) {
               
            foreach ($panggilan_data as $panggilan)
            {
                  $mytimestamp = $panggilan->tgl_apply;
                  $d = explode(' ',$mytimestamp);
                  $tgl = $d[0];
                  $time = $d[1];
                ?>
                 <tr>
                  <td width="80px"><?php echo ++$start ?></td>
                  <td><?php echo date(('d F Y'), strtotime($tgl)) ?></td>
                  <td><?php echo $panggilan->nama_perusahaan ?></td>
                  <td>
                    <?php 
                      echo anchor(site_url('lowongan/read_front/'.$panggilan->id_lowongan), $panggilan->judul); 
                    ?>
                  </td>
                  <td><center><div class="bg-green-active color-palette"><?php echo $panggilan->status ?></div></td>
                  <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('panggilan/read_member/'.$panggilan->id_panggilan),'Lihat Panggilan'); 
                    ?>
                  </td>
                </tr>
                            <?php
                        } }else{
                          echo "<p>Data tidak ditemukan</p>";
                        }
                        ?>
                
              </table><br>
              <a href="/member/lamaran/index" class="btn-success btn-flat btn-sm pull-right">
                Lihat semua catatan lamaran <i class="fa fa-arrow-circle-right"></i>
            </a>
            </div>
</div>


    </div>
  </div>
        <!-- /.col -->