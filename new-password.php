<?php include('includes/connection.php'); ?>
<?php include('includes/functions.php'); ?>
<?php

if (isset($_GET['emial']) && isset($_GET['t'])) {
    $emial=$_REQUEST['emial'];
    $t = $_GET['t'];
} else {
    header('Location:/');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="assets/css/bootstrap2.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="assets/css/stylelogin.css" type="text/css" />
<link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>
<title>Biscle new password</title>
</head>
<body style="background-color: rgba(0, 0, 0, 0.7);">
<div class="wrapper-signin">
	<section id="header"> 
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="logo">
                    	<a href="index.php"><img src="assets/img/logo.png" alt="" /></a>
                      <span class="bold">
                        Sign up now <br /><span class="normal">Your business circle</span>
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="signup-middle">
    	<div class="container">
            <div class="signup-page">
            	<div class="row">
                    <div class="col-xs-12">
                        <div class="logo-phone only-phone">
                            <img class="align-center" alt="" src="assets/img/logo.png">
                        </div>
                    </div>
                	<div class="col-md-6 col-sm-7 forgot_contain">
                      <div class="signup">
                                <div class="reg-form">
                                  <span class="forgotpassword">Please set a new password</span><br />
                                  <span id="result"></span>
                                    <form action="javascript:void(0);" method="post" id="newpass">
                                        <input class="signin_input" type="password" name="password" placeholder="Enter new password" />
                                        <input class="signin_input" type="password" name="passwordagian" placeholder="Enter new password again" />
                                        <input class="signin_input" type="hidden" name="email" value="<?php echo $emial ?>" />
                                        <input type="hidden" name="t" value="<?php echo $t ?>">
                                        <input class="loginbtn" onclick="newpass();" type="submit" name="" value="Enter" />
                                    </form>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-5 forgot_contain">
                        <div class="">
                            <div class="signup">
                                <div class="reg-form">
                                  
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="promo-content">
                        <div class="col-xs-12">
                          <div class="col-sm-4">
                            <div class="first_img bg_img"></div>
                            <p class="build_buisness">Build business connections</p>
                          </div>
                          <div class="col-sm-4">
                            <div class="snd_img bg_img"></div>
                            <p class="build_buisness">Look for clients, supplier, and<br /> potential orders</p>
                          </div>  
                          <div class="col-sm-4">
                            <div class="trd_img bg_img"></div>
                            <p class="build_buisness">Update info to your business <br /> connections easily</p>
                          </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="assets/js/configure.js"></script>
<script type="text/javascript">
function newpass(){
		 $.ajax({
			 type: "POST",
			 url: "includes/register/newpassword.php",
			 data: $("#newpass").serialize(),
		 beforeSend: function() {                                
		$("#result").html("");           
		 },
					 success: function(data){
			$("#result").html(data);
            $("#result, #result *").css('display','block');
					 }
			});
		return false;
}
</script>
</body>
</html>