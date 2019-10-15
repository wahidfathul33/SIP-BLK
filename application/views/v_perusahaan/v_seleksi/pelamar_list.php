<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Member <?php if($q != 1){?><span class="float-right"><a href="<?php echo base_url().'c_perusahaan/pelamar_list/1/'.$this->session->userdata('id_lowongan');?>" class="btn btn-primary"><i class=""></i> Lihat Daftar Pelamar Diterima</a></span><?php } ?></h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="m-t-40">
                    <table id="tabelexport" class="table table-bordered ">
                        <thead>
                            <tr class="font-weight-bold">
                                <td>No.</td>
                                <td>Nama</td>                                
                                <td>Jenis Kelamin</td>
                                <!-- <td>Pendidikan</td>
                                <td>Lulusan</td>
                                <td>Jurusan</td> -->
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start =0;
                            foreach ($pelamar as $row)
                            {?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $row->nama ?></td>                                
                                <td><?php echo $row->jenis_kelamin ?></td>
                                <!-- <td><?php echo $row->pendidikan ?></td>
                                <td><?php echo $row->sekolah ?></td>
                                <td><?php echo $row->jurusan ?></td> -->

                                <td style="text-align:center">
                                    <a class="btn btn-info pelamar-detail"  data-toggle="modal" data-target="#show_loker" relid="<?php echo $row->id_lowongan;?>" data-toggle="tooltip" data-placement="top" title="Lihat" target="_blank"><i class="fa fa-eye"></i></a>
                                    <?php if($q != 1){?>
                                    <a href="<?php echo base_url().'c_perusahaan/seleksi_pelamar/1/'.$row->id_pelamar;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Terima"><i class="fa fa-check-circle"></i></a>
                                    <a href="<?php echo base_url().'c_perusahaan/seleksi_pelamar/0/'.$row->id_pelamar;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tolak"><i class="fa fa-minus-circle"></i></a>
                                    <?php } ?>
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