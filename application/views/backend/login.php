<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title><?php echo get_phrase('login');?> | <?php echo $system_title;?></title>
	

  <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
  <link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>
	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="assets/images/favicon.png">
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>



<div class="wrapper-signin">
	<section id="header">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                	<div class="logo">
                    	<a href="#"><img src="assets/images/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6">
                <p style="color:#FFF;padding-bottom: 0px;padding-top: 15px;"><?php echo $error_message;?></p>
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
                                	<img src="assets/images/handshake1.png" alt=""  />
                                </div>
                                <div class="col-md-9">
                                	<p class="signinline">Build your service community.</p>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-3">
                                	<img src="assets/images/search1.png" alt=""  />
                                </div>
                                <div class="col-md-9">
                                	<p class="signinline">Discover Clients and Orders.</p>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-3">
                                	<img src="assets/images/feedback.png" alt=""  />
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
                                    <form  method="post" action="<?php echo base_url();?>index.php?login/user_home">
                                        <a href="#">Forget Password?</a>
                                        <label>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="text" name="email" id="email" placeholder="E-mail" />
                                        </label>
                                        <label>
                                            <i class="fa fa-unlock-alt"></i>
                                            <input type="password" name="password" id="password" placeholder="Password" />
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


	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-login.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>