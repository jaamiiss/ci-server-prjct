<?php
        class Layout{
	       private $base_url;

	       public function __construct()
               {
	               $this->base_url = base_url();
               }

                public function basicscripts(){
                    echo '
                        <!--Basic Scripts-->
                        <script src="<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"></script>
                        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
                        <script src="<?php echo base_url();?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>';
                }

                public function basicstyles(){
                    echo '
                        <!--Basic Styles-->
                        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
                        <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
                        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
                        <link href="<?php echo base_url();?>assets/css/weather-icons.min.css" rel="stylesheet" />';
                }

                public function beyondscripts(){
                    echo '
                        <!--Beyond Scripts-->
                        <script src="<?php echo base_url();?>assets/js/beyond.js"></script>';
                }

                public function beyondstyles(){
                    echo '
                        <!--Beyond styles-->
                        <link id="beyond-link" href="<?php echo base_url();?>assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
                        <link href="<?php echo base_url();?>assets/css/demo.min.css" rel="stylesheet" />
                        <link href="<?php echo base_url();?>assets/css/typicons.min.css" rel="stylesheet" />
                        <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" />
                        <link id="skin-link" href="" rel="stylesheet" type="text/css" />';
                }

                public function fonts(){
                    echo '
                        <!--Fonts-->
                        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">';
                }

                public function meta(){
                    echo '
                        <meta name="description" content="Dashboard" />
                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png" type="image/x-icon">';
                }

                public function sidebarmenu(){
                    echo '
                    <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <div type="text" class="searchinput"></div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="<?php if($menu == "admin") echo "active";?>">
                        <a href="<?php echo base_url();?>admin">
                            <i class="menu-icon glyphicon glyphicon-check"></i>
                            <span class="menu-text"> Activity Logs </span>
                        </a>
                    </li>
                    <!--Files-->
                    <li class="<?php if($menu == "pfiles" || $menu == "ufiles" || $menu == "mallfiles" || $menu == "uploadfiles") echo "active open";?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> Files </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if($menu == "mallfiles") echo "active";?>">
                                <a href="<?php echo base_url();?>files/all">
                                    <span class="menu-text">All Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == "pfiles") echo "active";?>">
                                <a href="<?php echo base_url();?>files/">
                                    <span class="menu-text">Public Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == "ufiles") echo "active";?>">
                                <a href="<?php echo base_url();?>files/users">
                                    <span class="menu-text">User Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == "uploadfiles") echo "active";?>">
                                <a href="<?php echo base_url();?>files/upload">
                                    <span class="menu-text">Upload Files</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Manage -->
                    <li class="<?php if($menu == "musers" || $menu == "newuser") echo "active open";?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Manage </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if($menu == "newuser") echo "active";?>">
                                <a href="<?php echo base_url();?>insert-user">
                                    <span class="menu-text">Create User</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == "musers") echo "active";?>">
                                <a href="<?php echo base_url();?>users">
                                    <span class="menu-text">Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Profile-->
                    <li class="<?php if($menu == "profile") echo "active";?>">
                        <a href="<?php echo base_url();?>profile">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>
                </ul>
                <!-- /Sidebar Menu -->
            </div>';
                }

                public function skins(){
                    echo '
                        <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
                        <script src="<?php echo base_url();?>assets/js/skins.min.js"></script>';
                }
        }
?>

