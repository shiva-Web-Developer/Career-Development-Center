<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View All Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Products</h3>
                <a href="<?= base_url()?>Add-Products" class="btn btn-primary float-lg-right">Add Products</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Go to Website</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="setdata">
                    <?php
                    $a=0;
                    foreach($product_list as $row) { $a++; ?>
                  <tr id="del<?=$row->id?>">
                    <td><?= $row->product_name;?></td>
                    <td><img src="<?= base_url()?>assets/img/product/<?= ucfirst($row->image)?>" height="70px" width="90px"></td>
                    <td><?= '₹'.$row->price;?></td>
                    <td><a href="<?= $row->link;?>" target="_blank">Click Here..</a></td> 
                    <td><div class="btn-group">
                    <button type="button" class="btn btn-success">Action</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="javascript:void(0)" onclick="deleteModule('product','id',<?=$row->id?>)">Delete</a>
                      
                    </div>
                  </div></td>
                  </tr>
                      <?php } ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Go to Website</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 