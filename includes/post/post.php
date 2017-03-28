<?php 



$pid=$row['id'];
								  $thisuserId	=$row['userId'];
                                   $checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='{$_SESSION['userid']}' and userId2='$thisuserId') OR 
                    (userId2='$thisuserId' and userId1='{$_SESSION['userid']}') ");
                    /*echo "SELECT * FROM friend where (userId1='{$_SESSION['userid']}' and userId2='$thisuserId') OR 
                    (userId2='$thisuserId' and userId1='{$_SESSION['userid']}') ";*/
                      $followcount1=mysqli_num_rows($checkfriend);
                      if(($access=="Friends" && $followcount1<=0) && $_SESSION['userid']!=$thisuserId)continue ;
                      if(isset($isUpdate)&&$isUpdate)
                      if(($followcount1<=0) && $_SESSION['userid']!=$thisuserId){
                          $jumps++;
                          goto end1;
                      }
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
                  <?php
										if($thisuserId==$_SESSION['userid']){
									?>
										<div class="delete"><a onClick="if (confirm('Are you sure...?')) delitem('post',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class=" btn-primary"><i class="fa fa-times"></i></a></div>
									<?php
										}
									?>
                  
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
                      <p><a href="<?php echo $thisusername; ?>" class="bluelink"><?php echo $thisuserfirstname.'&nbsp;'.$thisuserlastname?></a></p>
                      <time><?php echo $row['month'].''.$row['day'] ?></time>
                    </div>
                  </div>
                  <div class="post-content">
                    <p><?php echo $row['content']; $imgUrl2=$row['imgUrl']; ?></p>
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
                      <a onClick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);">
                      <i class="fa fa-thumbs-up"></i>Liked</a> 
                    <?php } else { ?>
                      <a onClick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);">
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
											$isopentocomment=1;
											$checkthisusersettings= mysqli_query($con,"SELECT * FROM settings where userId='$thisuserId'");
											while($row22=mysqli_fetch_array($checkthisusersettings)){
	
												$isopentocomment=	$row22['opentoComment'];
											}
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
                        <form onSubmit="sumitcomment(<?php echo $pid; ?>);" action="javascript:void(0);" id="comment-form<?php echo $pid; ?>">
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
																	$thisuserfirstname2 = $row2['firstname'];
																	$thisuserlastname2 = $row2['lastname'];
																	$profilepic2 = $row2['ImageUrl'];
																	$loginType2 = $row2['loginType'];
													 }
											  ?>
                         <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                          <?php
														if($thisuserId==$_SESSION['userid']){
													?>
														<div class="delete"><a onClick="if (confirm('Are you sure...?')) delitem2('postcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
                            
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
                            <p><span><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></span><?php echo $row['content']; ?></p>
                            <div class="action">
                              <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
                            </div>
                          </div>
                        </div> 
											  <?php 
                        
                        } 
                        
                         if($iter>=3)
                            {
                                echo "</div>";
                            }

                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
								   
end1:
$thisusername="";
$thisuserlastname="";
$thisuserfirstname="";

$thisusercompany ="";
											$thisuserposition = "";
?>