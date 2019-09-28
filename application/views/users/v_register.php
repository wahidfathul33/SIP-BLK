
         <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-users"></i> Registrasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?php echo base_url().'users/register_action'?>" method="post">
      <div class="form-group has-feedback">
        <label for="int"><?php echo form_error('id_level') ?></label>
        <select class="form-control" name="id_level">
          <option value="2">Alumni</option>
          <option value="3">Non alumni</option>
          <option value="4">Perusahaan</option>
        </select>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="int"><?php echo form_error('email'); echo $this->session->userdata('cek_email'); ?></label>
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="int"><?php echo form_error('password') ?></label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="int"><?php echo form_error('passconf') ?></label>
        <input type="password" name="passconf" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="g-recaptcha" data-sitekey="6LfpWrcUAAAAAAVfY1drweRAoCU-rti9ih1g7C7A"></div><br>
      <?php echo $this->session->userdata('cek_captcha'); ?>
      <input type="hidden" name="status" class="form-control" placeholder="Retype password" value="Belum aktif">
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div></div></div></div>