        <div class="col-lg-3 pull-right col-xs-12">
                         <div class="form">
                              <form action="search.php" method="post">
                                   <div class="form-group">
                                        <label class="control-label">Blog Search</label>

                                        <div class="input-group">
                                             <input type="text" class="form-control" placeholder="Search for..." name="searchinput">
                                             <span class="input-group-btn">
                                                  <button class="btn btn-default" type="submit" name="submit">Go!</button>
                                             </span>
                                        </div>
                                   </div>
                              </form>
                         </div>

                         <br>
<hr/>
                         <label class="control-label" style="font-size:20px;">Popular Blogs</label>
                         <hr />

                         <ul class="list">
                              <?php
$query1=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1   order by likes desc limit 5");
while ($result=mysqli_fetch_array($query1)) {

?>
                              <li><a href="blog-post-details.php?bid=<?php echo htmlentities($result['pid'])?>"><?php echo htmlentities($result['posttitle']);?></a></li>
                         <?php } ?>
                         </ul>
<hr ?>
  <label class="control-label"  style="font-size:20px;">Blog Categories</label>
  <hr />
             <ul class="list">
<?php $query=mysqli_query($con,"select CategoryName,count(tblposts.id) as totalpost,tblcategory.id as catid from tblposts  join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.Is_Active=1   group by CategoryName");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                      <a href="category-posts.php?catid=<?php echo htmlentities($row['catid'])?>&&catname=<?php echo htmlentities($row['CategoryName']);?>"><?php echo htmlentities($row['CategoryName']);?> (<?php echo htmlentities($row['totalpost']);?>)</a>
                    </li>
<?php } ?>
                  </ul>

                    </div>