<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""> 
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>../assets/admintemplate/assets/images/favicon.png">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- chartist CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- page CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
   
    <!-- Date picker plugins css -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <!-- summernotes CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/summernote/dist/summernote-bs4.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/material/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url();?>../assets/admintemplate/material/css/colors/blue.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url();?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url();?>../assets/admintemplate/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url();?>../assets/admintemplate/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>   
                         <img src="<?php echo base_url();?>../assets/admintemplate/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify" id="ping"> <span class="heartbit"></span> <span class="point"></span> </div>
                                <div class="notify" id="ping2"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <div id="notif-perusahaan">
                                                <a href="<?= base_url()?>c_admin/users/4">
                                                    <div class="btn btn-danger btn-circle"><span id="jumlah" class="font-weight-bold"></span></div>
                                                    <div class="mail-contnet">
                                                        <h5>Perusahaan Baru</h5> <span class="mail-desc">Butuh verifikasi</span> <span class="time" id="waktu"></span> 
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Message -->

                                            <div id="notif-loker">
                                                <a href="<?= base_url()?>c_admin/lowongan">
                                                    <div class="btn btn-success btn-circle"><span id="jmloker" class="font-weight-bold"></span></div>
                                                    <div class="mail-contnet">
                                                        <h5>Lowongan Baru</h5> <span class="mail-desc">Butuh verifikasi</span> <span class="time" id="wkloker"></span> 
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);" id="clearnotif"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>../assets/admintemplate/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo base_url();?>../assets/admintemplate/assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Administrator</h4>
                                                <p class="text-muted">admin</p>
                                                <a href="<?php echo base_url();?>c_login/logout" class="btn btn-rounded btn-danger btn-sm">Logout</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                          <img src="<?php echo base_url();?>../assets/admintemplate/assets/images/users/1.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <p>Administrator</p>
                          <p class="text-p text-muted"><i class="fa fa-user"></i> Admin</p>
                        </div>
                    </div>
                    <hr>
                    <ul id="sidebarnav">
                        <li class="menu"> <a class="waves-effect waves-dark" href="<?php echo base_url();?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="menu "> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span class="hide-menu">Artikel</span></a>
                        </li>
                        <!-- <li class="menu "> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-bullhorn"></i><span class="hide-menu">Berita</span></a>
                        </li> -->
                        <li class="menu "> <a class="waves-effect waves-dark" href="<?php echo base_url();?>c_admin/lowongan" aria-expanded="false"><i class="fa fa-file-text-o"></i><span class="hide-menu">Lowongan</span></a>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Data User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="menu " href="<?php echo base_url().'c_admin/member/2';?>">Alumni</a></li>
                                <li><a class="menu " href="<?php echo base_url().'c_admin/member/3';?>">Non Alumni</a></li>
                                <li><a class="menu " href="<?php echo base_url().'c_admin/perusahaan/4';?>">Perusahaan</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Data Master</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="">
                                    <a class="has-arrow menu" href="#" aria-expanded="false">Profil Kejuruan</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a class="menu " href="<?php echo base_url().'c_admin/kejuruan';?>">Kejuruan</a></li>
                                        <li><a class="menu " href="<?php echo base_url().'c_admin/sub_kejuruan';?>">Sub Kejuruan</a></li>
                                    </ul>
                                </li>
                                <li><a class="menu " href="<?php echo base_url().'c_admin/kategori';?>">Kategori Pekerjaan</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Manajemen User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="menu " href="<?php echo base_url().'c_admin/users/1';?>">Admin</a></li>
                                <li><a class="menu " href="<?php echo base_url().'c_admin/users/2';?>">Alumni</a></li>
                                <li><a class="menu " href="<?php echo base_url().'c_admin/users/3';?>">Non Alumni</a></li>
                                <li><a class="menu " href="<?php echo base_url().'c_admin/users/4';?>">Perusahaan</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <!-- <div class="sidebar-footer"> -->
                <!-- item-->
                <!-- <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div> -->
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><?php echo $header ?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $breadcrumb;  ?></li>
                            <?php echo $breadcrumb2;?>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php echo $contents; ?>    
                <!-- Row -->
                
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2017 Material Pro Admin by wrappixel.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/validation.js"></script>

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
<!--     <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script> -->
    <!--c3 JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/d3/d3.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Vector map JavaScript -->
    <!-- <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/dashboard2.js"></script> -->
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/dashboard2.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/sweetalert/myswal.js"></script>
    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- This is data table -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/datatables/jquery.dataTables.min.js"></script>
     <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    <!-- end - This is for export functionality only -->
        <!-- jQuery file upload -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/moment/moment.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    <script>
    var baseurl = "<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/mycustomjs.js"></script>
    <script src="<?php echo base_url();?>../assets/admintemplate/material/js/mycustomjsAdmin.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            document.getElementById("ping").style.display = "none";
            document.getElementById("ping2").style.display = "none";
            document.getElementById("notif-perusahaan").style.display = "none";
            document.getElementById("notif-loker").style.display = "none";

            var interval=setInterval(function(){
                $.ajax({
                    url : baseurl + "c_admin/notif_verifikasi_perusahaan",
                    dataType:'json',
                    success:function(response) {
                        if(response.data == '0'){
                            document.getElementById("ping").style.display = "none";
                            document.getElementById("notif-perusahaan").style.display = "none";
                        }else{
                            document.getElementById("ping").style.display = "block";
                            document.getElementById("ping2").style.display = "none";
                            document.getElementById("notif-perusahaan").style.display = "block";
                            $('#jumlah').html(response.data);
                            $('#waktu').html(response.waktu);
                        }
                    }
                });

                $.ajax({
                    url : baseurl + "c_admin/notif_verifikasi_loker",
                    dataType:'json',
                    success:function(response) {
                        if(response.dataloker == '0'){
                            document.getElementById("ping2").style.display = "none";
                            document.getElementById("notif-loker").style.display = "none";
                        }else{
                            document.getElementById("ping").style.display = "none";
                            document.getElementById("ping2").style.display = "block";
                            document.getElementById("notif-loker").style.display = "block";
                            $('#jmloker').html(response.dataloker);
                            $('#wkloker').html(response.waktuloker);
                        }
                    }
                });
            }
            ,6000);
        });


    </script>
</body>

</html>
