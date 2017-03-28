<?php 
$pid=$row['id'];
if(!isset($logged))$logged=true;
										$title = $row['title'];
										$description = $row['description'];
										$industry = $row['industry'];
										$country = $row['country'];
										$access = $row['access'];
                                        $thisuserId = $row['userId'];
										$thisusername = '';
										$thisuserposition = '';
										$thisusercompany = '';
                    if($logged){
                                        $checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='{$_SESSION['userid']}' and userId2='$thisuserId') OR 
                    (userId2='$thisuserId' and userId1='{$_SESSION['userid']}') ");
                    /*echo "SELECT * FROM friend where (userId1='{$_SESSION['userid']}' and userId2='$thisuserId') OR 
                    (userId2='$thisuserId' and userId1='{$_SESSION['userid']}') ";*/
                      $followcount1=mysqli_num_rows($checkfriend);
                    }else  $followcount1=0;
                      if(($access=="Friends" && $followcount1<=0) && $_SESSION['userid']!=$thisuserId);
                      if(isset($isUpdate)&&$isUpdate)
                      if(($followcount1<=0) && $_SESSION['userid']!=$thisuserId){
                          $jumps++;
                          goto end1;
                      }
										$duration = $row['duration'];
										$anonymous = $row['anonymous'];
										$date=$row['date'];
										$month=$row['month'];
										$day=$row['day'];
										$thisuserId = $row['userId'];
										$userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
										while($row2=mysqli_fetch_array($userinfo)){
											$thisuserid = $row2['id'];
											$thisuserfirstname = $row2['firstname'];
											$thisuserlastname = $row2['lastname'];
											$thisusername = $row2['username'];
											$profilepic1 = $row2['ImageUrl'];
											$loginType1 = $row2['loginType'];
										}
										$userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$thisuserid'"); //select user pinfo who posted this buypost
										while($row2=mysqli_fetch_array($userprofileinfo)){
											$thisusercompany = $row2['company'];
											$thisuserposition = $row2['position'];
										}
							?>
              
              <div id="postitme<?php echo $pid; ?>" class="post-item item22"> 
                <!-- single post -->
                <?php
                  if($logged && $thisuserid==$_SESSION['userid']){
								?>
                  <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
                <?php
									}
								?>
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
                    <?php if($anonymous=='on'){ 
										?>
											<a href="javascript:void(0);" class="bluelink"><?php echo 'Anonymous'; ?></a>
										<?php
										}else { 
										 ?>
											<a href="<?php echo $thisusername; ?>" class="bluelink"><?php echo $thisuserfirstname.'&nbsp;'.$thisuserlastname.', '.$thisuserposition.', '.$thisusercompany;?></a>
										 <?php
										 }?>
                    
                    </p>
                    <time><?php echo $month.'&nbsp;'.$day ?></time>
                  </div>
                </div>
                <div class="post-content">
                  <div class="more_content">
                    <p><?php 
                    
                    echo $description;
                    
                    
                     ?></p>
                  </div>
                  <div class="row line"></div>
                </div>
                <div class="post-comments"> 
                <a href="#"><i class="fa fa-comment"></i>Comments</a>.
                <div id="likeup<?php echo $pid; ?>" style="display:inline-block;"> 
                <?php 
                $tblname='buypostlikes';
                if($logged){
                $olie=$_SESSION['userid'];
                $checklike = mysqli_query($con,"SELECT * FROM buypostlikes where userId='$olie' AND postId='$pid'");
                $likecheck=mysqli_num_rows($checklike);
                if($likecheck >= 1){ ?> 
                  <a onclick="buylike(<?php echo $pid; ?>, <?php echo $olie; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a>
                <?php } else { ?>
                  <a onclick="buylike(<?php echo $pid; ?>, <?php echo $olie; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a>
                <?php }
                
                }
                ?>
                </div>
                  <a href="#" class="simpleConfirm">Report</a>
                </div>
                <?php  if(isset($isSearch)&&$isSearch){goto apl;}  ?>
                <div class="row">
                  <div class="coments-box white">
                    <?php
                    if($logged){
                      $userId = $_SESSION['userid'];
                      $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
                      while($row2=mysqli_fetch_array($userinfo2)){
                        $thisuserid3 = $row2['id'];
                        $profilepic3 = $row2['ImageUrl'];
                        $loginType3 = $row2['loginType']; 
                      }
                      $isopentocomment=1;
                      $checkthisusersettings= mysqli_query($con,"SELECT * FROM settings where userId='$thisuserid'");
                      while($row22=mysqli_fetch_array($checkthisusersettings)){

                        $isopentocomment=	$row22['opentoComment'];
                      }
                    }else $isopentocomment=0;
                    ?>
                    <div <?php if($isopentocomment != 1){ echo 'style="display:none;"';}?> class="text-area"> 
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
                      $this_commentid = 0;
                       $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC limit 3"); // get comments

                      $row_cnt = mysqli_num_rows($thispostcomment);
                      $muV="";
                      if($row_cnt>2)
                          $muV="style='display:none'";

                      ?>
                        <div id="commentwrap<?php echo $pid; ?>"   >
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
                      
                       <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                        <?php
													if($user_commented==$_SESSION['userid']){
												?>
													<div class="delete" style="top : auto;"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
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
                          <p><a href="<?php echo $thisusername2; ?>" class="bluelink"><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></a><?php echo " ".$row['content']; ?></p>
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
                <?php apl: ?>
              </div>
              <?php end1:
              
$thisusername="";
$thisuserlastname="";
$thisuserfirstname="";
$thisusercompany ="";
											$thisuserposition = "";
							    ?>