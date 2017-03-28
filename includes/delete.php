<?php
  include('connection.php');
  session_start();
	//error_reporting(0);
	$tblname = $_POST['tblname'];
	$postid = $_POST['postid'];
	$userid = $_POST['userid'];
  if($tblname=='post'){
	  $delete=mysqli_query($con,"DELETE FROM post WHERE id='$postid'");
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
	if($tblname=='buyrequest'){
	  $delete=mysqli_query($con,"DELETE FROM buyrequest WHERE userId='$userid' AND id='$postid'");
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
	if($tblname=='buypostcomment'){
	  $delete=mysqli_query($con,"DELETE FROM buypostcomment WHERE id='$postid'");
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
	if($tblname=='postcomment'){
	  $delete=mysqli_query($con,"DELETE FROM postcomment WHERE id='$postid'");
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
	if($tblname=='products'){
	  $delete=mysqli_query($con,"DELETE FROM products WHERE id='$postid'");
		if(!$delete){
			echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	}
?>