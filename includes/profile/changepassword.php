<?php
include('../connection.php');

session_start();

$currentpasword = $_POST['currentpasword'];
$newpasword = $_POST['newpasword'];
$paswordagain = $_POST['paswordagain'];

$userId = $_SESSION['userid'];

$userinfo= mysqli_query($con,"SELECT * FROM user where id='$userId'");

while($row=mysqli_fetch_array($userinfo)) {
	$password=$row['password'];
}

if(!password_verify($currentpasword, $password)) {
	echo "<span style='color:red;'>Your current password Incorrect!</span>";
	exit;
}
  
if($newpasword != $paswordagain) {
	echo "<span style='color:red;'>Password don't Match!</span>";
	exit;
}

if(strlen($newpasword) < 8) {
	echo "<span style='color:red;'>Password at least 8 Character!</span>";
	exit;
}

$options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$newpasword = password_hash($newpasword, PASSWORD_BCRYPT, $options);

$update= mysqli_query($con,"UPDATE user SET password='" . $newpasword . "' where id='$userId'");

if ($update) {
	echo"<span style='color:green;'><b>Sucess!:</b> Password has been reset </span>";
} else {		
	echo"<span style='color:red;'><b>Error !:</b> Something went wrong try again</span>";
}	

?>