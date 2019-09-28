<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
    </head>
    <body>
        <h2 style="margin-top:0px">users Read</h2>
        <table class="table">
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Jenis User</td><td><?php echo $nama_level; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>