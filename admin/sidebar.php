    <div class="col-md-3">
            <div class="sidebar-nav-fixed affix">
                <div class="well">
                    <ul class="nav ">
                        <li class="nav-header"></li>
                        <!-- <li class="active"><a href="#">Link</a> -->
                        <li class="dropdown-toggle">
                          <?php if($_SESSION['TYPE']=='Administrator'){
                            ?>
                            <a href="<?php echo web_root; ?>admin/modules/setting/index.php"><span class="glyphicon glyphicon-cog"></span>Settings</a>
                         <?php
                          }?>
                        </li>
                        <li><a href="#"><?php echo $lang['LINK'];?></a>
                        </li>
                        <li><a href="#"><?php echo $lang['LINK'];?></a>
                        </li>
                        <li class="nav-header"><?php echo $lang['SIDEBAR'];?></li>
                        <li><a href="#"><?php echo $lang['LINK'];?></a>
                        </li>
                        <li><a href="#"><?php echo $lang['LINK'];?></a>
                        </li>
                        <li><a href="#"><?php echo $lang['LINK'];?></a>
                        </li>


                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
