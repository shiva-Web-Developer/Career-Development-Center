<?php $this->load->view('admin/common/css') ?>

<body class="hold-transition sidebar-mini layout-fixed" id="menumobile">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url(); ?>assets/img/cdc-new-bg.png" alt="AdminLogo" height="auto" width="280">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="showprev"><i class="fas fa-bars"></i></a>
          <a class="nav-link" data-widget="pushmenu" href="#" onclick="showsidebar()" style="display:none" role="button" id="showbar"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() ?>Dashboard" class="nav-link">Home</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="<?= base_url() ?>assetstunch/dist/img/profile/<?= $_SESSION['img'] ?>" class="img-circle elevation-2" alt="User Image" height="25px" width="25px">
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() ?>Profile" class="dropdown-item">
              <i class="fas fa-users mr-2"></i>Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() ?>Log-out" class="dropdown-item">
              <i class="fas fa-lock mr-2"></i>Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closed">Close</button>
            <button type="button" class="btn btn-primary" onclick="editUserRecord()" id="update">Edit</button>
          </div>
        </div>
      </div>
    </div>