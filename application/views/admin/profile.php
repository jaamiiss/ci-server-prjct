<!--  -->
<!DOCTYPE html>
<!--  -->
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <?php 
        include('layout/meta.php');
        include('layout/basicstyles.php');
        include('layout/fonts.php');
        include('layout/beyondstyles.php');
        include('layout/skins.php');
    ?>
    <script src="<?php echo base_url();?>assets/js/datetime/datetime.js" type="text/javascript"></script>
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
                            <a href="admin">Home</a>
                        </li>
                        <li class="active">Profile</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>Profile</h1>
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
                        <div class="col-md-12">
                            <?php $success = $this->session->flashdata('success');?>
                            <div class="notification"><?php echo $success;?></div><br>
                            <div class="profile-container">

                                <!-- Admin Header -->
                                <div class="profile-header row">
                                    <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                                        <img src="assets/img/avatars/Beatles_4.png" alt="" class="header-avatar image-circular bordered-3 bordered-palegreen" />
                                    </div>
                                    <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                                        <div class="header-fullname">Administrator</div>
                                        
                                        <div class="header-information">
                                            Manages the Mobile Class Attendance server. Including the file uploads and also the users.
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                                <div class="stats-value pink"><?php echo $count_activity_logs;?></div>
                                                <div class="stats-title">Activity Logs</div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                                <div class="stats-value pink"><?php echo $count_files;?></div>
                                                <div class="stats-title">Files</div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                                <div class="stats-value pink"><?php echo $count_users;?></div>
                                                <div class="stats-title">Users</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                                <i class="glyphicon glyphicon-map-marker"></i> Cebu
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                                Super Admin
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                                Age: <strong>19</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Admin Header -->

                                <!-- Profile body -->
                                <div class="profile-body">
                                    <div class="col-lg-12">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#overview"></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tabs-flat">
                                                <div id="overview" class="tab-pane active">
                                                    <div class="row profile-overview">

                                                            <!-- Last logged in and Clock -->
                                                            <?php foreach ($lastlogin as $key) : ?>
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <!-- Live Date Time -->
                                                                    <div class="col-md-6">
                                                                        <div class="alert alert-success fade in alert-radius-bordered alert-shadowed">
                                                                            <center>
                                                                                <div id="clockbox"></div>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Live Date Time -->
                                                                    
                                                                    <!-- Last Logged in -->
                                                                    <div class="col-md-6">
                                                                        <div class="alert alert-warning fade in alert-radius-bordered alert-shadowed">
                                                                            <center>Last Logged in
                                                                                <span><abbr class="timeago primary" title="<?php echo $key->lastlogin; ?>"></abbr></span>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Last Logged in -->

                                                                </div>
                                                            </div>
                                                            <?php endforeach;?>
                                                            <!-- Last logged in and Clock -->

                                                            <!-- Account Details -->
                                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                            <div class="widget flat radius-bordered">
                                                                <div class="widget-header bg-blue">
                                                                    <span class="widget-caption">Account Details</span>
                                                                </div>
                                                                <div class="widget-body">
                                                                    <div id="registration-form">
                                                                        <?php foreach ($user as $key): ?>

                                                                        <form role="form">
                                                                            <div class="form-title">
                                                                                Account Information
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <span class="input-icon icon-right">
                                                                                    <input disabled type="text" class="form-control" value="<?php echo $key->username;?>" placeholder="Username">
                                                                                    <i class="glyphicon glyphicon-user circular"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <span class="input-icon icon-right">
                                                                                    <input disabled type="text" class="form-control" value="<?php echo $key->email;?>" placeholder="Email Address">
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
                                                                                            <input disabled type="text" class="form-control" value="<?php echo $key->firstname;?>" placeholder="Firstname">
                                                                                            <i class="fa fa-user"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <span class="input-icon icon-right">
                                                                                            <input disabled type="text" class="form-control" value="<?php echo $key->middlename;?>" placeholder="Middlename">
                                                                                            <i class="fa fa-user"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <span class="input-icon icon-right">
                                                                                            <input disabled type="text" class="form-control" value="<?php echo $key->lastname;?>" placeholder="Lastname">
                                                                                            <i class="fa fa-user"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <span class="input-icon icon-right">
                                                                                            <input disabled type="text" class="form-control" value="<?php echo $key->nickname;?>" placeholder="Nickname">
                                                                                            <i class="fa fa-user"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <span class="input-icon icon-right">
                                                                                            <input disabled type="text" class="form-control" value="<?php echo $key->address;?>" placeholder="Address">
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
                                                                                            <input disabled class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $key->birthdate;?>" placeholder="Birth Date">
                                                                                            <i class="fa fa-calendar"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <span class="input-icon icon-right">
                                                                                            <input disabled type="text" class="form-control" value="<?php echo $key->birthplace;?>" placeholder="Birth Place">
                                                                                            <i class="fa fa-globe"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-title">
                                                                                Account Created
                                                                            </div>
                                                                            <span><abbr class="timeago" title="<?php echo $key->date_joined;?>"></abbr></span>
                                                                            <hr class="wide" />
                                                                            <a href="profile/edit/<?php echo $key->id;?>" class="btn btn-yellow" title="Edit account information">Edit</a>
                                                                        </form>
                                                                        <?php endforeach;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Account Details -->


                                                        <!-- Password -->
                                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                                            <div class="widget flat radius-bordered">
                                                                <div class="widget-header bg-blue">
                                                                    <span class="widget-caption">Password</span>
                                                                </div>
                                                                <div class="widget-body">
                                                                    <div id="registration-form">
                                                                        <?php echo form_open('profile/changepassword'); ?>
                                                                        <?php foreach($user as $key) : ?>
                                                                            <div class="form-title">
                                                                                Change Password
                                                                            </div>
                                                                            <input type="hidden" name="id" value="<?php echo $key->id;?>">
                                                                            <div class="input-group form-group">
                                                                                <input id="show" type="password" name="password" class="form-control" placeholder="Input your password">
                                                                                <span class="input-group-btn">
                                                                                    <button id="showhide" class="btn btn-default" type="button" onclick="toggle_password('show');">Show</button>
                                                                                </span>
                                                                            </div>
                                                                            <div class="input-group form-group">
                                                                                <input id="shown" type="password" name="passwordn" class="form-control" placeholder="New password">
                                                                                <span class="input-group-btn">
                                                                                    <button id="showhidenew" class="btn btn-default" type="button" onclick="toggle_password_new('shown');">Show</button>
                                                                                </span>
                                                                            </div>
                                                                            <div class="input-group form-group">
                                                                                <input id="showcn" type="password" name="passwordcn" class="form-control" id="userameInput" placeholder="Re-enter new password">
                                                                                <span class="input-group-btn">
                                                                                    <button id="showhideconfirm" class="btn btn-default" type="button" onclick="toggle_password_confirm('showcn');">Show</button>
                                                                                </span>
                                                                            </div>
                                                                            <input type="submit" class="btn btn-blue" value="Change">
                                                                            <hr class="wide" />
                                                                        <?php endforeach;?>
                                                                        <?php echo form_close(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Password -->

                                                        <!-- Latest Logs limit by 3 -->
                                                        <div class="col-md-12">
                                                            <h6 class="row-title before-palegreen">LATEST LOGS</h6>
                                                            <div class="row ">
                                                                <div class="col-lg-12 col-sm-12 col-xs-12">
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
                                                                                            <span class="themeprimary"><?php echo $key->value;?></span>                                                                                        </div>  
                                                                                        <div class="ticket-time  col-lg-3 col-sm-6 col-xs-12">
                                                                                            <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                                                            <i class="fa fa-clock-o"></i>
                                                                                          
                                                                                            <!-- TimeAgo -->
                                                                                            <span><abbr class="timeago" title="<?php echo $key->date; ?>"></abbr></span>
                                                                                            <!-- TimeAgo -->

                                                                                        </div>
                                                                                        <div class="ticket-type  col-lg-3 col-sm-6 col-xs-12">
                                                                                            <span class="divider hidden-xs"></span>
                                                                                            <span class="type">
                                                                                                <?php $value = $key->log_type;
                                                                                                    if($value == 1)                                                                                                     {
                                                                                                        echo 'ADMINISTRATOR';
                                                                                                    }
                                                                                                    else {
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Latest logs limit by 3 -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Profile Body -->
                            </div>
                        </div>
                    </div>
                </div><!-- /Page Body -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div><!-- /Main Container -->

    <?php 
        include('layout/basicscripts.php');
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
    <script type="text/javascript">
        function toggle_password(target){
            var d = document;
            var tag = d.getElementById(target);
            var tag2 = d.getElementById("showhide");

                if (tag2.innerHTML == 'Show') {
                    tag.setAttribute('type', 'text');   
                    tag2.innerHTML = 'Hide';
                } else {
                    tag.setAttribute('type', 'password');   
                    tag2.innerHTML = 'Show';
                }
        }

        function toggle_password_new(target){
            var d = document;
            var tag = d.getElementById(target);
            var tag2 = d.getElementById("showhidenew");

                if (tag2.innerHTML == 'Show') {
                    tag.setAttribute('type', 'text');   
                    tag2.innerHTML = 'Hide';
                } else {
                    tag.setAttribute('type', 'password');   
                    tag2.innerHTML = 'Show';
                }
        }

        function toggle_password_confirm(target){
            var d = document;
            var tag = d.getElementById(target);
            var tag2 = d.getElementById("showhideconfirm");

                if (tag2.innerHTML == 'Show') {
                    tag.setAttribute('type', 'text');   
                    tag2.innerHTML = 'Hide';
                } else {
                    tag.setAttribute('type', 'password');   
                    tag2.innerHTML = 'Show';
                }
        }
   </script>
</body><!--  /Body -->
</html>
