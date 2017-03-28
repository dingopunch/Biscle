<?php include('includes/header.php'); ?>
<?php 
  $user=$_SESSION['clientuser'];
	$userId = $_SESSION['userid'];
  $userinfo2 = mysqli_query($con,"SELECT * FROM user where username='$user'");  // get Client user info
	while($row2=mysqli_fetch_array($userinfo2)){
		$clientid = $row2['id'];
		$profilepic = $row2['ImageUrl'];
		$loginType = $row2['loginType'];
		$useremail=$row2['email'];
		$firstname = $row2['firstname'];
		$lastname = $row2['lastname'];
	}
	
	$userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$clientid'"); // get Client user profile info
	$company = '';
	$position = '';
	$country = '';
    $access = '';
	$state = '';
	$city = '';
	$businessType = '';
	$product = '';
	$industry = '';
	$description = '';
	$contact = '';
	$city = '';
	$access = '';
	while($row=mysqli_fetch_array($userprofileinfo)){
		
		$company = $row['company'];
		$position = $row['position']; 
		$country = $row['country'];
		$state = $row['state'];
		$city = $row['city'];
		$businessType = $row['businessType'];
		$product = $row['product'];
		$industry = $row['industry'];
		$description = $row['description'];
		$contact = $row['contact'];
		$city = $row['city'];
		$access = $row['access'];
		
	} 
?>

    <section id="middle">
      <div class="container">
      	<div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3">
            	<div class="row">
                    <div class="profile-info">
                        <div class="user-img-min">
														<?php if($loginType=='default'){ ?>
                              <?php if($profilepic=='' || $profilepic=='default'){ ?>
                                <img src="assets/img/user-pic.jpg" alt=""  />
                              <?php } else { ?>
                                        <img src="assets/files/profile/<?php echo $profilepic ;?>" alt=""  />
                            <?php } } else { ?> 
                               <?php if($profilepic=='' || $profilepic=='default'){ ?>
                                <img src="assets/img/user-pic.jpg" alt=""  />
                                <?php } else { ?>
                              <img src="<?php echo $profilepic ;?>" alt=""  />
                            <?php } }?>
                        </div>
                        <div class="user-mane-min">
                            <span>
                                <h2><?php echo $firstname.'&nbsp;'.$lastname; ?></h2>
                                <p><?php echo $company; ?></p>
                                <p><?php echo $country; ?></p>
                            </span>
                        </div>
                    </div>
                    <div class="user-btn">
                    	<ul class="clearfix">
                        	<li><a href="#"><i class="fa fa-phone"></i> Contact</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i> Friends</a></li>
                            <li><a href="#"><i class="fa fa-code-fork"></i> Follow</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu profile-tab" >
                  <li class="current"><a  href="<?php echo $dir_path ?><?php echo $user; ?>/client-update"><i class="fa fa-upload">&nbsp;</i>Update</a> </li>
                  <li><a  href="<?php echo $dir_path ?><?php echo $user; ?>"><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a  href="<?php echo $dir_path ?><?php echo $user; ?>/client-product"><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                  <li><a  href="<?php echo $dir_path ?><?php echo $user; ?>/client-history"><i class="fa fa-clock-o">&nbsp;</i>History</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
          	<div class="left-bar">
                <div class="user-img">
                  <div class="pic-edit">
                  </div>
                  <?php if($loginType=='default'){ ?>
										<?php if($profilepic=='' || $profilepic=='default'){ ?>
                      <img src="assets/img/user-pic.jpg" alt=""  />
                    <?php } else { ?>
                              <img src="assets/files/profile/<?php echo $profilepic ;?>" alt=""  />
                  <?php } } else { ?> 
                     <?php if($profilepic=='' || $profilepic=='default'){ ?>
                      <img src="assets/img/user-pic.jpg" alt=""  />
                      <?php } else { ?>
                    <img src="<?php echo $profilepic ;?>" alt=""  />
                  <?php } }?>
                  <h1><?php echo $firstname.'&nbsp;'.$lastname; ?></h1>
                </div>
                <br />
             
                <div class="set-link">
                  <ul class="edit about">
                    <li><span>Country / Region</span><br />
                      <b><?php echo $country; ?></b></li>
                    <li><span>Company Name</span><br />
                      <b><?php echo $company; ?></b></li>
                    <li><span>Industry</span><br />
                      <b><?php echo $industry; ?></b></li>
                    <li><span>Product</span><br />
                      <b><?php echo $product; ?></b></li>
                    <li><span>Business Type</span><br />
                      <b><?php echo $businessType; ?></b></li>
                  </ul>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="section-post wrap22">
                <div id="postupdate-result">
                </div>
                <?php
								$limit = 2; #item per page
							  $p = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
								# sql query
								# find out query stat point
								$start = ($p * $limit) - $limit;
								# query for p navigation
								$userId = $_SESSION['userid'];
								$username = $_SESSION['username'];
                $postinfo= mysqli_query($con,"SELECT * FROM post  where userId='$clientid' order by id DESC");
								$makepagination= "SELECT * FROM post  where userId='$clientid' order by id DESC"; //select pagination
								if( mysqli_num_rows($postinfo) > ($p * $limit) ){
									
									$next = ++$p;
									
								}

								$query = mysqli_query($con, $makepagination . " LIMIT {$start}, {$limit}");
								while($row=mysqli_fetch_array($query)){
									$pid=$row['id'];
								  $thisuserId	=$row['userId'];
								  $userprofileinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'");
									while($row2=mysqli_fetch_array($userprofileinfo)){
									  $thisusername	=$row2['username'];
										$thisuserfirstname = $row2['firstname'];
										$thisuserlastname = $row2['lastname'];
										$profilepic1 = $row2['ImageUrl'];
		                $loginType1 = $row2['loginType'];
									}
								?>
                <div id="postitme<?php echo $pid; ?>" class="post-item item22"> 
                  <!-- single post -->
                  <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('post',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class=" btn-primary"></a></div>
                  <div class="post-owner"> 
										<?php if($loginType1=='default'){ ?>
                      <?php if($profilepic1=='' || $profilepic1=='default'){ ?>
                        <img src="assets/img/user-pic.jpg" alt=""  />
                      <?php } else { ?>
                                <img src="assets/files/profile/<?php echo $profilepic1 ;?>" alt=""  />
                    <?php } } else { ?> 
                       <?php if($profilepic1=='' || $profilepic1=='default'){ ?>
                        <img src="assets/img/user-pic.jpg" alt=""  />
                        <?php } else { ?>
                      <img src="<?php echo $profilepic1 ;?>" alt=""  />
                    <?php } }?>
                    <div>
                      <p><a href="<?php echo $dir_path ?><?php echo $thisusername; ?>" class="bluelink"><?php echo $thisuserfirstname.'&nbsp;'.$thisuserlastname;?></a></p>
                      <time><?php echo $row['month'].''.$row['day'] ?></time>
                    </div>
                  </div>
                  <div class="post-content">
                    <p><?php 
                    
                    
                    
                    
                    $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$clientid'");
                      $followcount1=mysqli_num_rows($checkfriend);
                      if($row['access']=="Public" || $followcount1>0 || $_SESSION['userid']==$clientid)
                    echo $row['content']; 
                    else echo "Only Visible To Friends";
                    
                    
                    
                    $imgUrl2=$row['imgUrl']; ?></p>
                    <div class="post-thumb clearfix">
											<?php if($row['imgUrl']!=''){
                        $araycount=count($imgUrl2);
                        $imgUrl2 = (explode(", ", $imgUrl2));
                        foreach ($imgUrl2 as $value) { ?>
                        <img src="assets/files/post/<?php echo $value; ?>" alt=""  /> 
                      <?php } } ?>
                    </div>
                  </div>
                  <div class="post-comments"> 
                	<a href="#"><i class="fa fa-comment"></i>Comments</a>. 
                  <div id="likeup<?php echo $pid; ?>" style="display:inline-block;"> 
										<?php 
                    $tblname='postlikes';
                    $checklike = mysqli_query($con,"SELECT * FROM postlikes where userId='$userId' AND postId='$pid'");
                    $likecheck=mysqli_num_rows($checklike);
                    if($likecheck >= 1){ ?> 
                      <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);">
                      <i class="fa fa-thumbs-up"></i>Liked</a> 
                    <?php } else { ?>
                      <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);">
                      <i class="fa fa-thumbs-up"></i>Like</a> 
                    <?php }?>
                  </div> 
                    <a href="#" class="simpleConfirm">Report</a>
                  </div>
                  <div class="row">
                    <div class="coments-box white">
                      <?php
											$userId = $_SESSION['userid'];
                      $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");
											while($row2=mysqli_fetch_array($userinfo2)){
												$thisuserid3 = $row2['id'];
												$profilepic3 = $row2['ImageUrl'];
												$loginType3 = $row2['loginType'];
											}
											?>
                      <div class="text-area"> 
                         <?php if($loginType3=='default'){ ?>
												<?php if($profilepic3=='' || $profilepic3=='default'){ ?>
                          <img src="assets/img/user-pic.jpg" alt=""  />
                        <?php } else { ?>
                                  <img src="assets/files/profile/<?php echo $profilepic3 ;?>" alt=""  />
                      <?php } } else { ?> 
                         <?php if($profilepic3=='' || $profilepic3=='default'){ ?>
                          <img src="assets/img/user-pic.jpg" alt=""  />
                          <?php } else { ?>
                        <img src="<?php echo $profilepic3 ;?>" alt=""  />
                      <?php } }?>
                        <form onsubmit="sumitcomment(<?php echo $pid; ?>);" action="javascript:void(0);" id="comment-form<?php echo $pid; ?>">
                          <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                          <input type="hidden" name="postid" value="<?php echo $pid; ?>"  />
                          <input type="hidden" name="thisuserid" value="<?php echo $userId; ?>"  />
                          <input type="hidden" name="targetedtable" value="postcomment"  />
                          <a href="javascript:void(0);" class="post">
                            <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                          </a>
                        </form>
                      </div>
                      
                        <?php
												 $thispostcomment= mysqli_query($con,"SELECT * FROM postcomment where postId='$pid' order by id DESC");
													$row_cnt = mysqli_num_rows($thispostcomment);
											$muV="";
if($row_cnt>2)
$muV="style='display:none'";

?>
 <div id="commentwrap<?php echo $pid; ?>"  >

 	<?php
                        $iter=0;
                        
                         while($row=mysqli_fetch_array($thispostcomment)){
													$iter++;
                            if($iter==3)
                            {
                                if($muV!="")
                                {
                                    echo "<a class='kkk' id='viewComment$pid' >Load More Comments</a>";
                                    echo " <div id='commentwrap2-$pid'  $muV   >";
                                }




                            }

                          
                          
                          
                           $user_commented=$row['userId'];
													 $this_commentid=$row['id'];
													 $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
													 while($row2=mysqli_fetch_array($getusername)){
																	$thisusername2	=$row2['username'];
																	$thisuserfirstname2 = $row2['firstname'];
																	$thisuserlastname2 = $row2['lastname'];
																	$profilepic2 = $row2['ImageUrl'];
																	$loginType2 = $row2['loginType'];
													 }
											  ?>
                         <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                          <div class="delete" style="top: auto;"><a onclick="if (confirm('Are you sure...?')) delitem2('postcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
                          <?php if($loginType2=='default'){ ?>
                            <?php if($profilepic2=='' || $profilepic2=='default'){ ?>
                              <img src="assets/img/user-pic.jpg" alt=""  />
                            <?php } else { ?>
                                      <img src="assets/files/profile/<?php echo $profilepic2 ;?>" alt=""  />
                            <?php } } else { ?> 
                             <?php if($profilepic2=='' || $profilepic2=='default'){ ?>
                              <img src="assets/img/user-pic.jpg" alt=""  />
                              <?php } else { ?>
                            <img src="<?php echo $profilepic2 ;?>" alt=""  />
                          <?php } }?>
                          <div class="comments-cont">
                            <p><a href="<?php echo $dir_path ?><?php echo $thisusername2; ?>" class="bluelink"><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></a><?php echo $row['content']; ?></p>
                            <div class="action">  
                              <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
                            </div>
                          </div>
                        </div>
											  <?php }
                        if($iter>=3)
    {
        echo "</div>";
    }

                        
                         ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
                 <!--p navigation-->
								<?php if (isset($next)) { ?>
                <div class="nav">
                  <a href='<?php echo $dir_path ?><?php echo $user ?>/client-update/<?php echo $next?>'>Next</a> 
                </div>
                <?php } ?>
              </div>  
          </div>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php');?>