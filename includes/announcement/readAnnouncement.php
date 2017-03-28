<?php
	include('../connection.php');
	session_start();
	$userId = $_SESSION['userid'];
	$id = $_POST['id'];
	$sql= "UPDATE userannouncement SET status=0 WHERE userId=$userId and announcementId=$id";
	$query = mysqli_query($con, $sql);
?>