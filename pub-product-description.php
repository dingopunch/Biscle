<?php include('includes/header-public.php'); ?>
<?php
  
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
            <div class="col-md-3"></div>
            <div class="col-md-6"> 
              
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <?php //include('includes/leftbar.php');?>
          <div class="col-md-8">
            <div class="sprod1" style="padding:0;">
              <div class="product-create"> <a href="#" class="create btn no-border"><?php echo $title; ?></a> <a href="#" class="edit btn"><i class="fa fa-angle-double-down"></i></a> </div>
              <div class="product-details">
                <textarea class="ckeditor" name="description"><?php echo $description22; ?></textarea>
               <?php //<p> echo $description22; </p>?> 
              </div> 
              <div class="product-grid">
                <?php if($imageUrl!='' || $imageUrl!='default'){
									$araycount=count($imageUrl);
									$imgUrl2 = (explode(",", $imageUrl));
									foreach ($imgUrl2 as $value) { ?>
									<div class="col-md-4">
                  <div class="thumb"> 
                  <a class="fancybox-buttons" data-fancybox-group="button" href="assets/files/products/<?php echo trim($value); ?>">
                    <div class="imgsize">
                      <img src="assets/files/products/<?php echo trim($value); ?>" alt=""  />
                    </div>
                  </a>
                  <style>
                    
                    #cke_1_top,#cke_1_bottom{
                      display:none !important;
                    }
                    
                  </style>
                <script>  jq(document).ready(function(){
                  jq(".product-create").click(function(){
                    CKEDITOR.instances['description'].setReadOnly(true);
                    jq("#cke_1_top").css("display","none");
                    jq("#cke_1_bottom").css("display","none");
                });
              
            
          });</script> 
                    <h1><?php echo $title; ?></h1> 
                  </div>
                </div> 
								<?php } } ?>
              </div>
            </div>
          </div>
          <?php //include('includes/rightbar.php');?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php');?>