<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <h2 style="margin-top:0px">Kejuruan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kejuruan <?php echo form_error('nama_kejuruan') ?></label>
            <input type="text" class="form-control" name="nama_kejuruan" id="nama_kejuruan" placeholder="Nama Kejuruan" value="<?php echo $nama_kejuruan; ?>" />
        </div>
	    <input type="hidden" name="id_kejuruan" value="<?php echo $id_kejuruan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kejuruan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>