
   <script>
    window.onload = function () { 
      let url = window.location.href;
    let pageName = url.split('/').pop();
    if(pageName=='admin'||pageName=='Register-Form'||pageName=='Forget-Password'||pageName=='recover')
    {

    }
    else{
      $('#footer').html(' <footer class="main-footer"><strong>Copyright &copy;<a href="https://www.3ea.in" target="_blank"> 3EA Limited</a>.</strong>All rights reserved.</footer>');
    }
}
   </script>
<div id="footer">

</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

<!-- jQuery -->
<script src="<?php echo base_url()?>assetstunch/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assetstunch/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assetstunch/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assetstunch/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assetstunch/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assetstunch/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assetstunch/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assetstunch/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assetstunch/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assetstunch/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assetstunch/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assetstunch/dist/js/adminlte.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assetstunch/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/jquery-validation/additional-methods.min.js"></script>


<!-- Bootstrap 4 -->

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url()?>assetstunch/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assetstunch/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assetstunch/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assetstunch/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url()?>assetstunch/dist/js/loginModule.js"></script>
<script src="<?php echo base_url()?>assetstunch/dist/js/messageModule.js"></script>
<script src="<?php echo base_url()?>assetstunch/dist/js/profileModule.js"></script>
<script src="<?php echo base_url()?>assetstunch/dist/js/deleteModule.js"></script>
<!-- <script src="<?php echo base_url()?>assetstunch/dist/js/editModule.js"></script> -->
<script src="<?php echo base_url()?>assetstunch/dist/js/mainCode03.js"></script>
<script src="<?php echo base_url()?>assetstunch/dist/js/av_alert_ver01.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
  $count_aray = [];
  $labels_gender = [];
//   $count_aray1 = [];
// //   $labels_cuisine = [];
  $count_aray2 = [];
  $labels_diet = [];
if(isset($genderwise))
{

  foreach($genderwise as $row) {
    //   print_r($row);
      array_push($count_aray,$row->COUNTID);
      array_push($labels_gender,ucfirst($row->GENDER));
  } 

//   foreach($cuisinewise as $row) {
//       array_push($count_aray1,$row->COUNTID);
//       array_push($labels_cuisine,ucfirst($row->CUISINE));
//   }
  foreach($classwise as $row) {
    array_push($count_aray2,$row->COUNTID);
      array_push($labels_diet,ucfirst($row->CLASS));
  }
}
  ?>
  <script>var count_aray = <?= json_encode($count_aray) ?>;</script>
  <script>var g_labels = <?= json_encode($labels_gender) ?>;</script>
  <!--<script>var count_aray1 = <?= json_encode($count_aray1) ?>;</script>-->
  <!--<script>var cuisine_labels = <?= json_encode($labels_cuisine) ?>;</script>-->
  <script>var count_aray2 = <?= json_encode($count_aray2) ?>;</script>
  <script>var diet_labels = <?= json_encode($labels_diet) ?>;</script>
      

</body>
</html>
<script>
     function renderTbl(elem, tblOf, showBtn = false){
        if(showBtn){
            $(elem).DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().prependTo(elem+'_wrapper .col-md-6:eq(0)');
        }else{
            $(elem).DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        }
        let text = $(elem+"_info").html();
        $(elem+"_info").html(text.replace('entries',tblOf));
    }
   $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
     $(function () {
       renderTbl("#cityGroup-tbl", "Cities");
       renderTbl("#ageGroup-tbl", "Age Group");
       renderTbl("#genderGroup-tbl", "Gender");
       renderTbl("#classGroup-tbl", "Cuisine");
    });
 
  $(function () {
    $("#city_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
} );
$(function () {
    $("#gender_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
} );
$(function () {
    $("#cuisine_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
} );
$(function () {
    $("#dietary_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
} );
$(function () {
    $("#age_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
} );
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
     var bgColor = ['#56e2cf', '#56aee2', '#5668e2', '#8a56e2', '#cf56e2', '#e256ae','#e25668','#e28956','#e2cf56','#aee256','#68e256','#56e289'];
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
    //   labels:diet_labels,
    //   datasets: [
    //     {
    //       data:count_aray2,
    //       backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
    //     }
    //   ]
    }
    var pieDatachart        = {
      labels: diet_labels,
      datasets: [
        {
          data: count_aray2,
          backgroundColor :bgColor,
        }
      ]
    }
    var pieDatachart2        = {
      labels: g_labels,
      datasets: [
        {
          data: count_aray,
          backgroundColor : bgColor,
        }
      ]
    }
    
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#cousineChart').get(0).getContext('2d')
    var pieData        = pieDatachart;
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'horizontalBar',
      data: pieData,
      options: {
        maintainAspectRatio : false,
        responsive : true,
                legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
      }
    })
    /////////////////////////////piechar2////////////////////////////////
    var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
    var pieData        = pieDatachart2;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
