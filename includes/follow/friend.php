<?php
error_reporting(E_ALL);
ini_set("display_errors",true);
  include('../connection.php');
  session_start();
	$userfollower = mysqli_real_escape_string($con,$_POST['cuser']);
	$userfollowed = mysqli_real_escape_string($con,$_POST['cfollow']);
	$action = mysqli_real_escape_string($con,$_POST['actid']);
	$now = time();

if(isset($_SESSION['userid'])&&$userfollower==$_SESSION['userid'])
{
  if($action==1){
	 $chk =mysqli_query($con,"Select id FROM friendrequest Where requestSender = '$userfollower' and  requestReceiver='$userfollowed'");
	  if(mysqli_num_rows($chk)<1) {
		  $add1 = mysqli_query($con, "INSERT INTO friendrequest (requestSender, requestReceiver) VALUES ('$userfollower', '$userfollowed')");
		  if (!$add1) {
			  echo "<b>Error !</b> Please check again" . mysqli_error($con);
		  } else {
			  $notification = mysqli_query($con, "INSERT INTO notification (notificationReceiver, notificationSender, notificationType, ntime) VALUES ('$userfollowed', '$userfollower', 'friendrequest', '$now')");

			  $qF = "SELECT * FROM user WHERE id='$userfollowed';";
			  $res = mysqli_query($con, $qF);
			  $resR = mysqli_fetch_assoc($res);

			  $qF = "SELECT * FROM user WHERE id='$userfollower';";
			  $res = mysqli_query($con, $qF);
			  $resS = mysqli_fetch_assoc($res);

			  $sqlEmailCheck = "SELECT emailtoFriend from settings WHERE userId=$userfollowed AND emailtoFriend=1";
			  $checkEmailSend = mysqli_query($con, $sqlEmailCheck);
			  $emailCount = mysqli_num_rows($checkEmailSend);

			  if ($emailCount > 0) {
				  send_mail($resR['email'], "Friend Request Received", "{$resS['username']} sent you a request");
			  }


			  $checkfollow = mysqli_query($con, "SELECT * FROM friendrequest where requestSender='$userfollower' and requestReceiver='$userfollowed'");
			  $followcount = mysqli_num_rows($checkfollow);
			  ?>
			  <?php if ($followcount <= 0) { ?>
				  <a class="blue" style="display:block;"
					 onclick="friend(<?php echo $userfollower; ?>, <?php echo $userfollowed; ?>, 1);"
					 href="javascript:void(0);">Friend <span>+</span></a>
			  <?php } else { ?>
				  <a class="gray" style="display:block;" href="javascript:void(0);" title="Request sent">Request
					  sent</a>
			  <?php }
		  }
	  }
	  else
	  {
		  echo "Friend Request already Sent".mysqli_num_rows($chk);
	  }
	}
	elseif($action==2){
	  
		$unfollow=mysqli_query($con,"DELETE FROM friend WHERE  (userId1='$userfollower' AND userId2='$userfollowed') OR (userId1='$userfollowed' AND userId2='$userfollower')");
		if (!$unfollow){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
			//$notification=mysqli_query($con,"INSERT INTO notification (notificationReceiver, notificationSender, notificationType, ntime) VALUES ('$userfollowed', '$userfollower', 'unfriend', '$now')");
			
			$checkfollow= mysqli_query($con,"SELECT * FROM friend where userId1='$userfollower' and userId2='$userfollowed'");
			$followcount=mysqli_num_rows($checkfollow);
			?>
			<?php if($followcount<=0){ ?>
				<a class="blue" style="display:block;" onclick="friend(<?php echo $userfollower;?>, <?php echo $userfollowed;?>, 1);" href="javascript:void(0);">Friend <span>+</span></a>
        <?php }else { ?>
        <a class="gray simpleConfirm"  style="display:block;" onclick="unfriend(<?php echo $userfollower;?>, <?php echo $userfollowed;?>, 2);"  href="javascript:void(0);" title="Make unfriend">Unfriend</a>
<?php }
		}
	}
}
else
{
	echo "Operation Not Allowed";
}
?>
     