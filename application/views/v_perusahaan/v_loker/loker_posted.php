<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pilih Lowongan Kerja</h4>
                <h6 class="card-subtitle">Pilih lowongan yang untuk dibuat berita panggilan</h6>
                <div class="table-responsive m-t-40">
                    <div class="row">
                        <div class="col-12"> 
                            <table id="myTable" class="table table-bordered ">
                                <thead>
                                    <tr class="font-weight-bold">
                                        <td>No.</td>
                                        <td>Judul Loker</td>
                                        <td>Posisi</td>
                                        <td>Total Pelamar</td>
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
                                        <td><a class="loker-detail" data-toggle="modal" data-target="#show_loker" relid="<?php echo $row->id_lowongan;?>" data-toggle="tooltip" data-placement="top" title="Lihat detail lowongan"><?php echo $row->judul ?></a></td>
                                        <td><?php echo $row->posisi ?></td>
                                        <td><?php echo $row->tot_pelamar ?></td>

                                        <td style="text-align:center" width="200px">
                                            <a href="<?php echo base_url().'c_perusahaan/berita_add/'.$row->id_lowongan;?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Pilih Lowongan"><i class=""></i> Pilih</a>
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
        <!-- <a id="href-loker" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
