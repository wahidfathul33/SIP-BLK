<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Kejuruan</h4>
                <form class="floating-labels m-t-40" action="<?php echo base_url()?>c_admin/sub_kejuruan_edit_act" method="post" novalidate>
                    <h5>Nama Kejuruan</h5>
                    <div class="form-group m-b-40">
                        <select class = "form-control p-0 select2 " id="input3" name="id_kejuruan" style="width: 100%">
                            <?php foreach($kejuruan as $row){ ?>
                                <option  <?php if ($sub_kejuruan->nama_kejuruan == $row->nama_kejuruan){echo "selected = selected ";}?> value="<?= $row->id_kejuruan;?>"><?= $row->nama_kejuruan;?>
                                </option>
                            <?php   
                                }
                            ?>
                        </select><span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40">
                        <div class="controls">
                            <input name="nama_sub_kejuruan" type="text" class="form-control" id="input1" required    data-validation-required-message="Nama Kejuruan tidak boleh kosong" style="padding-left: 5px;" value="<?= $sub_kejuruan->nama_sub_kejuruan?>">  
                            <span class="bar"></span>
                            <label for="input1" style="padding: 5px;">Nama Sub Kejuruan</label>
                        </div>
                    </div>
                
                <input type="hidden" name="id_sub_kejuruan" value="<?= $sub_kejuruan->id_sub_kejuruan?>">
                    <button type="submit" class="btn btn-primary" id="bt">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
