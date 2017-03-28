<?php
  include('../connection.php');
  session_start();
	$notificationId = mysqli_real_escape_string($con,$_POST['notificationId']);
	$receiverId = mysqli_real_escape_string($con,$_POST['receiverId']);
	$notificationSenderid = mysqli_real_escape_string($con,$_POST['notificationSenderid']);
	$action = mysqli_real_escape_string($con,$_POST['actionid']);
  if($action==1){
		$add1=mysqli_query($con,"INSERT INTO friend (userId1, userId2) VALUES ('$notificationSenderid', '$receiverId')");
		$delrequets=mysqli_query($con,"DELETE FROM friendrequest WHERE  requestSender='$notificationSenderid' AND requestReceiver='$receiverId'");
		if (!$add1){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
			$notificationdel=mysqli_query($con,"DELETE FROM notification WHERE id='$notificationId'");
		?>
			<script type="text/javascript">
			  var notifuid=<?php echo $notificationId; ?>
			  document.getElementById('notifiid'+notifuid).style.display="none";
      </script>
    <?php
		}
	}
	elseif($action==2){
		$notificationdel=mysqli_query($con,"DELETE FROM notification WHERE id='$notificationId'");
		$delrequets=mysqli_query($con,"DELETE FROM friendrequest WHERE  requestSender='$notificationSenderid' AND requestReceiver='$receiverId'"); 
		if (!$notificationdel){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
		?>
			<script type="text/javascript">
			  var notifuid=<?php echo $notificationId; ?>
			  document.getElementById('notifiid'+notifuid).style.display="none";
      </script>
    <?php
		}
	}
?>
     