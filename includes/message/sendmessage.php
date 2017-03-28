<?php
  include('../connection.php');
  session_start();
	error_reporting(0);

	$message = mysqli_real_escape_string($con,htmlspecialchars($_POST['body']));
	$message=htmlentities($message);
	if(strlen($message)<=0)exit;
	$senderId = $_SESSION['userid'];
	$reciverid = mysqli_real_escape_string($con,$_REQUEST['to']);
	$reciverid=htmlentities($reciverid);
	if(strlen($senderId)<=0)exit;

	
	$checknew = $_REQUEST['checknew'];
	$date=time();
    
	$date2=date("Y-m-d");
	$sql = "INSERT INTO messages 
    (senderId, receiverId, lasttime, message, attachment, isRead) VALUES ('$senderId', '$reciverid', '$date', '$message', '', 0)";
    echo $sql;
	$add1=mysqli_query($con, $sql);
		
		
	$qF="SELECT * FROM user WHERE id='$reciverid';";
			$res=mysqli_query($con,$qF);
			$resR=mysqli_fetch_assoc($res);
			
			$qF="SELECT * FROM user WHERE id='$senderId';";
			$res=mysqli_query($con,$qF);
			$resS=mysqli_fetch_assoc($res);
			
			// echo $resR['email'].'<br/>';

			$msg_res = send_mail($resR['email'],"Message Received","{$resS['username']} sent you a message");
			// echo $msg_res;
?>