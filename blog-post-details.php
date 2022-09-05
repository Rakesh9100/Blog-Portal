<?php session_start();
include_once('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['bid']);
$st1='1';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('Comment post successfully');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
$postid=intval($_GET['bid']);

    $sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["viewCounter"];
            $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
    $con->query($sql);

        }
    } else {
        echo "no results";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Blog Management System | Post Details</title>

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

<?php include_once('includes/header.php') ;
$bid=intval($_GET['bid']);
$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
 $query=mysqli_query($con,"select tblposts.viewCounter,tblposts.likes,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$bid' && tblposts.Is_Active=1 ");
while ($row=mysqli_fetch_array($query)) {
?>
     <section>
          <div class="container">
               <h2><?php echo htmlentities($row['posttitle']);?></h2>

               <p class="lead">
                    <i class="fa fa-user"></i> <?php echo htmlentities($row['postedBy']);?>  &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-file"></i>  <?php echo htmlentities($row['category']);?>/ <?php echo htmlentities($row['subcategory']); ?>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-calendar"></i> <?php echo htmlentities($row['postingdate']);?>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-eye"></i>  <?php echo htmlentities($row['viewCounter']);?>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-thumbs-up"></i>  <?php echo htmlentities($row['likes']);?>&nbsp;&nbsp;&nbsp;
                    <img src="https://img.icons8.com/ios-glyphs/30/000000/share--v1.png"/>
               </p>

               <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"  width="100%" alt="">

               <br>

          
               

               <p><?php echo $row['postdetails']?></p>

         

               <br>
               <br>
<?php } ?>
               <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
               

<hr />
                         <h4>Recent Blogs</h4>
<hr />
                         <ul class="list">
<?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1  limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li>
                      <a href="blog-post-details.php?bid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
                         </ul>
                    </div>

                    <div class="col-md-8 col-xs-12">
                         <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$bid' and status='$sts'");
 $count=mysqli_num_rows($query);
 ?>
                         <h4>Comments (<?php echo $count;?>)</h4>
                         <hr color="balck" />
<?php
 if($count==0){ ?>
   <p>No comments found.</p>
 <?php }else{ ?>

<?php
while ($row=mysqli_fetch_array($query)) {
?>

                         <p style="font-size:18px;"> <?php echo htmlentities($row['comment']);?></p>
                         <small><b>By</b> <?php echo htmlentities($row['name']);?>   <b>at</b> <?php echo htmlentities($row['postingDate']);?>  </small>  </p>
             
                              <hr />
                         <?php }} ?>

                         <br>
                         
                         <h4>Leave a Comment</h4>

                         <form method="post" class="form">
    <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                              <div class="row">
                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Name</label>

                                             <input type="text" name="name" class="form-control" required>
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Email</label>

                                             <input type="email" name="email" class="form-control" required>
                                        </div>
                                   </div>
                              </div>

                              <div class="form-group">
                                   <label class="control-label">Message</label>

                                   <textarea name="comment" class="form-control" rows="10" autocomplete="off" required></textarea>
                              </div>

                              <button type="submit" class="section-btn btn btn-primary" name="submit">Submit</button>
                         </form>
                    </div>
               </div>
          </div>
     </section>

     <!-- FOOTER -->
<?php include_once('includes/footer.php') ?>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>