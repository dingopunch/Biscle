<?php
	header('Content-type: application/json');
	include('user-update.php');
	include('templates/postTemplate.php');
	session_start();
	$userId = $_SESSION['userid'];
	//$postStart = $_GET['postStart'];
	//$postLimit = $_GET['postLimit'];
	$buyPostStart = $_GET['buyPostStart'];
	$buyPostLimit = $_GET['buyPostLimit'];
	
	$rtnArray = array('html' => getUpdatePagePostsHTML($userId, $buyPostStart, $buyPostLimit));
	echo json_encode($rtnArray);
?>