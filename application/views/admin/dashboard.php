<?php $this->load->view('admin/common/header'); ?>
<?php $this->load->view('admin/common/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<?php $_SESSION['EMAIL']; ?>
<?php
foreach ($user as $row) {
    $download = count($user);
}
?>
<head>
    <style>
    .dataTables_wrapper {
        height: 407px !important;
        overflow: auto;
        overflow-x: clip;
    }
       .info-box{
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    }
    
    #dashboard_card_text{
      color:white;
      font-size:18px;
    }
    
    .card-header{
        background-color:#343a40;
        color:white;
    }
    dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: 0;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: inherit !important;
    border: 1px solid transparent;
    border-radius: 2px;
    background: transparent;
}

</style>

</head>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                     <a href="<?= base_url() ?>View-User">
                    <div class="info-box" style="background-color:#006666;">
                        <span class="info-box-icon"><i class='fa fa-user' style="color:white;"></i></span>
                            <div class="info-box-content" id="dashboard_card_text">
                                <span class="info-box-text"><b>Total Users</b></span>
                                <span class="info-box-number"><?= $download ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <!-- /col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="<?= base_url() ?>View-Courses">
                    <div class="info-box" style="background-color:#33334d;">
                        <span class="info-box-icon"><i class="fas fa-book" style="color:white;"> </i></span>
                            <div class="info-box-content" id="dashboard_card_text">
                                <span class="info-box-text"><b>Courses</b></span>
                                <span class="info-box-number"><?= $allcourses ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            </div>
                    </div>
                       </a>
                </div>
                <!-- /col -->
                <div class="col-md-3 col-sm-6 col-12">
                       <a href="<?= base_url() ?>Enrolled-Courses">
                    <div class="info-box" style="background-color:#3498db;">
                        <span class="info-box-icon"><i class="fa fa-book" style="color:white;"></i></span>
                            <div class="info-box-content" id="dashboard_card_text">
                                <span class="info-box-text"><b>Enrolled Courses</b></span>
                                <span class="info-box-number"><?= $enrolledcourse ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            </div>
                    </div>
                      </a>
                </div>
                <!-- /col -->
                <div class="col-md-3 col-sm-6 col-12">
                        <a href="<?= base_url() ?>Enrolled-Courses">
                    <div class="info-box" style="background-color:#004d00;">
                        <span class="info-box-icon"><i class="fa fa-book" style="color:white;"></i></span>
                            <div class="info-box-content" id="dashboard_card_text">
                                <span class="info-box-text"><b>Registration</b></span>
                                <span class="info-box-number"><?= $download ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            </div>
                    </div>
                      </a>
                </div>
                <!-- /col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">City wise Registration</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                            <table id="cityGroup-tbl" class="table table-bordered table-striped">

                            <!--<table id="city" class="table table-bordered table-striped">-->
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>City Name</th>
                                        <th>Number of Users</th>
                                    </tr>
                                </thead>
                                <tbody id="setdata">
                                    <?php
                                    $a = 0;
                                    $i = 1;
                                    foreach ($citywise as $row) {
                                        $a++; ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?= ucwords(strtolower($row->CITY)); ?></td>
                                            <td><?= $row->COUNTID; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                              
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                
                         <div class="col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Gender wise Registration</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="genderGroup-tbl" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Gender</th>
                                        <th>Number of users</th>
                                    </tr>
                                </thead>
                                <tbody id="setdata">
                                    <?php
                                    $a = 0;
                                    foreach ($genderwise as $row) {
                                        $a++; ?>
                                        <tr>
                                            <td><?= ucfirst($row->GENDER) ?></td>
                                            <td><?= $row->COUNTID; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                               
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                
                
                    <div class="col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Class wise Registration</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="classGroup-tbl" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Class Name</th>
                                        <th>Number of users</th>
                                    </tr>
                                </thead>
                                <tbody id="setdata">
                                    <?php
                                    $a = 0;
                                    $i = 1;
                                    foreach ($classwise as $row) {
                                        $a++; ?>
                                        <tr>
                                              <td><?php echo $i++ ?></td>
                                            <td><?= $row->CLASS; ?></td>
                                            <td><?= $row->COUNTID; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Age wise Registration</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                                                        <table id="ageGroup-tbl" class="table table-bordered table-striped">

                            <!--<table id="age" class="table table-bordered table-striped">-->
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Age Group</th>
                                        <th>Number of users</th>
                                    </tr>
                                </thead>
                  <tbody id="setdata">
                    <?php
                    $age = array(
                      array('text'=>'0 - 15','min'=>0,'max'=>15, 'c'=>0),
                      array('text'=>'16 - 25','min'=>16,'max'=>25, 'c'=>0),
                      array('text'=>'26 - 35','min'=>26,'max'=>35, 'c'=>0),
                      array('text'=>'36 - 45','min'=>36,'max'=>45, 'c'=>0),
                      array('text'=>'46 - 55','min'=>46,'max'=>55, 'c'=>0),
                      array('text'=>'55+','min'=>56,'max'=>120, 'c'=>0)
                    );
                    $other = 0;
                    $a=0;
                    foreach($agewige as $row) { 
                          $date1=date_create(Date("Y-m-d"));
                          $date2=date_create($row->DOB);
                          $diff=date_diff($date1,$date2);
                          $year=(int)$diff->format("%y");
                          $i = 0;
                          foreach($age as $val){
                            if($year >= $val['min'] && $year <= $val['max']){
                              $age[$i]['c'] += 1;
                              continue;
                            }
                            $i++;
                          }
                      $a++; 
                    } 
                    $i = 1;
                    foreach($age as $val){
                      ?>
                        <tr>
                              <td><?php echo $i++  ?></td>
                          <td><?= $val['text'] ?></td>
                          <td><?= $val['c'] ?></td>
                        </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
       
            
                <div class="col-4" style="display:none">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Dietary Preference Wise</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dietary" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dietary Preference</th>
                                        <th>Total User</th>
                                    </tr>
                                </thead>
                                <tbody id="setdata">
                                    <?php
                                    $a = 0;
                                    foreach ($dietarypreferencewise as $row) {
                                        $a++; ?>
                                        <tr>
                                            <td><?= ucfirst($row->DEIT) ?></td>
                                            <td><?= $row->COUNTID; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Dietary Preference</th>
                                        <th>Total User</th>
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
    
    
    
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Display Gender Wise Registration</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                
                <div class="col-md-6">
                    <!-- PIE CHART -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Display Class Wise Registration </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="cousineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                
            <canvas hidden id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <canvas hidden id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <canvas hidden id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

            </div>
            <!-- /.row -->
            
<!-- For the show graph  -->
      <div class="row" hidden>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body" style="border:1px solid silver;">
              <div id="chart"></div>
            </div>
          </div>
        </div>
      </div>
      <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);

        body {
          font-family: Roboto, sans-serif;
        }

        #chart {
          max-width: 100%;
          margin: 35px auto;
        }
      </style>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js" integrity="sha512-HctQcT5hnI/elQck4950pvd50RuDnjCSGSoHI8CNyQIYVxsUoyJ+gSQIOrll4oM/Z7Kfi7WCLMIbJbiwYHFCpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


      <script>
        var allus = <?php echo json_encode($allus); ?>;

        // Extract dates and counts from the PHP array
        var dates = allus.map(function(item) {
          console.log(item.created_date);
          return item.created_date;
        });

        var count_users = allus.map(function(item) {
          return item.count_users;
        });

        var options = {
          series: [{
            name: 'User',
            data: count_users
          }],
          chart: {
            height: 350,
            type: 'area'
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          xaxis: {
            type: 'datetime',
            categories: dates
          },
          tooltip: {
            x: {
              format: 'dd/MM/yy HH:mm'
            }
          },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      </script>
            
            
            
            
            
            
            
            
            
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>