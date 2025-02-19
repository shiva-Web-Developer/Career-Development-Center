<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if($this->session->flashdata('product'))
  {
    $msg=$this->session->flashdata('product');
    echo "<script>swal('', '$msg', 'success');</script>";
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Add Product</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Product</li>
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
              <h3 class="card-title">Add Product</h3>
              <a href="<?= base_url()?>Products-Listed" class="card-title float-right">View Product</a>
              </div>
              <?= form_open_multipart(base_url().'Save-Product')?>
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Product Name" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Enter Price" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="image">Upload Image</label>
                            <div class="custom-file">
                                <input type="file" id="image" class="custom-file-input" name="userfile" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                      <img id="imgPreview" src="" alt="pic" style="height:107px;width:100%;display:none;" />
                    </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="desc" class="form-control" placeholder="Enter Description" required></textarea>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="col-sm-1 ml-3">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              <?= form_close();?>
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
 </div>
 