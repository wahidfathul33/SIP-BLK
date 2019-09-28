<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>a {text-decoration: none; color: black;} </style>
  <script src="<?php echo base_url();?>/assets/js/swal.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url().'index';?>" class="logo">
            <span class="logo-lg"><img src="<?php echo base_url();?>/assets/admin/dist/img/logo_1.png" height="40px" style="margin-top: -5px;"></span>
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav"">
            <li class="active"><a href="#">Beranda <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Workshop</a></li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Karir <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Lowongan Kerja</a></li>
                <li><a href="#">Panggilan Tes</a></li>
                <li><a href="#">Perusahaan</a></li>
              </ul>
            </li>
            <?php
                if ($this->session->userdata('ses_email') == NULL) {
                  echo '<li><a href="'.base_url().'users/register">Register</a></li>';
                }
            ?>
          </ul>
          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form> -->
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- /.messages-menu -->

              <?php
                if ($this->session->userdata('ses_email') != NULL) {
                  
             ?>
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <?php if ($this->session->userdata('foto') == NULL){?>
                    <img src="<?php echo base_url().'/uploads/img/image.png';?>" class="user-image" alt="User Image" style="margin-top: 2px;">
                    <?php }else{?>
                    <img src="<?php echo base_url().'/uploads/img/'.$this->session->userdata('foto');?>" class="user-image" alt="User Image" style="margin-top: 2px;">
                    <?php }?>
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <?php if ($this->session->userdata('foto') == NULL){?>
                      <img src="<?php echo base_url().'/uploads/img/image.png'?>" class="img-circle" alt="User Image">
                      <?php }else{?>
                      <img src="<?php echo base_url().'/uploads/img/'.$this->session->userdata('foto');?>" class="img-circle" alt="User Image">
                      <?php }?>
                      <p>
                        <?php echo $this->session->userdata('nama');?>
                        <small>Member sejak <?php echo $this->session->userdata('tanggal');?></small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                      <div class="row">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </div>
                      <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?php echo base_url().'member'?>" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo base_url().'login/logout' ?>" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
            </li><?php 
                  }else{
                ?>
                  <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-lock"></i> Login
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">Silakan Masukkan Email dan Password</li>
                      <li>
                        <form class="form-horizontal" action="<?php echo base_url().'c_login/auth'?>" method="post">
                          <div class="box-body">
                            <?php echo $this->session->flashdata('msg');?>
                            <div class="form-group">
                              <div class="col-sm-12">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="text" name="email" class="form-control" placeholder="Email" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-12">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Sign in</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                      </li>
                    </ul>
                  </li>
            <?php }
          
            ?>

          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container" style="padding: 0px; border: solid 1px #fff;">
      <div class="row" style="margin-top: -15px; margin-bottom: 5px;">
        <div class="col-xs-12"><?php echo $header?></div>
      </div>
     <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-md-3">
          <?php
                if ($this->session->userdata('jenis_users') == '2' || $this->session->userdata('jenis_users') == '3') 
                { 
                  if ($this->session->userdata('status') == 'Aktif') {
                    $this->load->view('member/side_profile'); 
                  }else{echo "";}
                }
          ?>

          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <?php echo $contents; ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/admin/dist/js/demo.js"></script>
</body>
</html>
