<?php
  include('../connection.php');
  session_start();
	$userfollower = mysqli_real_escape_string($con,$_POST['cuser']);
	$userfollowed = mysqli_real_escape_string($con,$_POST['cfollow']);
	$action = mysqli_real_escape_string($con,$_POST['actid']);
	$now = time();
  if($action==1){
		$add1=mysqli_query($con,"INSERT INTO follower (userId1, userId2) VALUES ('$userfollower', '$userfollowed')");
		if (!$add1){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
			$notification=mysqli_query($con,"INSERT INTO notification (notificationReceiver, notificationSender, notificationType, ntime) VALUES ('$userfollowed', '$userfollower', 'follow', '$now')");
			 
			$checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userfollower' and userId2='$userfollowed'");
			$followcount=mysqli_num_rows($checkfollow);
			?>
			<?php if($followcount<=0){ ?>
				<a class="jade" style="display:block;" onclick="followuser(<?php echo $userfollower;?>, <?php echo $userfollowed;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
		 <?php }else { ?>
				<a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userfollower;?>, <?php echo $userfollowed;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
<?php }
		} 
	}
	elseif($action==2){
	  
		$unfollow=mysqli_query($con,"DELETE FROM follower WHERE  (userId1='$userfollower' AND userId2='$userfollowed') /*OR (userId1='$userfollowed' AND userId2='$userfollower')*/");
		if (!$unfollow){
		echo"<b>Error !</b> Please check again".mysqli_error($con);  
		}
		else {
			//$notification=mysqli_query($con,"INSERT INTO notification (notificationReceiver, notificationSender, notificationType, ntime) VALUES ('$userfollowed', '$userfollower', 'unfollow', '$now')");
			
			$checkfollow= mysqli_query($con,"SELECT * FROM follower where userId1='$userfollower' and userId2='$userfollowed'");
			$followcount=mysqli_num_rows($checkfollow);
			?>
			<?php if($followcount<=0){ ?>
				<a class="jade" style="display:block;" onclick="followuser(<?php echo $userfollower;?>, <?php echo $userfollowed;?>, 1);" href="javascript:void(0);">Follow <span>+</span></a>
		 <?php }else { ?>
				<a class="gray simpleConfirm" style="display:block;" onclick="unfollowuser(<?php echo $userfollower;?>, <?php echo $userfollowed;?>, 2);" href="javascript:void(0);" title="Make unfollow">Unfollow</a>
<?php }
		}
	}
?>
     