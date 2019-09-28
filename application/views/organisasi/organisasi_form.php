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
        <h2 style="margin-top:0px">Organisasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Member <?php echo form_error('id_member') ?></label>
            <input type="text" class="form-control" name="id_member" id="id_member" placeholder="Id Member" value="<?php echo $id_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Organisasi <?php echo form_error('nama_organisasi') ?></label>
            <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi" placeholder="Nama Organisasi" value="<?php echo $nama_organisasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Masa Kerja <?php echo form_error('masa_kerja') ?></label>
            <input type="text" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja" value="<?php echo $masa_kerja; ?>" />
        </div>
	    <input type="hidden" name="id_organisasi" value="<?php echo $id_organisasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('organisasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>