<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $header;?></title>
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
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="<?php echo base_url();?>/assets/admintemplate/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url();?>/assets/admin/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?php echo base_url();?>/assets/admin/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>a {text-decoration: none; color: black;} </style>
  <script src="<?php echo base_url();?>/assets/js/swal.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url().'index'?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url();?>/assets/admin/dist/img/logo_1.png" height="40px" style="margin-top: -5px; margin-left: 19px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url();?>/assets/admin/dist/img/logo_1.png" height="40px" style="margin-top: -5px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="<?php echo base_url();?>/assets/admin/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url();?>/assets/admin/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="<?php echo base_url();?>/assets/admin/#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>/assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url();?>/assets/admin/#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="<?php echo base_url();?>/assets/admin/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url();?>/assets/admin/#">
                      <i class="fa fa-users text-aqua"></i> 5 new Members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url();?>/assets/admin/#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="<?php echo base_url();?>/assets/admin/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="<?php echo base_url();?>/assets/admin/#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="<?php echo base_url();?>/assets/admin/#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url();?>/assets/admin/#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>/assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>/assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                   - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo base_url();?>/assets/admin/#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo base_url();?>/assets/admin/#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo base_url();?>/assets/admin/#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>/assets/admin/#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- menu admin -->
      <?php
        if ($this->session->userdata('role') == '1') {
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url()?>admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url()?>assets/admin/#">
            <i class="fa fa-files-o"></i>
            <span>Member</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>member/show_alumni"><i class="fa fa-circle-o"></i> Alumni</a></li>
            <li><a href="<?php echo base_url()?>member/show_non_alumni"><i class="fa fa-circle-o"></i> Non ALumni</a></li></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url()?>perusahaan/show_list">
            <i class="fa fa-th"></i> <span>Perusahaan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url()?>lowongan/show_list">
            <i class="fa fa-pie-chart"></i>
            <span>Lowongan</span>
          </a>
        </li>
        <li>
        <li class="treeview">
          <a href="<?php echo base_url()?>assets/admin/#">
            <i class="fa fa-laptop"></i>
            <span>Tambah Kejuruan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php  echo base_url()?>kejuruan"><i class="fa fa-circle-o"></i>Kejuruan</a></li>
            <li><a href="<?php  echo base_url()?>sub_kejuruan"><i class="fa fa-circle-o"></i>Sub Kejuruan</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php  echo base_url()?>assets/admin/pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php  echo base_url()?>assets/admin/pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li><a href="<?php  echo base_url()?>assets/admin/https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      </ul>
      <!-- end menu admin -->
      <!-- menu perusahaan -->
      <?php
        }elseif ($this->session->userdata('role') == '4') {
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url()?>perusahaan">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url()?>perusahaan/read/'.$this->session->userdata('id_users').'">
            <i class="fa fa-th"></i> <span>Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url()?>lowongan">
            <i class="fa fa-pie-chart"></i>
            <span>Lowongan</span>
          </a>
        </li>
        <li>
        
        <li>
          <a href="<?php  echo base_url()?>assets/admin/pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php  echo base_url()?>assets/admin/pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li><a href="<?php  echo base_url()?>assets/admin/https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      </ul>
      <?php
        }
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --><!-- 
    <section class="content-header">
      <h1>
        <?php //echo $title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php //echo $title;?></li>
      </ol>
    </section>
    
       -->

      <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h1 class="box-title text-bold"><?php echo $header;?></h1>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php echo $contents;?>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="<?php echo base_url();?>/assets/admin/https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
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
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script src="<?php echo base_url();?>/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea1').wysihtml5()
  })
</script>
<script src="<?php echo base_url();?>/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#datatables').DataTable()
  })
</script>

<script src="<?php echo base_url();?>/assets/admintemplate/assets/plugins/summernote/dist/summernote.min.js"></script>
<script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>

    
</body>
</html>
