<?php include('includes/header.php'); ?>
<?php 
  $userId = $_SESSION['userid'];
	$userinfo= mysqli_query($con,"SELECT * FROM user where id='$userId'");
	
	while($row=mysqli_fetch_array($userinfo)){
		$username=$row['username'];
		$useremail=$row['email'];
	}
	
	$userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$userId'");
	
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" > 
                <ul class="mainMenu" >
                  <li><a href="home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li><a href="update"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="wall"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li class="current"><a href="profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
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
            <div class="profile-view" style="padding:0;">
              <div class="new_btn">
                <div class="edit_pro_btn"><a href="edit"><img src="assets/img/edit_profile.png" alt="" style="width:135px;"  /></a></div>
              </div>
              <div class="profile-view">
                <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td><b>Account</b></td>
                    <td><?php echo $username; ?></td>
                  </tr>
                  <tr>
                    <td><b>Profile Info</b></td>
                    <td><?php echo wordwrap($description,59,"<br>\n") ?></td>
                  </tr>
                  <tr>
                    <td><b>Company Name</b></td>
                    <td>&nbsp;&nbsp; <?php echo $company; ?></td>
                  </tr>
                  <tr>
                    <td><b>Industry</b></td>
                    <td><?php echo $industry; ?></td>
                  </tr>
                  <tr>
                    <td><b>Country/Region</b></td>
                    <td>&nbsp;&nbsp;<?php echo $country; ?></td>
                  </tr>
                  <tr>
                    <td><b>Location</b></td>
                    <td><?php echo $state.'&nbsp;'.$city ?></td>
                  </tr>
                  <tr>
                    <td><b>E-Mail</b></td>
                    <td><?php echo $contact; ?></td>
                  </tr>
                  <tr>
                    <td><b>Business Types</b></td>
                    <td><?php echo $businessType; ?></td>
                  </tr>
                  <tr>
                    <td><b>Product Types</b></td>
                    <td>&nbsp;<?php echo $product; ?></td>
                  </tr>
                  <tr>
                    <td><b>Position</b></td>
                    <td><?php echo $position; ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>