<?php include('includes/connection.php'); ?>
<?php include('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Social Media Network for Business | Wholesale Suppliers Directory | Build Business Network | Global Exporters Directory | Biscle</title>
<meta name="Description" content="Biscle provides online social media networking directory for your business. Start now to build your connections, import export companies and wholesale suppliers with us. Call us today!" />
<meta name="keywords" content="Wholesale Suppliers Directory, Find Wholesale Suppliers, Import Export Companies Directory, Connect with Wholesale Suppliers, Build Business Network Online, Find Global Exporters, Global Exporters Directory, Wholesale Suppliers Social Network" />
<link rel="canonical" href="http://biscle.com/" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/bootstrap2.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="assets/css/stylelogin.css" type="text/css" />
<link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>
<style>
.cont-search{
    margin-left: calc(50% - 33%); 
}
.btn-inline{
    display:inline-block !important;
}
.only-phone.cont-search{
    margin-left: 0px;
}
.signup a.btn{
    color:#fff;
}
</style>
</head>
<body style="background-color: rgba(0, 0, 0, 0.7);">
<div class="wrapper-signin">
	<section id="header">
    	<div class="container"> 
        	<div class="row"> 
            	<div class="col-md-12">
                	<div class="logo">
                    	<a href="#"><img src="assets/img/logo.png" alt="" /></a>
                     <span class="bold">Sign up now</span><span class="normal">Your business circle</span>
                      </div>
                </div>
            </div>
            <div class="row text-center" style="margin-top:10px;"> 
   <form id="form-search" action="search" method="GET">    
            	<div class="col-md-8 text-center cont-search" style="">
                    <div class="col-sm-7 text-left"> 
                            <input name="search" type="text" class="form-control" placeholder="Find product, service, supplier here" >
                    </div>
                    <div class="col-sm-5 text-left" >
                        <button  type="submit" class="btn btn-info btn-inline">Search</button>
                        <a href="home" class="btn btn-warning btn-inline">Guest Enter</a>
                    </div>
                </div>
            </form>
         
            </div>
        </div>

    </section>
<h1 style="text-align: center; color: #f5f5f5; padding-bottom: 10px;"></h1>
    <section id="signup-middle">
    	<div class="container">
            <div class="signup-page">
            	<div class="row">
                    <div class="col-xs-12">
                        <div class="logo-phone only-phone">
                            <img class="align-center" alt="" src="assets/img/logo.png">
                        </div>
                    </div>
                    
                	<div class="col-sm-6 singin_contain">
                      <div class="signup">
                                <div class="reg-form">
                                  <span class="sigin_title">Login</span><span id="login-result"></span>
                                    <p class="login-text only-phone">Your Business Circle</p>
                                    <div class="row text-center" style="margin-top:10px;"> 
            <form id="form-search" action="search" method="GET">    
            	<div class="col-md-8 text-center cont-search only-phone" style="">
                    <div class="col-sm-7 text-left"> 
                            <input name="search" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-12 text-center" style="margin-top:10px;" >
                        <button  type="submit" class="btn btn-info btn-inline">Search</button>
                        <a href="home" class="btn btn-warning btn-inline">Guest Enter</a>
                    </div>
                </div>
            </form> 
            </div>   
                                    <form action="javascript:void(0);" method="post" id="form_login">
                                        <label>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="text" name="username" placeholder="E-mail or account"  required/>
                                        </label>
                                        <span class="remember-me">
                                            Remember me ?
                                            <span>
                                              <input type="checkbox" name="rememberme" />
                                            </span>
                                        </span>
                                        
                                        <label>
                                            <i class="fa fa-unlock-alt"></i>
                                            <input type="password" name="password" placeholder="Password" required/>
                                        </label>
                                        <span class="forgot-pass">
                                            <a href="forget-password.php">Forgot your password ?</a>
                                        </span>
                                        <input class="loginbtn" type="submit" onclick="submit_login();" value="Login" />
                                        
                                    </form>
                                </div> 
                            </div>
                            
                            <div class="social_signin">
                                <div style="display:none" class="google-sign"><a href="includes/glogin/index.php"><i class="fa fa-google-plus"></i> <span class="gtext">Google Sign in</span></a></div>
                                <div style="display:none" class="fb-sign"><a href="includes/fblogin/fbconfig.php"><i class="fa fa-facebook"></i> <span class="ftext">Facebook Sign in </span></a></div>
                            </div> 
                            <div class="or-content only-phone">
                                <p>OR</p>
                            </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="tab_container">
                            <div class="signup">
                                <div class="reg-form">
                                  <span class="sigin_title">Signup</span><span id="register-result"></span>
                                    <form action="javascript:void(0);" onsubmit="submit_register()" method="post" id="form_register">
                                      <input class="signin_input" type="email" name="email" placeholder="E-mail"  required/>
                                      <input class="signin_input" type="text" name="username" id="username" placeholder="Account name"  autocomplete="off" pattern=".{7,}"   required title="7 characters minimum"/>
                                      <input class="signin_input" type="password" name="password" id="password" placeholder="Password"  required/>
                                      <input class="firstname signin_input" type="text" name="firstname" id="firstname" placeholder="First name" autocomplete="off" pattern="[a-zA-Z]+[a-zA-Z ]+"  required/>
                                      <input class="lastname signin_input" type="text" name="lastname" id="lastname" placeholder="Last name"  pattern="[a-zA-Z0-9]+[a-zA-Z0-9 ]+" required  autocomplete="off"/>
                                      <div class="action_dontain">
                                        <span>By signing up you are agreeing with our <br /><a href="termsofservice.html">terms of service</a>.</span>
                                        <input type="submit"  value="Sign up" />
                                       
                                      </div>
                                    </form>
                                </div>
                            </div> 
                            
                         </div>
                    </div>
                    <div class="promo-content">
                        <div class="col-xs-12">
                          <div class="col-sm-4">
                            <div class="first_img bg_img"></div>
                            <p class="build_buisness">Build Connections to Global Exporters and Grow your Business</p>
                          </div>
                          <div class="col-sm-4">
                            <div class="snd_img bg_img"></div>
                            <p class="build_buisness">Connect with Wholesale Suppliers! <br />Hunt for Clients/Orders!</p>
                          </div>  
                          <div class="col-sm-4">
                            <div class="trd_img bg_img"></div>
                            <p class="build_buisness">Get Updated Info via Import Export  <br /> Companies Directory</p>
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
$('#username').val('');
$('#password').val('');
$('#firstname').val('');
$('#lastname').val('');

function submit_register(){
    if($($('[name="email"]')[0]).val().length<=0){

        return false;
    }
    if($($('[name="username"]')[1]).val().length<7){

        return false;
    }
    if(!/^[a-zA-Z0-9]+$/.test($($('[name="username"]')[1]).val())){
        $("#register-result").html('<span style="color:red;"><b>Error !</b>Account Name should have  no punctuation</span>')
        $('[name="signup-error"]').html('<span style="color:red;"><b>Error !</b>Account Name should have  no punctuation</span>')
        $('[name="signup-error"], [name="signup-error"] * ').css('display','block');
        return false;
    }
    if($($('[name="password"]')[1]).val().length<7){ 
        $("#register-result").html('<span style="color:red;"><b>Error !</b>Password should be at least 7 characters</span>')
        $('[name="signup-error"]').html('<span style="color:red;"><b>Error !</b>Password should be at least 7 characters</span>')
        $('[name="signup-error"], [name="signup-error"] * ').css('display','block');
        return false;
    }

	if($($('[name="firstname"]')[0]).val().length<1){

        return false;
    }
    if(!/^[a-zA-Z0-9]+$/.test($($('[name="firstname"]')[0]).val())){
        $("#register-result").html('<span style="color:red;"><b>Error !</b>First Name should should have  no punctuation</span>')
        $('[name="signup-error"]').html('<span style="color:red;"><b>Error !</b>First Name should should have  no punctuation</span>')
        $('[name="signup-error"], [name="signup-error"] * ').css('display','block');
        return false;
    }
     if($($('[name="lastname"]')[0]).val().length<1){
        return false;
    }
    if(!/^[a-zA-Z0-9]+$/.test($($('[name="lastname"]')[0]).val())){
       return false;
    }

    	 $.ajax({ 
			 type: "POST",
			 url: "includes/register/register.php",
			 data: $("#form_register").serialize(),
		 beforeSend: function() {                                
		$("#register-result").html("");           
		 },
					 success: function(data){
			$("#register-result").html(data);
            $('[name="signup-error"]').html(data);
            $('[name="signup-error"], [name="signup-error"] * ').css('display','block');
					 }
			});
		return false;
}
function submit_login(){
		 $.ajax({
			 type: "POST",
			 url: "includes/register/login.php",
			 data: $("#form_login").serialize(),
		 beforeSend: function() {                                
		$("#login-result").html("");           
		 },
					 success: function(data){
			$("#login-result").html(data);
            $('[name="login-error"]').html(data); 
					 }
			});
		return false;
}
</script> 
</body>
</html>