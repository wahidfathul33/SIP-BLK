
        <h2 style="margin-top:0px">member List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('member/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('member/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('member'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id member</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Tgl Lahir</th>
		<th>Tinggi Badan</th>
		<th>j</th>
        <th>Action</th>
            </tr><?php
            foreach ($member_data as $member)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $member->id_member ?></td>
			<td><?php echo $member->nama ?></td>
			<td><?php echo $member->jenis_kelamin ?></td>
			<td><?php echo $member->tgl_lahir ?></td>
			<td><?php echo $member->tinggi_badan ?></td>
            <td><?php echo $member->nama_level ?></td>
			<td style="text-align:center" width="20%">
				<?php 
				echo anchor(site_url('member/read/'.$member->id_member),'<i class="fa fa-eye"></i> Lihat', 'class="btn-sm btn-primary"'); 
				echo ' '; 
				echo anchor(site_url('member/update/'.$member->id_member),'<i class="fa fa-edit"></i> Edit', 'class="btn-sm btn-warning"'); 
				echo ' '; 
				echo anchor(site_url('member/delete/'.$member->id_member),'<i class="fa fa-trash"></i> Hapus', 'class="btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('member/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>