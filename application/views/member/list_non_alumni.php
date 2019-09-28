        <table class="table table-bordered" id="datatables" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Id member</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Lahir</th>
                <th>Tinggi Badan</th>
                <th>Action</th>
            </tr>
            </thead><?php
            foreach ($member_data as $member)
            {
                if ($member->nama_level == 'non alumni') {
                ?>
                <tbody>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $member->id_member ?></td>
                    <td><?php echo $member->nama ?></td>
                    <td><?php echo $member->jenis_kelamin ?></td>
                    <td><?php echo $member->tgl_lahir ?></td>
                    <td><?php echo $member->tinggi_badan ?></td>
                    <td style="text-align:center" width="20%">
                        <?php 
                        echo anchor(site_url('member/detail_member/'.$member->id_member),'<i class="fa fa-eye"></i> Lihat', 'class="btn-sm btn-primary"'); 
                        echo ' '; 
                        echo anchor(site_url('member/update/'.$member->id_member),'<i class="fa fa-edit"></i> Edit', 'class="btn-sm btn-warning"'); 
                        echo ' '; 
                        echo anchor(site_url('member/delete/'.$member->id_member),'<i class="fa fa-trash"></i> Hapus', 'class="btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                    </td>
                </tr></tbody>
                <?php
                }
            }?>
                
            
        </table>