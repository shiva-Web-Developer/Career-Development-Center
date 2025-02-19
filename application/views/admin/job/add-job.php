<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if($this->session->flashdata('job'))
  {
    $msg=$this->session->flashdata('job');
    echo "<script>swal('', '$msg', 'success');</script>";
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Add Job</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Job</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Add Job</h3>
              </div>
              
              <?= form_open(base_url().'savejob')?>
                  
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Job Title</label>
                        <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Job Title">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">URL</label>
                        <input type="text" id="url" class="form-control" name="url" placeholder="URL">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="mobile">Min Age</label>
                        <input type="text" id="min_age" class="form-control" name="min_age" placeholder="Min Age" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="password">Max Age</label>
                        <input type="text" id="max_age" class="form-control" name="max_age" placeholder="Max Age">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="state">Start Date</label>
                        <input type="date" id="start_date" class="form-control" name="start_date" placeholder="Start Date" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="city">End Date</label>
                        <input type="date" id="end_date" class="form-control" name="end_date" placeholder="End Date" >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="pincode">Fee</label>
                        <input type="number" id="fee" class="form-control" name="fee" placeholder="Fee" >
                        <span>Fill Like this: General / Other State : 0/- OBC / BC : 0/- SC / ST : 0/- Correction Charge : 0</span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="address">Eligibility</label><br>
                        <textarea name="eligibility" style="width:100%;" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="dob">Description</label>
                        <textarea name="description" style="width:100%;" class="form-control"></textarea>
                      </div>
                    </div>
                    


                </div>
                <!-- /.card-body -->
                <div class="col-sm-1 ml-3">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              <?= form_close()?>
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
 </div>
 