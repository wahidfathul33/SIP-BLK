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
                                <h3 class="box-title"><b>Riwayat Pendidikan</b> </h3>
                            </div><br>
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <?php echo anchor(site_url('riwayat_pendidikan/create'),'<i class="fa fa-plus"></i> Tambah', 'class="btn btn-primary"'); ?>
                            </div><!-- 
                            <div class="col-md-4 text-center">
                                <div style="margin-top: 8px" id="message">
                                    <?php // echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div> -->
                            <div class="col-md-1 text-right">
                            </div>
                            <div class="col-md-6 text-right">
                                <form action="<?php echo site_url('riwayat_pendidikan/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php 
                                                if ($q <> '')
                                                {
                                                    ?>
                                                    <a href="<?php echo site_url('riwayat_pendidikan'); ?>" class="btn btn-default">Reset</a>
                                                    <?php
                                                }
                                            ?>
                                          <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered" style="margin-bottom: 10px">
                            <tr>
                                <th>No</th>
                		<th>Nama Sekolah</th>
                		<th>Jurusan</th>
                		<th>Thn Masuk</th>
                		<th>Thn Keluar</th>
                		<th>Action</th>
                            </tr><?php
                            foreach ($riwayat_pendidikan_data as $riwayat_pendidikan)
                            {
                                ?>
                                <tr>
                			<td width="80px"><?php echo ++$start ?></td>
                			<td><?php echo $riwayat_pendidikan->nama_sekolah ?></td>
                			<td><?php echo $riwayat_pendidikan->jurusan ?></td>
                			<td><?php echo $riwayat_pendidikan->thn_masuk ?></td>
                			<td><?php echo $riwayat_pendidikan->thn_lulus ?></td>
                			<td style="text-align:center" width="200px">
                				<?php 
                				echo anchor(site_url('riwayat_pendidikan/update/'.$riwayat_pendidikan->id_pendidikan),'<i class="fa fa-edit"></i> Edit', 'class="btn-sm btn-warning"'); 
                				echo '  '; 
                				echo anchor(site_url('riwayat_pendidikan/delete/'.$riwayat_pendidikan->id_pendidikan),'<i class="fa fa-trash"></i> Hapus', 'class="btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                				?>
                			</td>
                		</tr>
                                <?php
                            }
                            ?>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn-sm btn-primary">Total Record : <?php echo $total_rows ?></a>
                	       </div>
                            <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>