<?php
  include('../connection.php');

  session_start();
  if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    $logged=true;
  }else $logged=false;
if($logged)
	error_reporting(E_ALL);
	$userType = mysqli_real_escape_string($con,$_REQUEST['userType']);
	$country = mysqli_real_escape_string($con,$_REQUEST['country']);
	$industry = mysqli_real_escape_string($con,$_REQUEST['industry']);
    $industry1 = mysqli_real_escape_string($con,$_REQUEST['industry']);
	$searchtext=mysqli_real_escape_string($con, $_REQUEST['searchtext']);
	$userId = $_SESSION['userid'];
	$username = $_SESSION['username'];
  $where="";
   
  $q="select * from
(SELECT id,'br' type,userid FROM buyrequest where ('$userType'='All' OR '$userType'='Post') 
and ('$country' like '0' || country like '$country%' ) and ('$industry' like '0' || industry like '$industry%' ) 
and (title like '%$searchtext%' or description like '%$searchtext%') union

SELECT p.id,'user' type,p.userid FROM profile p inner join user u on p.userid=u.id 
left join settings s on p.userid=s.userid  
where  ('$userType'='All'|| businessType is null OR ('$userType'<>'Post' AND businesstype like '%$userType%' )) and (opentoSearch=1 OR opentosearch is null) and 
('$country' like '0' || country like '$country%' || country is null )and ('$industry' like '0' || industry like '$industry%' || industry is null) and (firstname like '$searchtext%' or lastname like '$searchtext%' or username  like '$searchtext%') ) p1
"; 
//echo $q; 
  $res=mysqli_query($con,$q);
  while($rowM=mysqli_fetch_assoc($res)){
      $type=$rowM["type"];
      if($type=="user"){
          $qP="SELECT * FROM profile where id='{$rowM['id']}'";
          $resP=mysqli_query($con,$qP);
          $row2=mysqli_fetch_assoc($resP);
          $qU="SELECT * FROM user where id='{$rowM['userid']}'";
          $resU=mysqli_query($con,$qU);
          $row3=mysqli_fetch_assoc($resU);
          include("../account-strip.php");
      }else if($type=="br") {
          $qP="SELECT * FROM buyrequest where id='{$rowM['id']}'";
          $resP=mysqli_query($con,$qP);
          $row=mysqli_fetch_assoc($resP);
          $isSearch=true;
          include("../post/buy-post.php");
      }
  }
  
  ?>