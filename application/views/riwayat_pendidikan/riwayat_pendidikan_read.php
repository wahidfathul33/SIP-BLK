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
        <h2 style="margin-top:0px">Riwayat_pendidikan Read</h2>
        <table class="table">
	    <tr><td>Id member</td><td><?php echo $id_member; ?></td></tr>
	    <tr><td>Nama Sekolah</td><td><?php echo $nama_sekolah; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Jurusan</td><td><?php echo $jurusan; ?></td></tr>
	    <tr><td>Thn Masuk</td><td><?php echo $thn_masuk; ?></td></tr>
	    <tr><td>Thn Keluar</td><td><?php echo $thn_lulus; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('riwayat_pendidikan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>