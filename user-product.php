<?php include('includes/header.php'); ?>
<?php
  $userId = $_SESSION['userid'];
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
                  <li><a href="profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li class="current"><a href="user-product" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
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
            <div class="product-grid" style="padding:0;">
              <div class="new_btn">
                <div class="add_btn btn1"><a href="add-product">Add New Product</a></div>
               
              </div>
              <div class="product-grid" id="prod1">
                <?php
								  $userproduct= mysqli_query($con,"SELECT * FROM products where userId='$userId'");
                  while($row=mysqli_fetch_array($userproduct)){
										$pid=$row['id'];
										$title=$row['title'];
										$imageUrl=$row['imageUrl'];
								?>
                <?php if($row['imageUrl']!='' || $row['imageUrl']!='default'){
									$araycount=count($imageUrl);
									$imgUrl2 = (explode(",", $imageUrl));
							  } ?>
                <div class="col-md-4 col-sm-6">
                  <div class="new_btn">
                  <div class="edit_btn btn1"><a href="add-product1.php?pid=<?php echo $pid; ?>">Edit</a></div>
                   <div class="edit_btn btn1"><a class=""  onclick="if (confirm('Are you sure...?')) delitem('products',<?php echo $pid; ?>, 1); return false" href="javascript:void(0);" >
                        Delete
                     </a></div>
                   </div>
                  <div class="thumb"> 
                  	<a href="product-description.php?pid=<?php echo $pid; ?>">
                    <h1 class="prod-title" style="display:none;   z-index: 9999999999999999;
    position: absolute;
    top: 15px;"  ><?php echo $title; ?></h1>
                    <div class="imgsize">
                      <img src="assets/files/products/<?php echo trim($imgUrl2[0]); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"  />
                    </div>
                    </a> 
                    
                  </div>
                </div>
               <?php } ?>
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<script>$(".imgsize").imagefill(); </script>
<?php include('includes/footer.php'); ?>


<script type="text/javascript" src="album/src/jquery.fb.albumbrowser.js"></script>
<link rel="stylesheet" type="text/css" href="album/src/jquery.fb.albumbrowser.css">

<style>
 .thumb{
    height: 150px;
    width: 100%;
    overflow: hidden;
        position: relative;
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