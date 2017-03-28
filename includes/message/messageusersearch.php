<?php
  include('../connection.php');
  session_start();
	error_reporting(0);
	$userId = $_SESSION['userid'];
	$from=$_REQUEST["from"];
    $to=$_REQUEST["to"];
    if(!isset($from))$from=0;
    if(!isset($to))$to=10;
    $to=10;
    $clause=" LIMIT $from,$to";
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
	
   $clientid = mysqli_real_escape_string($con,$_REQUEST['clientid']);
	
	 $getuserinfo = mysqli_query($con,"SELECT * FROM user where id='$clientid'");
		while($row2=mysqli_fetch_array($getuserinfo)){
			
			$clientusername=$row2['username'];
			$profilepic = $row2['ImageUrl'];
			$loginType = $row2['loginType'];
		}

 $checktime = mysqli_query($con,"SELECT * FROM messages where (senderId='$userId' AND receiverId='$clientid') OR (senderId='$clientid' AND receiverId='$userId') ORDER by id DESC LIMIT 1");
	$checklasttime=mysqli_num_rows($checktime);
	if($checklasttime>=1){
		while($row=mysqli_fetch_array($checktime)){
			
			$clientlasttime=$row['lasttime'];
                                          
	}
}
?>

<div class="user">
  <span>
    <?php if($loginType=='default'){ ?>
		<?php if($profilepic=='' || $profilepic=='default'){ ?>
      <img src="assets/img/user-pic.jpg" alt=""  />
    <?php } else { ?>
              <img src="assets/files/profile/<?php echo $profilepic ;?>" alt=""  />
    <?php } } else { ?> 
       <?php if($profilepic=='' || $profilepic=='default'){ ?>
        <img src="assets/img/user-pic.jpg" alt=""  />
        <?php } else { ?>
      <img src="<?php echo $profilepic ;?>" alt=""  />
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
</div>
<div class="live-chat">
    <div id="from-to"><?php echo $from; ?>,<?php echo $to; ?></div>
  <div class="messaging">
  <?php
	  $msgcount=1;
      $usermessages = mysqli_query($con,"SELECT id FROM messages where (senderId='$userId' AND receiverId='$clientid') OR (senderId='$clientid' AND receiverId='$userId')  ORDER by id DESC $clause");
	  //$messagescount=mysqli_num_rows($usermessages);
      //$im=0;
      $row=mysqli_fetch_assoc($usermessages);
      $inC="(".$row["id"];
      while($row=mysqli_fetch_assoc($usermessages)){
          $inC.=",".$row["id"];
      }
      $inC.=")";
      $qM="SELECT * FROM messages where id in $inC ORDER by id ASC";
      $usermessages = mysqli_query($con,$qM);
	  $messagescount=mysqli_num_rows($usermessages);
	  if($messagescount>=1){
		  while($row=mysqli_fetch_array($usermessages)){
				$senderId=$row['senderId'];
				$receiverId=$row['receiverId'];
				$clientmessage=$row['message'];
		?>
      <div class="<?php if($senderId==$userId){ echo 'user-friend'; }else {echo 'user-me';} if($senderId != $userId && $msgcount==1){ echo ' first'; }?>">
      	<p><?php echo $clientmessage; ?></p>
    </div>
    <?php		
				$msgcount++;
	   }
   }
  ?>
  <script type="text/javascript">
		  document.getElementById('reciverid').value='<?php echo $clientid; ?>';
	</script>
  </div>
</div>