<?php include('includes/header.php'); ?>

<?php /*<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Direct Messaging</title>
    
    
    <link rel="stylesheet" href="assets/dmessage1/css/reset.css">

    
        <link rel="stylesheet" href="assets/dmessage1/css/style.css">
 
    
    
    
  </head>*/ 
  
include "IPN/php/functions.php"; 
$userId = $_SESSION['userid'];
if(isset($_GET['new']))
{
    /*$qCheck="SELECT * FROM user WHERE username='".$_GET['new']."'";
    echo $qCheck;
    $qRes=mysqli_query($con,$qCheck);
    $qRow=mysqli_fetch_assoc($qRes);
    $_REQUEST['new']=$qRow['id'];
    $_GET['new']=$qRow['id']; */
    $clientid = $_REQUEST['new']; 
	$checkfriend= mysqli_query($con,"SELECT * FROM friend where (userId1='$userId' and userId2='$clientid') OR userId2='$userId' and userId1='$clientid'");

	$followcount1=mysqli_num_rows($checkfriend);
	if(!($followcount1>0)){
		if (useDirectConnection ($userId) != true) {
			echo '<script>window.location = "no-direct-connection.php"; </script>';
			exit;
		}				
	}
}

	
	
  ?>
  <body> 
<link rel="stylesheet" href="assets/dmessage1/css/reset.css">
<link rel="stylesheet" href="assets/dmessage1/css/style.css">
    
    <div style="padding-top:100px;" class="container">
        <div class="left">
            <div class="top">
                <input name="search" type="text" />
                <a href="javascript:;" style=" display:none" class="search"></a>
            </div>
            <ul class="people">
                
            </ul>
            <ul style="display:none" class="people search">
                
            </ul>
        </div>
        <div class="right">
            <div class="top"><span><span class="name"></span></span><a name="btn-delete">Delete All</a></div>
            <div class="chat" data-chat="person1">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
                <div class="bubble you">
                    Hello,
                </div>
                <div class="bubble you">
                    it's me. 
                </div>
                <div class="bubble me">
                    I was wondering...
                </div>
            </div>
            
            <div class="write">
                <form action="" method="post" enctype="multipart/form-data" id="sendmesg">
                    <a href="" class="write-link attach"></a>
                    <input id="msg-txt" type="text" />
                    <a href="" class="write-link smiley"></a>
                    <a name="msg-send" href="" class="write-link send"></a>
                </form>
            </div>
        </div>
    </div> 
</div>

   <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/dmessage1/js/index.js"></script>

    
    
  
<?php include('includes/footer.php'); ?> 