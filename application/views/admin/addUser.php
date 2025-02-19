<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Add User</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add User</li>
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
              <h3 class="card-title">Add User</h3>
              </div>
              <form id="quickForm">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="Enter Email">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="mobile">Mobile No</label>
                        <input type="text" id="mobile" class="form-control" placeholder="Enter Mobile" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password" class="form-control" placeholder="Enter Password">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" class="form-control" placeholder="Enter state" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" class="form-control" placeholder="Enter City" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="pincode">Pin Code</label>
                        <input type="number" id="pincode" class="form-control" placeholder="Enter ..." >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="address">Permanent Address</label>
                        <input type="text" id="address" class="form-control" placeholder="Enter Permanent Address" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" id="dob" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="image">Upload Image</label>
                            <div class="custom-file">
                                <input type="file" id="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <div style="height:100px; width:100px; border:1px solid black;">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="col-sm-1 ml-3">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
 </div>
 