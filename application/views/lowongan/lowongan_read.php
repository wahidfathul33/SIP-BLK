<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <table class="table">
	    <tr><td>Id Perusahaan</td><td><?php echo $id_perusahaan; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Ket Lowongan</td><td><?php echo $ket_lowongan; ?></td></tr>
	    <tr><td>Batas Kuota</td><td><?php echo $batas_kuota; ?></td></tr>
	    <tr><td>Status Publish</td><td><?php echo $status_publish; ?></td></tr>
	    <tr><td>Tgl Publish</td><td><?php echo $tgl_publish; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('lowongan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>