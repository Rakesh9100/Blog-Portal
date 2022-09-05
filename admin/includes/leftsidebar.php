            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                         
                            </li>
<?php if($_SESSION['utype']=='1'):?>
  <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Sub-admins </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-subadmins.php">Add Sub-admin</a></li>
                                    <li><a href="manage-subadmins.php">Manage Sub-admin</a></li>
                                </ul>
                            </li>
<?php endif;?>
               


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Category </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                	<li><a href="add-category.php">Add Category</a></li>
                                    <li><a href="manage-categories.php">Manage Category</a></li>
                                </ul>
                            </li>

    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span>Sub Category </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-subcategory.php">Add Sub Category</a></li>
                                    <li><a href="manage-subcategories.php">Manage Sub Category</a></li>
                                </ul>
                            </li>               
  <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Posts (Blog) </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-post.php">Add Posts</a></li>
                                    <li><a href="manage-posts.php">Manage Posts</a></li>
                                     <li><a href="trash-posts.php">Trash Posts</a></li>
                                </ul>
                            </li>  
                     

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="aboutus.php">About us</a></li>
                                    <li><a href="contactus.php">Contact us</a></li>
                                </ul>
                            </li>
   <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Comments </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                  <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                                    <li><a href="manage-comments.php">Approved Comments</a></li>
                                </ul>
                            </li>   
     <li class="has_sub">
                                <a href="subscribers.php" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Subscribers </span> </a>
                         
                            </li>
   <li class="has_sub">
                                <a href="website-settings.php" class="waves-effect"><i class="ti-settings m-r-5"></i> <span> Website Setting </span> </a>
                         
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>