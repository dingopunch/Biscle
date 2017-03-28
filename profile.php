<?php 

session_start();
$user=$_REQUEST['user'];
	$_SESSION['clientuser']=$user;
  if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    $logged=true;
    if( urldecode($user)==$_SESSION['username']){
        header("LOCATION:  home");
        //echo "alp {$_SESSION['username']} : $user : ".urldecode($user);
    }
  }else $logged=false;
   // $cuserinfo2 = mysqli_query($con,"SELECT * FROM user where userid='{$_SESSION['userid']}'"); 
    
   // $crow=mysqli_fetch_array($cuserinfo2);
    //$cusername=$crow['username'];
    //echo "alp {$_SESSION['username']} : $user : ".urldecode($user);
    
//session_abort();
if($logged)
 include('includes/header.php'); 
 else include('includes/header-public.php');
?>

<?php  
	$userinfo2 = mysqli_query($con,"SELECT * FROM user where username='$user'");  // get Client user info
	while($row2=mysqli_fetch_array($userinfo2)){
		$clientid = $row2['id']; 
		$_SESSION['clientid'] = $clientid;
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
        $access = $row['access'];
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
                  <?php  echo '<li><a  href="'.$user.'/client-update"><i class="fa fa-upload">&nbsp;</i>Update</a> </li>';?>
                  <li class="current"><a  href=" "><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <?php  echo '<li><a  href="'.$user.'/client-product"><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>';?>
                  <?php echo  '<li><a  href="'.$user.'/client-history"><i class="fa fa-clock-o">&nbsp;</i>History</a> </li>';?>
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
                <?php if($logged)
               include('includes/buttons.php'); 
                else echo "";
                 
                            ?>
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
            <div class="profile-view" id="prof1">
              <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td><b>Account</b></td>
                    <td><?php 
                    if($logged){

                      $checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' and userId2='$clientid') OR userId2='$userId' and userId1='$clientid'");
                      $followcount1=mysqli_num_rows($checkfriend);
                    }else $followcount1=0;
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo $useremail; 
                    else echo "Only Visible to Friends...";
                    
                    ?></td>
                  </tr>
                  <tr>
                    <td><b>Profile Info</b></td>
                    <td><?php 
                    
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo wordwrap($description,59,"<br>\n");
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Company Name</b></td>
                    <td>&nbsp;&nbsp; <?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo $company;
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Industry</b></td>
                    <td><?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                   echo $industry;
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Country/Region</b></td>
                    <td>&nbsp;&nbsp;<?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo $country;
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Location</b></td>
                    <td><?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo $state.'&nbsp;,'.$city;
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Contact Info</b></td>
                    <td><?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                   echo $contact;  
                    else echo "Only Visible to Friends...";
                    ?></td>
                  </tr>
                  <tr>
                    <td><b>Business Area</b></td>
                    <td><?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo $businessType; 
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Product Types</b></td>
                    <td>&nbsp;<?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                    echo $product;
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                  <tr>
                    <td><b>Position</b></td>
                    <td><?php 
                    if(($access=="Public" || $followcount1>0) || ($logged && $_SESSION['userid']==$clientid))
                   echo $position;
                    else echo "Only Visible to Friends...";
                     ?></td>
                  </tr>
                </table>
            </div>  
          </div>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php');?>