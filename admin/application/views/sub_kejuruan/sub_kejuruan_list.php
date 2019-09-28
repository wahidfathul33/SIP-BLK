<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Kejuruan<span class="float-right"><a href="<?php echo base_url().'c_admin/sub_kejuruan_add';?>" class="btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a></span></h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered ">
                        <?php echo $this->session->flashdata('notif');?>
                        <thead>
                            <tr class="font-weight-bold">
                                <td>No.</td>
                                <td>Kejuruan</td>
                                <td>Sub Kejuruan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start =0;
                            foreach ($sub_kejuruan as $row)
                            {?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $row->nama_kejuruan ?></td>
                                <td><?php echo $row->nama_sub_kejuruan ?></td>
                                

                                <td style="text-align:center" width="200px">
                                    <a href="<?php echo base_url().'c_admin/sub_kejuruan_edit/'.$row->id_sub_kejuruan;?>" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url().'c_admin/sub_kejuruan_del/'.$row->id_sub_kejuruan;?>" class="btn-sm btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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