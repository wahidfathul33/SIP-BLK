<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <h2 style="margin-top:0px">Pelamar <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Member <?php echo form_error('id_member') ?></label>
            <input type="text" class="form-control" name="id_member" id="id_member" placeholder="Id Member" value="<?php echo $id_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Lowongan <?php echo form_error('id_lowongan') ?></label>
            <input type="text" class="form-control" name="id_lowongan" id="id_lowongan" placeholder="Id Lowongan" value="<?php echo $id_lowongan; ?>" />
        </div>
	    <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelamar') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>