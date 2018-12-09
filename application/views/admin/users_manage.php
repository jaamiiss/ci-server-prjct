<!--  -->
<!DOCTYPE html>
<!-- 
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Users</title>
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
                        <h1>
                            Users
                        </h1>
                    </div>

                    <!-- Header Buttons -->
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
                    <!-- Header Buttons -->

                </div>
                <!-- /Page Header -->

                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <!-- Message Notification -->
                            <?php $success = $this->session->flashdata('success');?>
                            <div class="notification"><?php echo $success;?></div><br>
                            <!-- Message Notification -->

                            <div class="widget no-header ">
                                <div class="widget-body colored-purple">
                                    <div class="alert alert-info fade in alert-radius-bordered alert-shadowed">
                                        <button class="close" data-dismiss="alert">
                                            ×
                                        </button>
                                        <i class="fa-fw fa fa-info"></i>

                                        Default user password is <strong>123456</strong> 
                                    </div>

                                    <!-- Delete All Users -->          
                                    <a href="users/delete_all_users" class="btn btn-danger" title="Delete all users" onclick="return confirm('Are you sure you want to delete all users?')"><i class="fa fa-trash-o"></i> DELETE ALL USERS</a>
                                    <!-- Delete All Users -->

                                    <!-- Reset All User Password -->          
                                    <a href="users/reset" class="btn btn-palegreen" title="Reset all user passwords" onclick="return confirm('Are you sure you want to reset all user passwords?')"><i class="fa fa-undo"></i> RESET ALL USER PASSWORDS</a>
                                    <!-- Reset All User Password -->

                                    <!-- Create new User -->
                                    <a href="users/newuser" class="btn btn-azure" title="Add new user"><i class="fa fa-plus"></i> New User</a>
                                    <!-- Create new User -->

                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-12">
                            <div class="widget" style="overflow:auto;">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption themprimary">All Users</span>
                                    <div class="widget-buttons">
                                        <a class="sidebar-toggler" href="#" title="Hide/Show Sidebar">
                                            <i class="fa fa-arrows-h"></i>
                                        </a>
                                        <a href="#" data-toggle="maximize" title="Fullscreen">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse" title="Minimize">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose" title="Close">
                                            <i class="fa fa-times"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-scrollable table-striped table-bordered scrollabltable-hover" id="simpledatatable">
                                        <thead>
                                            <tr>
                                                <th id="sort">
                                                    <i class="fa fa-sort"></i> Date Joined
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort"></i> Username 
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort"></i> Password
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort"></i> Name
                                                </th>
                                                 <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($record as $key): ?>
                                                <tr>
                                                    <td>
                                                        <a hidden><?php echo $key->date_joined;?></a>
                                                        <span><abbr class="timeago" title="<?php echo $key->date_joined; ?>"></abbr></span>
                                                    </td>
                                                    <td class="azure">
                                                        <?php echo $key->username;?>
                                                    </td>
                                                    <td>
                                                        Don't show password
                                                    </td>
                                                    <td class="center">
                                                        <?php echo $key->firstname;?> <?php echo $key->lastname;?>
                                                    </td>
                                                    <td>
                                                        <a href="users/edit/<?php echo $key->id;?>" class="btn btn-yellow" title="Edit"><i class="fa fa-edit"></i></a>
                                                        <a href="users/delete/<?php echo $key->id;?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete user (<?php echo $key->username;?>) ?')"><i class="fa fa-times"></i></a>
                                                        <a href="users/reset_user_password/<?php echo $key->id;?>" class="btn btn-palegreen" title="Reset password" onclick="return confirm('Are you sure you want to reset password for user (<?php echo $key->username;?>) ?')"><i class="fa fa-undo"></i></a>
                                                        <a href="users/resetUsername/<?php echo $key->id;?>/<?php echo $key->firstname;?>/<?php echo $key->lastname;?>" class="btn btn-primary" title="Reset username"><i class="fa fa-refresh"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div><!-- Main Container -->
 
    <?php 
        include('layout/basicscripts.php');
        include('layout/beyondscripts.php');
        include('layout/timeago.php');
    ?>

    <!--Page Related Scripts-->
    <script src="<?php echo base_url();?>assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/ZeroClipboard.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/datatables-init.js"></script>
    <script>
        $("#simpledatatable").on('draw.dt', function(){
            jQuery("abbr.timeago").timeago();
        });
        InitiateSimpleDataTable.init();
    </script>
     <script>
        jQuery(document).ready(function() {
            // TimeAgo 
          jQuery("abbr.timeago").timeago();

            // Notification 
          jQuery("div.notification").fadeIn();
            setTimeout(function(){
                jQuery("div.notification").fadeOut("slow");
            }, 3000);
        });
    </script>
</body><!--  /Body -->
</html>