<?php include('includes/connection.php'); ?>
<?php include('includes/functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="assets/css/stylelogin.css" type="text/css" />
<link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>
<title>Biscle Login</title>
</head>
<body style="background-color: rgba(0, 0, 0, 0.7);">
<div class="wrapper-signin">
	<section id="header">
    	<div class="container"> 
        	<div class="row">
            	<div class="col-md-12">
                	<div class="logo">
                    	<a href="#"><img src="assets/img/logo.png" alt="" /></a>
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
                	<div class="col-md-6 singin_contain">
                      <div class="signup">
                                <div class="reg-form">
                                  <span class="sigin_title">Login</span><span id="login-result"></span>
                                    <form action="javascript:void(0);" method="post" id="form_login">
                                        <label>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="text" name="username" placeholder="E-mail or account" />
                                        </label>
                                        <span class="remember-me">
                                            Remember me ?
                                            <span>
                                              <input type="checkbox" name="rememberme" />
                                            </span>
                                        </span>
                                        
                                        <label>
                                            <i class="fa fa-unlock-alt"></i>
                                            <input type="password" name="password" placeholder="Password" />
                                        </label>
                                        <span class="forgot-pass">
                                            <a href="forget-password.php">Forgot your password ?</a>
                                        </span>
                                        <input class="loginbtn" type="submit" onclick="submit_login();" value="Login" />
                                        <span display="true" name="login-error">Incorrect Username or Password</span>
                                    </form>
                                </div>
                            </div>
                            <div class="social_signin">
                                <div style="display:none" class="google-sign"><a href="includes/glogin/index.php"><i class="fa fa-google-plus"></i> <span class="gtext">Google Sign in</span></a></div>
                                <div style="display:none" class="fb-sign"><a href="includes/fblogin/fbconfig.php"><i class="fa fa-facebook"></i> <span class="ftext">Facebook Sign in </span></a></div>
                            </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="tab_container">
                            <div class="signup">
                                <div class="reg-form">
                                  <span class="sigin_title">Signup</span><span id="register-result"></span>
                                    <form action="javascript:void(0);" method="post" id="form_register">
                                      <input class="signin_input" type="email" name="email" placeholder="E-mail" />
                                      <input class="signin_input" type="text" name="username" id="username" placeholder="Account name"  autocomplete="off"/>
                                      <input class="signin_input" type="password" name="password" id="password" placeholder="Password" />
                                      <input class="firstname signin_input" type="text" name="firstname" id="firstname" placeholder="First name" autocomplete="off"/>
                                      <input class="lastname signin_input" type="text" name="lastname" id="lastname" placeholder="Last name" autocomplete="off"/>
                                      <div class="action_dontain">
                                        <span>By signing up you are agreeing with our <br /><a href="termsofservice.html">terms of service</a>.</span>
                                        <input type="submit" onclick="submit_register();" value="Sign up" />
                                      </div>
                                    </form>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <div class="col-md-4 col-xs-4">
                        <div class="first_img"></div>
                        <p class="build_buisness">Build business connections</p>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <div class="snd_img"></div>
                        <p class="build_buisness">Look for clients, supplier, and<br /> potential orders</p>
                      </div>  
                      <div class="col-md-4 col-xs-4">
                        <div class="trd_img"></div>
                        <p class="build_buisness">Update info to your business <br /> connections easily</p>
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
        $("#register-result")
        .html('<span style="color:red;"><b>Error !</b>Email should not be empty</span>');
        return false; 
    }
    if($($('[name="username"]')[1]).val().length<7){
        $("#register-result")
        .html('<span style="color:red;"><b>Error !</b>Account Name should be at least 7 characters</span>');
        return false; 
    }
    if(!/^[a-zA-Z0-9]+$/.test($($('[name="username"]')[1]).val())){
        $("#register-result").html('<span style="color:red;"><b>Error !</b>Account Name should have  no punctuation</span>')
        return false; 
    }
    if($($('[name="password"]')[1]).val().length<7){
        $("#register-result").html('<span style="color:red;"><b>Error !</b>Password should be at least 7 characters</span>')
        return false; 
    }
    
	if($($('[name="firstname"]')[0]).val().length<1){
        $("#register-result")
        .html('<span style="color:red;"><b>Error !</b>First Name should be at least 1 characters</span>');
        return false; 
    }
    if(!/^[a-zA-Z0-9]+$/.test($($('[name="firstname"]')[0]).val())){
        $("#register-result").html('<span style="color:red;"><b>Error !</b>First Name should should have  no punctuation</span>')
        return false; 
    }
     if($($('[name="lastname"]')[0]).val().length<1){
        $("#register-result")
        .html('<span style="color:red;"><b>Error !</b>Last Name should be at least 1 characters</span>');
        return false;  
    } 
    if(!/^[a-zA-Z0-9]+$/.test($($('[name="lastname"]')[0]).val())){
        $("#register-result").html('<span style="color:red;"><b>Error !</b>Last Name should should have  no punctuation</span>')
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
					 }
			});
		return false;
}
</script> 
</body>
</html>