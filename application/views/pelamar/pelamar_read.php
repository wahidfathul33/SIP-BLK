<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <h2 style="margin-top:0px">Pelamar Read</h2>
        <table class="table">
	    <tr><td>Id Member</td><td><?php echo $id_member; ?></td></tr>
	    <tr><td>Id Lowongan</td><td><?php echo $id_lowongan; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Id Panggilan</td><td><?php echo $id_panggilan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pelamar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>