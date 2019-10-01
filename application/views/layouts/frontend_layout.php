<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
		<meta name="description" content="JobBoard - HTML Template" />
	<meta property="og:title" content="JobBoard - HTML Template" />
	<meta property="og:description" content="JobBoard - HTML Template" />
	<meta property="og:image" content="JobBoard - HTML Template" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	 <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/admintemplate/assets/images/favicon.png">
	<!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
	
	<!-- PAGE TITLE HERE -->
	<title><?= $title?></title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>assets/frontend/js/html5shiv.min.js"></script>
	<script src="<?php echo base_url();?>assets/frontend/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- STYLESHEETS -->
	<link href="<?php echo base_url();?>assets/admintemplate/material/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/skin/skin-1.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/plugins/datepicker/css/bootstrap-datetimepicker.min.css"/>
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/plugins/revolution/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/plugins/revolution/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/plugins/revolution/revolution/css/navigation.css">
	<!-- Revolution Navigation Style -->
</head>
<body id="bg">
<!-- <div id="loading-area"></div> -->
<div class="page-wraper">
	<!-- header -->
    <header class="site-header mo-left header fullwidth">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
						<a href="index-2.html"><img src="<?php echo base_url();?>assets/frontend/images/logo.png" class="logo" alt=""></a>
					</div>
                    <!-- nav toggle button -->
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="<?=base_url()?>c_user" class="site-button"><i class="fa fa-user"></i> Sign Up</a>
                            <a href="<?=base_url()?>c_login/login" class="site-button"><i class="fa fa-lock"></i> login</a>
                        </div>
                    </div>
                    <!-- Quik search -->
                    <div class="dez-quik-search bg-primary">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="flaticon-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start float-right" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
							<li class="menu active">
								<a href="#">Beranda</a>
							</li>
							<li class="menu">
								<a href="#">Lowongan Kerja <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="#" class="dez-page">Cari Lowongan</a></li>
									<li><a href="#" class="dez-page">Pasang Lowongan</a></li>
									<li><a href="#" class="dez-page">Perusahaan</a></li>
								</ul>
							</li>
							<!-- <li>
								<a href="#">For Employers <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="browse-candidates.html" class="dez-page">Browse Candidates</a></li>
									<li><a href="submit-resume.html" class="dez-page">Submit Resume</a></li>
								</ul>
							</li> -->
							<li class="menu">
								<a href="#">Berita</i></a>
							</li>
							<li class="menu">
								<a href="#">Artikel</a>
							</li>
						</ul>			
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->
    
    <!-- content start -->
    <?= $contents?>
    <!-- content end -->


	<!-- Footer -->
    <footer class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
					<div class="col-xl-4 col-lg-3 col-md-12 col-sm-12">
                        <div class="widget">
                            <img src="<?php echo base_url();?>assets/frontend/images/logo_1_.png" width="250" class="m-b15" alt=""/>
							<p class="text-capitalize m-b20">sistem informasi pasar kerja balai latihan kerja surakarta menyediakan informasi lowongan pekerjaan, mempermudah cari pekerjaan dan perekrutan karyawan.</p>
							<ul class="list-inline m-a0">
								<li><a href="https://www.facebook.com/BLK-Surakarta-117050028378422/" class="site-button white facebook circle "><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="site-button white linkedin circle "><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="site-button white instagram circle "><i class="fa fa-instagram"></i></a></li>
							</ul>
                        </div>
                    </div>
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="widget border-0">
                            <h5 class="m-b30 text-white">Tentang SIP</h5>
                            <ul class="list-2 w10 list-line">
                                <li><a href="#">Hubungi Kami</a></li>
                                <li><a href="#">Pusat Bantuan</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                                <li><a href="#">Kondisi & Ketentuan</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="widget border-0">
                            <h5 class="m-b30 text-white">Pencari Kerja</h5>
                            <ul class="list-2 w10 list-line">
                                <li><a href="#">Daftar Gratis</a></li>
                                <li><a href="#">Cari Lowognan Kerja</a></li>
                                <li><a href="#">Buat CV</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="widget border-0">
                            <h5 class="m-b30 text-white">Perusahaan</h5>
                            <ul class="list-2 w10 list-line">
                                <li><a href="#">Registrasi Perusahaan</a></li>
                                <li><a href="#">Pasang Lowongan</a></li>
                            </ul>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center"><span>BLK Surakarta SIP (Sistem Informasi Pasar Kerja) © 2018</span></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="<?php echo base_url();?>assets/frontend/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/wow/wow.js"></script><!-- WOW JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="<?php echo base_url();?>assets/frontend/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="<?php echo base_url();?>assets/frontend/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="<?php echo base_url();?>assets/frontend/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="<?php echo base_url();?>assets/frontend/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="<?php echo base_url();?>assets/frontend/plugins/rangeslider/rangeslider.js" ></script><!-- Rangeslider -->
<script src="<?php echo base_url();?>assets/frontend/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?php echo base_url();?>assets/frontend/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<!-- <script src='<?php //echo base_url();?>assets/frontend/js/recaptcha/api.js'></script> --> 
<script src="https://www.google.com/recaptcha/api.js" async defer></script><!-- Google API For Recaptcha  -->
<script src="<?php echo base_url();?>assets/frontend/js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="<?php echo base_url();?>assets/frontend/plugins/paroller/skrollr.min.js"></script><!-- PAROLLER -->
<script src="<?php echo base_url();?>assets/admintemplate/material/js/validation.js"></script> <!-- form validation --> 
<script>
	$(".menu").click(function(){
        var callItem=$(this);
        callItem.addClass('active');
        $(".menu").not(callItem).removeClass('active');           
    });

	function Toggle() { 
    var temp = document.getElementById("password"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
    var temp = document.getElementById("passconf"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
}
</script>
<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green"
        }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    }(window, document, jQuery);
    </script>

<script type="text/javascript">var baseurl = <?= base_url()?></script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> 

</body>


</html>