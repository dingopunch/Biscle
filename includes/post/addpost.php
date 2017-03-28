<?php
  include('../connection.php');
  session_start();
	error_reporting(0);
  $userId = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$content = mysqli_real_escape_string($con,$_POST['content']);
	$access = mysqli_real_escape_string($con,$_POST['access']);
	$date=date('Y-m-d');
	$month=date('F');
	$day=date('d');
	$imgUrl = $_FILES['imgUrl']['name'];
	$imgdisplay =$imgUrl;
	$file_name_all="";
        for($i=0; $i<count($_FILES['imgUrl']['name']); $i++) 
        {
               $tmpFilePath = $_FILES['imgUrl']['tmp_name'][$i];    
               if ($tmpFilePath != "")
               {    
                   $path = "../../assets/files/post/"; // create folder 
                   $name = $_FILES['imgUrl']['name'][$i];
                   $size = $_FILES['imgUrl']['size'][$i];

                   list($txt, $ext) = explode(".", $name);
                   $file= time().substr(str_replace(" ", "_", $txt), 0);
                   $info = pathinfo($file);
                   $filename = $file.".".$ext;
									 $imgUrl2[]=$filename;
                   if(move_uploaded_file($_FILES['imgUrl']['tmp_name'][$i], $path.$filename)) 
                   { 
                      $file_name_all.=$filename."*";
                   }
             }
				}
	 if(sizeof($imgUrl2)==5){ //removed last entryin case of more than 4 images
		 $popedarray=array_pop($imgUrl2);
		 }
	 $imgUrl = implode(", ", $imgUrl2);
	
	$add1=mysqli_query($con,"INSERT INTO post (userId, content, imgUrl, access, date, month, day)
VALUES ('$userId', '$content', '$imgUrl', '$access', '$date', '$month', '$day')");
	
  if (!$add1)
  {
	
	 echo"<b>Error !</b> Please check again".mysqli_error($con);
	
	}
	else 
  {
	
    $userprofileinfo= mysqli_query($con,"SELECT * FROM user where id='$userId'");
    
    while($row2=mysqli_fetch_array($userprofileinfo)) {
      $profilepic1 = $row2['ImageUrl'];
      $loginType1 = $row2['loginType'];
      $thisuserfirstname = $row2['firstname'];
      $thisuserlastname = $row2['lastname'];
		}
		?>
    <div class="post-item"> 
      <!-- single post -->
      <div class="delete"><a href="main-update.php" class="simpleConfirm btn-primary"><i class="fa fa-times"></i></a></div>
      <div class="post-owner"> 
				<?php if($loginType1=='default'){ ?>
          <?php if($profilepic1=='' || $profilepic1=='default'){ ?>
            <img src="assets/img/user-pic.jpg" alt=""  />
          <?php } else { ?>
                    <img src="assets/files/profile/<?php echo $profilepic1 ;?>" alt=""  />
        <?php } } else { ?> 
           <?php if($profilepic1=='' || $profilepic1=='default'){ ?>
            <img src="assets/img/user-pic.jpg" alt=""  />
            <?php } else { ?>
          <img src="<?php echo $profilepic1 ;?>" alt=""  />
        <?php } }?>
        <div>
            <p><a href="profile.php?user=<?php echo $username; ?>" class="bluelink"><?php echo $thisuserfirstname.'&nbsp;'.$thisuserlastname?></a></p>
            <time><?php echo $row['month'].''.$row['day'] ?></time> <time><?php echo $month.''.$day ?></time>
        </div>
      </div>
      <div class="post-content">
        <p><?php echo $content; ?></p>
        <div class="post-thumb clearfix">
        <?php 
          $araycount=count($imgUrl2);
          foreach ($imgUrl2 as $value) { ?>
          <img src="assets/files/post/<?php echo $value; ?>" alt=""  /> 
          <?php
          }
        ?>
      </div>
      <div class="post-comments"> 
                	<a href="#"><i class="fa fa-comment"></i>Comments</a>. 
                  <div id="likeup<?php echo $pid; ?>" style="display:inline-block;"> 
										<?php 
                    $tblname='postlikes';
                    $checklike = mysqli_query($con,"SELECT * FROM postlikes where userId='$userId' AND postId='$pid'");
                    $likecheck=mysqli_num_rows($checklike);
                    if($likecheck >= 1){ ?> 
                      <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a> 
                    <?php } else { ?>
                      <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a> 
                    <?php }?>
                  </div> 
                    <a href="#" class="simpleConfirm">Report</a>
                  </div>
      <div class="row">
                    <div class="coments-box white">
                      <?php
											$userId = $_SESSION['userid'];
                      $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");
											while($row2=mysqli_fetch_array($userinfo2)){
												$thisuserid3 = $row2['id'];
												$profilepic3 = $row2['ImageUrl'];
												$loginType3 = $row2['loginType'];
											}
											?>
                      <div class="text-area"> 
                         <?php if($loginType3=='default'){ ?>
												<?php if($profilepic3=='' || $profilepic3=='default'){ ?>
                          <img src="assets/img/user-pic.jpg" alt=""  />
                        <?php } else { ?>
                                  <img src="assets/files/profile/<?php echo $profilepic3 ;?>" alt=""  />
                      <?php } } else { ?> 
                         <?php if($profilepic3=='' || $profilepic3=='default'){ ?>
                          <img src="assets/img/user-pic.jpg" alt=""  />
                          <?php } else { ?>
                        <img src="<?php echo $profilepic3 ;?>" alt=""  />
                      <?php } }?>
                        <form onsubmit="sumitcomment(<?php echo $pid; ?>);" action="javascript:void(0);" id="comment-form<?php echo $pid; ?>">
                          <textarea name="comment" class="comentbox" placeholder="Comments here" required></textarea>
                          <input type="hidden" name="postid" value="<?php echo $pid; ?>"  />
                          <input type="hidden" name="thisuserid" value="<?php echo $userId; ?>"  />
                          <input type="hidden" name="targetedtable" value="postcomment"  />
                          <a href="javascript:void(0);" class="post">
                            <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                          </a>
                        </form>
                      </div>
                     
                        <?php


												 $thispostcomment= mysqli_query($con,"SELECT * FROM postcomment where postId='$pid' order by id DESC");
												 $row_cnt = mysqli_num_rows($thispostcomment);
                      $muV="";
                      if($row_cnt>2)
                          $muV="style='display:none'";

                        
                         ?>
                        <div id="commentwrap<?php echo $pid; ?>"   >
                            <?php

                            $iter=0;
                            while($row=mysqli_fetch_array($thispostcomment)){

                                $iter++;
                                if($iter==3)
                                {
                                    if($muV!="")
                                    {
                                        echo "<a class='kkk' id='viewComment$pid' >Load More Comments</a>";
                                        echo " <div id='commentwrap2-$pid'  $muV   >";
                                    }




                                }

                        




													 $user_commented=$row['userId'];
													 $this_commentid=$row['id'];
													 $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
													 while($row2=mysqli_fetch_array($getusername)){
																	$thisusername2	=$row2['username'];
																	$profilepic2 = $row2['ImageUrl'];
																	$loginType2 = $row2['loginType'];

                                                         $thisuserfirstname3 = $row2['firstname'];
                                                         $thisuserlastname3 = $row2['lastname'];

													 }
											  ?>
                         <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">

                             <?php
                             if($user_commented==$userId) {
                                 ?>
                                 <div class="delete"><a
                                         onclick="if (confirm('Are you sure...?')) delitem2('postcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false"
                                         href="javascript:void(0);" class="btn-primary">x</a></div>


                                 <?php

                             }

                             if($loginType2=='default'){ ?>
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
                              <p><a href="profile.php?user=<?php echo $thisusername2; ?>" class="bluelink"><?php echo $thisuserfirstname3.'&nbsp;'.$thisuserlastname3; ?></a><?php echo " ".$row['content']; ?></p>
                              <div class="action">
                              <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
                            </div>
                          </div>
                         </div> 
											  <?php } 
                         if($iter>=3)
                            {
                                echo "</div>";
                            }
                        
                        ?>
    </div>
  </div>
   <?php
		}
header("Location: http://biscle.com/wall");
die(); 
  



?>