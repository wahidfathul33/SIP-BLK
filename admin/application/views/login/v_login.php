<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP BLK Surakarta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>../assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>../assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>../assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>../assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>../assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url().'../assets/admin/dist/img/blk.jpg'?>); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo" style="background-color: white">
    <a href="#"><b>Login Admin</b></a>
  </div>
  <hr>
    <?php echo $this->session->flashdata('msg')?>
    <p class="login-box-msg">Silahkan masukkan email dan password</p>

    <form action="<?php echo base_url().'c_login/auth_act'?>" method="post">
      
      <div class="form-group has-feedback">
        <input type="text" name='email' class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" id="myInput" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="text"></p>
        <input type="checkbox" onclick="Toggle()"><span> Show Password</span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>../assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>../assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>../assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  var input = document.getElementById("myInput");
  var text = document.getElementById("text");
  input.addEventListener("keyup", function(event) {

  if (event.getModifierState("CapsLock")) {
      $("#text").text("Capslock on");
      text.style.display = "block";
    } else {
      text.style.display = "none"
    }
  });

  function Toggle() { 
      var temp = document.getElementById("myInput"); 
      if (temp.type === "password") { 
          temp.type = "text"; 
      } 
      else { 
          temp.type = "password"; 
      } 
  } 
</script>
</body>
</html>
