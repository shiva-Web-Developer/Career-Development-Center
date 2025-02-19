
<?php $this->load->view('admin/common/css')?>
<body class="hold-transition login-page" style="background-image: url('../assetstunch/dist/img/n-bg.jpg');background-repeat: no-repeat;background-size:cover;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="card-header text-center">
      <a href="javascript:void(0)" class="h1" ><b>Login Here</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="color:green;">      <img class="animation__shake" src="<?= base_url(); ?>assets/img/cdc-new-bg.png" alt="AdminLogo" height="60" width="60">
 <b>Career Development Center</b> </p>

      <div id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" placeholder="Email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="is_login()" class="btn btn-success btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <p class="mb-1">
        <a href="<?= base_url()?>Forget-Password">Forgot Password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="<//?//php echo base_url()?>Register-Form" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

