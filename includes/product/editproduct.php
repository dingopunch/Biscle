<?php
  include('../connection.php');
  session_start();
  $userId = $_SESSION['userid'];
	 $title = mysqli_real_escape_string($con,$_POST['title']);
	 $description = mysqli_real_escape_string($con,$_POST['description']);
	 $access = mysqli_real_escape_string($con,$_POST['access']);
	 $proid=$_POST['proid'];
	 $date=date('Y-m-d');
	//$name=$_FILES['imageUrl']['name'];
	//if($name==''){
//		
//		echo 'khali ha';
//		
//		}else {
	//$imageUrl='image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';		
//	$size=$_FILES['imageUrl']['size'];
//  $type=$_FILES['imageUrl']['type'];
//  $temp=$_FILES['imageUrl']['tmp_name'];
//  move_uploaded_file($temp,"../../assets/files/products/".$imageUrl);
//	
//	$update=mysqli_query($con,"UPDATE products SET title='$title', description='$description', access='$access', date='$date' WHERE id='$proid'");
//			
//			}
  
	$update=mysqli_query($con,"UPDATE products SET title='$title', description='$description', access='$access', date='$date' WHERE id='$proid'");
	
	if (!$update){
		
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		
		}
		
		
	else {
		?>
        
<script type="text/javascript">
  top.location.href = "<?php echo BASE_URL; ?>edit-product.php";
</script>

		
		<?php
		}	

  



?>