<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel User<span class="float-right"><a href="<?php echo base_url().'c_admin/user_add/'.$level;?>" class="btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah User</a></span></h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <?php echo $this->session->flashdata('notif');?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start =0;
                            foreach ($users as $row)
                            {?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <?php if($row->id_level == 2 || $row->id_level == 3){?>
                                <td><?php echo $row->nama ?></td>
                                <?php }elseif($row->id_level == 4){?>
                                <td><?php echo $row->nama_perusahaan ?></td>
                                <?php }else{echo '<td>Admin '.$start.'</td>';}?>
                                <td><?php echo $row->email ?></td>
                                <?php if($row->status == 1){?>
                                <td><h4><span class="badge badge-success">Aktif</span><h4></td>
                                <?php }else{?>
                                <td><h4><span class="badge badge-danger">Belum aktif</span><h4></td>
                                <?php }?>
                                <td class="align-content-center">
                                    <?php if($row->status == 0){?>
                                    <a href="<?php echo base_url()?>c_admin/user_status/<?php echo $row->id_users;?>/1" class="btn btn-info align-content-center confirm-swal" data-toggle="tooltip" data-placement="top" title="Aktifasi"><i class="fa fa-check-circle"></i></a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url()?>c_admin/user_status/<?php echo $row->id_users;?>/0" class="btn btn-warning align-content-center confirm-swal" data-toggle="tooltip" data-placement="top" title="Non Aktifkan"><i class="fa fa-minus-circle"></i></a> 
                                    <?php } ?>
                                    <a href="<?php echo base_url()?>c_admin/user_del/<?php echo $row->id_users;?>" class="btn btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
