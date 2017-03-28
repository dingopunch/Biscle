<?php include('includes/header-public.php'); ?>

    <section id="middle">
      <div class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <h1>Products</h1>
            </div> 
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <?php //include('includes/leftbar.php'); ?>
          <div class="col-md-2" ></div>
          <div class="col-md-9">
            <div class="product-grid" style="padding:0;">
              <div class="new_btn">
                
              </div>
              <div class="product-grid" id="prod1">
                <?php
								  $userproduct= mysqli_query($con,"SELECT * FROM products ");
                  while($row=mysqli_fetch_array($userproduct)){
										$pid=$row['id'];
										$title=$row['title'];
										$imageUrl=$row['imageUrl'];
								?>
                <?php if($row['imageUrl']!='' || $row['imageUrl']!='default'){
									$araycount=count($imageUrl);
									$imgUrl2 = (explode(",", $imageUrl));
							  } ?>
                <div class="col-md-4 col-sm-6 ">
                  <div class="new_btn">
                  
                   </div>
                  <div class="thumb"> 
                  	<a href="pub-product-description.php?pid=<?php echo $pid; ?>">
                    <div class="imgsize" style="margin: auto;" >
                      <img src="assets/files/products/<?php echo trim($imgUrl2[0]); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"  />
                    </div>
                    </a> 
                    <h1 class="col-sm-12" style="
    word-break: break-all;
" ><?php echo $title; ?></h1>
                  </div>
                </div>
               <?php } ?>
              </div>
            </div>
          </div>
          <?php //include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<script>$(".imgsize").imagefill(); </script>
<?php include('includes/footer.php'); ?>