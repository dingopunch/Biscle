<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '199657330371992','b671707c464be86662944e996c93a445' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://biscle.com/bisclenew1/includes/fblogin/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=email,name,first_name,last_name' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');            // To Get Facebook ID
 	    $username = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
			$first_name = $graphObject->getProperty('first_name');
			$last_name = $graphObject->getProperty('last_name');
			$picture = $graphObject->getProperty('picture');
			if($picture==''){
				
				$picture="https://graph.facebook.com/".$fbid."/picture?type=large";
				
				}
		//echo '<pre>';
//		print_r($response);
//		echo '</pre>';
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
       // $_SESSION['username'] = $username;
	    $_SESSION['email'] =  $femail;
    /* ---- header location after session ----*/
			  require '../connection.php';
				$checkfb = mysqli_query($con,"select * from facebookloginrequest where fbID='$fbid'");
				$check = mysqli_num_rows($checkfb);
				if (empty($check)) { // if new user . Insert a new record	
				  $date=date("Y-m-d");
					$month=date("F"); 
					$year=date("Y");
				  $insertuser = "INSERT INTO user (firstname,lastname,email,loginType,ImageUrl,date,month,year) VALUES ('$first_name','$last_name','$femail','default','','$date','$month','$year')";
					 mysqli_query($con, $insertuser);	
					 $lastinsertid=mysqli_insert_id($con);
					$query = "INSERT INTO facebookloginrequest (fbID,email,userId) VALUES ('$fbid','$femail','$lastinsertid')";
					mysqli_query($con, $query);	
					$rediurl= BASE_URL."new-acount-name.php?uid=".$lastinsertid;
					header("Location: ".$rediurl);
				} else {   // If Returned user . update the user record		
				  while($row=mysqli_fetch_array($checkfb)){
						$thisuser=$row['userId'];
						$checkusername = mysqli_query($con,"select * from user where id='$thisuser'");
						while($row22=mysqli_fetch_array($checkusername)){
						  $username=$row22['username'];
						}
					}
					$query = "UPDATE user SET firstname='$first_name', lastname='$lastname', email='$femail' where id='$thisuser'";
					mysqli_query($con, $query);
					$_SESSION['username'] = $username;
					$_SESSION['userid']=$thisuser;
					$rediurl= BASE_URL."user-home.php";
					header("Location: ".$rediurl);
				}
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>