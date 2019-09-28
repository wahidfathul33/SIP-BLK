<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('lowongan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('lowongan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('lowongan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Batas Kuota</th>
		<th>Status Publish</th>
		<th>Tgl Publish</th>
		<th width="20%">Action</th>
        <th></th>
            </tr><?php
            foreach ($lowongan_data as $lowongan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $lowongan->judul ?></td>
			<td><?php echo $lowongan->batas_kuota ?></td>
			<td><?php echo $lowongan->status_publish ?></td>
			<td><?php echo $lowongan->tgl_publish ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('lowongan/read_front/'.$lowongan->id_lowongan),'<i class="fa fa-eye"></i> Lihat', 'class="btn-sm btn-primary"', 'target="_blank"'); 
				echo ' '; 
				echo anchor(site_url('lowongan/update/'.$lowongan->id_lowongan),'<i class="fa fa-edit"></i> Edit', 'class="btn-sm btn-warning"'); 
                echo ' '; 
				echo anchor(site_url('lowongan/delete/'.$lowongan->id_lowongan),'<i class="fa fa-trash"></i> Hapus', 'class="btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
            <td><?php 
                echo anchor(site_url('pelamar/list_pelamar/'.$lowongan->id_lowongan),'Lihat Pelamar', 'class="btn-sm btn-primary"'); 
                echo ' <br>'; echo ' <br>'; 
                if (! $lowongan->id_panggilan) {
                    echo anchor(site_url('panggilan/create/'.$lowongan->id_lowongan),'Buat Panggilan', 'class="btn-sm btn-primary"'); 
                }else{
                    echo anchor(site_url('panggilan/update/'.$lowongan->id_panggilan),'<i class="fa fa-edit"></i> Edit panggilan', 'class="btn-sm btn-warning"'); 
                }
                
             ?></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>