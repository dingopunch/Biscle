<?php
include('../connection.php');

error_reporting(0);

session_start();

$email = htmlspecialchars($_POST['email']);

$checkdb= mysqli_query($con,"SELECT * FROM user where email='$email'");
$rowcount1=mysqli_num_rows($checkdb);

if ($rowcount1<1) {

	echo"<span style='color:red;'><b>Error !:</b> Email not found</span>";
	exit;

} else {

	$salt = uniqid(mt_rand(), true);
	$tooken = hash('sha512', $salt.$email);

	$update= mysqli_query($con,"UPDATE user SET tooken = '$tooken', validate_date = now() where email = '$email'");

	$to = $email; // sender 
  	$from ="biscle@social.com";
    $subject = "Reset Password";
    $message = 'Please Visit the following link to reset your password'.PHP_EOL.BASE_URL.'new-password.php?emial='.$email.'&t='.$tooken.'<p>Note : The links will expire in 20 minutes</p>';
	$res = send_mail($to,$subject,$message); 
	// echo "<span style='color: #3BCA17;'><b>Success:</b> Reset link has been sent to your mail</span>";

	if ($res){
		echo "<span style='color: #3BCA17;'><b>Success:</b> Reset link has been sent to your mail</span>";
	}else {
		echo"<span style='color:red;'><b>Error !:</b> Something went wrong try again</span>";
	}
	
}	

?>