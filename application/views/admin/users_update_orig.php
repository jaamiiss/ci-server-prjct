<!--  -->
<!DOCTYPE html>
<!--
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Update User</title>
    <?php 
        include('layout/meta.php');
        include('layout/basicstyles.php');
        include('layout/fonts.php');
        include('layout/beyondstyles.php');
        include('layout/skins.php');
    ?>

    <!--Page Related styles-->
    <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                           <!--  <img src="assets/img/logo.png" alt="" /> -->
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings -->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?php echo base_url();?>assets/img/avatars/Beatles_4.png">
                                    </div>
                                    <section>
                                        <?php foreach($user as $key) :?>
                                        <h2><span class="profile"><span><?php echo $key->firstname." ".$key->lastname;?></span></span></h2>
                                        <?php endforeach;?>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="edit">
                                        <a href="<?php echo base_url();?>profile" class="pull-left">Profile</a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="<?php echo base_url();?>Admin/logout">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <?php include('layout/sidebarmenu.php');?>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="active">Manage</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Update User
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <?php $success = $this->session->flashdata('success');?>
                            <div class="notification"><?php echo $success;?></div><br>
                                
                                 <div class="col-lg-12">
                                    <div class="form-title">
                                    </div>
                                    <?php echo form_open('users/update'); ?>
                                    <div class="col-sm-6">
                                        <?php foreach ($record as $key): ?>
                                        <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                                        <div class="form-group"> 
                                            <label>ID</label>
                                                <input type="text" class="form-control" disabled name="id" value="<?php echo $key->id; ?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Firstname</label>
                                                <input required name="firstname" type="text" class="form-control" value="<?php echo $key->firstname; ?>" placeholder="Firstname">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Lastname</label>
                                                <input required name="lastname" type="text" class="form-control" value="<?php echo $key->lastname; ?>" placeholder="Lastname">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                    <?php endforeach;?>
                                    <?php echo form_close(); ?>
                                </div>
                         
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
    <?php 
        include('layout/basicscripts.php');
        include('layout/beyondscripts.php');
    ?>
</body>
<!--  /Body -->
</html>
