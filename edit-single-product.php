<?php include('includes/header.php'); ?>
<?php
  $userId = $_SESSION['userid'];
	$proid = $_REQUEST['pid'];
	$userproduct= mysqli_query($con,"SELECT * FROM products where id='$proid'");
	 while($row=mysqli_fetch_array($userproduct)){
			$pid=$row['id'];
			$title=$row['title'];
			$imageUrl=$row['imageUrl'];
			$description2=$row['description'];
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

            <div class="creat_product_n">              <div class="add-product">
                <div class="descrip">
                  <form action="includes/product/editproduct.php" method="post" enctype="multipart/form-data">
                    <h1>Title:</h1>
                    <input type="text" name="title" value="<?php echo $title; ?>" class="prd_title_text_bx" id="product_title" />
                    <input type="hidden" name="proid" value="<?php echo $pid; ?>" class="prd_title_text_bx" />
                    <h1>Description:</h1>
                    <textarea name="description"><?php echo $description2; ?></textarea>
                   <!-- <input type="file" name="imageUrl[]" value="Upload" id="img-upload"  />                   
                    <label class="img-path" for="img-upload"> Add Picture </label>-->
                    <!--<div  id="pic-sample">
                      <div  class="pic-sample"><a onclick="cancelimg();" class="btn-primary cancelbtn" href="javascript:void(0);"> <i class="fa fa-times"></i> </a> 
                        <a class="preimg" href="assets/img/1.jpg" data-lighter><img id="blah" src="assets/files/products/<?php //echo $imageUrl; ?>" /> <img id="loadingimg" style="display:none;" src="assets/img/ajax-loader.gif" />
                        </a>
                      </div>
                    </div>-->
                    <div class="product-btn">
                      <div class="shareto">
                        <select name="access">
                          <option>Public</option>
                          <option>Friends</option>
                        </select>
                      </div>
                      <label>
                        <input type="button" name="" value="Cancel" class="cancel"  />
                      </label>
                      <label>
                        <input type="submit" name="" value="Save" class="save" />
                      </label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
								$('#pic-sample').show();
								$('#loadingimg').show();
								setTimeout(function(){ $('#loadingimg').hide(); }, 2000);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#img-upload").change(function(){
        readURL(this);
    });
		
		function cancelimg() {
			document.getElementById('pic-sample').style.display='none'
			document.getElementById('img-upload').value='';
		}
		//$.post("includes/product/imgupload.php",{imgtemp:catchit},function(ajaxresult){
//			$('#pic-sample').html(ajaxresult);
//		});
</script>