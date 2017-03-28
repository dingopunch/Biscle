<?php
  include('../connection.php');
  session_start();
	$comment = mysqli_real_escape_string($con,htmlspecialchars($_POST['comment']));
	$pid = mysqli_real_escape_string($con,htmlspecialchars($_POST['postid']));
	$thisuserid = mysqli_real_escape_string($con,htmlspecialchars($_POST['thisuserid']));
	$targetedtable = mysqli_real_escape_string($con,htmlspecialchars($_POST['targetedtable']));
	$date=date('Y-m-d');
	$month=date('F');
	$day=date('d');
	
		$add1=mysqli_query($con,"INSERT INTO $targetedtable (userId, postId, date, content, month, day) VALUES ('$thisuserid', '$pid', '$date', '$comment', '$month', '$day')");
		if (!$add1){
		  echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
		else {
			 $thispostcomment= mysqli_query($con,"SELECT * FROM $targetedtable where postId='$pid' order by id DESC");
			 while($row=mysqli_fetch_array($thispostcomment)){
				 $user_commented=$row['userId'];
				 $thiscommentid=$row['id'];
			   $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
				 while($row2=mysqli_fetch_array($getusername)){
							  $thisusername2	=$row2['username'];
								$profilepic2 = $row2['ImageUrl'];
								$loginType2 = $row2['loginType'];

					 $thisuserfirstname2 = $row2['firstname'];
					 $thisuserlastname2 = $row2['lastname'];
				 }
		?>
     <div id="commnetitem<?php echo $thiscommentid; ?>" class="comments">
<?php
		 if($user_commented==$_SESSION['userid']) {
			 ?>
			 <div class="delete"><a
					 onclick="if (confirm('Are you sure...?')) delitem2('<?php echo $targetedtable; ?>',<?php echo $thiscommentid; ?>, <?php echo $thisuserid; ?>); return false"
					 href="javascript:void(0);" class="btn-primary">x</a></div>
			 <?php
		 }
			 ?>

					<?php if($loginType2=='default'){ ?>
				<?php if($profilepic2=='' || $profilepic2=='default'){ ?>
          <img src="assets/img/user-pic.jpg" alt=""  />
        <?php } else { ?>
                  <img src="assets/files/profile/<?php echo $profilepic2 ;?>" alt=""  />
        <?php } } else { ?> 
         <?php if($profilepic2=='' || $profilepic2=='default'){ ?>
          <img src="assets/img/user-pic.jpg" alt=""  />
          <?php } else { ?>
        <img src="<?php echo $profilepic2 ;?>" alt=""  />
      <?php } }?>
      <div class="comments-cont">


		  <p><a href="profile.php?user=<?php echo $thisusername2; ?>" class="bluelink"><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></a><?php echo " ".$row['content']; ?></p>



        <div class="action">
          <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
        </div>
      </div>
    </div> 
		<?php
		  }
		}
?>