<?php $this->load->view('admin/common/css')?>
<link rel="stylesheet" href="<?=  base_url();?>assetstunch/dist/css/selfstyle.css">
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Forget Password</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <div id="forget-email">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" placeholder="Enter Your Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" onclick="is_Forget()" class="btn btn-primary btn-block">Send OTP</button>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <div id="forget-otp" style="display:none">
     
      <div class="input-field ml-5 p-3">
          <input type="number" class="inputs" name="otp[]" maxlength="1"/>
          <input type="number" class="inputs" name="otp[]" maxlength="1"/>
          <input type="number" class="inputs" name="otp[]" maxlength="1"/>
          <input type="number" class="inputs" name="otp[]" maxlength="1"/>
        </div>
        <div id="countdown" class="mb-3">
          <div id="countdown-number"></div>
          <svg>
            <circle r="18" cx="20" cy="20"></circle>
          </svg>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" onclick="is_Verify()" class="btn btn-primary btn-block">Verify OTP</button>
          </div> 
          <!-- /.col -->
        </div>
        <div class="pt-1 row" id="resendotp" style="display:none">
          <div class="col-12">
            <button type="button" id="re-send" class="btn btn-primary btn-block">Resend OTP</button>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <p class="mt-3 mb-1">
        <a href="<?= base_url()?>admin">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>


