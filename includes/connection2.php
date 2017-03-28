<?php


//... connection.php ....//

$con2=mysqli_connect("localhost","root","ivaniscool","biscleco_live"); 

//... checking connection.php ....//


if(!$con2){
	
	echo "Database connection.php Fail".mysqli_error($con2);
	exit;
	
	}


?>