<?php include('includes/header.php');// error_reporting(E_ALL); ini_set("display_errors",true)?>
<?php //include('includes/functions.php'); ?>
    <section id="middle">
      <div class="container">
        <div class="row">
          <div class="top-bar clearfix"> 
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li><a href="<?php echo $dir_path ?>home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li><a href="<?php echo $dir_path ?>update"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="<?php echo $dir_path ?>wall"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="<?php echo $dir_path ?>profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="<?php echo $dir_path ?>product" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul> 
                <div class="set-btn"> <a href="<?php echo $dir_path ?>settings" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div> 
        </div> 
        <div class="row">
          <?php include('includes/leftbar.php'); ?>
          <div class="col-md-6">
            <div class="buyr1">
              <div class="section-post wrap22">
              <?php
							  $limit = 2; #item per page
							  $p = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
								# sql query
								# find out query stat point
								$start = ($p * $limit) - $limit;
								# query for p navigation
							  $userId = $_SESSION['userid'];
								$username = $_SESSION['username'];
                $userproduct= mysqli_query($con,"SELECT * FROM buyrequest where userId='$userId' order by id DESC");
								$makepagination= "SELECT * FROM buyrequest where userId='$userId' order by id DESC"; //select pagination
								if( mysqli_num_rows($userproduct) > ($p * $limit) ){
									
									$next = ++$p;
									
								}

								$query = mysqli_query($con, $makepagination . " LIMIT {$start}, {$limit}");
								$thisusername = '';
								$thisuserposition = '';
								$thisusercompany = '';
								while($row=mysqli_fetch_array($query)){
										$pid=$row['id'];
										$title = $row['title'];
										$description = $row['description'];
										$industry = $row['industry'];
										$country = $row['country'];
										$access = $row['access'];
										$duration = $row['duration'];
										$anonymous = $row['anonymous'];
										$date=$row['date'];
										$month=$row['month'];
										$day=$row['day'];
										$thisuserId = $row['userId'];
										$userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'");
								    while($row2=mysqli_fetch_array($userinfo)){
											$thisuserid = $row2['id'];
										  $thisusername = $row2['username'];
											$profilepic1 = $row2['ImageUrl'];
		                  $loginType1 = $row2['loginType'];

	                  	$thisuserfirstname = $row2['firstname'];
											$thisuserlastname = $row2['lastname'];
										}
									  $userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$thisuserid'"); //select user pinfo who posted this buypost
										while($row2=mysqli_fetch_array($userprofileinfo)){
											$thisusercompany = $row2['company'];
											$thisuserposition = $row2['position'];
										}
							?>
                <div id="postitme<?php echo $pid; ?>" class="post-item item22"> 
                  <!-- single post -->

                  <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>


                  <div class="industries">&nbsp;&nbsp;<?php echo $industry; ?>&nbsp;&nbsp;</div>
                  <div class="question"><a class="question" href="posted.php?pid=<?php echo $pid; ?>"><?php echo $title; ?></a></div>
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
                      <p>
											  <?php if($anonymous=='on'){ ?>
                                <a href="javascript:void(0);" class="bluelink"><?php echo 'Anonymous'; ?></a>
                        <?php
                              }else {

                              if($thisuserposition!="")
                              {
                              $thisuserposition=", ".$thisuserposition;
                              }
                               if($thisusercompany!="")
                              {
                              $thisusercompany=", ".$thisusercompany;
                              }
                        ?>
                                <a href="<?php echo $dir_path ?><?php echo $thisusername; ?>" class="bluelink"><?php echo $thisuserfirstname.' '.$thisuserlastname.$thisuserposition.$thisusercompany;?></a>
                        <?php } ?>
                      </p>
                      <time><?php echo $month.'&nbsp;'.$day ?></time>
                    </div>
                  </div>
                  <div class="post-content">
                    <div class="more_content">
                    <p><?php echo $description; ?></p>
                  </div>
                  <div class="row line"></div>
                  </div>
                  <div class="post-comments"> 
                	<a href="#"><i class="fa fa-comment"></i>Comments</a>.
                  <div id="likeup<?php echo $pid; ?>" style="display:inline-block;"> 
                  <?php 
									$tblname='buypostlikes';
									$checklike = mysqli_query($con,"SELECT * FROM buypostlikes where userId='$userId' AND postId='$pid'");
									$likecheck=mysqli_num_rows($checklike);
									if($likecheck >= 1){ ?> 
									  <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a> 
									<?php } else { ?>
										<a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a> 
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
                        <form onsubmit="sumitcomment(<?php echo $pid; ?>);" action="javascript:void(0);" id="comment-form<?php echo $pid; ?>" method="post">
                          <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                          <input type="hidden" name="postid" value="<?php echo $pid; ?>"  />
                          <input type="hidden" name="thisuserid" value="<?php echo $userId; ?>"  />
                          <input type="hidden" name="targetedtable" value="buypostcomment"  />
                          <a href="javascript:void(0);" class="post">
                            <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                          </a> 
                        </form>
                      </div>

                        <?php
												 $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC");
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
																	$profilepic2 = $row2['ImageUrl'];
																	$loginType2 = $row2['loginType'];
																	$thisuserfirstname2 = $row2['firstname'];
																$thisuserlastname2 = $row2['lastname'];
													 }
											  ?>


                         <div id="commnetitem<?php echo $this_commentid; ?>" class="comments"  >
                         <?php if($userId==$user_commented){

                         ?>
                          <div class="delete" style="top:auto;"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
                         <?php
            }
             ?>

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
                              <p><a href="<?php echo $dir_path ?><?php echo $thisusername2; ?>" class="bluelink"><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></a><?php echo " ".$row['content']; ?></p>
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
                  <a href='<?php echo $dir_path ?>buy-request/<?php echo $next?>'>Next</a>
                </div>
                <?php } ?>
                
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>