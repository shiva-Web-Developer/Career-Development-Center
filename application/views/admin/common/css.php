<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $title?></title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" rel="stylesheet"/>  


  <!-- Font Awesome -->
  <!-- Theme style -->

  <!-- summernote -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assetstunch/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assetstunch/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assetstunch/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assetstunch/dist/css/adminlte.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="<?php echo base_url()?>assetstunch/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assetstunch/plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url()?>assetstunch/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?=  base_url();?>assetstunch/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="<?=  base_url();?>assetstunch/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url();?>assetstunch/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="<?=  base_url();?>assetstunch/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=  base_url();?>assetstunch/dist/css/adminlte.min.css">

<!-- Self style -->

<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?=  base_url(); ?>assetstunch/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= base_url();?>assetstunch/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url(); ?>assetstunch/plugins/summernote/summernote-bs4.min.css">

<style>
  @media only screen and (max-width: 600px) {
    #showbar
    {
      display:block!important;
    }
     #showprev
    {
      display:none!important;
    }
}
          .card-header{
        background-color:#343a40;
        color:white;
    }
</style>
    <script>
      var base_url = '<?= base_url(); ?>';
    </script>
     <script type="text/javascript">
        var csrf_value = '<?= $this->security->get_csrf_hash(); ?>';
        var csrf_token = '<?= $this->security->get_csrf_token_name(); ?>';
    </script> 
    <script>
      function showsidebar()
      {
        $('#menumobile').attr('class','sidebar-mini sidebar-open');
      }
    </script>  
</head>