        <table class="table table-bordered" id="datatables" style="margin-bottom: 10px">
            <thead>
                <tr>
                <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Alamat Perusahaan</th>
        <th>Skala</th>
        <th>Bidang Usaha</th>
        <th>No Telepon</th>
        <th>Action</th>
        <th></th>
            </tr>
            </thead>
            <?php
            foreach ($perusahaan_data as $perusahaan)
            {
                ?>
            <tbody>
                
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $perusahaan->nama_perusahaan ?></td>
            <td><?php echo $perusahaan->alamat_perusahaan ?></td>
            <td><?php echo $perusahaan->skala ?></td>
            <td><?php echo $perusahaan->bidang_usaha ?></td>
            <td><?php echo $perusahaan->no_telpon ?></td>
            <td style="text-align:center" width="20%">
                <?php 
                echo anchor(site_url('perusahaan/read/'.$perusahaan->id_perusahaan),'<i class="fa fa-eye"></i> Lihat', 'class="btn-sm btn-success"'); 
                echo ' '; 
                // echo anchor(site_url('perusahaan/update/'.$perusahaan->id_perusahaan),'<i class="fa fa-edit"></i> Edit', 'class="btn-sm btn-warning"'); 
                // echo ' '; 
                // echo anchor(site_url('perusahaan/delete/'.$perusahaan->id_perusahaan),'<i class="fa fa-trash"></i> Hapus', 'class="btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
            <!-- <td>
                <?php 
                // echo anchor(site_url('perusahaan/read/'.$perusahaan->id_perusahaan),'Verifikasi', 'class="btn-sm btn-warning"'); 
                ?>
            </td> -->
        </tr>
            </tbody>
                <?php
            }
            ?>
        </table>