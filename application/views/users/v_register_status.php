
<!-- /.col -->
<div class="col-md-9">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-users"></i><?php echo $this->session->userdata('namalv');?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?php 
          if ($this->session->userdata('status') == 'Aktif') {
            if ($this->session->userdata('ses_email') != NULL) {
              echo '<h2>Selamat Akun Anda Telah Aktif.</h2>
                  <h4>Silahkan lengkapi data anda.</h4><br>
                  <a href="'.base_url().'member">Lanjutkan</a>';
            }else{
              echo '<h2>Selamat Akun Anda Telah Aktif.</h2>
                  <h4>Silahkan login dan lengkapi data anda.</h4><br>';
            }
            
          } else{
            echo "<h2>Akun Anda Belum Aktif!</h2>
                  <h3>Silakan cek email anda untuk aktivasi akun.</h3>";
          }
      ?>
    </div>
  </div>
</div>