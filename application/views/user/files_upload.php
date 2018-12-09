<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Upload Files</title>
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
    <?php include('layout/navbar.php') ;?>
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
                        <li class="active">Files</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>Upload</h1>
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

                    <!-- Notification -->
                    <?php $success = $this->session->flashdata('success');?>
                    <div class="notification"><?php echo $success;?></div><br>
                    <!-- Notification -->

                    <!-- Form Upload -->
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="widget flat">
                                    <div class="widget-header bg-blue">
                                        <span class="widget-caption">Upload</span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="registration-form">
                                            <?php echo form_open_multipart('files/userupload');?>   
                                           <div class="form-title">
                                                Start uploading files
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $key->id;?>">
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                    <input required type="text" name="givenfilename" class="form-control" placeholder="Specify a filename"><br>
                                                    <i class="glyphicon glyphicon-file circular"></i>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                    <input required type="file" id="file" name="userfile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                                                </span>
                                            </div>
                                            <input type="submit" name="submit" value="Upload" class="btn btn-blue"/>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Upload -->

                </div><!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div><!-- Main Container -->

    <?php 
        include('layout/basicscripts.php');
        include('layout/beyondscripts.php');
    ?>
    <script>
        jQuery(document).ready(function() {
          jQuery("div.notification").fadeIn();
            setTimeout(function(){
                jQuery("div.notification").fadeOut("slow");
            }, 3000);
        });
    </script>

</body>
<!--  /Body -->
</html>
