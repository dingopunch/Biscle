<?php 

session_start();
//$user=$_REQUEST['user'];
	//$_SESSION['clientuser']=$user;
  if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    $logged=true;
    
  }else $logged=false;
  if($logged)
 include('includes/header.php'); 
 else include('includes/header-public.php');
?> 
<div style="clear:both;"></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="Biscle is your Business Social network. Start now to build your connections, and expand your Business!">
<meta property="og:title" content="Biscle.com | About us" />
<meta property="og:image" content="http://imgur.com/jdSNicn" />
<meta property="og:description" 
  content="contact us | Biscle.com." />
<title>Business Social Network | Biscle </title>
</head>
    <section id="middle">
    	<div class="container">
            <div class="info-sheet">
            	
                <div class="info-table">
                	<h2>About Us</h2>
                  <p>Biscle is short for business circle. We want to help you discover business partner all over the world, update information to your clients, and communicate faster.</p>
                  
                  
                  <h2>Contact us</h2>
                  <p>Have any question or suggestion for us?     Contact us at <a class="bluelink" href="mailto:info@biscle.com">info@biscle.com</a></p>
                  
                  <h2>Join our team</h2>
                  <p>We are currently recruiting people. If you have a skill set that you think can help us grow our social network then contact us at <a class="bluelink" href="mailto:recruit@biscle.com">recruit@biscle.com</a>
</p>
                </div>
                 
            </div>
        </div>
    </section>
</div>
