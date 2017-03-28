<?php 
	session_start();
if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    $logged=true;
  }else $logged=false;
if($logged) {
  include('includes/header.php');
  $q="SELECT * FROM profile WHERE userid='$userId'";
    $res=mysqli_query($con,$q);
    if(mysqli_num_rows($res)<=0){
      $q="INSERT INTO profile (userid ) VALUES ('$userId')";
      $res=mysqli_query($con,$q);
    }
} 
else include('includes/header-public.php');
?>
    <section id="middle">
      <div id="content" class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li class="current"><a href="home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li><a href="update"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="wall"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="product" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul> 
                <div class="set-btn"> <a href="settings" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div> 
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <?php if($logged)include('includes/leftbar.php');?>
          <div class="col-md-<?php if($logged)echo "6";else echo "6 col-md-offset-3";  ?> ">
            <div class="section-post wrap22">
              <?php
							  $limit = 2; #item per page
							  $p = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
								# sql query
								# find out query stat point
								$start = ($p * $limit) - $limit;
								# query for p navigation
							  $postcount=1;
                if($logged){
                  $userId = $_SESSION['userid'];
                  $username = $_SESSION['username'];
                }
                $sql = "SELECT * FROM buyrequest br inner join user  u on br.userid=u.id /*group by u.id*/ order by str_to_date(br.date,'%Y-%m-%d') desc ";#Err : the u.id is unique. Seems reasonable, it is an 'ID' after all.
								$getfriends= mysqli_query($con,$sql/*friend where userId1='$userId' OR userId2='$userId' order by id DESC"*/); //select friends and followers
								while($row=mysqli_fetch_array($getfriends)){
										/*$senderid=$row['userId1'];
										$reciverid=$row['userId2'];
										if($postcount==2){
										  $userId=$_SESSION['userid'];	
										}
										elseif($senderid==$_SESSION['userid']){
										  $userId=$reciverid;	
										}elseif($reciverid==$_SESSION['userid']){
											$userId=$senderid;
										}*/
								$userId=$row['id']; 
								$userproduct= mysqli_query($con,"SELECT * FROM buyrequest where userId='$userId' AND ( unix_timestamp(date)+ 24*60*60*substring(duration,1,length(duration)-4)-unix_timestamp() )>0 order by str_to_date(date,'%Y-%m-%d') desc,id DESC"); //select buyposts
								$makepagination= "SELECT * FROM buyrequest where userId='$userId' AND ( unix_timestamp(date)+ 24*60*60*substring(duration,1,length(duration)-4)-unix_timestamp() )>0 order by str_to_date(date,'%Y-%m-%d') desc,id DESC"; //select pagination
								if( mysqli_num_rows($userproduct) > ($p * $limit) ){
									
									$next = ++$p;
									
								}
                //echo $makepagination;
								$query = mysqli_query($con, $makepagination . " LIMIT {$start}, {$limit}");
								
								
								while($row=mysqli_fetch_array($query)){
                                    include("includes/post/buy-post.php");
                                    
										}
									
							   $postcount++;
								}
							 ?>
               <!--p navigation-->
							<?php if (isset($next)) { ?>
              <div class="nav">
                <a href='user-home.php?p=<?php echo $next?>'>Next</a>
              </div>
              <?php } ?>
            <!--single post end-->
            </div>
          </div>
          <?php if($logged)include('includes/rightbar.php');?>
        </div>
      </div>
    </section> 
</div>
<?php 
	include('includes/footer.php'); 
  if($logged)
	include('includes/communicationPopup.php');
?>