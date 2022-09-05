
     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>
                <?php $query=mysqli_query($con,"select * from tblsite");
while($row=mysqli_fetch_array($query)){
$logo=$row['siteLogo']; 
$wtitle=$row['siteTitle'];
}  ?>
<div align="center">
                    <a href="index.php">  <!-- lOGO TEXT HERE --><img src="admin/assets/images/<?php echo $logo;?>" width="100"><br />
             
          <font style=" font-size: 20px; font-weight:bold; padding-left: 1%"><?php echo $wtitle;?></font>       </a> 
     </div>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php">Home</a></li>
                         <li><a href="blog-posts.php">Blog</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
                         <li><a href="admin/">Admin / Sub-admin Login</a></li>
                    </ul>
               </div>

          </div>
     </section>