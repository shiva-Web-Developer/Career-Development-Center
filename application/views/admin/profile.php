<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if($this->session->flashdata('Profile'))
  {
    $msg=$this->session->flashdata('Profile');
    echo "<script>swal('', '$msg', 'success');</script>";
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
      <?php foreach($profile as $row) { 
            ?>
            <section class="content">
              <div class="container-fluid">
                <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <?= form_open_multipart(base_url().'Save-Profile-Image')?> 
              <div class="card-body box-profile">
                <div class="text-center">
                <input type="file" name="userfile" id="image"  style="visibility:hidden;">
                  <?php 
                    if(isset($_SESSION['img']))
                    {
                      ?>
                      <img class="profile-user-img img-fluid img-circle"
                           src="<?php echo base_url()?>assetstunch/dist/img/profile/<?= $_SESSION['img']?>"
                           alt="User profile picture" id="imgPreview" style="height: 100px;">
                      <?php
                    }
                    else
                    {
                      ?>
                      <img class="profile-user-img img-fluid img-circle"
                           src="<?php echo base_url()?>assetstunch/dist/img/profile/user.png"
                           alt="User profile picture" id="imgPreview" style="height: 100px;">
                      <?php
                    }
                  ?>
                </div>
                <div class="pt-3 text-center">
                  <a href="javascript:void(0);" style="border: 1px solid;border-radius: 15px;padding: 3px 6px 3px 6px;"><span onclick='openfile("#image")'>Change Profile</span></a>
                  <h3 class="profile-username text-center"><?= $row->NAME;?></h3> 
                </div>
                              
                <p class="text-muted text-center"><?= $row->EMAIL;?></p>
                <button type="submit" class="btn btn-primary btn-block"><b>Update</b></button>
              </div>
              <!-- /.card-body -->
            </div>
           <?= form_close();?>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="name" value="<?= $row->NAME;?>" class="form-control" id="name" placeholder="Enter Name">
                          <input type="name" value="<?= $row->ID;?>" class="form-control" id="id" placeholder="Enter Name" hidden>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" value="<?= $row->EMAIL;?>" class="form-control" id="email" placeholder="Enter Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                          <input type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" value="<?= $row->PHONE;?>" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                        </div>
                      </div>
                      
                      <!--<div class="form-group row">-->
                      <!--  <label for="email" class="col-sm-2 col-form-label">Password</label>-->
                      <!--  <div class="col-sm-10">-->
                      <!--    <input type="password" value="<?= $row->KUNJI;?>" class="form-control" id="kunji" >-->
                      <!--  </div>-->
                      <!--</div>-->
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-12">
                          <a type="button" class="btn btn-success" onclick="UpdateProfile()">Update</a>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <?php  } ?>
    <!-- /.content -->
  </div>
  <script>
    function openfile(a) 
    {
    $(a).trigger('click');
    }
  </script>