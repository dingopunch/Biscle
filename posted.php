<?php 

session_start();

if(isset($_SESSION['userid'])){
	  $userId = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $logged=true;
    include('includes/header.php');
  }else {
    $logged=false;
    include('includes/header-public.php');
  } ?>
		<?php
      //$userId = $_SESSION['userid'];
      
      $pid = $_REQUEST['pid'];
      if($logged){
			$checkhistory= mysqli_query($con,"SELECT * FROM historypost where buyPostId='$pid' AND userId='$userId'");
		echo 	$rocount=mysqli_num_rows($checkhistory);
			if($rocount<=0){
				$insrthistory= mysqli_query($con,"insert into historypost (buyPostId, userId) VALUES ('$pid', '$userId')");
			}
      }
      $userproduct= mysqli_query($con,"SELECT * FROM buyrequest where id='$pid'"); //select buyposts
      while($row=mysqli_fetch_array($userproduct)){
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
					$clientid = $row['userId'];
          $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
          while($row2=mysqli_fetch_array($userinfo)){
            $thisuserid = $row2['id'];
            $thisusername = $row2['username'];
            $profilepic1 = $row2['ImageUrl'];
            $loginType1 = $row2['loginType'];
          }
     } ?>
    <section id="posted">
    	<div class="container">
        	<div class="posted-area">
            	<div class="row">
                    <div class="col-md-3">
                    <?php if($logged){?>
                         <a class="btn sky cusbtn <?php  if($anonymous=='on'){ echo 'disabled';}?>" href="message.php?new=<?php echo $clientid; ?>" role="button">Contact</a>
                        <?php } ?>
                        <div class="quick-btn">
                          <?php
													  if($anonymous !='on' && $logged){
														$checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$clientid'");
														$followcount1=mysqli_num_rows($checkfriend);
                          ?>
                            <div id="friend<?php echo $clientid;?>" class="link-btn">
															<?php if($followcount1<=0){ //if not friend
                              $checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$clientid'");
                              $requetscount=mysqli_num_rows($checkfriendrequest);
                              if($requetscount<=0){ // if not request sent
                              ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $clientid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                              <?php } else { //friend has already sent ?>
                              <a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
                              <?php } }else { // already a friend with this user ?>
                              <a class="gray"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $clientid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                              <?php } ?>
                            </div>
                          <?php
														$checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$clientid'");
														$followcount=mysqli_num_rows($checkfollow);
                          ?>
                            <div id="follow<?php echo $clientid;?>" class="link-btn">
															<?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $clientid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                              <?php }else { ?>
                              <a class="gray" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $clientid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                            <?php } ?>
                            </div>
                          <?php } else if($logged){ ?>
                          <div class="link-btn">
                          	<a class="btn blue <?php if($anonymous=='on'){ echo 'disabled';}?>" href="# role="button"">Friend <span>+</span></a>
                            <a class="gray simpleConfirm" href="#" title="Make unfriend">Unfriend</a>
                          </div>
                          <div class="link-btn">
                          	<a class="btn jade <?php if($anonymous=='on'){ echo 'disabled';}?>" href="#" role="button">Follow <span>+</span></a>
                            <a class="gray simpleConfirm" href="#" title="Make unfollow">Unfollow</a>
                          </div>
                          <?php } ?>
                        </div>
                        <div class="set-link">
                            <ul class="edit about">
                                <li><span>Country / Region</span><br /><b><?php echo $country; ?></b></li>
                                <li><span>Industry</span><br /><b><?php echo $industry; ?></b></li>
                                <li><span>Duration Remains</span><br /><b><?php echo $duration; ?></b></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                		<div class="show-post" style="word-break: break-all">
                        	<div class="food"><?php echo $industry; ?></div>
                        	<h1><?php echo $title; ?></h1>
                        	<!-- single post -->
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
                                <p><?php if($anonymous=='on'){ echo 'Anonymous'; }else { echo "<a href='profile.php?user=$thisusername' >".$thisusername."</a>"; }?></p>
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
                              
                              if($logged){
                              $checklike = mysqli_query($con,"SELECT * FROM buypostlikes where userId='$userId' AND postId='$pid'");
                              $likecheck=mysqli_num_rows($checklike);
                              if($likecheck >= 1){ ?> 
                                <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a> 
                              <?php } else { ?>
                                <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a> 
                              <?php } 
                              }?>
                              </div>
                                <a href="#" class="simpleConfirm">Report</a>
                            </div>
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
                              }
                              ?>
                              <div class="text-area"> 
                                <?php if($logged && $loginType3=='default'){ ?>
                                <?php if($logged && $profilepic3=='' || $profilepic3=='default'){ ?>
                                  <img src="assets/img/user-pic.jpg" alt=""  />
                                <?php } else if($logged){ ?>
                                          <img src="assets/files/profile/<?php echo $profilepic3 ;?>" alt=""  />
                              <?php } } else { ?> 
                                 <?php if( !$logged || $profilepic3=='' || $profilepic3=='default'){ ?>
                                  <img src="assets/img/user-pic.jpg" alt=""  />
                                  <?php } else if($logged){ ?>
                                <img src="<?php echo $profilepic3 ;?>" alt=""  />
                              <?php } } if($logged){?>
                                <form onsubmit="sumitcomment(<?php echo $pid; ?>);" action="javascript:void(0);" id="comment-form<?php echo $pid; ?>" method="post">
                                  <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                                  <input type="hidden" name="postid" value="<?php echo $pid; ?>"  />
                                  <input type="hidden" name="thisuserid" value="<?php echo $userId; ?>"  />
                                  <input type="hidden" name="targetedtable" value="buypostcomment"  />
                                  <a href="javascript:void(0);" class="post">
                                    <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                                  </a>
                                </form>
                                <?php  } ?>
                              </div>

                                <?php
                                 $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments

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
                                   }
                                ?>
                                 <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                                  <div class="delete"><?php if($logged){ ?><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a><?php } ?></div>
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
                                    <p><span><?php echo $thisusername2; ?></span><?php echo $row['content']; ?></p>
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
                	</div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>