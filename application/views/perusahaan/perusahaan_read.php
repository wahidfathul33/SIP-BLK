<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <table class="table table-striped table-hover">
	    <tr><td width="25%">Id perusahaan</td><td><?php echo $id_perusahaan; ?></td></tr>
	    <tr><td width="25%">Nama Perusahaan</td><td><?php echo $nama_perusahaan; ?></td></tr>
	    <tr><td width="25%">Alamat Perusahaan</td><td><?php echo $alamat_perusahaan; ?></td></tr>
	    <tr><td width="25%">Kode Pos</td><td><?php echo $kode_pos; ?></td></tr>
	    <tr><td width="25%">Skala</td><td><?php echo $skala; ?></td></tr>
	    <tr><td width="25%">No Telpon</td><td><?php echo $no_telpon; ?></td></tr>
	    <tr><td width="25%">Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td width="25%">Bidang Usaha</td><td><?php echo $bidang_usaha; ?></td></tr>
	    <tr><td width="25%">Website</td><td><?php echo $website; ?></td></tr>
	    <tr><td width="25%">Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td width="25%">Logo</td><td><a href="<?php echo base_url().'uploads/img/'.$logo?>" target="_blank"><?php echo $logo; ?></a></td></tr>
	    <tr><td width="25%">Siup</td><td><?php echo $siup; ?></td></tr>
	    <tr><td width="25%">Npwp</td><td><?php echo $npwp; ?></td></tr>
	    <tr><td width="25%"></td><td><a href="<?php echo base_url().'perusahaan/update/'.$id_perusahaan?>" class="btn btn-primary">Update</a></td></tr>
	</table>
        </body>
</html>