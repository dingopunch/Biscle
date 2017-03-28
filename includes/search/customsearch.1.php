<?php
  include('../connection.php');
  session_start();
	error_reporting(0);
	$userType = mysqli_real_escape_string($con,$_REQUEST['userType']);
	$country = mysqli_real_escape_string($con,$_REQUEST['country']);
	$industry = mysqli_real_escape_string($con,$_REQUEST['industry']);
    $industry1 = mysqli_real_escape_string($con,$_REQUEST['industry']);
	$searchtext=mysqli_real_escape_string($con, $_REQUEST['searchtext']);
	$userId = $_SESSION['userid'];
	$username = $_SESSION['username'];
  if($userType=='All'){
		if($country !='0' && $industry !='0'){ // in case of Default filter
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where country='$country' and industry='$industry' and (title LIKE'%$searchtext%' OR description LIKE '%$searchtext%') order by id DESC");
			  $sr=1;
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php 
			  if($sr==1){
					$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' and industry='$industry' order by id DESC Limit 1");
				}
				else{ 
					$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' and industry='$industry' and id < '$previousid' order by id DESC Limit 1");
				}
				
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$previousid=$row2['id'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          <div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row3['username']; ?></span>
                      <span><?php echo $row2['industry']; ?></span>
                      <span><?php echo $row2['position']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['country']; ?></span>
                      <span><?php echo $row2['company']; ?></span>
                      <span><?php echo $row2['businessType']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="row">
                      <div class="src-after">
                          <div class="quick-btn">
                           <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
					}
				}
			 }
			 $sr++;
			}
      //<!--single post end-->
			// if still some users left in search criteria
			if($previousid==''){
			$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' and industry='$industry' order by id DESC");
			}else {
			$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' and industry='$industry' and id < '$previousid' order by id DESC");
			}
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$previousid=$row2['id'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          //account strip
          <?php
					}
				}
			 }
		}
		
		if($country =='0' && $industry !='0'){ // in case of Default filter
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where industry='$industry' and (title LIKE'%$searchtext%' OR description LIKE'%$searchtext%') order by id DESC");
			  $sr=1;
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
               <?php if($user_commented==$userId){?>
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php 
			  if($sr==1){
					$userfilter= mysqli_query($con,"SELECT * FROM profile where industry='$industry' order by id DESC Limit 1");
				}
				else{ 
					$userfilter= mysqli_query($con,"SELECT * FROM profile where industry='$industry' and id < '$previousid' order by id DESC Limit 1");
				}
				
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$previousid=$row2['id'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          <div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row3['username']; ?></span>
                      <span><?php echo $row2['industry']; ?></span>
                      <span><?php echo $row2['position']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['country']; ?></span>
                      <span><?php echo $row2['company']; ?></span>
                      <span><?php echo $row2['businessType']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="row">
                      <div class="src-after">
                          <div class="quick-btn">
                            <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
					}
				}
			 }
			 $sr++;
			}
      //<!--single post end-->
			// if still some users left in search criteria
			if($previousid==''){
			$userfilter= mysqli_query($con,"SELECT * FROM profile where industry='$industry' order by id DESC");
			}else {
			$userfilter= mysqli_query($con,"SELECT * FROM profile where industry='$industry' and id < '$previousid' order by id DESC");
			}
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$previousid=$row2['id'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          <div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row3['username']; ?></span>
                      <span><?php echo $row2['industry']; ?></span>
                      <span><?php echo $row2['position']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['country']; ?></span>
                      <span><?php echo $row2['company']; ?></span>
                      <span><?php echo $row2['businessType']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="row">
                      <div class="src-after">
                          <div class="quick-btn">
                            <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
					}
				}
			 }
		}
	  
		if($country !='0' && $industry =='0'){ // in case of Default filter
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where country='$country' and (title LIKE'%$searchtext%' OR description LIKE'%$searchtext%') order by id DESC");
			  $sr=1;
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php 
			  if($sr==1){
					$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' order by id DESC Limit 1");
				}
				else{ 
					$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' and id < '$previousid' order by id DESC Limit 1");
				}
				
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$previousid=$row2['id'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          <div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row3['username']; ?></span>
                      <span><?php echo $row2['industry']; ?></span>
                      <span><?php echo $row2['position']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['country']; ?></span>
                      <span><?php echo $row2['company']; ?></span>
                      <span><?php echo $row2['businessType']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="row">
                      <div class="src-after">
                          <div class="quick-btn">
                            <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
					}
				}
			 }
			 $sr++;
			}
      //<!--single post end-->
			// if still some users left in search criteria
			if($previousid==''){
			$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' order by id DESC");
			}else {
			$userfilter= mysqli_query($con,"SELECT * FROM profile where country='$country' and id < '$previousid' order by id DESC");
			}
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$previousid=$row2['id'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          <div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row3['username']; ?></span>
                      <span><?php echo $row2['industry']; ?></span>
                      <span><?php echo $row2['position']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['country']; ?></span>
                      <span><?php echo $row2['company']; ?></span>
                      <span><?php echo $row2['businessType']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="row">
                      <div class="src-after">
                          <div class="quick-btn">
                            <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
					}
				}
			 }
		}
	}
	if($userType=='Post' || $userType=='All'){  // when post is slected in looking for filter
		if($country !='0' && $industry !='0'){ // in case of all filters
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where country='$country' and industry='$industry' and (title LIKE'%$searchtext%' OR description LIKE'%$searchtext%') order by id DESC");
			?>
			<?php
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!--single post end-->
    <?php
		}
		if($country !='0' && $industry =='0'){ // in case of less filters
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where country='$country' and (title LIKE'%$searchtext%' OR description LIKE'%$searchtext%') order by id DESC");
			?>
			<?php
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!--single post end-->
    <?php
		}
	  if($country =='0' && $industry !='0'){ // in case of less filters
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where industry='$industry' and (title LIKE'%$searchtext%' OR description LIKE'%$searchtext%') order by id DESC");
						?>
			<?php
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!--single post end-->
    <?php
	  }
		if($country =='0' && $industry =='0'){ // in case of less filters
		  $allfilter= mysqli_query($con,"SELECT * FROM buyrequest 
			where (title LIKE'%$searchtext%' OR description LIKE'%$searchtext%') order by id DESC");
						?>
			<?php
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        while($row=mysqli_fetch_array($allfilter)){
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
            $userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
            while($row2=mysqli_fetch_array($userinfo)){
              $thisuserid = $row2['id'];
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
      
      <div id="postitme<?php echo $pid; ?>" class="post-item"> 
        <!-- single post -->
        <?php if($thisuserId==$userId){?>
        <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
        <?php } ?>
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
            <p><a href="profile.php?user=<?php echo $thisusername; ?>" ><?php echo $thisusername.', '.$thisuserposition.', '.$thisusercompany;?><a/></p>
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
            $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
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
            <div id="commentwrap<?php echo $pid; ?>">
              <?php
               $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
               while($row=mysqli_fetch_array($thispostcomment)){
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
                <?php if($user_commented==$userId){?>
                <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
               <?php } ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!--single post end-->
    <?php
	  }
	}
	if($userType=='All' || $userType!='POST') {  // search users
    if($country==0)$country='';
    if($userType=="All")$userType='';
    if($industry1=='0')$industry1='';
	  if($country !='0' && $industry !='0'){
			$userfilter= mysqli_query($con,"SELECT * FROM profile 
			where country like '$country%' and industry like '$industry1%' and businessType like '$userType%' order by id DESC");
            /*echo "SELECT * FROM profile 
			where country='$country%' and industry like '$industry1%' and businessType like '$userType%' order by id DESC";
			*/while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
					?>
          <div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row3['username']; ?></span>
                      <span><?php echo $row2['industry']; ?></span>
                      <span><?php echo $row2['position']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['country']; ?></span>
                      <span><?php echo $row2['company']; ?></span>
                      <span><?php echo $row2['businessType']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="row">
                      <div class="src-after">
                          <div class="quick-btn">
                            <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                             <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
					}
				}
			}
		}
		if($country !='0' && $industry1 =='0'){
			$userfilter= mysqli_query($con,"SELECT * FROM profile 
			where country='$country' and businessType='$userType' order by id DESC");
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
		?>
			<div class="item-details">
        <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="src-pic">
                <img src="assets/img/user-pic.jpg" alt="" />
              </div>
              <div class="item-info">
                <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                <p style="float:left;width:100%;">
                  <span><?php echo $row3['username']; ?></span>
                  <span><?php echo $row2['industry']; ?></span>
                  <span><?php echo $row2['position']; ?></span>
                </p>
                <p style="float:left;width:100%;">
                  <span><?php echo $row2['country']; ?></span>
                  <span><?php echo $row2['company']; ?></span>
                  <span><?php echo $row2['businessType']; ?></span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="row">
                  <div class="src-after">
                      <div class="quick-btn">
                        <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                         <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
     <?php
					}
				}
		  }  
		}
		if($country =='0' && $industry !='0'){
			$userfilter= mysqli_query($con,"SELECT * FROM profile 
			where industry='$industry1' and businessType='$userType' order by id DESC");
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
		?>
			<div class="item-details">
        <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="src-pic">
                <img src="assets/img/user-pic.jpg" alt="" />
              </div>
              <div class="item-info">
                <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                <p style="float:left;width:100%;">
                  <span><?php echo $row3['username']; ?></span>
                  <span><?php echo $row2['industry']; ?></span>
                  <span><?php echo $row2['position']; ?></span>
                </p>
                <p style="float:left;width:100%;">
                  <span><?php echo $row2['country']; ?></span>
                  <span><?php echo $row2['company']; ?></span>
                  <span><?php echo $row2['businessType']; ?></span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="row">
                  <div class="src-after">
                      <div class="quick-btn">
                        <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                         <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
     <?php
					}
				}
		  }  
		}
				if($country =='0' && $industry1 =='0'){
			$userfilter= mysqli_query($con,"SELECT * FROM profile where businessType='$userType' order by id DESC");
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
		?>
			<div class="item-details">
        <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="src-pic">
                <img src="assets/img/user-pic.jpg" alt="" />
              </div>
              <div class="item-info">
                <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                <p style="float:left;width:100%;">
                  <span><?php echo $row3['username']; ?></span>
                  <span><?php echo $row2['industry']; ?></span>
                  <span><?php echo $row2['position']; ?></span>
                </p>
                <p style="float:left;width:100%;">
                  <span><?php echo $row2['country']; ?></span>
                  <span><?php echo $row2['company']; ?></span>
                  <span><?php echo $row2['businessType']; ?></span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="row">
                  <div class="src-after">
                      <div class="quick-btn">
                        <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                           </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
     <?php
					}
				}
		  }  
		}
        
        if($country =='0' && $industry1 =='0' && $userType=="All"){
            echo "yes";
			$userfilter= mysqli_query($con,"SELECT * FROM profile order by id DESC");
			while($row2=mysqli_fetch_array($userfilter)){
				$filtereduserid=$row2['userId'];
				$userfilterinfo= mysqli_query($con,"SELECT * FROM user where id='$filtereduserid' and (firstname LIKE '%$searchtext%' OR lastname LIKE '%$searchtext%' OR email LIKE '%$searchtext%' OR username LIKE '%$searchtext%')");
				$usercount=mysqli_num_rows($userfilterinfo);
				if($usercount>0){
				  while($row3=mysqli_fetch_array($userfilterinfo)){
						$followuserid=$row3['id'];
		?>
			<div class="item-details">
        <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="src-pic">
                <img src="assets/img/user-pic.jpg" alt="" />
              </div>
              <div class="item-info">
                <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                <p style="float:left;width:100%;">
                  <span><?php echo $row3['username']; ?></span>
                  <span><?php echo $row2['industry']; ?></span>
                  <span><?php echo $row2['position']; ?></span>
                </p>
                <p style="float:left;width:100%;">
                  <span><?php echo $row2['country']; ?></span>
                  <span><?php echo $row2['company']; ?></span>
                  <span><?php echo $row2['businessType']; ?></span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="row">
                  <div class="src-after">
                      <div class="quick-btn">
                        <?php
														  $checkfriend= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' and userId2='$followuserid'");
															$followcount1=mysqli_num_rows($checkfriend);
													  ?>
                            <div id="friend<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount1<=0){ //if not friend
															$checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$followuserid'");
															$requetscount=mysqli_num_rows($checkfriendrequest);
															if($requetscount<=0){ // if not request sent
													  ?>
                              <a class="blue" style="display:block;" onclick="friend(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
                            <?php } else { //friend has already sent ?>
															<a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
														<?php } }else { // already a friend with this user ?>
                              <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
                            <?php } ?>
                            </div>
                            <?php
														  $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$followuserid'");
															$followcount=mysqli_num_rows($checkfollow);
													  ?>
                            <div id="follow<?php echo $followuserid;?>" class="link-btn">
                            <?php if($followcount<=0){ ?>
                              <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                           <?php }else { ?>
                              <a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $followuserid;?>, 2);"  href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                           <?php } ?>
                           </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
     <?php
					}
				}
		  }  
		}
	}
?>