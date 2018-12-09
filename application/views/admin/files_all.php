<!--  -->
<!DOCTYPE html>
<!-- 
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>All Files</title>
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
                            All Files
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
                        <div class="col-xs-12 col-md-12">
                            <?php $success = $this->session->flashdata('success');?>
                            <div class="notification"><?php echo $success;?></div><br>
                           
                           <!-- Delete files uploaded -->
                            <div class="buttons-preview">
                                <!-- Delete all files uploaded -->
                                 <a href="<?php echo base_url();?>files/delete_all_files" class="btn btn-danger" title="Delete all files" onclick="return confirm('Are you sure you want to delete all files?')"><i class="fa fa-times"></i> DELETE ALL FILES</a>
                                <!-- Delete admin uploaded -->
                                 <a href="" class="btn btn-danger" title="Delete all administrator files" onclick="return confirm('Are you sure you want to delete all administrator files?')"><i class="fa fa-times"></i> DELETE ADMINISTRATOR FILES</a>
                                <!-- Delete user uploaded -->
                                 <a href="" class="btn btn-danger" title="Delete all user files" onclick="return confirm('Are you sure you want to delete all users files?')"><i class="fa fa-times"></i> DELETE USER FILES</a>
                            </div>
                             <!-- Delete files uploaded -->
                           
                            <!-- manage all files -->
                            <div class="widget" style="overflow:auto;">
                                <div class="widget-header bg-themeprimary">
                                    <span class="widget-caption themprimary">ALL FILES UPLOADED</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-hover" id="simpledatatable_all_files">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <i class="fa fa-sort"></i> Date Uploaded
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort"></i> Given Name 
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort"></i> File Path
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort"></i> Uploader
                                                </th>
                                                 <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($all_files as $key): ?>
                                                <tr>
                                                    <td>
                                                        <a hidden><?php echo $key->date_uploaded; ?></a>
                                                        <span><abbr class="timeago" title="<?php echo $key->date_uploaded; ?>"></abbr></span>
                                                    </td>
                                                    <td class="azure">
                                                        <?php echo $key->givenfilename;?>
                                                    </td>
                                                    <td>
                                                        <?php $filepath = ltrim($key->filepath, '.');
                                                            echo $filepath;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $key->uploaderun;?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url();?>files/edit/<?php echo $key->id?>" class="btn btn-yellow" title="Edit filename"><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo base_url();?>files/delete/<?php echo$key->id;?>" class="btn btn-danger" title="Delete this file" onclick="return confirm('Are you sure you want to delete this file <?php echo $key->givenfilename;?>?')"><i class="fa fa-times"></i></a>
                                                     </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- manage all files -->
                            
                        </div>
                    </div>
                </div> <!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div><!-- Main Container -->

    <?php include('layout/basicscripts.php');
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
          jQuery("abbr.timeago").timeago();
        });
    </script>
</body><!--  /Body -->
</html>

