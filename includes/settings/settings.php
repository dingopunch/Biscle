<?php
  include('../connection.php');
  session_start();
	error_reporting(0);
	$userId = $_SESSION['userid'];
	$blockedusers = implode(", ", $_REQUEST['blockedusers']);
	$opentoSearch = mysqli_real_escape_string($con,$_REQUEST['opentoSearch']);
	$opentoComment = mysqli_real_escape_string($con,$_REQUEST['opentoComment']);
	$emailtoMessage = mysqli_real_escape_string($con,$_REQUEST['emailtoMessage']);
	$emailtoFriend = mysqli_real_escape_string($con,$_REQUEST['emailtoFriend']);
	$openFnF = mysqli_real_escape_string($con,$_REQUEST['openFnF']);
	$openBuypost = mysqli_real_escape_string($con,$_REQUEST['openBuypost']);
	 
	$userprofileinfo = mysqli_query($con,"SELECT * FROM settings where userId='$userId'");
	$rowcount=mysqli_num_rows($userprofileinfo);
	if($rowcount>=1){
		$update=mysqli_query($con,"UPDATE settings SET blockedusers='$blockedusers', opentoSearch='$opentoSearch', opentoComment='$opentoComment', emailtoMessage='$emailtoMessage', emailtoFriend='$emailtoFriend', openFnF='$openFnF', openBuypost='$openBuypost' WHERE userId='$userId'");
		if (!$update){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else { 
			echo '<h4 style="color:green;">Settings Updated</h4>';
		}
	} 
	else {
		$addsettings=mysqli_query($con,"INSERT INTO settings (userId, blockedusers, opentoSearch, opentoComment, emailtoMessage, emailtoFriend, openFnF, openBuypost) VALUES ('$userId', '$blockedusers', '$opentoSearch', '$opentoComment', '$emailtoMessage', '$emailtoFriend', '$openFnF', '$openBuypost')");
		if (!$addsettings){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
			echo '<h4 style="color:green;">Settings saved</h4>';
		}
	}
?>