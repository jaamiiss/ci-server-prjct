<div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <div type="text" class="searchinput"></div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="<?php if($menu == 'admin') echo 'active';?>">
                        <a href="<?php echo base_url();?>admin">
                            <i class="menu-icon glyphicon glyphicon-check"></i>
                            <span class="menu-text"> Activity Logs </span>
                        </a>
                    </li>
                    <!--Files-->
                    <li class="<?php if($menu == 'pfiles' || $menu == 'ufiles' || $menu == 'mallfiles' || $menu == 'uploadfiles') echo 'active open';?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> Files </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if($menu == 'mallfiles') echo 'active';?>">
                                <a href="<?php echo base_url();?>files/all">
                                    <span class="menu-text">All Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == 'pfiles') echo 'active';?>">
                                <a href="<?php echo base_url();?>files/">
                                    <span class="menu-text">Public Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == 'ufiles') echo 'active';?>">
                                <a href="<?php echo base_url();?>files/users">
                                    <span class="menu-text">User Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == 'uploadfiles') echo 'active';?>">
                                <a href="<?php echo base_url();?>files/upload">
                                    <span class="menu-text">Upload Files</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Manage -->
                    <li class="<?php if($menu == 'musers' || $menu == 'newuser') echo 'active open';?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Manage </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if($menu == 'newuser') echo 'active';?>">
                                <a href="<?php echo base_url();?>users/newuser">
                                    <span class="menu-text">Create User</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == 'musers') echo 'active';?>">
                                <a href="<?php echo base_url();?>users">
                                    <span class="menu-text">Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Profile-->
                    <li class="<?php if($menu == 'profile') echo 'active';?>">
                        <a href="<?php echo base_url();?>profile">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>
                </ul>
                <!-- /Sidebar Menu -->
            </div>