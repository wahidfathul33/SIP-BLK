<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Sub Kejuruan</h4>
                <form class="floating-labels m-t-40" action="<?php echo base_url()?>c_admin/sub_kejuruan_add_act" method="post" novalidate>
                    <h5>Nama Kejuruan</h5>
                    <div class="form-group m-b-40">
                        <select class = "form-control p-0 select2" id="input3" name="id_kejuruan" style="width: 100%">
                            <?php foreach($kejuruan as $row){ ?>
                                <option></option>
                                <option value="<?= $row->id_kejuruan;?>"><?= $row->nama_kejuruan;?>
                                </option>
                            <?php   
                                }
                            ?>
                        </select><span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40">
                        <div class="controls">
                            <input name="nama_sub_kejuruan" type="text" class="form-control" id="input0" required    data-validation-required-message="Nama Sub Kejuruan tidak boleh kosong" style="padding-left: 5px;">  
                            <span class="bar"></span>
                            <label for="input0" style="padding: 5px;">Nama Sub Kejuruan</label>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary" id="bt">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
