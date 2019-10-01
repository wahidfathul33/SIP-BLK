<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Lowongan Kerja</h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <?= $this->session->flashdata('notif');?>
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
                                <td><?php echo $row->lokasi_kerja ?></td>
                                <td><?php echo $row->status_publish ?></td>
                                <td style="text-align:center" width="200px">
                                    <button class="btn btn-info loker-detail" data-toggle="modal" data-target="#show_loker" relid="<?php echo $row->id_lowongan;?>" data-toggle="tooltip" data-placement="top" title="Lihat" data-id="<?=$row->id_lowongan;?>"><i class="fa fa-eye"></i></button>
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
<!-- modal -->
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
        <a id="publik" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa"></i>Publik</a>
        <a id="privat" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa"></i>Privat</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>