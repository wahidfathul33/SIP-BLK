<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Lowongan Kerja</h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Status Publish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start =0;
                            foreach ($lowongan as $row)
                            {?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $row->judul ?></td>
                                <td><?php echo $row->nama_perusahaan ?></td>
                                <td><?php echo $row->lokasi ?></td>
                                <td><?php echo $row->status_publish ?></td>
                                <td style="text-align:center" width="200px">
                                    <a href="<?php echo base_url().'../lowongan/read_front/'.$row->id_lowongan;?>" class="btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
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