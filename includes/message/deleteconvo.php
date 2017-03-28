<?php
  include('../connection.php');
  session_start();
	$userId = $_SESSION['userid'];
  $clientid = mysqli_real_escape_string($con,$_REQUEST['id']);
 $delmsg = mysqli_query($con,"DELETE FROM messages where (senderId='$userId' AND receiverId='$clientid') OR (senderId='$clientid' AND receiverId='$userId')");
	if(!$delmsg){
		echo 'Error !'.mysqli_error($con);
  }
?>
