<?php include('includes/header.php'); ?>
<?php
  $userId = $_SESSION['userid'];
	$userproduct= mysqli_query($con,"SELECT * FROM products where userId='$userId'");
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
                  <li><a href="user-update.php"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
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
            <div class="product-grid" style="padding:0;">
              <div class="new_btn">
                
              </div>
              
              <div class="product-grid">
               <?php
                  while($row=mysqli_fetch_array($userproduct)){
										$pid=$row['id'];
										$title=$row['title'];
										$imageUrl=$row['imageUrl'];
								?>
                <?php if($row['imageUrl']!='' || $row['imageUrl']!='default'){
									$araycount=count($imageUrl);
									$imgUrl2 = (explode(",", $imageUrl));
							  } ?>
                <a href="add-product1.php?pid=<?php echo $pid; ?>"> 
                <div class="col-md-4 col-sm-6 sel_prd" id="div_<?php echo $pid; ?>_mn">
                  <div class="thumb" onclick="edit_product(<?php echo $pid; ?>);"> 
                  <div class="imgsize">
                  <img id="prd_src_<?php echo $pid; ?>" src="assets/files/products/<?php echo trim($imgUrl2[0]); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"  />
                  </div>
                    <h1 id="prd_name_1"><?php echo $title; ?></h1>
                    <textarea style="display:none;" id="prd_ds_1"><?php echo $description; ?></textarea>
                  </div>
                </div>
                </a>
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