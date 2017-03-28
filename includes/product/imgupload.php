<?php
  include('../connection.php');
  session_start();	
	echo $catchit=$_REQUEST['imgtemp'];
  $name=$_FILES['catchit']['name'];
	$size=$_FILES['catchit']['size'];
	$type=$_FILES['catchit']['type'];
	$temp=$_FILES['catchit']['tmp_name'];
	move_uploaded_file($temp,"../../assets/files/products/".$name);
	echo '<div  class="pic-sample"> <a class="simpleConfirm btn-primary" href="main-update.html"> <i class="fa fa-times"></i> </a> <a href="assets/img/1.jpg" data-lighter><img src="assets/files/products/'.$name.'" /> 
                      </a></div>';
?>