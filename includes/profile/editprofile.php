<?php
  include('../connection.php');
  session_start();
	error_reporting(0);
  $userId = $_SESSION['userid'];

$ok=true;
$qP="SELECT * FROM countries";
$resP=mysqli_query($con,$qP);
while($row2=mysqli_fetch_assoc($resP)){

	if($row2['title']==$_POST['country'])
	{
		$ok=false;
		break;
	}
}
if($ok==true)
{
	?>
	<script type="text/javascript">
		top.location.href = "<?php echo BASE_URL; ?>page404.php";
	</script>
	<?php

	die;
}

	$company = mysqli_real_escape_string($con,$_POST['company']);
	$position = mysqli_real_escape_string($con,$_POST['position']);
	$country = mysqli_real_escape_string($con,$_POST['country']);
	$state = mysqli_real_escape_string($con,$_POST['state']);
	$city = mysqli_real_escape_string($con,$_POST['city']);
  $businessType = implode(", ", $_POST['businessType']);
	$oldbusinessType = implode(", ", $_POST['oldbusinessType']);
	if($businessType==''){
	  $businessType=$oldbusinessType;
	}
	$product = mysqli_real_escape_string($con,$_POST['product']);
  $industry = implode(", ", $_POST['industry']);
	$description = mysqli_real_escape_string($con,$_POST['description']);
	$contact = mysqli_real_escape_string($con,$_POST['contact']);
	$city = mysqli_real_escape_string($con,$_POST['city']);
	$access = mysqli_real_escape_string($con,$_POST['access']);
	$userprofileinfo = mysqli_query($con,"SELECT * FROM profile where userId='$userId'");
	$rowcount=mysqli_num_rows($userprofileinfo);
	if($rowcount>=1){
		$add1=mysqli_query($con,"UPDATE profile SET company='$company', position='$position', country='$country', state='$state', city='$city', businessType='$businessType', product='$product', industry='$industry', description='$description', contact='$contact', access='$access' WHERE userId='$userId'");
	}else {
	$add1=mysqli_query($con,"INSERT INTO profile (userId, company, position, country, state, city, businessType, product, industry, description, contact, access)
VALUES ('$userId', '$company', '$position', '$country', '$state', '$city', '$businessType', '$product', '$industry', '$description', '$contact', '$access')");
	}
	if (!$add1){
		  echo"<b>Error !</b> Please check again".mysqli_error($con);
		}
	else {
		?>
<script type="text/javascript">
  top.location.href = "<?php echo BASE_URL; ?>profile";
</script>
		<?php
		}	
?>