<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <h2 style="margin-top:0px">Sub_kejuruan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Kejuruan <?php echo form_error('id_kejuruan') ?></label>
            <?php
                $dd_kejuruan_attribute = 'class="form-control select2 "';
                echo form_dropdown('id_kejuruan', $dd_kejuruan, $kejuruan_selected, $dd_kejuruan_attribute);
            ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Sub Kejuruan <?php echo form_error('nama_sub_kejuruan') ?></label>
            <input type="text" class="form-control" name="nama_sub_kejuruan" id="nama_sub_kejuruan" placeholder="Nama Sub Kejuruan" value="<?php echo $nama_sub_kejuruan; ?>" />
        </div>
	    <input type="hidden" name="id_sub_kejuruan" value="<?php echo $id_sub_kejuruan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sub_kejuruan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>