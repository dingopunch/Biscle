<?php include('includes/header.php'); ?>
<?php
$_SESSION['conv_d']=false;      
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
?>
    <script>
        $(document).ready(function(){
            
        });
        </script>
    <section id="messaging">
        
    	<div class="container">
        	<div class="row">
            	<div class="chatting">
                	<div class="col-md-4">
                    	<div class="user-online">
                        	<div class="user-src">
                            	<form action="javascript:void(0);" method="post" onsubmit="findmsguser();">
                                	<input type="search" name="" id="finduser" onkeypress="findmsguser();" placeholder="Enter user name or email"  />
                                    <input type="submit" onclick="findmsguser();" value="" name=""  />
                                </form>
                            </div>
                            <div class="line"></div>
                            <div class="user-live">
                            	<ul id="frienduserresult">
                                  <?php
                                  if(isset($_REQUEST['new'])){
                                      
                                      $us_id=$_REQUEST['new'];
                                      $_SESSION['conv_d']=$us_id;
                                      $findusername = mysqli_real_escape_string($con,$_REQUEST['finduser']);
	
	 $getuserinfo = mysqli_query($con,"SELECT * FROM user where id=$us_id");
		while($row2=mysqli_fetch_array($getuserinfo)){
			$clientuserid=$row2['id'];
			$clientusername=$row2['username'];
			$profilepic = $row2['ImageUrl'];
			$loginType = $row2['loginType'];
			
			$checkfriend = mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' AND userId2='$clientuserid') OR (userId1='$clientuserid' AND userId2='$userId')"); //check if friends
		  $friend=mysqli_num_rows($checkfriend);
			if(true/*$friend>=1*/){
			
			$checktime = mysqli_query($con,"SELECT * FROM messages where (senderId='$userId' AND receiverId='$clientuserid') OR (senderId='$clientuserid' AND receiverId='$userId') ORDER by id DESC LIMIT 1");
			$checklasttime=mysqli_num_rows($checktime);
			if($checklasttime>=1){
				while($row=mysqli_fetch_array($checktime)){
					
					$clientlasttime=$row['lasttime'];
					$clientmessage=$row['message'];
                    $status=$row['isRead'];
				}
		 }else {
			 $clientlasttime='';
		  }
	?>
  
<li id="msg<?php echo $clientuserid; ?>">
  <a href="javascript:void(0);" <?php if($status==0)echo 'style="background-color: #ccccff;"';?> onclick="loadthisuser(<?php echo $clientuserid; ?>);">
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


                                  }
                                    $userId = $_SESSION['userid'];                  // Select clients who have ever conversation with user
                                    $selectallusers = mysqli_query($con,"SELECT * FROM user");
                                    while($row1=mysqli_fetch_array($selectallusers)){
                                      $randomuserid=$row1['id'];
                                      
                                      $usermessages = mysqli_query($con,"SELECT DISTINCT senderId,receiverId FROM messages where (senderId='$userId' AND receiverId='$randomuserid') OR (senderId='$randomuserid' AND receiverId='$userId') ORDER by id DESC LIMIT 1");
                                      $messagescount=mysqli_num_rows($usermessages);
                                      if($messagescount>=1){
                                        while($row=mysqli_fetch_array($usermessages)){
                                          
                                          $senderId=$row['senderId'];
                                          $receiverId=$row['receiverId'];
                                          
                                          $usermessages2 = mysqli_query($con,"SELECT * FROM messages where (senderId='$userId' AND receiverId='$randomuserid') OR (senderId='$randomuserid' AND receiverId='$userId') ORDER by id DESC LIMIT 1");
                                        while($row22=mysqli_fetch_array($usermessages2)){
                                          $clientmessage=$row22['message'];
                                          $clientlasttime=$row22['lasttime'];
                                          $status=$row22['isRead'];
                                        }
                                          
                                          if($senderId==$userId){
                                            $clientuserid=$receiverId;
                                          }elseif($receiverId==$userId) {
                                            $clientuserid=$senderId;
                                          }
																					
																					//$checkfriendship = mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' AND userId2='$clientuserid') OR (userId1='$clientuserid' AND userId2='$userId')");
																				//$friendcount=mysqli_num_rows($checkfriendship);
																			  //if($friendcount>=1){
                                          $getuserinfo = mysqli_query($con,"SELECT * FROM user where id='$clientuserid'");
                                          while($row2=mysqli_fetch_array($getuserinfo)){
                                            
                                            $clientusername=$row2['username'];
                                            $profilepic = $row2['ImageUrl'];
                                            $loginType = $row2['loginType'];
                                            if($_SESSION['conv_d']!=$clientuserid){
                                          ?>
                                          <li id="msg<?php echo $clientuserid; ?>">
                                            <a href="javascript:void(0);" <?php if($status==0)echo 'style="background-color: #ccccff;"';?> onclick="loadthisuser(<?php echo $clientuserid; ?>);">
                                              <span>
                                                <?php if($loginType=='default'){ ?>
                                                <?php if($profilepic=='' || $profilepic=='default'){ ?>
                                                  <img  src="assets/img/user-pic.jpg" alt=""  />
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
																							  $time = strtotime($clientlasttime);
                                                echo humanTiming($time).' ago';
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
                                            <div onclick="if (confirm('Are you sure...?')) delmsg(<?php echo $clientuserid; ?>); return false" class="delete"><img src="assets/img/cross.png" /></div>
                                          </li>
                                          <?php
                                          }
                                            }
																				 // }
                                        }
                                      }
                                    }
                                  ?>                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    	<div class="chat-box">
                        	<div id="umresult">
                              <?php if(empty($_GET['new'])){?>  
                              <div class="user">
  <span>
    		      
      </span>
  <b></b><br>
  <time>
     </time>
</div>
<div style="background: url(http://biscle.com/bisclenew1/assets/img/logo-blue2.png) no-repeat;
  background-size: 20% 20%; background-position: 55% 55%;" height=486  class="live-chat">
  <div  class="messaging">
        
          
  </div>
</div>
                            <?php
                              }
                              $newmsges=$_REQUEST['new'];
															if($newmsges !=''){
																
																$msgcount=1;
																$usersender = mysqli_query($con,"SELECT * FROM messages where receiverId='$userId' AND senderId='$newmsges' ORDER by id DESC LIMIT 1");
																while($rowcheck=mysqli_fetch_array($usersender)){
																		$clientid=$rowcheck['senderId'];
																		$clientlasttime=$rowcheck['lasttime'];
																}
																
																$getuserinfo = mysqli_query($con,"SELECT * FROM user where id='$newmsges'");
																while($row2=mysqli_fetch_array($getuserinfo)){
																	
																	$clientusername=$row2['username'];
																	$profilepic = $row2['ImageUrl'];
																	$loginType = $row2['loginType'];
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
                                  <b><?php echo $clientusername ;?></b><br />
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
                                  <div class="messaging">
                                    <div id="messagesent"></div>
                                <?php
																
																$usermessages = mysqli_query($con,"SELECT * FROM messages where (senderId='$userId' AND receiverId='$clientid') OR (senderId='$clientid' AND receiverId='$userId') ORDER by id ASC");
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
																?>
                                <script type="text/javascript">
																	document.getElementById('reciverid').value='<?php echo $clientid; ?>';
															  </script>
                               <?php
															 }
															 echo '</div>
																		</div>';

																$updatemsg = mysqli_query($con,"UPDATE messages SET isRead='1' where receiverId='$userId'");
								                if(!$updatemsg){}
															}
														?>
                          </div>
                            <div class="write-msg" style="<?php if(empty($_GET['new'])) echo 'display:none';?> " >
                            	<form action="javascript:void();" method="post" enctype="multipart/form-data" id="sendmesg">
                                    <textarea class="text-msg" name="message" placeholder="Enter your text here..."></textarea>
                                     
                                    <?php
                                    if($newmsges !=''){
																		?>
                                    <input type="hidden" id="checknew" value="<?php echo $newmsges; ?>" name="checknew" />
                                    <input type="hidden" id="reciverid" value="<?php echo $newmsges; ?>" name="reciverid" />
                                    <?php } else { ?>
                                    <input type="hidden" id="reciverid" value="<?php echo $clientid; ?>" name="reciverid" />
                                    <?php } ?>
                                    <div class="msg-btn">
                                        
                                        <input onclick="sendmesg();" type="submit" id="msg-pass" name="" value="SEND"  />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<div id="t-div" style="display:none"></div>