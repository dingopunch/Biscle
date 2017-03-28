<?php
function insertCountries2($con){
	$qP="SELECT * FROM countries";
	$resP=mysqli_query($con,$qP);
	echo "<select name='country'><option value=''>Please Select a country</option>";
	while($row2=mysqli_fetch_assoc($resP)){
		echo "<option value='{$row2['title']}' >{$row2['title']}</option>";
	}
	echo "</select>";
}
function insertCountries($con){
    $qP="SELECT * FROM countries";
          $resP=mysqli_query($con,$qP);
          echo "<select name='country' required><option value=''>Please Select a country</option>";
          while($row2=mysqli_fetch_assoc($resP)){
              echo "<option value='{$row2['title']}' >{$row2['title']}</option>";
          }
          echo "</select>";
}
function insertIndustries2($con){
	$qP="SELECT * FROM industries";
	$resP=mysqli_query($con,$qP);
	echo "<select name='industry'><option value=''>Please Select Industry</option>";
	while($row2=mysqli_fetch_assoc($resP)){
		echo "<option value='{$row2['title']}' >{$row2['title']}</option>";
	}
	echo "</select>";
}
function insertIndustries($con){
    $qP="SELECT * FROM industries";
          $resP=mysqli_query($con,$qP);
          echo "<select name='industry' required><option value=''>Please Select Industry</option>";
          while($row2=mysqli_fetch_assoc($resP)){
              echo "<option value='{$row2['title']}' >{$row2['title']}</option>";
          }
          echo "</select>";
}
 /* session_start();
	error_reporting(0);
	$con2=mysqli_connect("localhost","biscl_ars","ddA0h83%","biscleco_ars");
  $userId = $_SESSION['userid'];
	$userinfo= mysqli_query($con2,"SELECT * FROM settings where userId='$userId'");
	
	while($row=mysqli_fetch_array($userinfo)){
	  $_SESSION['blockedusers'] =	$row['blockedusers'];
		$_SESSION['opentoSearch'] =	$row['opentoSearch'];
		$_SESSION['opentoComment'] =	$row['opentoComment'];
		$_SESSION['emailtoFriend'] =	$row['emailtoFriend'];
		$_SESSION['emailtoMessage'] =	$row['emailtoMessage'];
		$_SESSION['openFnF'] =	$row['openFnF'];
		$_SESSION['openBuypost'] =	$row['openBuypost'];
	}
	
	$userprofileinfo= mysqli_query($con2,"SELECT * FROM profile where userId='$userId'");
	
	while($row=mysqli_fetch_array($userprofileinfo)){
		
		$company22 = $row['company'];
		$position22 = $row['position'];
		$country22 = $row['country'];
		$state22 = $row['state'];
		$city22 = $row['city'];
		$businessType22 = $row['businessType'];
		$product22 = $row['product'];
		$industry22 = $row['industry'];
		$description22 = $row['description'];
		$contact22 = $row['contact'];
		$city22 = $row['city'];
		$access22 = $row['access'];
		
	}*/
?>