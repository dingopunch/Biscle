<?php
include('../connection.php');
  session_start();
  $userid = $_POST['userid'];
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	
	$checkdb= mysqli_query($con,"SELECT * FROM user where username='$username'");
	$rowcount1=mysqli_num_rows($checkdb);
	if ($rowcount1>=1){
		
		echo"<span style='color:red;'><b>Error !</b> Username already exists</span>";
		exit;
		}
	$checkdb= mysqli_query($con,"SELECT * FROM user where email='$email'");
	$rowcount1=mysqli_num_rows($checkdb);
	if ($rowcount1>=1){
		
		echo"<span style='color:red;'><b>Error !</b> Email already exists</span>";
		exit;
		} 
	$add1=mysqli_query($con,"UPDATE user SET email='$email',username='$username' where id='$userid'");
    
	if (!$add1){
		
		echo"<span style='color:red;'><b>Error !</b> Please check again ".mysqli_error($con)."</span>";
		
		}
		
		
	else {
		$_SESSION['username'] = $username;
		$_SESSION['userid']=$userid;
    echo "<span style='color: #3BCA17;'>success</span>";
		?>	
		
    <script type="text/javascript">
		  top.location.href = "<?php echo BASE_URL; ?>user-home.php";
		</script>
   
<?php	
  }	

  



?>