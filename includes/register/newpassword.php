<?php
include('../connection.php');
session_start();
	
$email = htmlentities($_POST['email']);
$password = $_POST['password'];
$passwordagian = $_POST['passwordagian'];
$t = $_POST['t'];

//Select the tooken
$tooken;
$validateDate;

$getTooken= "SELECT * from user WHERE email='" . $email . "'";
$getTookenRes = mysqli_query($con, $getTooken);

while($getTookenRow=mysqli_fetch_array($getTookenRes)) {
	$tooken = $getTookenRow['tooken'];
	$validateDate = $getTookenRow['validate_date'];
}

if ($tooken == '') {
	echo"<span style='color:red;'><b>Error !:</b> No reset request was sent!</span>";
	exit;
}

if ($t != $tooken) {
	echo"<span style='color:red;'><b>Error !:</b> The reset token you have provided is not valid</span>";
	exit;
}

$timestamp = strtotime($validateDate);

if ($timestamp === false) {
    echo"<span style='color:red;'><b>Error !:</b> time exceeded</span>";	
	exit;
}

$timediff = strtotime('now') - $timestamp; // in seconds

// echo "validateDate : $validateDate <br/>";
// echo "timediff : $timediff <br/>";
// echo "timestamp : $timestamp <br/>";

if( $timediff > 1200 ) { // 1200 seconds is 20 min
    echo"<span style='color:red;'><b>Error !:</b> time exceeded.</span>";
	exit;
}

if($password != $passwordagian){
	echo"<span style='color:red;'><b>Error !:</b> Password does't match</span>";
	exit;
}

$options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$password = password_hash($password, PASSWORD_BCRYPT, $options);

$update= mysqli_query($con,"UPDATE user SET password='".$password."', tooken = '', validate_date = null where email='$email'");

if ($update){
	
	echo"<span style='color:green;'><b>Sucess!:</b> Password has been reset </span>";

?>

	<script type="text/javascript">
	  top.location.href = "<?php echo BASE_URL; ?>";
	</script>

<?php

} else {		
	echo"<span style='color:red;'><b>Error !:</b> Something went wrong try again</span>";
}	





?>