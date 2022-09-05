<?php session_start();
include_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Blog Management System</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<?php include_once('includes/header.php') ?>

     <!-- HOME -->
     <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">

                    <?php
$query=mysqli_query($con,"select tblposts.postedBy,tblposts.viewCounter,tblposts.likes,tblposts.PostImage,tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostingDate as postingdate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId ORDER BY RAND() limit 3");
while ($row=mysqli_fetch_array($query)) {

?>
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1><?php echo htmlentities($row['posttitle']);?></h1>
                                   
                                        <a href="blog-post-details.php?bid=<?php echo htmlentities($row['pid'])?>" class="section-btn btn btn-default">Read Blog</a>
                                   </div>
                              </div>
                         </div>
                    </div>

           
<?php } ?>
           
          
               </div>
          </div>
     </section>

     <main>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="text-center">
                                   <h2>About us</h2>

                                   <br>
<?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
                                   <p class="lead"><?php echo $row['Description'];?></p>

                              <?php } ?>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Random Blog posts </h2>
                              </div>
                         </div>
<?php
$query=mysqli_query($con,"select tblposts.postedBy,tblposts.viewCounter,tblposts.likes,tblposts.PostImage,tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostingDate as postingdate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId ORDER BY RAND() limit 3");
while ($row=mysqli_fetch_array($query)) {

?>
                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" width="370" height="300">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> <?php echo htmlentities($row['postedBy']);?></span>
                                             <span title="Date"><i class="fa fa-calendar"></i> <?php echo htmlentities($row['postingdate']);?></span>
                                             <span title="Views"><i class="fa fa-eye"></i> <?php echo htmlentities($row['viewCounter']);?></span>
                                             <span title="Likes"><i class="fa fa-thumbs-up"></i>  <?php echo htmlentities($row['likes']);?></span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="blog-post-details.php?bid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></h3>
                                   </div>

                                   <div class="courses-info">
                                        <a href="blog-post-details.php?bid=<?php echo htmlentities($row['pid'])?>" class="section-btn btn btn-primary btn-block">Read More</a>
                                   </div>
                              </div>
                         </div>

<?php } ?>
                     

                   
                    </div>
               </div>
          </section>
     </main>

     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                              <div class="section-title">

<?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
                                   <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                 <p><?php echo $row['Description'];?></p>
                              </div>
<?php } ?>
                         

            
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="Smiling Two Girls">
                         </div>
                    </div>

               </div>
          </div>
     </section>       

<?php include_once('includes/footer.php') ?>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>