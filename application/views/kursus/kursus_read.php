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
        <h2 style="margin-top:0px">Kursus Read</h2>
        <table class="table">
	    <tr><td>Id Member</td><td><?php echo $id_member; ?></td></tr>
	    <tr><td>Nama Kursus</td><td><?php echo $nama_kursus; ?></td></tr>
	    <tr><td>Penyelenggara</td><td><?php echo $penyelenggara; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Lama Kursus</td><td><?php echo $lama_kursus; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kursus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>