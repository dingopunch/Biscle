<?php 

if($_SESSION['userid']!=$clientid) {

    $checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' and userId2='$clientid') OR (userId1='$clientid' and userId2='$userId')");
    $followcount1=mysqli_num_rows($checkfriend);

    if($followcount1>0)
    echo '  <a class="sky btn" style="color:#fff;margin-bottom:0px;" href="message.php?new=' . $clientid . '">Contact</a>';
else{
    echo '  <a class="sky btn" style="background:purple; color:#fff;margin-bottom:0px;" href="message.php?new=' . $clientid . '">BisMail</a>';
}
}

                ?>
                <div class="quick-btn">
										<?php
                      $checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' and userId2='$clientid') OR (userId1='$clientid' and userId2='$userId')");
                      $followcount1=mysqli_num_rows($checkfriend);
                    ?>
                    <div id="friend<?php echo $clientid;?>" class="link-btn">
                    <?php if($followcount1<=0){ //if not friend
                      $checkfriendrequest= mysqli_query($con,"SELECT * FROM friendrequest where requestSender='$userId' and requestReceiver='$clientid'");
                      $requetscount=mysqli_num_rows($checkfriendrequest);
                      if($requetscount<=0){ // if not request sent
                    
                    if($_SESSION['userid']!=$clientid)
                            echo '
                      <a class="blue" style="display:block;" onclick="friend('.$userId.', '.$clientid.', 1);" href="javascript:void(0);">Friend <span>+</span></a>';
                     } else { //friend has already sent ?>
                      <a class="gray"  style="display:block;" href="javascript:void(0);" title="Request sent">Request sent</a>
                    <?php } }else { // already a friend with this user 
                     if($_SESSION['userid']!=$clientid)
                            echo '
                      <a class="gray"  style="display:block;" onclick="unfriend('.$userId.', '.$clientid.', 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>';
                     } ?>
                    </div>
                    <?php
                      $checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userId' and userId2='$clientid'");
                      $followcount=mysqli_num_rows($checkfollow);
                    ?>
                    <div id="follow<?php echo $clientid;?>" class="link-btn">
                    <?php if($followcount<=0 && $_SESSION['userid']!=$clientid){ ?>
                      <a class="jade" style="display:block;" onclick="followuser(<?php echo $userId;?>, <?php echo $clientid;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
                   <?php }else if($_SESSION['userid']!=$clientid){ ?>
                      <a class="gray" style="display:block;" onclick="unfollowuser(<?php echo $userId;?>, <?php echo $clientid;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
                   <?php } ?>
                    </div>
                     <?php
                      $checkblock= mysqli_query($con,"SELECT * FROM block where blocker='$userId' and blocked='$clientid'");
                      $blockcount=mysqli_num_rows($checkblock);
                    ?>
                    <div id="block<?php echo $clientid;?>" class="link-btn">
                    <?php if($blockcount<=0 && $_SESSION['userid']!=$clientid){ ?>
                      <a class="jade" style="display:block;" onclick="blockuser(<?php echo $userId;?>, <?php echo $clientid;?>, 1);" href="javascript:void(0);">Block <span>-</span></a>
                   <?php }else if($_SESSION['userid']!=$clientid){ ?>
                      <a class="gray" style="display:block;" onclick="unblockuser(<?php echo $userId;?>, <?php echo $clientid;?>, 2);" href="javascript:void(0);" title="Make bock">Unblock</a>
                   <?php } ?>
                    </div>
                </div>