<div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <div type="text" class="searchinput"></div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    
                    <!--Files-->
                    <li class="<?php if($menu == 'pfiles' || $menu == 'ufiles' || $menu == 'mallfiles' || $menu == 'uploadfiles') echo 'active open';?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> Files </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if($menu == 'mallfiles') echo 'active';?>">
                                <a href="<?php echo base_url();?>files">
                                    <span class="menu-text">My Files</span>
                                </a>
                            </li>
                            <li class="<?php if($menu == 'uploadfiles') echo 'active';?>">
                                <a href="<?php echo base_url();?>files/upload">
                                    <span class="menu-text">Upload File</span>
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