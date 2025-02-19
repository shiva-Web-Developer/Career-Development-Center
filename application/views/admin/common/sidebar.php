<?php
$resultArray = array(
  array(
    'Menu' => 'User', 'arrowIcon' => 'fas fa-angle-left right', 'MenuIcon' => 'fas fa-user mr-2',
    'SubMenu' => array(
      array('DropDownMenu' => 'View User', 'DropDownIcon' => 'far fa-circle nav-icon', 'href' => 'View-User')
    )
  ),


  array(
    'Menu' => 'SMS', 'arrowIcon' => 'fas fa-angle-left right', 'MenuIcon' => 'fas fa-comments mr-2',
    'SubMenu' => array(
      array('DropDownMenu'=>'Message Template','DropDownIcon'=>'far fa-circle nav-icon','href'=>'Send-Message'),
      array('DropDownMenu'=>'Email Template','DropDownIcon'=>'far fa-circle nav-icon','href'=>'Send-Email-Message'),
                        array('DropDownMenu'=>'SMS Schedule','DropDownIcon'=>'far fa-circle nav-icon','href'=>'Send-sms-schedule')

    )
    ),

     array('Menu'=>'Notification Log','arrowIcon'=>'fas fa-angle-left right','MenuIcon'=>'fas fa-comments mr-2',
              'SubMenu'=>array(
                  array('DropDownMenu'=>'Push Notification','DropDownIcon'=>'far fa-circle nav-icon','href'=>'PushNotification'),
                  array('DropDownMenu'=>'Email Notification','DropDownIcon'=>'far fa-circle nav-icon','href'=>'EmailNotification'),
              ),
            ),

      array(
    'Menu' => 'Jobs', 'arrowIcon' => 'fas fa-angle-left right', 'MenuIcon' => 'fas fa-shopping-bag mr-2',
    'SubMenu' => array(
      array('DropDownMenu'=>'Add Job','DropDownIcon'=>'far fa-circle nav-icon','href'=>'addjob'),
    array('DropDownMenu'=>'Job List','DropDownIcon'=>'far fa-circle nav-icon','href'=>'joblist')


    )
    )
    
);
$singleMenu = array(
  array('sngMenu' => 'Courses', 'singleIcon' => 'fa fa-book', 'href' => 'View-Courses'),
  array('sngMenu' => 'Enrolled Courses', 'singleIcon' => 'fa fa-book', 'href' => 'Enrolled-Courses'),
  array('sngMenu' => 'Profile', 'singleIcon' => 'fas fa-users mr-2', 'href' => 'Profile'),
  array('sngMenu'=>'Media Gallery','singleIcon'=>'fas fa-images mr-2','href'=>'media'),
  array('sngMenu' => 'Logout', 'singleIcon' => 'fas fa-lock mr-2', 'href' => 'Log-out','onclick' => "return confirm('Are you sure you want to logout?')"
  )
);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>Dashboard" class="brand-link">
    <img src="<?php echo base_url() ?>assets/img/cdc-new-bg.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CDC</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel  pb-3 d-flex">
      <div class="image">
        <!--<img src="<?php echo base_url() ?>assetstunch/dist/img/profile/<?= $_SESSION['img'] ?>" class="img-circle elevation-2" alt="User Image">-->
      </div>
    
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li>
          <a href="<?= base_url() ?>Dashboard" class="nav-link active">
            <i class="far fa-user-circle  nav-icon"></i> &nbsp;&nbsp;
            <p>Dashboard</p>
          </a>
        </li>
        <?php foreach ($resultArray as $innerArray) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="<?= $innerArray['MenuIcon']; ?>"></i>
              <p>
                <?php echo $innerArray['Menu'] ?>
                <i class="<?php echo $innerArray['arrowIcon'] ?>"></i>
              </p>
            </a>
            <?php foreach ($innerArray['SubMenu'] as $value) {
            ?>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $value['href'] ?>" class="nav-link">
                    <i class="<?php echo $value['DropDownIcon'] ?>"></i>
                    <p><?php echo $value['DropDownMenu'] ?></p>
                  </a>
                </li>
              </ul>
            <?php } ?>
          </li>
        <?php } ?>
        <?php foreach ($singleMenu as $menu) { ?>
          <li class="nav-item" <?php echo (isset($menu['onclick'])) ? 'onclick="'.$menu['onclick'].'"' : ''; ?>>
            <a href="<?= $menu['href']; ?>" class="nav-link">
              <i class="<?= $menu['singleIcon']; ?>">&nbsp;</i>
              <p>
                <?= $menu['sngMenu']; ?>
              </p>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>