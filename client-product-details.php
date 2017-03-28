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
	
	$proid = $_REQUEST['pid'];
	$userproduct= mysqli_query($con,"SELECT * FROM products where id='$proid'");
	 while($row=mysqli_fetch_array($userproduct)){
			$pid=$row['id'];
			$title=$row['title'];
			$imageUrl=$row['imageUrl'];
			$description22=$row['description'];
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
                  <li><a  href="../client-update"><i class="fa fa-upload">&nbsp;</i>Update</a> </li>
                  <li><a  href="../../<?php echo $user; ?>"><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li class="current"><a  href="../client-product"><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                  <li><a  href="../client-history"><i class="fa fa-clock-o">&nbsp;</i>History</a> </li>
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
            <div class="sprod1" style="padding:0;">
              <div class="product-create"> <a href="#" class="create btn no-border"><?php echo $title; ?></a> <a href="#" class="edit btn"><i class="fa fa-angle-double-down"></i></a> </div>
              <div class="product-details">
                <p><?php echo $description22; ?></p>
              </div>
              <div class="product-grid">
                <?php if($imageUrl!='' || $imageUrl!='default'){
									$araycount=count($imageUrl);
									$imgUrl2 = (explode(",", $imageUrl));
									foreach ($imgUrl2 as $value) { ?>
									<div class="col-md-4">
                  <div class="thumb"> 
                  <a class="fancybox-buttons" data-fancybox-group="button" href="assets/files/products/<?php echo $value; ?>">
                    <div class="imgsize">
                      <img src="assets/files/products/<?php echo $value; ?>" alt=""  />
                    </div>
                  </a>
                    <h1></h1>
                  </div>
                </div> 
								<?php } } ?>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php');?>