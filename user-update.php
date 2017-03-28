<?php include('includes/header.php'); ?>
<?php error_reporting(E_ALL);ini_set("display_errors",1); ?>
    <section id="middle">
      <div class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li><a href="home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li class="current"><a href="update"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="wall"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="product" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul>
                <div class="set-btn"> <a href="settings" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div> 
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <?php include('includes/leftbar.php'); ?>
          <div class="col-md-6">
            <div class="mainupd1">

              <div class="section-post wrap22">
                <div style="display:none;" id="postupdateRslt">
                </div>

                  <?php
                  $limit = 20; #item per page
                  $p = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
                  # sql query
                  # find out query stat point
                  $start = ($p * $limit) - $limit;
                  # query for p navigation



                  $userId = $_SESSION['userid'];
                  $username = $_SESSION['username'];
                  $likedpost= mysqli_query($con,"Select * From (SELECT post.id,post.userId,post.date,post.content,post.imgUrl,post.access,post.month,post.day,post.status FROM post join friend WHERE(( post.userId=friend.userId1 or post.userId=friend.userId2) and ( friend.userId1='$userId' or friend.userId2='$userId')) UNION SELECT post.id, post.userId,post.date,post.content,post.imgUrl,post.access,post.month,post.day,post.status From post join follower where post.userId=follower.userId1 and post.userId='$userId'  ) as x ORDER by x.date desc");


                  $makepagination= "Select * From (SELECT post.id,post.userId,post.date,post.content,post.imgUrl,post.access,post.month,post.day,post.status FROM post join friend WHERE(( post.userId=friend.userId1 or post.userId=friend.userId2) and ( friend.userId1='$userId' or friend.userId2='$userId')) UNION SELECT post.id, post.userId,post.date,post.content,post.imgUrl,post.access,post.month,post.day,post.status From post join follower where post.userId=follower.userId1 and post.userId='$userId'  ) as x ORDER by x.date desc"; //select pagination
                  if( mysqli_num_rows($likedpost) > ($p * $limit) ){

                      $next = ++$p;

                  }

                  $quer = mysqli_query($con,$makepagination. " LIMIT {$start}, {$limit} ");

              if($start<=mysqli_num_rows($likedpost)){
                  while(($likedrow=mysqli_fetch_array($quer))){

                      $likedpid=$likedrow['id'];

                          $postinfo= mysqli_query($con,"SELECT * FROM post  where id='$likedpid' order by id DESC");
                          while($row=mysqli_fetch_array($postinfo)){
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
                              <div id="home1<?php echo $pid; ?>" class="post-item item22">
                                  <!-- single post -->
                                  <div class="delete"  <?php if($thisuserId!=$userId){echo "style='display:none'";} ?>><a onclick="if (confirm('Are you sure...?')) delhistory('likedhistory', <?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class=" btn-primary"><i class="fa fa-times"></i></a></div>
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
                                                  <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
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
                                          <div id="commentwrap<?php echo $pid; ?>"  >

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
                                                      $thisuserfirstname2 = $row2['firstname'];
                                                      $thisuserlastname2 = $row2['lastname'];
                                                      $profilepic2 = $row2['ImageUrl'];
                                                      $loginType2 = $row2['loginType'];
                                                  }
                                                  ?>
                                                  <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                                                      <div class="delete olD" style="top: auto;<?php if($user_commented!=$userId){echo "display:none;";} ?>"><a onclick="if (confirm('Are you sure...?')) delitem2('postcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
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
                                              <?php }

                                              if($iter>=3)
                                              {
                                                  echo "</div>";
                                              }


                                              ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <?php }?>






                  <?php } }?>
              </div>
                <?php if (isset($next)) { ?>
                    <div class="nav">
                        <a href='user-update.php?p=<?php echo $next?>'>Next</a>
                    </div>
                <?php } ?>

            </div>
          </div>
            <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<script src="assets/js/script.js"></script>
<script src="assets/js/pages/user-update.js"></script>
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
                    $('.section-post').prepend("<div class='post-item'>"+data+"</div>");
                   // $("#postupdate-result").html();
				   location.reload();
				},
				error:function(e){
				}
		}).submit();
	});
	
});
</script>