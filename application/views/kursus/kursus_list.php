<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Kursus List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kursus/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kursus/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kursus'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Member</th>
		<th>Nama Kursus</th>
		<th>Penyelenggara</th>
		<th>Kota</th>
		<th>Tahun</th>
		<th>Lama Kursus</th>
		<th>Action</th>
            </tr><?php
            foreach ($kursus_data as $kursus)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kursus->id_member ?></td>
			<td><?php echo $kursus->nama_kursus ?></td>
			<td><?php echo $kursus->penyelenggara ?></td>
			<td><?php echo $kursus->kota ?></td>
			<td><?php echo $kursus->tahun ?></td>
			<td><?php echo $kursus->lama_kursus ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kursus/read/'.$kursus->id_kursus),'Read'); 
				echo ' | '; 
				echo anchor(site_url('kursus/update/'.$kursus->id_kursus),'Update'); 
				echo ' | '; 
				echo anchor(site_url('kursus/delete/'.$kursus->id_kursus),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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