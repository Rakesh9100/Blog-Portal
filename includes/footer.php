<?php error_reporting(0);
if($_POST['subscribe']){
$semail=$_POST['email'];
$fname=$_POST['fname'];
$sql=mysqli_query($con,"insert into tblsubscribers(fullName,subscriberEmail) values('$fname','$semail')");
echo "<script>alert('Subscribed successfully');</script>";
echo "<script>window.location.href='index.php'</script>";

}

?>

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                           <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>

<?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
   

                              <address>
                                   <p><?php echo $row['Description'];?></p>
                              </address>
                     <?php }  ?>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; <?php echo date('Y');?> <?php echo $wtitle;?></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                          

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.php">Home</a></li>
                               <li><a href="blog-posts.php">Blog</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form method="post" method="get">
                                               <input type="text" class="form-control" placeholder="Enter your Name" name="fname" id="fname" required>
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                             <input type="submit" class="form-control" name="subscribe" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>