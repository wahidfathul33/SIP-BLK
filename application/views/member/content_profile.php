        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-dashboard"></i> Dashboard Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-2 col-sm-2 col-xs-2" style="min-width:140px;">
                    <div>
                      <?php if ($this->session->userdata('foto') == NULL){?>
              <img class="profile-user-img img-responsive" src="<?php echo base_url().'/uploads/img/image.png'?>" alt="User profile picture">
              <?php }else{?>
              <img class="profile-user-img img-responsive" src="<?php echo base_url().'/uploads/img/'.$this->session->userdata('foto');?>" alt="User profile picture">
              <?php }?>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-8 col-xs-8" style="margin-top: -20px;">
                      <h3><b><?php echo $nama ?></b></h3>
                      <div class="row">
                          <div class="col-sm-6">
                              <p>
                                  <i class="fa fa-birthday-cake text-muted"></i> <?php echo $umur ?> Tahun<br/>
                                  <i class="fa fa-graduation-cap text-muted"></i> <?php echo $jurusan ?><br/>
                                  <i class="fa fa-university text-muted"></i> <?php echo $sekolah ?><br/>
                                  <!-- IPK : 3.66 (Skala 4) -->
                              </p>
                          </div>
                          <div class="col-sm-6">
                              <p>
                                  Jenis Member : <b><?php echo $jenis_member ?></b><br/>
                                  ID Member : <b><?php echo $id_member ?></b>
                              </p>
                          </div>
                      </div>
                  </div>
                  <div class="btn-group" style="padding:0 15px;margin-top:-6px;">
                    <a class="btn bg-blue" href="<?php echo base_url().'member/read/'?>" style="width:130px;margin-bottom:1px;margin-left:0;margin-right:1px">
                      <i class="fa fa-eye"></i> Lihat Detail
                    </a>
                    <a class="btn bg-purple btn-flat" href="/member/site/cetak-cv" target="_blank" style="width:130px;margin-bottom:1px;margin-left:0;">
                      <i class="fa fa-print"></i> Cetak CV
                    </a>
                  </div>
              </div>
<hr>


<div class="box box-success box-solid">
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
                if ($pelamar_data) {
               
            foreach ($pelamar_data as $pelamar)
            {
                  $mytimestamp = $pelamar->tgl_apply;
                  $d = explode(' ',$mytimestamp);
                  $tgl = $d[0];
                  $time = $d[1];
                ?>
                 <tr>
                  <td width="80px"><?php echo ++$start ?></td>
                  <td><?php echo date(('d F Y'), strtotime($tgl)) ?></td>
                  <td><?php echo $pelamar->nama_perusahaan ?></td>
                  <td>
                    <?php 
                      echo anchor(site_url('lowongan/read_front/'.$pelamar->id_lowongan), $pelamar->judul); 
                    ?>
                  </td>
                  <td><center><div class="bg-green-active color-palette"><?php echo $pelamar->status ?></div></td>
                  <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('pelamar/delete/'.$pelamar->id_pelamar),'Batal','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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