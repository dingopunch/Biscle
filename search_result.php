<?php include('includes/header2.php'); ?>
<?php include('includes/functions.php'); ?>
<?php
  $serchfield=$_REQUEST['search'];
?>
    <section id="middle">
      <div class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li><a href="user-home.php"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li class="current"><a href="user-update.php"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="my-wall.php"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="user-profile.php" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="user-product.php" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul>
                <div class="set-btn"> <a href="settings.php" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div> 
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <?php include('includes/leftbar.php'); ?>
          <div class="col-md-6">
            <div class="mainupd1">
              <div class="post-area">
                <form class="post-box" id="postupdate" action="includes/post/addpost.php" method="post" enctype="multipart/form-data">
                  <textarea class="content" name="content" placeholder="Make an update..."></textarea>
                  <div id="image-include"  style="display:none;" class="image-include">
                    <div id="upimg1" class="attach"> 
                      <img id="img1" src="assets/img/gallery/1.jpg" alt=""  /> 
                      <img id="loadingimg" class="loadingimg" src="assets/img/ajax-loader.gif" />
                      <div class="remove">X</div>
                    </div>
                    <div id="filediv" class="load-new">
                      <input name="imgUrl[]" class="" type="file" id="file"/>
                      <label for="file" class="plus-icon">+</label>
                    </div>
                    <input style="visibility:hidden;width:1px;height:1px;" type="button" id="add_more" class="upload" value="Add More Files"/>
                  </div>
                  <div class="post-btn">
                    <input class="attachimg addimg" type="file" name="imgUrl[]" value="" id="attach">
                    <label for="attach" class="post-icon"><i class="fa fa-picture-o"></i></label>
                    <a href="#" class="post">
                    <input  id="submitpost"  type="button" name="" value="Post">
                    </a>
                    <div class="shareto">
                      <select name="access">
                        <option>Public</option>
                        <option>Friends</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
              <div class="section-post wrap22">
                <div id="postupdate-result">
                </div>
                <?php
								$limit = 2; #item per page
							  $p = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
								# sql query
								# find out query stat point
								$start = ($p * $limit) - $limit;
								# query for p navigation
								$userId = $_SESSION['userid'];
								$username = $_SESSION['username'];
								$postcount=1;
								
								$getfriends= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' OR userId2='$userId' order by id DESC"); //select friends and followers
								while($row=mysqli_fetch_array($getfriends)){
										$senderid=$row['userId1'];
										$reciverid=$row['userId2'];
										if($postcount==2){
										  $userId=$_SESSION['userid'];	
										}
										elseif($senderid==$_SESSION['userid']){
										  $userId=$reciverid;	
										}elseif($reciverid==$_SESSION['userid']){
											$userId=$senderid;
										}
										
                $postinfo= mysqli_query($con,"SELECT * FROM post  where userId='$userId' and content LIKE '%$serchfield%' order by id DESC");
								$makepagination= "SELECT * FROM post  where userId='$userId' and content LIKE '%$serchfield%' order by id DESC"; //select pagination
								if( mysqli_num_rows($postinfo) > ($p * $limit) ){
									
									$next = ++$p;
									
								}

								$query = mysqli_query($con, $makepagination . " LIMIT {$start}, {$limit}");
								
								while($row=mysqli_fetch_array($query)){
									$pid=$row['id'];
								  $thisuserId	=$row['userId'];
								  $userprofileinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'");
									while($row2=mysqli_fetch_array($userprofileinfo)){
									  $thisusername	=$row2['username'];
										$thisuserfirstname = $row2['firstname'];
										$thisuserlastname = $row2['lastname'];
										$profilepic1 = $row2['ImageUrl'];
		                $loginType1 = $row2['loginType'];
									}
								?>
                <div id="postitme<?php echo $pid; ?>" class="post-item item22"> 
                  <!-- single post -->
                  <?php
										if($thisuserId==$_SESSION['userid']){
									?>
										<div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('post',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class=" btn-primary"><i class="fa fa-times"></i></a></div>
									<?php
										}
									?>
                  
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
                      <p><a href="profile.php?user=<?php echo $thisusername; ?>" class="bluelink"><?php echo $thisuserfirstname.'&nbsp;'.$thisuserlastname?></a></p>
                      <time><?php echo $row['month'].''.$row['day'] ?></time>
                    </div>
                  </div>
                  <div class="post-content">
                    <p><?php echo $row['content']; $imgUrl2=$row['imgUrl']; ?></p>
                    <div class="post-thumb clearfix">
											<?php if($row['imgUrl']!=''){
                        $araycount=count($imgUrl2);
                        $imgUrl2 = (explode(", ", $imgUrl2));
                        foreach ($imgUrl2 as $value) { ?>
                        <img src="assets/files/post/<?php echo $value; ?>" alt=""  /> 
                      <?php } } ?>
                    </div>
                  </div>
                  <div class="post-comments"> 
                	<a href="#"><i class="fa fa-comment"></i>Comments</a>. 
                  <div id="likeup<?php echo $pid; ?>" style="display:inline-block;"> 
										<?php 
                    $tblname='postlikes';
                    $checklike = mysqli_query($con,"SELECT * FROM postlikes where userId='$userId' AND postId='$pid'");
                    $likecheck=mysqli_num_rows($checklike);
                    if($likecheck >= 1){ ?> 
                      <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);">
                      <i class="fa fa-thumbs-up"></i>Liked</a> 
                    <?php } else { ?>
                      <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);">
                      <i class="fa fa-thumbs-up"></i>Like</a> 
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
											$isopentocomment=1;
											$checkthisusersettings= mysqli_query($con,"SELECT * FROM settings where userId='$thisuserId'");
											while($row22=mysqli_fetch_array($checkthisusersettings)){
	
												$isopentocomment=	$row22['opentoComment'];
											}
											?>
                      <div <?php if($isopentocomment != 1){ echo 'style="display:none;"';}?> class="text-area"> 
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
                          <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                          <input type="hidden" name="postid" value="<?php echo $pid; ?>"  />
                          <input type="hidden" name="thisuserid" value="<?php echo $userId; ?>"  />
                          <input type="hidden" name="targetedtable" value="postcomment"  />
                          <a href="javascript:void(0);" class="post">
                            <input id="submitcoment" class="postcomment" type="submit"  name="" value="Comment">
                          </a>
                        </form>
                      </div>
                      <div id="commentwrap<?php echo $pid; ?>">
                        <?php
												 $thispostcomment= mysqli_query($con,"SELECT * FROM postcomment where postId='$pid' order by id DESC");
												 while($row=mysqli_fetch_array($thispostcomment)){
													 $user_commented=$row['userId'];
													 $this_commentid=$row['id'];
													 $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
													 while($row2=mysqli_fetch_array($getusername)){
																	$thisusername2	=$row2['username'];
																	$thisuserfirstname2 = $row2['firstname'];
																	$thisuserlastname2 = $row2['lastname'];
																	$profilepic2 = $row2['ImageUrl'];
																	$loginType2 = $row2['loginType'];
													 }
											  ?>
                         <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                          <?php
														if($thisuserId==$_SESSION['userid']){
													?>
														<div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('postcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
                            
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
                            <p><span><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></span><?php echo $row['content']; ?></p>
                            <div class="action">
                              <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
                            </div>
                          </div>
                        </div> 
											  <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
								   }
									 $postcount++;
								}
								?>
                 <!--p navigation-->
								<?php if (isset($next)) { ?>
                <div class="nav">
                  <a href='search_result.php?p=<?php echo $next?>'>Next</a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<script src="assets/js/script.js"></script>
<script type="text/javascript">
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img1').attr('src', e.target.result);
								$('#image-include').show();
								setTimeout(function(){ $('#loadingimg').hide(); }, 2000);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#attach").change(function(){
        readURL(this);
    });
		
		function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img2').attr('src', e.target.result);
								$('#upimg12').show();
								setTimeout(function(){ $('#loadingimg2').hide(); }, 2000);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#attach2").change(function(){
        readURL2(this);
    });
		
		function cancelimg() {
			document.getElementById('pic-sample').style.display='none'
			document.getElementById('img-upload').value='';
		}
		function submit_register(){
		 $.ajax({
			 type: "POST",
			 url: "includes/register/register.php",
			 data: $("#form_register").serialize(),
		 beforeSend: function() {                                
		$("#register-result").html("");           
		 },
					 success: function(data){
			$("#register-result").html(data);
					 }
			});
		return false;
	}
	
</script>
<script type="text/javascript">
$(document).ready(function(){		
		$('#submitpost').click(function(){
				$('#postupdate').ajaxForm({
					target:'#postupdate-result',
				beforeSubmit:function(e){
				},
				success:function(data){
					$('.attachimg').val("");
					$('.content').val("");
					$('#img1').attr('src','');
					$('#img2').attr('src','');
					$('#image-include').hide();
					$('#upimg12').hide();
					$("#postupdate-result").html(data);
				},
				error:function(e){
				}
		}).submit();
	});
	
});
</script>