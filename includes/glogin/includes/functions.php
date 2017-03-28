<?php
class Users {
	public $tableName = 'googlelogin';
	
	function __construct(){
       
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'biscl_ars'; //Define database username
		$dbPassword = 'ddA0h83%'; //Define database password
		$dbName = 'biscleco_ars'; //Define database name
		
		define('BASE_URL', 'http://biscle.com/bisclenew1/');
    define('DIR_URL', 'http://biscle.com/bisclenew1/');

		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$link,$picture){
		$prevQuery = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		if(mysqli_num_rows($prevQuery) > 0){
			$update = mysqli_query($this->connect,"UPDATE $this->tableName SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'") or die(mysqli_error($this->connect));
			while($row=mysqli_fetch_array($prevQuery)){
						$thisuser=$row['userId'];
						$checkusername = mysqli_query($this->connect,"select * from user where id='$thisuser'");
						while($row22=mysqli_fetch_array($checkusername)){
						  $username=$row22['username'];
							if($username==''){
							  $username=$row22['firstname'];
							}
						}
			}
			$query = "UPDATE user SET firstname='$fname', lastname='$lname', email='$email' where id='$thisuser'";
					mysqli_query($this->connect, $query);
					$_SESSION['username'] = $username;
			    $_SESSION['userid']=$thisuser;
					$rediurl= BASE_URL."user-home.php";
					header("Location: ".$rediurl);
			    exit;
		}else{
			    $date=date("Y-m-d");
					$month=date("F"); 
					$year=date("Y");
				  $insertuser = "INSERT INTO user (firstname,lastname,email,loginType,ImageUrl,date,month,year) VALUES ('$fname','$lname','$email','default','','$date','$month','$year')";
					 mysqli_query($this->connect, $insertuser);	
					 $lastinsertid=mysqli_insert_id($this->connect);
			$insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."', userId='".$lastinsertid."'") or die(mysqli_error($this->connect));
			$rediurl= BASE_URL."new-acount-name.php?uid=".$lastinsertid;
			header("Location: ".$rediurl);
			exit;
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>