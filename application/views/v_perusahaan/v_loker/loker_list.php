<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Lowongan Kerja<span class="float-right"><a href="<?php echo base_url().'c_perusahaan/loker_add';?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a></span></h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <div class="row">
                        <div class="col-12"> 
                            <table id="myTable" class="table table-bordered ">
                                <?php echo $this->session->flashdata('notif');?>
                                <thead>
                                    <tr class="font-weight-bold">
                                        <td>No.</td>
                                        <td>Judul Loker</td>
                                        <td>Posisi</td>
                                        <td>Status Buka</td>
                                        <td>Status Publish</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start =0;
                                    foreach ($loker as $row)
                                    {?>
                                    <tr>
                                        <td width="80px"><?php echo ++$start ?></td>
                                        <td><?php echo $row->judul ?></td>
                                        <td><?php echo $row->posisi ?></td>
                                        <?php if(date('Y-m-d') > $row->tgl_tutup){?>
                                        <td>Tutup</td>
                                        <?php }else{?>
                                        <td>Buka</td><?php }?>
                                        <td>
                                        <?php 
                                            if ($row->status_publish == "Menunggu") {
                                                echo "<i>".$row->status_publish."</i>";
                                            }else{
                                                echo $row->status_publish;
                                            }
                                        ?>                                            
                                        </td>
                                        <td style="text-align:center" width="200px">
                                            
                                            
                                            <?php if($row->status_publish == "Menunggu"){?>
                                            <button class="btn btn-info loker-detail" data-toggle="modal" data-target="#show_loker" relid="<?php echo $row->id_lowongan;?>" data-toggle="tooltip" data-placement="top" title="Lihat" data-id="<?=$row->id_lowongan;?>"><i class="fa fa-eye"></i></button>

                                            <a id="tes" href="<?php echo base_url().'c_perusahaan/loker_edit/'.$row->id_lowongan;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                                            <a href="<?php echo base_url().'c_perusahaan/loker_del/'.$row->id_lowongan;?>" class="btn btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>

                                            <?php }else{?>
                                            <a href="<?php echo base_url().'c_perusahaan/loker_detail/'.$row->id_lowongan;?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 m-t-40">
                            <p class="font-weight-bold">Keterangan Status Publish :</p>
                            <ol style=" padding-left: 20px;">
                                <li><span class="font-weight-bold">Publik</span> = dapat dilihat semua pengguna</li>
                                <li><span class="font-weight-bold">Privat</span> = hanya dapat dilihat oleh Alumni BLK Surakarta</li>
                                <li><span class="font-weight-bold">Menunggu</span> = belum diverifikasi oleh admin</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="show_loker" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content card card-outline-info">
      <div class="modal-header card-header" >
        <h3 class="modal-title text-white" id="judul" style="font-size: 24px; text-shadow: 1px 1px #ccc;"><i class="fa fa-file"></i> </h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
            <ul class="list-inline m-b-5">
                <li class="b-all m-b-5" style="padding: 7px;">Posisi : <span id="posisi"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Lokasi : <span id="lokasi"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Tipe Pekerjaan : <span id="jns_kontrak"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Gaji : <span id="gaji"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Pendidikan : <span id="pendidikan"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Jurusan : <span id="jurusan"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Batas Kuota : <span id="batas_kuota"></span></li>
                <li class="b-all m-b-5" style="padding: 7px;">Tgl Tutup : <span id="tgl_tutup"></span></li>
            </ul>
            <hr>
            <!-- <p class="idloker" id="id_lowongan"></p> -->
            <p id="ket_lowongan"></p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-success loker-edit"><i class="fa fa-edit"></i> Edit</button> -->
        <a id="href-loker" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
