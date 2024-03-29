<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Berita<span class="float-right"><a href="<?php echo base_url().'c_perusahaan/loker_posted/0';?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a></span></h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <div class="row">
                        <div class="col-12"> 
                            <table id="myTable" class="table table-bordered ">
                                <?php echo $this->session->flashdata('notif');?>
                                <thead>
                                    <tr class="font-weight-bold">
                                        <td>No.</td>
                                        <td>Lowongan</td>
                                        <td>Judul Berita</td>
                                        <td>Jenis Tes</td>
                                        <td>Tanggal</td>
                                        <td>Lokasi</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start =0;
                                    foreach ($berita as $row) :?>
                                    <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td>
                                            <a class="loker-detail" data-toggle="modal" data-target="#show_loker" relid="<?php echo $row->id_lowongan;?>" data-toggle="tooltip" data-placement="top" title="Lihat detail lowongan"><?php echo $row->judul ?></a>
                                        </td>
                                        <td><?php echo $row->header ?></td>
                                        <td><?php echo $row->jenis_tes ?></td>
                                        <td><?php echo $row->tanggal ?></td>
                                        <td><?php echo $row->lokasi ?></td>
                                        
                                        <td style="text-align:center" width="200px">
                                            
                                            <button class="btn btn-info berita-detail"  data-toggle="modal" data-target="#show_berita" relid="<?php echo $row->id_panggilan;?>" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></button>

                                            <a href="<?php echo base_url().'c_perusahaan/berita_edit/'.$row->id_panggilan;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                            <a href="<?php echo base_url().'c_perusahaan/berita_delete/'.$row->id_panggilan;?>" class="btn btn-danger confirm-swal" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
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
        
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<div id="show_berita" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content card card-outline-info">
      <div class="modal-header card-header" >
        <h3 class="modal-title text-white" style="font-size: 24px; text-shadow: 1px 1px #ccc;"><i class="fa fa-bullhorn"></i> Detail Berita </h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
            <table class="table table-bordered" width="100%">
                <tr>
                    <td width="30%">Judul</td>
                    <td width="5px">:</td>
                    <td id="header"></td>
                </tr>
                <tr>
                    <td width="30%">Jenis Tes</td>
                    <td width="5px">:</td>
                    <td id="jenis_tes"></td>
                </tr>
                <tr>
                    <td width="30%">Tanggal</td>
                    <td width="5px">:</td>
                    <td id="tanggal"></td>
                </tr>
                <tr>
                    <td width="30%">Lokasi</td>
                    <td width="5px">:</td>
                    <td id="lokasii"></td>
                </tr>
                <tr>
                    <td width="30%">Waktu Mulai</td>
                    <td width="5px">:</td>
                    <td id="mulai"></td>
                </tr>
                <tr>
                    <td width="30%">Waktu Selesai</td>
                    <td width="5px">:</td>
                    <td id="selesai"></td>
                </tr>
                <tr>
                    <td width="30%">Keterangan</td>
                    <td width="5px">:</td>
                    <td id="keterangan"></td>
                </tr>
                <tr>
                    <td width="30%">Lampiran</td>
                    <td width="5px">:</td>
                    <td id="lampiran">
                        <a href="" target="_blank">Lihat</a>
                    </td>
                </tr>
            </table>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-success loker-edit"><i class="fa fa-edit"></i> Edit</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
