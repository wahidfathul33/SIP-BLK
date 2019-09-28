<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <h2 style="margin-top:0px">Pelamar List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php //echo anchor(site_url('pelamar/create'),'Create', 'class="btn btn-primary"'); ?> -->
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pelamar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pelamar'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Pelamar</th>
		<th>Lowongan</th>
        <th>Status</th>
		<th>Action</th>
        <th></th>
            </tr><?php
            foreach ($pelamar_data as $pelamar)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo anchor(site_url('member/detail_member/'.$pelamar->id_member),$pelamar->nama);?></td>
			<td><?php echo anchor(site_url('lowongan/read/'.$pelamar->id_lowongan), $pelamar->judul); ?></td>
            <td><?php echo $pelamar->status ?></td>
			<td style="text-align:center" width="10%">
				<?php 
				echo anchor(site_url('member/detail_member/'.$pelamar->id_member),'<i class="fa fa-eye"></i> Lihat', 'class="btn-sm btn-success"'); 
				// echo ' '; 
				// echo anchor(site_url('pelamar/update/'.$pelamar->id_pelamar),'<i class="fa fa-edit"></i> Edit', 'class="btn-sm btn-warning"'); 
				// echo ' '; 
				// echo anchor(site_url('pelamar/delete/'.$pelamar->id_pelamar),'<i class="fa fa-trash"></i> Hapus', 'class="btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
            <td align="center">
                <?php
                    if ($pelamar->status == 'Diterima') {
                        echo anchor(site_url('pelamar/update_status/'.$pelamar->id_pelamar),'Terima', 'class="btn btn-sm btn-primary disabled"'); 
                    }else{
                        echo anchor(site_url('pelamar/update_status/'.$pelamar->id_pelamar),'Teriama', 'class="btn-sm btn-warning"');
                    }
                     
                ?>
            </td>
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