<div class="box box-primary">
            <div class="box-body box-profile">
              <?php if ($this->session->userdata('foto') == NULL){?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'/uploads/img/image.png'?>" alt="User profile picture">
              <?php }else{?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'/uploads/img/'.$this->session->userdata('foto');?>" alt="User profile picture">
              <?php }?>
            <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama');?></h3>
            <p class="text-muted text-center"><?php echo $this->session->userdata('namalv');?></p>
            <?php echo '<a href="'.base_url().'member/update/"';?> class="btn btn-primary btn-block margin-bottom">Update Profil</a>
              <ul class="nav nav-pills nav-stacked " data-widget="tree">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard
                  </a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Lamaran <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="<?php echo base_url().'panggilan/show_list';?>"><i class="fa fa-bullhorn"></i> Panggilan Tes</a></li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user"></i> <span>Profil</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-eye"></i> Lihat Profil</a></li>
                    <li><a href="#"><i class="fa fa-refresh"></i> Update Profil</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-lock"></i> <span>Ubah Password</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
</div>