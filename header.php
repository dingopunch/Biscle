<?php 
  include('connection.php');
  include('includes/functions.php');  
    //ini_set("display_errors",true);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  $userId = $_SESSION['userid'];
	if($_SESSION['username']==''){

		?>
     <script type="text/javascript">
		   top.location.href = "<?php echo BASE_URL; ?>";
		 </script>
    <?php
	eixt;
}
	$userfirstname22= mysqli_query($con,"SELECT * FROM user where id='$userId'"); 
  //select user pinfo who send notification
  while($row2=mysqli_fetch_array($userfirstname22)){
    $userfirstname = $row2['firstname'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php //<meta name="viewport" content="width=device-width, initial-scale=1">?>
<meta name="viewport" content="width=1100">
<link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
<link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
<link href="assets/css/jquery.lighter.css" rel="stylesheet" type="text/css" />
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/scrolstyle2.css"> 
<script src="assets/js/javascript1.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ias.min.js"></script>
    <script type="text/javascript" src="assets/js/dropzone.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript"> 
		var jq = $.noConflict(); 
        jq(document).ready(function() {
        	// Infinite Ajax Scroll configuration
          jq(".imgsize").imagefill(); 
            jq.ias({
                container : '.wrap22', // main container where data goes to append
                item: '.item22', // single items
                pagination: '.nav', // p navigation
                next: '.nav a', // next p selector
                loader: '<img class="loaderimgg" src="assets/img/Preloader_3.gif"/>', // loading gif
                triggerpThreshold: 100 // show load more if scroll more than this
            });

            var numItems = $('div.item').length;
        });



    </script>



    <script src="assets/imagefill/js/jquery-imagefill.js"></script> 
<title>Biscle</title>
</head>
<body class="main">
<div class="navigation cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<div class="identity">
    	<div class="user-img-min"><img src="assets/img/user-pic.jpg" /></div>
        <div class="user-mane-min">
        	<span>
                <h2><?php echo $userfirstname; ?></h2>
                <p>Address</p>
            </span>
        </div>
        <div class="edit-min">
        	<a href="#">Edit</a>
            <a href="#">Info</a>
        </div>
    </div>
    <div class="navigation-bar">
    	<ul class="list-group clearfix">
        	<li class="list-group-item"><a href="#"><i class="fa fa-paper-plane"></i> Post Buying Request</a><span class="badge">14</span></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-envelope-o"></i> Message</a><span class="badge">4</span></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-bell-o"></i> Notification</a><span class="badge">7</span></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-user-plus"></i> Friends</a></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-code-fork"></i> Following</a></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-eye"></i> View History</a></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-thumbs-up"></i> Liked</a></li>
            <li class="list-group-item"><a href="includes/logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
        </ul>
    </div>
</div>
<div class="wrapper">
    <section id="header">
      <div class="container">
        <div style="background:#0b648f;" class="row">
          <div class="col-md-2 col-sm-2 col-xs-5">
            <div class="logo">
                <div class="nav-mobile">
                    <span id="showLeftPush"><i class="fa fa-bars"></i></span>
                </div>
                <a href="user-home.php"><img src="assets/img/logo.png" alt="" /></a>
            </div>
          </div>
          <div class="col-md-10 col-sm-10 col-xs-7">
            <div class="header_search">
              <div class="search">
                <form action="search.php" method="GET">
                  <label>
                    <input type="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'];  ?>" name="search" placeholder="Search"  />
                    <input type="submit" name="" value=""  />
                  </label>
                  <label style="margin-right:70px;padding-left: 70px;"><a href="search.php">Advance Search</a></label>
                </form>
              </div> 
            </div>
            <div class="header-item clearfix">
              <div class="index"> <a href="<?php echo BASE_URL; ?>user-home.php">Home</a> </div>
              <div class="buy"> <a class="blue" href="#">Request</a>
                <div class="buy-option">
                  <div class="popup-section">
                    <div class="buy-popup">
                      <form class="buy-details" action="includes/buy/buyrequest.php" method="post">
                        <div><span>Request</span><span>
                          <input onKeyPress="filterwords('rtitle');" pattern=".{0}|.{20,}" title="Title Must be atleast 20 characters long" placeholder="I am looking for Product/ Service provider." id="rtitle"  type="text" name="title"  required/>
                          </span></div>
                        <div><span>Description</span><span>
                          <textarea onKeyPress="filterwords('rdesc');" minlength="50" pattern=".{0}|.{50,}" title="Description Must be atleast 50 characters long" id="rdesc" name="description"
                          placeholder="Details of your requested product and service" required></textarea>
                          </span></div>
                        <div>
                          <label> <span>Industry</span> <span>
                           <?php insertIndustries($con);  ?>
                          
                            </span> </label>
                          <label> <span>Valid Time</span> <span>
                            <select name="duration" >
                                    <option id="1">1 day</option>
                                    <option id="2">2 days</option>
                                    <option id="3">3 days</option>
                                    <option id="4">4 days</option>
                                    <option id="5">5 days</option>
                                    <option id="6">6 days</option>
                                    <option id="7">7 days</option>
                                    <option id="8">8 days</option>
                                    <option id="9">9 days</option>
                                    <option id="10">10 days</option>
                                    <option id="11">11 days</option>
                                    <option id="12">12 days</option>
                                    <option id="13">13 days</option>
                                    <option id="14">14 days</option>
                                    <option id="15">15 days</option>
                                    <option id="16">16 days</option>
                                    <option id="17">17 days</option>
                                    <option id="18">18 days</option>
                                    <option id="19">19 days</option>
                                    <option id="20">20 days</option>
                                    <option id="21">21 days</option>
                                    <option id="22">22 days</option>
                                    <option id="23">23 days</option>
                                    <option id="24">24 days</option>
                                    <option id="25">25 days</option>
                                    <option id="26">26 days</option>
                                    <option id="27">27 days</option>
                                    <option id="28">28 days</option>
                                    <option id="29">29 days</option>
                                    <option id="30">30 days</option>
                                </select>
                            </span> </label>
                        </div>
                        <div>
                          <label> <span>Country/Region</span> <span>
                             <?php insertCountries($con);  ?>
                            </span> </label>
                          <label> <span>Open To</span> <span>
                            <select name="access">
                              <option value="Public">Public</option>
                              
                            </select>
                            </span> </label>
                        </div>
                        <div><span></span><span>
                          <input type="checkbox" name="anonymous" value="on" />
                          Add anonymously</span>
                          <div style="color: red;font-weight: 700;" id="filterresult"></div>
                        </div>
                        <div>
                          <button class="btn cancel" name="">Cancel</button>
                          <button class="btn" id="filterbtn" type="submit" name="">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="notis"> 
                <a href="#"></a>
                <?php
                 $checknotification= mysqli_query($con,"SELECT * FROM notification where notificationReceiver='$userId' and seen=0  order by id DESC");
								 $countnotifications=mysqli_num_rows($checknotification);
								 $noticount=0;
								 if($countnotifications>=1) {
									 while($row=mysqli_fetch_array($checknotification)){
												$notificationType = $row['notificationType'];
												$notifytime = $row['ntime'];
												$dbtime=$notifytime+ 86400;
												if (time() < $dbtime ) {
													  $noticount=1;
													// current time is 86400 (seconds in one day) or more greater than stored time
														echo '<div style="display:block;" class="symbol"><i class="fa fa-circle"></i></div>';
												}
									 }
								 }
								?>
                <div style="float:left;min-width: 208px;" class="drop-details">
                  <?php 
									  $getnotification= mysqli_query($con,"SELECT * FROM notification where notificationReceiver='$userId' and seen=0 order by id DESC");
										$checknotficationcount=mysqli_num_rows($getnotification); 
										//select notifications of this user
										if($checknotficationcount>=1){
											while($row=mysqli_fetch_array($getnotification)){
												$notificationId = $row['id'];
												$notificationType = $row['notificationType'];
												$notificationSender = $row['notificationSender'];
												$notifytime = $row['ntime']; 
												
												$notificationsender= mysqli_query($con,"SELECT * FROM user where id='$notificationSender'"); 
												//select user pinfo who send notification
												while($row2=mysqli_fetch_array($notificationsender)){
													$sendername = $row2['username'];
												}
											 $dbtime=$notifytime+ 86400;
										 if (time() < $dbtime ) {
													$noticount++;
													// current time is 86400 (seconds in one day) or more greater than stored time
					
											if($notificationType=='friendrequest'){
										?>
											<div id="notifiid<?php echo $notificationId; ?>" class="noti-item"> 
											<a href="#">
												<div class="col-md-2"> <span><i class="fa fa-user-plus"></i></span> </div>
												<div class="col-md-10">
													<p><?php echo $sendername; ?> would like to add you as a friend.</p>
													<div class="alert"> <span onClick="friendrequest(<?php echo $notificationId; ?>, <?php echo $userId; ?>, <?php echo $notificationSender; ?>, 1);" href="javascript:void(0);">Yes</span> / <span onClick="friendrequest(<?php echo $notificationId; ?>, <?php echo $userId; ?>, <?php echo $notificationSender; ?>, 2);">Not Now</span> </div>
												</div>
												</a> 
											</div>
										<?php
											}
											elseif($notificationType=='follow'){
											?>
												<div id="notifiid<?php echo $notificationId; ?>" class="noti-item"> <a href="#">
													<div class="col-md-2"> <span><i class="fa fa-bell"></i></span> </div>
													<div class="col-md-10">
														<p><?php echo $sendername; ?> is now following you.</p>
													</div>
													</a> 
												</div>
											<?php
											}
											else {
											?>
												<div id="notifiid<?php echo $notificationId; ?>" class="noti-item"> <a href="#">
													<div class="col-md-2"> <span><i class="fa fa-bell"></i></span> </div>
													<div class="col-md-10">
														<p><?php echo $sendername; ?> has just posted new <?php echo $notificationType; ?>.</p>
													</div>
													</a> 
												</div>
											<?php
											}
										 }
										 else {
											 if($notificationType=='follow'){
												 $delrequets=mysqli_query($con,"DELETE FROM notification WHERE  notificationReceiver='$userId' AND notificationSender='$notificationSender'");
											 }
											 elseif($notificationType=='friendrequest'){
												$delrequets=mysqli_query($con,"DELETE FROM friendrequest WHERE  requestSender='$notificationSender' AND requestReceiver='$userId'");
											 }
										 }
                                                if($notificationType=='follow'){
                                                    $delrequets=mysqli_query($con,"DELETE FROM notification WHERE  notificationReceiver='$userId' AND notificationSender='$notificationSender'");
                                                }
										}
									}else {
									 ?>
                    <div class="noti-item"> 
                      <a href="#">
                        <div class="col-md-2"> <span><i class="fa fa-bell"></i></span> </div>
                        <div class="col-md-10">
                          <p>You have No notifications.</p>
                        </div>
                      </a> 
                    </div>
                  <?php
									 }
									?>
                </div>
              </div>
              
              <div class="msg"> 
                <?php
								$usermessages = mysqli_query($con,"SELECT * FROM messages where receiverId='$userId' AND isRead='0'");
								$messagescount=mysqli_num_rows($usermessages);
								if($messagescount>=1){
									while($row2=mysqli_fetch_array($usermessages)){
										$senderId = $row2['senderId'];
									}
								?>
                  <a href="message.php?new=<?php echo $senderId; ?>"></a>
                  <div style="display:block;"><i class="fa fa-circle"></i></div>
                <?php
								}else {
								?>
                  <a href="message.php"></a>
                  <div><i class="fa fa-circle"></i></div>
                <?php
								 }
								?>
              </div>
              
              <div class="user-name"> <a href="#">
                <div><?php echo $userfirstname; ?></div>
                <div><i class="fa fa-caret-down"></i></div>
                </a>
                <div class="drop-details">
                  <div class="noti-item"> <a href="includes/logout.php">
                    <div class="col-md-4"> <span><i class="fa fa-unlock-alt"></i></span> </div>
                    <div class="col-md-8">
                      <p>Log Out</p>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="settings.php">
                    <div class="col-md-4"> <span><i class="fa fa-cog"></i></span> </div>
                    <div class="col-md-8">
                      <p>Settings</p>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="my-info.php">
                    <div class="col-md-4"> <span><i class="fa fa-exclamation-triangle"></i></span> </div>
                    <div class="col-md-8">
                      <p>My Info</p>
                    </div>
                    </a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>