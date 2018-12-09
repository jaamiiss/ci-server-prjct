<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>My Files</title>
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
                        <li class="active">Files</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            My Files
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
                    <?php $success = $this->session->flashdata('success');?>

                    <?php $ren = $this->session->flashdata('ren');?>
                    <div class="notification"><?php echo $success;?></div><br>
                    <div class="notification"><?php echo $ren;?></div><br>
                    <div class="row">
                        <!-- Collapsable Widget -->
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="widget">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <i class="widget-icon fa fa-list themeprimary"></i>
                                    <span class="widget-caption themeprimary"></span>
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

                                    <!-- My Files -->
                                    <div class="row pricing-container">
                                        
                                        <!-- Download File -->
                                        <?php echo $none;?>
                                        <?php if(!empty($user_files))
                                            foreach ($user_files as $key): ?>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="plan">
                                                <div class="header bordered-blue"></div><br>
                                                <div><img src="<?php echo base_url();?>assets/img/file_thumb.png" width="100" height="100"></div>
                                                <ul>
                                                    <li><b><?php echo $key->givenfilename;?></b></li>
                                                    <li>Uploaded by <b><?php echo $key->uploaderun;?></b><br>
                                                        <abbr class="timeago" title="<?php echo $key->date_uploaded; ?>"></abbr>
                                                    </li>
                                                        <a title="Download" onclick="linkClick()"class="signup bg-blue" href="<?php echo $key->filepath;?>"><i class="fa fa-download"></i></a>
                                                        <a title="Delete" class="signup bg-danger" href="<?php echo base_url();?>files/delete/<?php echo $key->id;?>"><i class="fa fa-times"></i></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                        <!-- Download File -->

                                    </div>
                                     <!-- My Files -->
                                </div>
                            </div>
                        </div>
                        <!-- Collapsable Widget -->

                    </div>
                </div><!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div> <!-- Main Container -->

    <?php 
        include('layout/basicscripts.php');
        include('layout/beyondscripts.php');
        include('layout/timeago.php');
    ?>
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
