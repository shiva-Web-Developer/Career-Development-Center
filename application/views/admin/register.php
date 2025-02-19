<?php $this->load->view('admin/common/css')?>
<?php
  $renderForm=array(
    array('inpForm'=>'text','divClass'=>'form-control','plsHolder'=>'Full Name','icon'=>'fas fa-user',),
    array('inpForm'=>'email','divClass'=>'form-control','plsHolder'=>'Full Email','icon'=>'fas fa-envelope',),
    array('inpForm'=>'password','divClass'=>'form-control','plsHolder'=>'Password','icon'=>'fas fa-lock',),
    array('inpForm'=>'password','divClass'=>'form-control','plsHolder'=>'Retype password','icon'=>'fas fa-lock',)
  );
?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Register Here</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

    <form action="#" method="post">
      <?php
          foreach($renderForm as $row){?>
          <div class="input-group mb-3">
            <input type="<?= $row['inpForm'];?>" class="<?= $row['divClass'];?>" placeholder="<?= $row['plsHolder'];?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="<?= $row['icon'];?>"></span>
              </div>
            </div>
          </div>
       <?php }?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- 
      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="<?= base_url()?>admin" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

