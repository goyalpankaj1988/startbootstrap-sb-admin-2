<?php

$menu = $_SESSION['menu'];
?>
<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user_list.php">
        <div class="sidebar-brand-icon rotate-n-0">
          <img src="img/logo.JPG" style="width:100%;">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['user']['name']?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!--<li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>-->
      <?php foreach($menu  as $key=>$value) 
      {
      ?>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo $value;?>">
          <i class="fas fa-fw "></i>
          <span><?php echo $key;?></span></a>
      </li>

      <?php
      }
      ?>
      
      
    </ul>
    <!-- End of Sidebar -->