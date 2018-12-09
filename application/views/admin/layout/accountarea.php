<div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?php echo base_url();?>assets/img/avatars/Beatles_4.png">
                                    </div>
                                    <section>
                                        <?php foreach($user as $key) : ?>
                                        <h2><span class="profile"><span><?php echo $key->firstname." ".$key->lastname;?></span></span></h2>
                                        <?php endforeach;?>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="edit">
                                        <a href="<?php echo base_url();?>profile" class="pull-left">Profile</a>
                                        <a href="<?php echo base_url();?>profile/changePhoto" class="pull-right">Change Photo</a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="<?php echo base_url();?>Admin/logout">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                          </ul>
                    </div>
                </div>