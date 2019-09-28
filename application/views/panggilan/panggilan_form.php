        <h2 style="margin-top:0px">Form Input Panggilan</h2>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Lowongan</label>
            <input type="text" class="form-control" name="judul_lowongan" id="header" placeholder="<?php echo $judul_lowongan; ?>" value="<?php echo $judul_lowongan; ?>" disabled/>
        </div>
        <input type="hidden" class="form-control" name="id_lowongan" id="header" placeholder="<?php echo $id_lowongan; ?>" value="<?php echo $id_lowongan; ?>"/>
	    <div class="form-group">
            <label for="varchar">Header <?php echo form_error('header') ?></label>
            <input type="text" class="form-control" name="header" id="header" placeholder="Header" value="<?php echo $header; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Waktu Mulai <?php echo form_error('waktu_mulai') ?></label>
            <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai" value="<?php echo $waktu_mulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Waktu Selesai <?php echo form_error('waktu_selesai') ?></label>
            <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai" value="<?php echo $waktu_selesai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Tes <?php echo form_error('jenis_tes') ?></label>
            <input type="text" class="form-control" name="jenis_tes" id="jenis_tes" placeholder="Jenis Tes" value="<?php echo $jenis_tes; ?>" />
        </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Keterangan<?php echo form_error('keterangan') ?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="textarea1" name="keterangan" placeholder="<?php echo $keterangan; ?>" value="<?php echo $keterangan; ?>"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 12px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
        </div>
	    <input type="hidden" name="id_panggilan" value="<?php echo $id_panggilan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('panggilan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>