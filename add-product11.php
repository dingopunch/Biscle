<?php include('includes/header.php'); ?>
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
            <div class="creat_product_n">
              <div class="add-product">
                <div class="descrip">
                  <form action="includes/product/addproduct.php" method="post" enctype="multipart/form-data">
                    <h1>Title:</h1>
                    <input type="text" name="title" class="prd_title_text_bx" id="product_title" />
                    <h1>Description:</h1>
                    <textarea name="description"></textarea>                    
                    <div id="filediv" class="load-newp">
                      <input name="imageUrl[]" class="" multiple onchange="hidethis();" type="file" id="file"/>
                      <label class="img-path" id="thisone" for="file"> Add Picture </label>
                    </div>
                    <input style="visibility:hidden;width:1px;height:1px;" type="button" id="add_more" class="upload" value="Add More Files"/>
                    
                    <div class="product-btn">
                      <div class="shareto">
                        <select name="access">
                              <option value="Public">Public</option>
                              <option value="Friends">Friends</option>
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
<script src="assets/js/script2.js"></script>
<script type="text/javascript">
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
								$('#pic-sample').show();
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

   function hidethis() {
	  	$("#thisone").hide(); 
	 }
</script>
<style>
    
    .abcd img{
        width: 100%;
        height: 100%;
    }
    .abcd{
          width: 150px;
            height: 150px;
    }
    
    </style>