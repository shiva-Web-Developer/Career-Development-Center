<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<style>
       .card-header{
        background-color:#343a40;
        color:white;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Push Notification Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Push Notification Log</li>
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
                <h3 class="card-title">All Push Notification Log</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user-tbl" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>SN</th>
                    <th>Send By</th>
                    <th>Message</th>
                    <th>Count</th>
                    <th>Date</th>
                   
                  </tr>
                  </thead>
                  <tbody id="setdata">
                    <?php
                    $a=0;
                    $i = 1;
                    foreach($result as $row) { $a++; ?>
                  <tr id="del<?=$row->id?>">
                      <td><?php echo $i++ ?></td>
                    <td><?= $row->NAME;?></td>
                    <td><?= $row->msg;?></td>
                    <td><?= $row->COUNT;?></td>
                    <td><?= $row->Send_date;?></td>
                  
                  </tr>
                      <?php } ?>
                  </tbody>
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
  <script>
	    window.addEventListener('load', function() {
          renderTbl("#user-tbl", "Users", true);
      }, false);
  </script>
 