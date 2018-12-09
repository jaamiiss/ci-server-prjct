<!--  -->
<!DOCTYPE html>
<!--
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8">
    <title>Logs</title>

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
                        <li class="active">Logs</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>Activity Logs</h1>    
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <!-- Display Notification -->
                            <?php $success = $this->session->flashdata('success');?>
                            <div class="notification"><?php echo $success;?></div><br>
                            <!-- /Display Notification -->

                            <!-- Admin Header -->
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="databox radius-bordered databox-shadowed databox-graded">
                                        <div class="databox-left no-padding bordered-left-2 bordered-palegreen">
                                            <img src="<?php echo base_url();?>assets/img/avatars/Beatles_1.png" style="width:65px; height:65px;">
                                        </div>
                                        <div class="databox-right">
                                            <span class="databox-number themesecondary"><?php echo $count_activity_logs;?></span>
                                            <div class="databox-text darkgray">ACTIVITY LOGS</div>
                                            <div class="databox-stat themesecondary radius-bordered">
                                                <i class="stat-icon icon-lg fa fa-tasks"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="databox radius-bordered databox-shadowed databox-graded">
                                        <div class="databox-left no-padding bordered-left-2 bordered-palegreen">
                                            <img src="<?php echo base_url();?>assets/img/avatars/Beatles_2.png" style="width:65px; height:65px;">
                                        </div>
                                        <div class="databox-right">
                                            <span class="databox-number themethirdcolor"><?php echo $count_files;?></span>
                                            <div class="databox-text darkgray">FILES</div>
                                            <div class="databox-stat themethirdcolor radius-bordered">
                                                <i class="stat-icon  icon-lg fa fa-file"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="databox radius-bordered databox-shadowed databox-graded">
                                        <div class="databox-left no-padding bordered-left-2 bordered-palegreen">
                                            <img src="<?php echo base_url();?>assets/img/avatars/Beatles_3.png" style="width:65px; height:65px;">
                                        </div>
                                        <div class="databox-right">
                                            <span class="databox-number themeprimary"><?php echo $count_users;?></span>
                                            <div class="databox-text darkgray">USERS</div>
                                            <div class="databox-state bg-themeprimary">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="databox radius-bordered databox-shadowed databox-graded">
                                        <div class="databox-left no-padding bordered-left-2 bordered-palegreen">
                                            <img src="<?php echo base_url();?>assets/img/avatars/Beatles_4.png" style="width:65px; height:65px;">
                                        </div>
                                        <div class="databox-right padding-top-20">
                                            <div class="databox-stat palegreen">
                                            </div>
                                            <div class="databox-text darkgray">ADMINISTRATOR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Admin Header -->

                        </div>
                    </div>
                    
                    <!-- Clear activity logs -->  
                    <div class="buttons-preview">
                        <a href="<?php echo base_url();?>Admin/delete_all_activity_logs" class="btn btn-danger" title="Clear activity logs" onclick="return confirm('Are you sure you want to clear all activity logs?')"><i class="fa fa-times"></i> CLEAR LOGS</a>
                    </div>
                    <!-- /Clear activity logs -->
                    
                    <!-- List of Logs -->
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget">

                                        <!-- Widget Header -->
                                        <div class="widget-header bordered-bottom bordered-themeprimary">
                                            <i class="widget-icon fa fa-list themeprimary"></i>
                                            <span class="widget-caption themeprimary">Activity Logs</span>
                                        </div>
                                        <!--Widget Header-->

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <div class="tickets-container">

                                                    <ul class="tickets-list">
                                                        <?php echo $none;?>
                                                        <?php if(!empty($activity_log))
                                                            foreach ($activity_log as $key): ?>
                                                            
                                                        <li class="ticket-item">
                                                            <div class="row">
                                                                <div title="<?php echo $key->description;?> <?php echo $key->value;?>" class="ticket-user col-lg-6 col-sm-12">
                                                                    <img src="<?php echo base_url();?>assets/img/avatars/Beatles_4.png" class="user-avatar">
                                                                    <span class="user-company">&nbsp;&nbsp;<?php echo $key->description;?></span>
                                                                    <span class="themeprimary"><?php echo $key->value;?></span>
                                                                </div>  
                                                                <div class="ticket-time  col-lg-3 col-sm-6 col-xs-12">
                                                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                                    <i class="fa fa-clock-o"></i>
                                                                    
                                                                    <!-- TimeAgo -->
                                                                    <span><abbr class="timeago" title="<?php echo $key->date; ?>"></abbr></span>
                                                                    <!-- /TimeAgo -->

                                                                </div>
                                                                <div class="ticket-type  col-lg-3 col-sm-6 col-xs-12">
                                                                    <span class="divider hidden-xs"></span>
                                                                    <span class="type">
                                                                        <?php $value = $key->log_type;
                                                                            if($value == 1) {
                                                                                echo 'ADMINISTRATOR';
                                                                            } else {
                                                                                echo 'USER';
                                                                            }
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="ticket-state bg-palegreen">
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php endforeach ?>
                                                    </ul>

                                                    <!-- Pagination -->
                                                    <div class="row"><br>
                                                        <div class="col-md-12">
                                                            <?php echo $links; ?>
                                                            <?php echo $pagination_message;?>
                                                        </div>
                                                    <!-- /Pagination -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /List of Logs -->
                </div><!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div><!-- /Main Container -->

    <?php include('layout/basicscripts.php');
          include('layout/beyondscripts.php');
          include('layout/timeago.php');
    ?>
    <script>
        jQuery(document).ready(function() {
          jQuery("abbr.timeago").timeago();
          jQuery("div.notification").fadeIn();
            setTimeout(function(){
                jQuery("div.notification").fadeOut("slow");
            }, 3000);
        });
    </script>
</body><!--  /Body -->
</html>