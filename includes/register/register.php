<?php
include('../connection.php');

$email = $_POST['email'];
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);
$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
$password = $_POST['password'];
$username = mysqli_real_escape_string($con,$_POST['username']);
$date=date("Y-m-d");
$month=date("F"); 
$year=date("Y");

$checkdb= mysqli_query($con,"SELECT * FROM user where username='$username'");
$rowcount1=mysqli_num_rows($checkdb);

if ($rowcount1>=1){	
	echo"<span style='color:red;'><b>Error !</b> Username already exists</span>";
	exit;
}

$checkdb2= mysqli_query($con,"SELECT * FROM user where email='$email'");
$rowcount2=mysqli_num_rows($checkdb2);
	
	if ($rowcount2>=1){		
	echo"<span style='color:red;'><b>Error !</b> Email already exists</span>";
	exit;
}

$options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$password = password_hash($password, PASSWORD_BCRYPT, $options);

$sql = "INSERT INTO user (email, firstname, lastname, password, username, `date`, month, year) VALUES ('".$email."', '".$firstname."', '".$lastname."', '".$password."', '".$username."', '".$date."', '".$month."', '".$year."')";
$add1=mysqli_query($con,$sql);
// echo $sql;

$userId=mysqli_insert_id($con);

session_start();
$_SESSION['username']=$username;
	$_SESSION['userid']=$userId; 

$addsettings=mysqli_query($con,"INSERT INTO settings (userId, blockedusers, opentoSearch, opentoComment, emailtoMessage, emailtoFriend, openFnF, openBuypost) VALUES ('$userId', ' ', '1', '1', '1', '1', '1', '1')");
$addsettings=mysqli_query($con,"INSERT INTO profile (userId) VALUES ($userId)");# Err : Field 'access' doesn't have a default value
	
$annSql= "SELECT id, title, announcement from announcement WHERE status=1";
$query = mysqli_query($con, $annSql);
while($annRow=mysqli_fetch_array($query)){
	$announcementId = $annRow['id'];
	$annSql2 = "INSERT INTO userannouncement (userId, announcementId) VALUES ($userId, $announcementId)";
	mysqli_query($con, $annSql2);
}
	
if (!$add1){		
	echo"<span style='color:red;'><b>Error !</b> Please check again ".mysqli_error($con)."</span>";		
} else {
	echo "<span style='color: #3BCA17;'>You have registered successfully
			<script>
				setTimeout(function(){
					window.location='home';
				},2000);
			</script>
		</span>";
	}

?>