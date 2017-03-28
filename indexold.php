<?php include('includes/connection.php'); ?>
<?php include('includes/functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>
<title>Biscle Login</title>
</head>
<body>
<div class="wrapper-signin">
	<section id="header">
    	<div class="container">
        	<div class="row"> 
            	<div class="col-md-6">
                	<div class="logo">
                    	<a href="#"><img src="assets/img/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6">
                	<!--<div class="login-space">
                    	<form class="login" action="" method="post">
                        	<label><b>Login</b></label>
                            <label><input type="text" name="" placeholder="E-mail" /></label>
                            <label><input type="password" name="" placeholder="Password" /></label>
                            <label><input type="submit" name="" value="LOGIN" /></label>
                        </form>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <section id="signup-middle">
    	<div class="container">
            <div class="signup-page">
            	<div class="row">
                	<div class="col-md-6">
                    	<div class="our-service">
                        	<div class="row">
                            	<div class="col-md-3">
                                	<img src="assets/img/handshake1.png" alt=""  />
                                </div>
                                <div class="col-md-9">
                                	<p class="signinline">Build your service community.</p>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-3">
                                	<img src="assets/img/search1.png" alt=""  />
                                </div>
                                <div class="col-md-9">
                                	<p class="signinline">Discover Clients and Orders.</p>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-3">
                                	<img src="assets/img/feedback.png" alt=""  />
                                </div>
                                <div class="col-md-9">
                                	<p class="signinline">Update your status and product to your friends and followers instantly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tab_container">
                            <div class="social_signin">
                                <div class="fb-sign"><a href="#"><i class="fa fa-facebook"></i> Sign in with Facebook</a></div>
                                <div class="google-sign"><a href="#"><i class="fa fa-google-plus"></i> Sign in with Google</a></div>
                            </div>
                            <div class="signup">
                                <div class="reg-form">
                                    <form action="function.php/login" method="post">
                                        <a href="#">Forget Password?</a>
                                        <label>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="text" name="" placeholder="E-mail" />
                                        </label>
                                        <label>
                                            <i class="fa fa-unlock-alt"></i>
                                            <input type="password" name="" placeholder="Password" />
                                        </label>
                                        <label>
                                            <input type="submit" name="" value="SIGN IN" />
                                        </label>
                                    </form>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sign-footer">
    	<div class="container">
        	<a href="#">Contact us</a>
            <a href="#">About us</a>
            <a href="#">Join our team</a>
            <a href="#">User agreement</a>
        </div>
    </section>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="assets/js/configure.js"></script>
</body>
</html>