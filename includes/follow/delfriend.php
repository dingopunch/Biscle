<?php
  include('../connection.php');
  session_start();
	$friendid = mysqli_real_escape_string($con,$_POST['friendid']);
	$userId = $_SESSION['userid'];
	$action = mysqli_real_escape_string($con,$_POST['actionid']);
	if($action==1){
		$unfollow=mysqli_query($con,"DELETE FROM friend WHERE  (userId1='$friendid' AND userId2='$userId') OR (userId1='$userId' AND userId2='$friendid')");
		if (!$unfollow){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
	if($action==2){
		$unfollow=mysqli_query($con,"DELETE FROM follower WHERE  (userId1='$friendid' AND userId2='$userId') OR (userId1='$userId' AND userId2='$friendid')");
		if (!$unfollow){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
?>
     