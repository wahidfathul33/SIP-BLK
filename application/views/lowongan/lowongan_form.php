<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> 
    </head>
    <body>
        <h2 style="margin-top:0px">Lowongan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Keterangan Lowongan <?php echo form_error('ket_lowongan') ?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="summernote" name="ket_lowongan" placeholder="<?php echo $ket_lowongan; ?>" value="<?php echo $ket_lowongan; ?>"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 12px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
        </div>

	    <div class="form-group">
            <label for="int">Batas Kuota <?php echo form_error('batas_kuota') ?></label>
            <input type="text" class="form-control" name="batas_kuota" id="batas_kuota" placeholder="Batas Kuota" value="<?php echo $batas_kuota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Publish <?php echo form_error('status_publish') ?></label>
            <select class="form-control" name="status_publish">
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>
	    <input type="hidden" name="id_lowongan" value="<?php echo $id_lowongan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lowongan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>