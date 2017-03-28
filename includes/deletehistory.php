<?php
  include('connection.php');
  session_start();
	//error_reporting(0);
	$tblname = $_POST['tblname'];
	$pid = $_POST['postid'];
	$userid = $_POST['userid'];
  if($tblname=='likedhistory'){
		if($pid=='007'){
			$delete=mysqli_query($con,"DELETE FROM likedhistory WHERE userId='$userid'");
		}else {
	    $delete=mysqli_query($con,"DELETE FROM likedhistory WHERE userId='$userid' and postId='$pid'");
		}
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
	if($tblname=='historypost'){
		if($pid=='007'){
			$delete=mysqli_query($con,"DELETE FROM historypost WHERE userId='$userid'");
		}else {
	    $delete=mysqli_query($con,"DELETE FROM historypost WHERE userId='$userid' and buyPostId='$pid'");
		}
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
?>