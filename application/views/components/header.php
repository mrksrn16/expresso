<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Expresso | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/lte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url();?>assets/jquery-3.2.1.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Expresso</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>/assets/images/default.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->M_User->get_login_user_details()->name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>/assets/images/default.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->M_User->get_login_user_details()->name;?> - <?php echo $this->M_Positions->get_position_name($this->M_User->get_login_user_details()->position);?>
                  <!-- <small>Member since Jun 2018</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if($this->M_Positions->check_if_admin()) : ?>
                  <a href="<?php echo base_url();?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                  <?php else:?>
                    <a href="<?php echo base_url();?>employee/profile" class="btn btn-default btn-flat">Profile</a>
                  <?php endif;?>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/assets/images/default.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php $active_page = $this->uri->segment(2);?>
        <?php if($this->M_Positions->check_if_admin()) : ?>
        <li class="<?php if($active_page == '' || $active_page == 'dashboard'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-circle-o text-red"></i> <span>Home</span></a></li>
        <li class="<?php if($active_page == 'employees'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>admin/employees"><i class="fa fa-circle-o text-yellow"></i> <span>Employees</span></a></li>
        <li class="<?php if($active_page == 'attendance'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>admin/attendance"><i class="fa fa-circle-o text-aqua"></i> <span>Attendance</span></a></li>
        <li class="<?php if($active_page == 'salary'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>admin/salary"><i class="fa fa-circle-o text-aqua"></i> <span>Salary</span></a></li>
        <li class="<?php if($active_page == 'transcations'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>admin/transcations"><i class="fa fa-circle-o text-aqua"></i> <span>Transactions</span></a></li>
        <?php else:?>
       <li class="<?php if($active_page == '' || $active_page == 'dashboard'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>employee/dashboard"><i class="fa fa-circle-o text-aqua"></i> <span>Dashboard</span></a></li>
        <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">