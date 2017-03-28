<?php $followuserid=$row3['id']; ?>
<div class="item-details">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                  <div class="src-pic">
                    <img src="assets/img/user-pic.jpg" alt="" />
                  </div>
                  <div class="item-info">
                    <h2><a href="profile.php?user=<?php echo $row3['username']; ?>" class="bluelink"><?php if($row3['username'] !=''){ echo $row3['username']; } else {echo $row2['company'];}?></a></h2>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['industry']; ?></span>
                    </p>
                    <p style="float:left;width:100%;">
                      <span><?php echo $row2['company']; ?></span>
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