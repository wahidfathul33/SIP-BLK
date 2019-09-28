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
        <h2 style="margin-top:0px">Organisasi Read</h2>
        <table class="table">
	    <tr><td>Id Member</td><td><?php echo $id_member; ?></td></tr>
	    <tr><td>Nama Organisasi</td><td><?php echo $nama_organisasi; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Masa Kerja</td><td><?php echo $masa_kerja; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('organisasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>