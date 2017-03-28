<?php
  include('../connection.php');
  session_start();
	$userId = $_SESSION['userid'];
	error_reporting(0);
	 function humanTiming ($time)
	{
	
			$time = time() - $time; // to get the time since that moment
			$time = ($time<1)? 1 : $time;
			$tokens = array (
					31536000 => 'year',
					2592000 => 'month',
					604800 => 'week',
					86400 => 'day',
					3600 => 'hour',
					60 => 'minute',
					1 => 'second'
			);
	
			foreach ($tokens as $unit => $text) {
					if ($time < $unit) continue;
					$numberOfUnits = floor($time / $unit);
					return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
			}
	
	}
	
   $findusername = mysqli_real_escape_string($con,$_REQUEST['finduser']);
	
	 $getuserinfo = mysqli_query($con,"SELECT * FROM user where username LIKE '%$findusername%' OR email LIKE '%$findusername%'");
		while($row2=mysqli_fetch_array($getuserinfo)){
			$clientuserid=$row2['id'];
			$clientusername=$row2['username'];
			$profilepic = $row2['ImageUrl'];
			$loginType = $row2['loginType'];
			
			$checkfriend = mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' AND userId2='$clientuserid') OR (userId1='$clientuserid' AND userId2='$userId')"); //check if friends
		  $friend=mysqli_num_rows($checkfriend);
			if($friend>=1){
			
			$checktime = mysqli_query($con,"SELECT * FROM messages where (senderId='$userId' AND receiverId='$clientuserid') OR (senderId='$clientuserid' AND receiverId='$userId') ORDER by id DESC LIMIT 1");
			$checklasttime=mysqli_num_rows($checktime);
			if($checklasttime>=1){
				while($row=mysqli_fetch_array($checktime)){
					
					$clientlasttime=$row['lasttime'];
					$clientmessage=$row['message'];
				}
		 }else {
			 $clientlasttime='';
		  }
	?>
  
<li id="msg<?php echo $clientuserid; ?>">
  <a href="javascript:void(0);" onclick="loadthisuser(<?php echo $clientuserid; ?>);">
    <span>
      <?php if($loginType=='default'){ ?>
      <?php if($profilepic=='' || $profilepic=='default'){ ?>
        <img src="assets/img/user-pic.jpg" alt=""  />
      <?php } else { ?>
                <img style="max-height:61px;" src="assets/files/profile/<?php echo $profilepic ;?>" alt=""  />
      <?php } } else { ?> 
         <?php if($profilepic=='' || $profilepic=='default'){ ?>
          <img src="assets/img/user-pic.jpg" alt=""  />
          <?php } else { ?>
        <img style="max-height:61px;" src="<?php echo $profilepic ;?>" alt=""  />
      <?php } }?>
    </span>
    <b onclick="window.location='profile.php?user=<?php echo $clientusername; ?>'" ><?php echo $clientusername ;?></b><br />
    <time>
    <?php 
		  if($clientlasttime != ''){
				$time = strtotime($clientlasttime);
				echo humanTiming($time).' ago';
			}
    ?>
    </time>
    <p>
      <?php 
        if(strlen($clientmessage) > 26){
          $pos=strpos($clientmessage, ' ', 26);
          echo substr($clientmessage,0,$pos );
        }
        else {
          echo $clientmessage;
        }
      ?>
    </p>
  </a>
  <div onclick="if (confirm('Are you sure...?')) delmsg(<?php echo $clientuserid; ?>); return false" class="delete">
  	<img src="assets/img/cross.png" />
  </div>
</li>
  
  <?php
		} }
?>
