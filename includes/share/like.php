<?php
  include('../connection.php');
  session_start();
	$pid = mysqli_real_escape_string($con,$_POST['postid']);
	$thisuserid = mysqli_real_escape_string($con,$_POST['userid']);
	$action = mysqli_real_escape_string($con,$_POST['action']);
	$tblname=$_POST['tblname'];
  if($action==1){
	  $ko=mysqli_query($con,"SELECT * FROM $tblname  Where userId= '$thisuserid' and postId= '$pid'");
	  $num_rows = mysqli_num_rows($ko);
	  if ($num_rows>0) {
		  echo "<b>Already Liked</b>";
	  }
	  else {
		  $add1 = mysqli_query($con, "INSERT INTO $tblname (userId, postId) VALUES ('$thisuserid', '$pid')");

		if (!$add1){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
			if($tblname=='postlikes'){
				$parenttable='post';
			}elseif ($tblname=='buypostlikes'){
			 $parenttable='buyrequest';
			 }
			$likedhistory=mysqli_query($con,"INSERT INTO likedhistory (userId, postId, tblname) VALUES ('$thisuserid', '$pid', '$parenttable')");
		?>
     <div id="likeup"> 
       <a onclick="buylike(<?php echo $pid; ?>, <?php echo $thisuserid; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a> 
     </div>   
		<?php
		}}
	}else {
		$add2=mysqli_query($con,"DELETE FROM $tblname WHERE userId='$thisuserid' AND postId='$pid'");
		if (!$add2){
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	else {
		?>
     <div id="likeup"> 
       <a onclick="buylike(<?php echo $pid; ?>, <?php echo $thisuserid; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a> 
     </div>   
		<?php
		}
	}
?>