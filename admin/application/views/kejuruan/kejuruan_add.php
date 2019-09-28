<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Kejuruan</h4>
                <form class="floating-labels m-t-40" action="<?php echo base_url()?>c_admin/kejuruan_add_act" method="post" novalidate>
                    <div class="form-group m-b-40">
                        <div class="controls">
                            <input name="nama_kejuruan" type="text" class="form-control" id="input0" required    data-validation-required-message="Nama Kejuruan tidak boleh kosong" style="padding-left: 5px;">  
                            <span class="bar"></span>
                            <label for="input0" style="padding: 5px;">Nama Kejuruan</label>
                            <small><?php echo form_error('nik') ?></small>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary" id="bt">Simpan</button>
                </form>
        </div>
    </div>
</div>
