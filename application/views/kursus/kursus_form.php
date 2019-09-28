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
        <h2 style="margin-top:0px">Kursus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Member <?php echo form_error('id_member') ?></label>
            <input type="text" class="form-control" name="id_member" id="id_member" placeholder="Id Member" value="<?php echo $id_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kursus <?php echo form_error('nama_kursus') ?></label>
            <input type="text" class="form-control" name="nama_kursus" id="nama_kursus" placeholder="Nama Kursus" value="<?php echo $nama_kursus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Penyelenggara <?php echo form_error('penyelenggara') ?></label>
            <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara" value="<?php echo $penyelenggara; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lama Kursus <?php echo form_error('lama_kursus') ?></label>
            <input type="text" class="form-control" name="lama_kursus" id="lama_kursus" placeholder="Lama Kursus" value="<?php echo $lama_kursus; ?>" />
        </div>
	    <input type="hidden" name="id_kursus" value="<?php echo $id_kursus; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kursus') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>