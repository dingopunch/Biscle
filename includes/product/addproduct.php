<?php
  include('../connection.php');
  ini_set("display_error",1);
  error_reporting(E_ALL);
  session_start();
  $userId = $_SESSION['userid'];
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$description = /*mysqli_real_escape_string($con,*/urldecode($_POST['description']);
	$access = mysqli_real_escape_string($con,$_POST['access']);
	$pid = (isset($_POST['pid']))?mysqli_real_escape_string($con,$_POST['pid']):''; 
    $pics = $_POST['pics'];
	$date=date('Y-m-d');
	$imageUrl="";
	$file_name_all=""; 
       foreach ($pics as $key => $value) {
           # code...
           $imageUrl.=trim(urldecode($pics[$key])).","; 
       }
       $imageUrl=substr($imageUrl,0,strlen($imageUrl)-1);
	 /*if(sizeof($imgUrl2)==10){ //removed last entryin case of more than 4 images
		 $popedarray=array_pop($imgUrl2);
		 }*/
		//$imageUrl = implode(", ", $imgUrl2); 
		$pcol="";
		$pval="";
		if(!empty($pid)&&strlen($pid)>0){
			$pcol='id,';
			$pval="'$pid',";
		}
	$add1=mysqli_query($con,"INSERT INTO products ($pcol userId, title, description, access, imageUrl, date)
VALUES ($pval '$userId', '$title', '$description', '$access', '$imageUrl', '$date')
 
ON DUPLICATE KEY UPDATE 
title='$title', description='$description', access='$access', imageUrl='$imageUrl', date='$date'


");/*
echo "INSERT INTO products (id,userId, title, description, access, imageUrl, date)
VALUES ('$pid','$userId', '$title', '$description', '$access', '$imageUrl', '$date')
 
ON DUPLICATE KEY UPDATE 
title='$title', description='$description', access='$access', imageUrl='$imageUrl', date='$date'

 
";*/
	if (!$add1){
		
		echo"<b>Error !</b> Please check again".mysqli_error($con);
		
		}
		
		
	else { 
		?>
  Saved...
		<?php
		}	

  



?>