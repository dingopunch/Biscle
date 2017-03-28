<?php
include('../connection.php');

session_start();

$password = $_POST['password'];
$username = mysqli_real_escape_string($con,$_POST['username']);

// AND password='$password'
// AND password='$password'

$checkdb= mysqli_query($con,"SELECT * FROM user where username='$username' OR email='$username'");
$rowcount1=mysqli_num_rows($checkdb);

if ($rowcount1>=1) {
	while($row=mysqli_fetch_array($checkdb)) {
		$username = $row['username'];
		$userid = $row['id'];
		$pwd = $row['password'];
	}

	if(password_verify($password, $pwd)) {
		$_SESSION['username'] = $username;
	  	$_SESSION['userid'] = $userid;
?>
		<script type="text/javascript">
			top.location.href = "<?php echo BASE_URL; ?>home"; 
		</script> 
<?php	
	} else {
		echo"<span style='color:red;'><b>Username or password is incorrect.</b> </span>";
	}
} else {
	echo"<span style='color:red;'><b>Username or password is incorrect.</b> </span>";
}
?>