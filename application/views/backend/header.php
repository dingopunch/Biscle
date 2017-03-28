<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Exo:400,400italic,700,700italic,600,600italic,800,500,500italic' rel='stylesheet' type='text/css'>

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
<link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
<link href="assets/css/jquery.lighter.css" rel="stylesheet" type="text/css" />
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<title>Biscle Main Update</title>
</head>
<body class="main">
<div class="navigation cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<div class="identity">
    	<div class="user-img-min"><img src="assets/images/user-pic.jpg" /></div>
        <div class="user-mane-min">
        	<span>
                <h2>User Name</h2>
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
            <li class="list-group-item"><a href="<?php echo base_url();?>index.php?login/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
        </ul>
    </div>
</div>
<div class="wrapper">
    <section id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-5">
            <div class="logo">
                <div class="nav-mobile">
                    <span id="showLeftPush"><i class="fa fa-bars"></i></span>
                </div>
                <a href="#"><img src="assets/images/logo.png" alt="" /></a>
            </div>
          </div>
          <div class="col-md-10 col-sm-10 col-xs-7">
            <div class="header_search">
              <div class="search">
                <form action="" method="post">
                  <label>
                    <input type="search" name="" placeholder="Search"  />
                    <input type="submit" name="" value=""  />
                  </label>
                  <label><a href="#">Advance Search</a></label>
                </form>
              </div>
            </div>
            <div class="header-item clearfix">
              <div class="index"> <a href="#">index</a> </div>
              <div class="buy"> <a class="blue" href="#">Buy</a>
                <div class="buy-option">
                  <div class="popup-section">
                    <div class="buy-popup">
                      <form class="buy-details" action="" method="post">
                        <div><span>Request</span><span>
                          <input type="text" name=""  />
                          </span></div>
                        <div><span>Description</span><span>
                          <textarea placeholder="500 words max"></textarea>
                          </span></div>
                        <div>
                          <label> <span>Industry</span> <span>
                            <select>
                              <option></option>
                            </select>
                            </span> </label>
                          <label> <span>Valid Time</span> <span>
                            <select>
                              <option></option>
                            </select>
                            </span> </label>
                        </div>
                        <div>
                          <label> <span>Country/Region</span> <span>
                            <select>
                              <option></option>
                            </select>
                            </span> </label>
                          <label> <span>Open To</span> <span>
                            <select>
                              <option></option>
                            </select>
                            </span> </label>
                        </div>
                        <div><span></span><span>
                          <input type="checkbox" name=""  />
                          Add anonymously</span></div>
                        <div>
                          <button class="btn cancel" name="">Cancel</button>
                          <button class="btn" type="submit" name="">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="notis"> <a href="#"></a>
                <div class="symbol"><i class="fa fa-circle"></i></div>
                <div class="drop-details">
                  <div class="noti-item"> <a href="#">
                    <div class="col-md-2"> <span><i class="fa fa-user-plus"></i></span> </div>
                    <div class="col-md-10">
                      <p>The Cat person would like to add you as a friend.</p>
                      <div class="alert"> <span>Yes</span> / <span>Not Now</span> </div>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="#">
                    <div class="col-md-2"> <span><i class="fa fa-bell"></i></span> </div>
                    <div class="col-md-10">
                      <p>The broker has just posted a new event. Topic : Hello guys we just starting to launach a new product, come check it.</p>
                      <div class="alert"> <span>Yes</span> / <span>Not Now</span> </div>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="#">
                    <div class="col-md-2"> <span><i class="fa fa-file-text-o"></i></span> </div>
                    <div class="col-md-10">
                      <p>The broker has just posted a new quotation. Topic : I am looking to buy some new car parts, please contact me.</p>
                      <div class="alert"> <span>Yes</span> / <span>Not Now</span> </div>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="#">
                    <div class="col-md-2"> <span><i class="fa fa-bell"></i></span> </div>
                    <div class="col-md-10">
                      <p>The broker has just posted a new event. Topic : Hello guys we just starting to launach a new product, come check it.</p>
                      <div class="alert"> <span>Yes</span> / <span>Not Now</span> </div>
                    </div>
                    </a> </div>
                </div>
              </div>
              <div class="msg"> <a href="#"></a>
                <div><i class="fa fa-circle"></i></div>
              </div>
              <div class="user-name"> <a href="#">
                <div>User Nameeeeeeeeeeee</div>
                <div><i class="fa fa-caret-down"></i></div>
                </a>
                <div class="drop-details">
                  <div class="noti-item"> <a href="<?php echo base_url();?>index.php?login/logout">
                    <div class="col-md-4"> <span><i class="fa fa-unlock-alt"></i></span> </div>
                    <div class="col-md-8">
                      <p>Log Out</p>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="settings.html">
                    <div class="col-md-4"> <span><i class="fa fa-cog"></i></span> </div>
                    <div class="col-md-8">
                      <p>Settings</p>
                    </div>
                    </a> </div>
                  <div class="noti-item"> <a href="my-info.html">
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