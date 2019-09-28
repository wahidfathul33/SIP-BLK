<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <!-- <form action="<?php echo $action; ?>" method="post" encry> -->
            <?php echo form_open_multipart($action);?>
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan <?php echo form_error('alamat_perusahaan') ?></label>
            <textarea class="form-control" rows="3" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Alamat Perusahaan"><?php echo $alamat_perusahaan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Kode Pos <?php echo form_error('kode_pos') ?></label>
            <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Skala <?php echo form_error('skala') ?></label>
            <input type="text" class="form-control" name="skala" id="skala" placeholder="Skala" value="<?php echo $skala; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">No Telpon <?php echo form_error('no_telpon') ?></label>
            <input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telpon" value="<?php echo $no_telpon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bidang Usaha <?php echo form_error('bidang_usaha') ?></label>
            <input type="text" class="form-control" name="bidang_usaha" id="bidang_usaha" placeholder="Bidang Usaha" value="<?php echo $bidang_usaha; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Website <?php echo form_error('website') ?></label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Gambar Scan Logo <?php echo form_error('logo') ?></label>
            <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gambar Scan Siup <?php echo form_error('siup') ?></label>
            <input type="file" class="form-control" name="siup" id="siup" placeholder="Siup" value="<?php echo $siup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gambar Scan Npwp <?php echo form_error('npwp') ?></label>
            <input type="file" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
        </div>
	    <input type="hidden" name="id_perusahaan" value="<?php echo $id_perusahaan; ?>" /> 
	    <button type="submit" class="btn btn-primary">Input</button> 
	    <a href="<?php echo site_url('perusahaan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>