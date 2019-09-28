<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Perusahaan</h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <table id="example" class="table table-bordered ">
                        <thead>
                            <tr class="font-weight-bold">
                                <td>No.</td>
                                <td>Nama Perusahaan</td>
                                <td>Alamat</td>
                                <td>Nomor Telpon</td>
                                <td>Email</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start =0;
                            foreach ($perusahaan as $row)
                            {?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $row->nama_perusahaan ?></td>
                                <td><?php echo $row->alamat_perusahaan ?></td>
                                <td><?php echo $row->no_telpon ?></td>
                                <td><?php echo $row->email ?></td>
                                

                                <td style="text-align:center" width="200px">
                                    <a href="<?php echo base_url().'c_admin/detail_perusahaan/'.$row->id_perusahaan;?>" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
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