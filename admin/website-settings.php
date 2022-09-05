<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{


    if(isset($_POST['submit']))
  {
    $wtitle=$_POST['webtitle'];
   $cphoto=$_POST['currentphoto'];
   $imgfile=$_FILES["image"]["name"];
   $currentppath="assets/images"."/".$cphoto;
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"assets/images/".$imgnewfile);
   
$sql=mysqli_query($con,"update tblsite set siteLogo='$imgnewfile',siteTitle='$wtitle'");
unlink($currentppath);
    echo "<script>alert('Website Details Updated');</script>";
echo "<script>window.location.href='website-settings.php'</script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Blog Management System | Website Settings</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#sadminusername").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

<!-- Top Bar Start -->
 <?php include('includes/topheader.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Website Settings</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Website Settings </a>
                                        </li>
                                        <li class="active">
                                          Website Settings
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Website Settings </b></h4>
                                    <hr />
                        		








                <form method="post" enctype="multipart/form-data">

<?php 
$query=mysqli_query($con,"select * from tblsite");
while($row=mysqli_fetch_array($query)){ 
    ?>

  <div class="row">

                        <div class="col-lg-10">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
<input type="hidden" name="currentphoto" value="<?php echo $row['siteLogo'];?>">                      
   <div class="card-body">
   <div class="form-group">
                        <label for="inputSubject">Current Logo</label>
                      <img src="assets/images/<?php echo $row['siteLogo'];?>" width="250">
                    </div>

                                   
                    <div class="form-group">
                        <label for="inputSubject">Website Title</label>
                        <input class="form-control" id="webtitle" name="webtitle" required="true" value="<?php echo $row['siteTitle'];?>">  
                    </div>
            
     
      <div class="form-group">
                        <label for="inputSubject">Website Logo</label>
                       <input type="file" name="image"  required class="form-control" />
<small style="color:red;">Only jpg / jpeg/ png /gif format allowed.</small>
                   </td>
<?php } ?>
        <div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="Update">                           
                             </div>                                        

                                </div>

                            </div>


                        			




           
                       


                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

<?php include('includes/footer.php');?>

            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>