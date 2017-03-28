<?php
  include('../connection.php');
  session_start();
  $userId = $_SESSION['userid'];
	
	$profilepic = $_FILES['profilepic']['name'];
	$imgname='image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
	$size=$_FILES['profilepic']['size'];
	$type=$_FILES['profilepic']['type'];
	$temp=$_FILES['profilepic']['tmp_name'];
	move_uploaded_file($temp,"../../assets/files/profile/".$imgname);
	chmod("../../assets/files/profile/".$imgname, 0777);
	
	$add1=true;
		
	
	if (!$add1){
		
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		
		}
		
		
	else {
       ?>
         <img src="assets/files/profile/<?php echo $imgname; ?>" alt=""  />
       <?php
		}	
?>