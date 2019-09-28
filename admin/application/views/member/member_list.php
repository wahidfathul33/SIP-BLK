<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Member</h4>
                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <div class="table-responsive m-t-40">
                    <table id="example" class="table table-bordered ">
                        <thead>
                            <tr class="font-weight-bold">
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Agama</td>
                                <td>Jenis Kelamin</td>
                                <td>Golongan Darah</td>
                                <td>Tempat Lahir</td>
                                <td>Tanggal Lahir</td>
                                <td>Tinggi Badan</td>
                                <td>Berat badan</td>
                                <td>Alamat KTP</td>
                                <td>Alamat Sekarang</td>
                                <td>Nomor HP</td>
                                <td>Pendidikan</td>
                                <td>Lulusan</td>
                                <td>Jurusan</td>
                                <td>Tahun Masuk</td>
                                <td>Tahun Lulus</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start =0;
                            foreach ($member as $row)
                            {?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->agama ?></td>
                                <td><?php echo $row->jenis_kelamin ?></td>
                                <td><?php echo $row->gol_darah ?></td>
                                <td><?php echo $row->tmp_lahir ?></td>
                                <td><?php echo $row->tgl_lahir ?></td>
                                <td><?php echo $row->tinggi_badan ?></td>
                                <td><?php echo $row->berat_badan ?></td>
                                <td><?php echo $row->alamat_ktp ?></td>
                                <td><?php echo $row->alamat_now ?></td>
                                <td><?php echo $row->no_hp ?></td>
                                <td><?php echo $row->pendidikan ?></td>
                                <td><?php echo $row->sekolah ?></td>
                                <td><?php echo $row->jurusan ?></td>
                                <td><?php echo $row->pbk_angkatan ?></td>
                                <td><?php echo $row->pbk_tahun ?></td>

                                <td style="text-align:center">
                                    <a href="<?php echo base_url().'../lowongan/read_front/'.$row->id_member;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat" target="_blank"><i class="fa fa-eye"></i></a>
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