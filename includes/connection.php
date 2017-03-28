<?php
//error_reporting(E_ALL);
//ini_set("display_errors",true); 
define('BASE_URL', 'http://biscle.com/');

define('DIR_URL', 'http://biscle.com/');
$url = $_SERVER['SCRIPT_NAME']; //returns the current URL
$parts = explode('/',$url);
$dir_path = "http://".$_SERVER['SERVER_NAME']; 
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir_path .= $parts[$i] . "/"; 
}
//... connection.php ....//
/*if(getenv("BISCLE_ENV") == "production")*/{
$con=mysqli_connect("localhost","root","ivaniscool","biscleco_live"); 
}

//... checking connection.php ....//

 
if(!$con){
	
	echo "Database connection.php Fail".mysqli_error($con);
	exit; 
	
	}

function send_mail($receiver,$subject,$Html)
{
	require_once 'mailer/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.mailgun.org';

	// $mail->AuthType = 'XOAUTH2';

	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	// $mail->Port = 587;//465; //or 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	//biscle.com@gmail.com | 1999.are.you@gmail.com
	$mail->Username = "postmaster@mail.biscle.com";
	//Password to use for SMTP authentication ivanissupercoolman
	$mail->Password = "f54b19d7e555f50c0c001072109f65de";
	//Set who the message is to be sent from
	$mail->setFrom('postmaster@biscle.com', 'Biscle Support');
	//Set an alternative reply-to address
	$mail->addReplyTo('postmaster@biscle.com', 'Biscle Support');
	//Set who the message is to be sent to
	$mail->addAddress($receiver);
	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$Html=$mail->msgHTML($Html, dirname(__FILE__));
	$mail->Body    = $Html;
	//Replace the plain text body with one created manually
	$mail->AltBody = '';
	//Attach an image file
	// $mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	if (!$mail->send()) {
	    // echo "Mailer Error: " . $mail->ErrorInfo;
	    return false;
	} else {
	    // echo "Message sent!";
	    return true;
	}
}

function send_mail_($receiver,$subject,$Html)
{

	require_once 'mailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'postmaster@biscle.com';   // SMTP username
	$mail->Password = 'b663f1834143c8cef082c1c7939c5766';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

	$mail->From = 'YOU@YOUR_DOMAIN_NAME';
	$mail->FromName = 'Mailer';
	$mail->addAddress($receiver);                 // Add a recipient

	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

	$mail->Subject = $subject;
	$Html=$mail->msgHTML($Html, dirname(__FILE__));
	$mail->Body    = $Html;
	if (!$mail->send()) {
	//send the message, check for errors
	    // echo "Mailer Error: " . $mail->ErrorInfo;
	    return false;
	} else {
	    // echo "Message sent!";
	    return true;
	}
}

function send_mail_back_up_2($receiver,$subject,$Html)
{
	require_once 'mailer/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.mailgun.org';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "postmaster@sandbox16077a69d986474298a02a18c85aef42.mailgun.org";
	//Password to use for SMTP authentication
	$mail->Password = "4261276f94845d84f66fa8fb50d23eff";
	//Set who the message is to be sent from
	$mail->setFrom('suppo@biscle.com', 'Ivan');
	//Set an alternative reply-to address
	$mail->addReplyTo('postmaster@sandbox16077a69d986474298a02a18c85aef42.mailgun.org', 'Ivan');
	//Set who the message is to be sent to
	$mail->addAddress($receiver);
	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$Html=$mail->msgHTML($Html, dirname(__FILE__));
	$mail->Body    = $Html;
	//Replace the plain text body with one created manually
	$mail->AltBody = '';
	//Attach an image file
	// $mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	if (!$mail->send()) {
	    // echo "Mailer Error: " . $mail->ErrorInfo;
	    return false;
	} else {
	    // echo "Message sent!";
	    return true;
	}
}


function send_mail_back_up($receiver,$subject,$Html)
{      
	require_once 'mailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->SMTPDebug = 0;                               // Enable verbose debug output
	$mail->Debugoutput = 'html';
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = "mail.servergrove.com";
	$mail->Port =  465;
    $mail->SMTPSecure   = "tls";
    $mail->Port         = 25;
	$mail->SMTPAuth = true; 
	$mail->Username = "info@biscle.com";
	$mail->Password = "Grnn07$5";                                  
	$mail->setFrom("info@biscle.com", 'Biscle');
	$mail->addAddress($receiver);               // Name is optional
	$mail->addReplyTo("info@biscle.com", 'Biscle');
	$mail->isHTML(true);                                   // Set email format to HTML
	$mail->Subject = $subject;
    $Html=$mail->msgHTML($Html, dirname(__FILE__));
	$mail->Body    = $Html;
	$mail->AltBody = ' ';
	if(!$mail->send()) {
		//echo "mail not sent";
		return false;
	}
	else
	{     
		return true;
		// echo "mail sent";
		//echo "<script> document.location.href = \"success.php?suc_reg=true\";</script>";
	}
}


?>