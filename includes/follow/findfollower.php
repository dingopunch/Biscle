<?php
  include('../connection.php');
  session_start();
	$userId = $_SESSION['userid'];
  $findfollower = mysqli_real_escape_string($con,$_POST['findfollower']);
  $action = mysqli_real_escape_string($con,$_POST['actionid']);
  if($action==1){
			$finduser= mysqli_query($con,"SELECT * FROM user where username LIKE '%$findfollower%'");
		while($row=mysqli_fetch_array($finduser)){
			$matchids=$row['id'];
			$matcusernaem=$row['username'];
			$matchimgurl=$row['ImageUrl'];
			$loginType=$row['loginType'];
			
			$checkfollow= mysqli_query($con,"SELECT * FROM follower where (userId1='$userId' and userId2='$matchids') ");
			$followcount=mysqli_num_rows($checkfollow);
		?>
		<?php if($followcount>=1){ ?>
			<li>
        <a href="profile.php?user=<?php echo $matcusernaem; ?>"><em><?php echo $matcusernaem; ?></em><span>
          <?php if($loginType=='default'){ ?>
            <?php if($matchimgurl=='' || $matchimgurl=='default'){ ?>
              <img style="height:100%;" src="assets/img/user-pic.jpg" alt=""  />
            <?php } else { ?>
                      <img style="height:100%;" src="assets/files/profile/<?php echo $matchimgurl ;?>" alt=""  />
          <?php } } else { ?> 
             <?php if($matchimgurl=='' || $matchimgurl=='default'){ ?>
              <img style="height:100%;" src="assets/img/user-pic.jpg" alt=""  />
              <?php } else { ?>
            <img style="height:100%;" src="<?php echo $matchimgurl ;?>" alt=""  />
          <?php } }?>
          </span><span class="simpleConfirm">Delete</span>
        </a>
      </li>
		<?php } 
		}
	}
	elseif($action==2){}
?>
     