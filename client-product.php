<?php  ?>
<?php 
session_start();
  $user=$_SESSION['clientuser'];
  if(isset($_SESSION['userid'])){
	  $userId = $_SESSION['userid'];
    $logged=true;
    include('includes/header.php');
  }else {
    $logged=false;
    include('includes/header-public.php');
  }
  $userinfo2 = mysqli_query($con,"SELECT * FROM user where username='$user'");  // get Client user info
	while($row2=mysqli_fetch_array($userinfo2)){
		$clientid = $row2['id'];
		$profilepic = $row2['ImageUrl'];
		$loginType = $row2['loginType'];
		$useremail=$row2['email'];
		$firstname = $row2['firstname'];
		$lastname = $row2['lastname'];
	}
	
	$userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$clientid'"); // get Client user profile info
	$company = '';
	$position = '';
	$country = '';
    $access = '';
	$state = '';
	$city = '';
	$businessType = '';
	$product = '';
	$industry = '';
	$description = '';
	$contact = '';
	$city = '';
	$access = '';
	while($row=mysqli_fetch_array($userprofileinfo)){
		
		$company = $row['company'];
		$position = $row['position'];
		$country = $row['country'];
		$state = $row['state']; 
		$city = $row['city'];
		$businessType = $row['businessType'];
		$product = $row['product'];
		$industry = $row['industry'];
		$description = $row['description'];
		$contact = $row['contact'];
		$city = $row['city'];
		$access = $row['access'];
		
	} 
?>

    <section id="middle">
      <div class="container">
      	<div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3">
            	<div class="row">
                    <div class="profile-info">
                        <div class="user-img-min">
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
                        </div>
                        <div class="user-mane-min">
                            <span>
                                <h2><?php echo $firstname.'&nbsp;'.$lastname; ?></h2>
                                <p><?php echo $company; ?></p>
                                <p><?php echo $country; ?></p>
                            </span>
                        </div>
                    </div>
                    <div class="user-btn">
                    	<ul class="clearfix">
                        	<li><a href="#"><i class="fa fa-phone"></i> Contact</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i> Friends</a></li>
                            <li><a href="#"><i class="fa fa-code-fork"></i> Follow</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="mainbar" > 
                <ul class="mainMenu profile-tab" >
                  <li><a  href="<?php echo $dir_path ?><?php echo $user; ?>/client-update"><i class="fa fa-upload">&nbsp;</i>Update</a> </li>
                  <li><a  href="<?php echo $dir_path ?><?php echo $user; ?>"><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li class="current"><a  href="<?php echo $dir_path ?><?php echo $user; ?>/client-product"><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                  <li><a  href="<?php echo $dir_path.$user ?>/client-history"><i class="fa fa-clock-o">&nbsp;</i>History</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
          	<div class="left-bar">
                <div class="user-img">
                  <div class="pic-edit">
                  </div>
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
                  <h1><?php echo $firstname.'&nbsp;'.$lastname; ?></h1>
                </div>
                <br />
              
                <div class="set-link">
                  <ul class="edit about">
                    <li><span>Country / Region</span><br />
                      <b><?php echo $country; ?></b></li>
                    <li><span>Company Name</span><br />
                      <b><?php echo $company; ?></b></li>
                    <li><span>Industry</span><br />
                      <b><?php echo $industry; ?></b></li>
                    <li><span>Product</span><br />
                      <b><?php echo $product; ?></b></li>
                    <li><span>Business Type</span><br />
                      <b><?php echo $businessType; ?></b></li>
                  </ul>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-grid" style="padding:0;">
              <div class="new_btn"> 
                <div style="display:none;" class="edit_btn"><a href="<?php echo $dir_path ?>edit-product" ><img src="assets/img/edit.png" alt="" style="width:63px;"  /></a></div>
                <div style="display:none;" class="add_btn"><a href="<?php echo $dir_path ?>add-product"><img src="assets/img/add.png" alt="" style="width:63px;"  /></a></div>
                <?php /*<div class="edit_btn" style="display:none"><a class="delbtn" href="delete-product.php" >Delete</a></div>*/?>
              </div>
              <div class="product-grid" id="prod1">
                <?php
								  $userproduct= mysqli_query($con,"SELECT * FROM products where userId='$clientid'");
                  while($row=mysqli_fetch_array($userproduct)){
										$pid=$row['id'];
										$title=$row['title'];
										$imageUrl=$row['imageUrl'];
								?>
                <?php if($row['imageUrl']!='' || $row['imageUrl']!='default'){
									$araycount=count($imageUrl);
									$imgUrl2 = (explode(",", $imageUrl));
							  } 
                              
                              ?>
                <div class="col-md-4 col-sm-6">
                    <?php
                    if($logged){
                      $checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' and userId2='$clientid') OR 
                      (userId2='$userId' and userId1='$clientid') ");
                        $followcount1=mysqli_num_rows($checkfriend);
                    }else $followcount1=0;
                      if($row['access']=="Public" || $followcount1>0 || $logged && $_SESSION['userid']==$clientid)
                    { ?>
                  <div class="thumb"> 
                  	<a href="<?php echo $dir_path ?><?php echo $user ?>/client-product-details/<?php echo $pid; ?>">
                    <h1 class="prod-title" style="display:none;    z-index: 9999999999999999;
    position: absolute;
    top: 12px;" ><?php echo $title; ?></h1>
                    <div class="imgsize">
                      <img src="assets/files/products/<?php echo $imgUrl2[0]; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"  />
                    </div>
                    </a>
                    
                  </div>
                  <?php }//else echo "Only Visible To Friends"; ?>
                </div>
               <?php } ?>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php');?>

<script type="text/javascript" src="album/src/jquery.fb.albumbrowser.js"></script>
<link rel="stylesheet" type="text/css" href="album/src/jquery.fb.albumbrowser.css">
<style>
 .thumb{
    height: 150px;
    width: 100%;
    overflow: hidden;
}
.thumb h1.prod-title{
  background:#0B648F;
  width:100% !important;
  color:#fff;
}

.imgsize{
  width:100%;
}

#prod1 .col-md-4.col-sm-6{
  margin: 0px;
    padding: 0px;
}
</style>
<script>
$(".thumb").on('mouseenter',function(evt){
ele=$(evt.target);
div=ele.closest('div.thumb');
div=$(div[0]);
tit=div.find('.prod-title');
img=div.find('.imgsize');
//tit.css('display','block');
tit.show(1000);
//img.css('top',tit.height()+'px');
console.log(tit);

}); 

$(".thumb").on('mouseleave',function(evt){
ele=$(evt.target);
div=ele.closest('div.thumb');
div=$(div[0]);
tit=div.find('.prod-title');
img=div.find('.imgsize');
tit.css('display','none');
tit.hide(2000);
//img.css('top',tit.height()+'px');
console.log(tit);

});

</script>