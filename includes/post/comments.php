
<?php include('../connection.php'); ?>
<?php
$pid=$_REQUEST['pid'];
$val=$_REQUEST['val'];
//echo $pid.":".$val;
error_reporting(0);
	session_start();

$userproduct= mysqli_query($con,"SELECT * FROM buyrequest where id='$pid' order by id DESC"); //select buyposts
								/*$makepagination= "SELECT * FROM buyrequest where id='pid' order by id DESC"; //select pagination
								if( mysqli_num_rows($userproduct) > ($p * $limit) ){
									
									$next = ++$p;
									
								}*/

								//$query = mysqli_query($con, $userproduct/*$makepagination . " LIMIT {$start}, {$limit}"*/);
								
								
								while($row=mysqli_fetch_assoc($userproduct/*$query*/)){
										$pid=$row['id'];
										$title = $row['title'];
										$description = $row['description'];
										$industry = $row['industry'];
										$country = $row['country'];
										$access = $row['access'];
                                        $thisuserId = $row['userId'];
                                        $thisuserId = $row['userId'];
                                } 
                      
                      
                       $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' and id<$val order by id DESC limit 3"); // get comments
                       while($row=mysqli_fetch_array($thispostcomment)){
                         $user_commented=$row['userId'];
                         $this_commentid=$row['id'];
                         $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
                         while($row2=mysqli_fetch_array($getusername)){
                                $thisusername2	=$row2['username'];
                                $profilepic2 = $row2['ImageUrl'];
                                $loginType2 = $row2['loginType'];
																$thisuserfirstname2 = $row2['firstname'];
																$thisuserlastname2 = $row2['lastname'];
                         }
                         
                      ?>
                      
                       <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                        <?php
													if($thisuserid==$_SESSION['userid']){
												?>
													<div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
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
                          <p><a href="<?php echo $thisusername2; ?>" class="bluelink"><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></a><?php echo $row['content']; ?></p>
                          <div class="action">
                            <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
                          </div>
                        </div>
                      </div> 
                      <?php } ?>

