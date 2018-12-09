<!--  -->
<!DOCTYPE html>
<!-- 
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Update user</title>
    <?php 
        include('layout/meta.php');
        include('layout/basicstyles.php');
        include('layout/fonts.php');
        include('layout/beyondstyles.php');
        include('layout/skins.php');
    ?>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Navbar -->
    <?php include('layout/navbar.php');?>
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
                        <h1>Update User</h1>
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

                            <!-- Notification -->
                            <?php $success = $this->session->flashdata('success');?>
                            <div class="notification"><?php echo $success;?></div><br>
                            <!-- Notification -->

                             <!-- Form -->
                            <div class="col-md-12 col-md-offset-3">
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="widget flat radius-bordered">
                                        <div class="widget-header bg-blue">
                                            <span class="widget-caption">Update User Account Details</span>
                                        </div>
                                    
                                    <div class="widget-body">
                                        <div id="registration-form">
                                            <?php echo form_open('users/update'); ?>
                                            <?php foreach ($record as $key): ?>
                                            <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                                            <h6 class="pull-right"><i class="fa fa-square danger"></i> Required fields</h6>
                                            <div class="form-title">
                                                Account Information
                                            </div>
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                    <input disabled type="text" class="form-control" name="username" value="<?php echo $key->username; ?>" placeholder="Username">
                                                    <i class="glyphicon glyphicon-user circular"></i>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                    <input disabled type="email" class="form-control" name="email" value="<?php echo $key->email; ?>" placeholder="Email Address">
                                                    <i class="fa fa-envelope-o circular"></i>
                                                </span>
                                            </div>
                                            <div class="form-title">
                                                Personal Information
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input required type="text" class="form-control" name="firstname" value="<?php echo $key->firstname; ?>" placeholder="Firstname">
                                                            <i class="fa fa-user danger"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input type="text" class="form-control" name="middlename" value="<?php echo $key->middlename; ?>" placeholder="Middlename">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input requiredtype="text" class="form-control" name="lastname" value="<?php echo $key->lastname; ?>" placeholder="Lastname">
                                                            <i class="fa fa-user danger"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input type="text" class="form-control" name="nickname" value="<?php echo $key->nickname; ?>" placeholder="Nickname">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input type="text" class="form-control" name="address" value="<?php echo $key->address; ?>" placeholder="Address">
                                                            <i class="glyphicon glyphicon-home"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="wide" />
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input class="form-control date-picker" name="birthdate" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $key->birthdate; ?>" placeholder="Birth Date">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <span class="input-icon icon-right">
                                                            <input type="text" class="form-control" name="birthplace" value="<?php echo $key->birthplace; ?>" placeholder="Birth Place">
                                                            <i class="fa fa-globe"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-blue" value="Save">
                                            <?php endforeach;?>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form -->
                        
                        </div>
                    </div>
                </div><!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div><!-- Main Container -->
    
    <?php 
        include('layout/basicscripts.php');
        include('layout/beyondscripts.php');
        include('layout/datepicker.php');
    ?>
    <script>
    jQuery(document).ready(function() {
        //--Bootstrap Date Picker--
        jQuery('.date-picker').datepicker();
    });
</script>
</body><!--  /Body -->
</html>
