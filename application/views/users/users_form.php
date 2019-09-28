<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
    </head>
    <body>
        <h2 style="margin-top:0px">users <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
            <input type="hidden" class="form-control" name="id_level" id="id_level" placeholder="Id Level" value="<?php echo $id_level; ?>" />

	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status">
                <option value="Aktif" <?php if ($status == "Aktif") {echo 'selected="selected"';}else{} ?>>Aktif</option>
                <option value="Belum Aktif" <?php if ($status == "Belum aktif") {echo 'selected="selected"';}else{} ?>>Belum Aktif</option>
            </select>
        </div>
	    <input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>