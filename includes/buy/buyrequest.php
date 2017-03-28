<?php

include('../connection.php');

session_start();

$userId = $_SESSION['userid'];
$title = mysqli_real_escape_string($con,htmlspecialchars($_POST['title']));
$description = mysqli_real_escape_string($con,htmlspecialchars($_POST['description']));
$industry = mysqli_real_escape_string($con,htmlspecialchars($_POST['industry']));
$country = mysqli_real_escape_string($con,htmlspecialchars($_POST['country']));
$access = mysqli_real_escape_string($con,htmlspecialchars($_POST['access']));
$duration = mysqli_real_escape_string($con,htmlspecialchars($_POST['duration']));
$anonymous = mysqli_real_escape_string($con,htmlspecialchars($_POST['anonymous']));
$date=date('Y-m-d');
$month=date('F');
$day=date('d');

if(strlen($title)<20||strlen($description)<50)
{
	echo "Operation Not allowed";

	die;
}


	$add1=mysqli_query($con,"INSERT INTO buyrequest (userId, title, description, industry, country, access, duration, anonymous, date, month, day)
VALUES ('$userId', '$title', '$description', '$industry', '$country', '$access', '$duration', '$anonymous', '$date', '$month', '$day')");
	
	if (!$add1)
	{
		echo"<b>Error !</b> Please check again".mysqli_error($con);		
	}
	else 
	{
		header('Location: ' . BASE_URL . 'buy-request');
	}	
?>