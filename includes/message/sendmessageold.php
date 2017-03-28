<?php
  include('../connection.php');
  session_start();
	error_reporting(0);
	$message = mysqli_real_escape_string($con,$_POST['message']);
	$senderId = $_SESSION['userid'];
	$reciverid = mysqli_real_escape_string($con,$_REQUEST['reciverid']);
	$date=date("Y-m-d h:i:sa");
	
	$filename=$_FILES['files']['name'];
  $size=$_FILES['files']['size'];
  $type=$_FILES['files']['type'];
  $temp=$_FILES['files']['tmp_name'];
  move_uploaded_file($temp,"../../assets/files/attachments/".$filename);
	
		$add1=mysqli_query($con,"INSERT INTO messages (senderId, receiverId, lasttime, message, attachment) VALUES ('$senderId', '$reciverid', '$date', '$message', '$filename')");
		if (!$add1){
		  echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {}
?>