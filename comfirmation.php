<?php include('includes/header.php'); ?>
    <section id="middle">
    	<div class="container">
            <div class="info-sheet">
            	
                <div class="info-table packages">
                	<h1>Success !!!</h1>
                  <p class="green-txt lrgtxt">You have purchased the package successfully. you can always see your balane in your my-info tab.</p>
                  
                  <div class="col-lg-12">
                    <div class="row">
                      
                    </div>
                  </div>
                  
                </div> 
                
            </div>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>

<?php
	
$buyeruserid = $_SESSION["buyeruserid"];
$packageid = $_SESSION["packageid"];
if($packageid==2){
  $package='Basic';
	$balance='$2';
	$msg_remaining='1';
	$today_remain_msg='1';
}
if($packageid==3){
  $package='Premium';
	$balance='$25';
	$msg_remaining='4';
	$today_remain_msg='4';
}
if($packageid==4){
  $package='Premium Plus';
	$balance='$20';
	$msg_remaining='4';
	$today_remain_msg='4';
}
$dat=date("Y-m-d");
	 
	
$update=mysqli_query($con,"INSERT INTO packages (userid, package, date, balance, msg_remaining, today_remain_msg) VALUES ('$buyeruserid', '$package', '$dat', '$balance', '$msg_remaining', '$today_remain_msg')");

if($update){
	
$_SESSION["buyeruserid"]='';
$_SESSION["packageid"]='';; 
	
	

}

else{
die(mysqli_error($con));
}

?>