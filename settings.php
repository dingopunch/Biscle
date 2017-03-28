<?php include('includes/header.php'); ?>
<?php
	$userId = $_SESSION['userid'];
	
	$usersettings = mysqli_query($con,"SELECT * FROM settings where userId='$userId'");
	$settingcount=mysqli_num_rows($usersettings); 
	if($settingcount>=1){
	  while($row=mysqli_fetch_array($usersettings)){
			$blockedusers = $row['blockedusers'];
			$opentoSearch = $row['opentoSearch'];
			$opentoComment = $row['opentoComment'];
			$emailtoMessage = $row['emailtoMessage'];
			$emailtoFriend = $row['emailtoFriend'];
			$openFnF = $row['openFnF'];
			$openBuypost = $row['openBuypost'];
		} 
	}
?>
    <section id="middle">
      <div class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li><a href="home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
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
          <?php include('includes/leftbar.php'); ?>
          <div class="col-md-6">
            <div class="settings">
              <h1>Setting</h1>
              <p>Block the users from all your messages, updates and stop them from contacting you. (enter e-mail here)</p>
              <input id="new-blk-usr" type="text" name="" placeholder="Type Email To Block" class="" /><br />
              <div>
                <br /><input onclick="blockUserbyEmail();" type="button" name="blk-usr" value="Block" class="save" />
               </div>
               <div > 
                 <ul id='blockusers'> 
                   <?php  
                      $emails=explode(',',$blockedusers);
                      for($i=0;$i<count($emails);$i++){
                        if(strlen(trim($emails[$i]))>0)
                        echo "<li> <a> X</a><span>".trim($emails[$i])."</span></li>"; 
                      }
                   ?>
                   </ul>    
                 </div>
              <form action="javascript:void(0);" onsubmit="usersettings();" method="post" class="block-msg" id="usersettings">
                <textarea style="display:none;" name="blockedusers[]"><?php echo $blockedusers; ?></textarea>
                
                <div> <span>Allow my account to be searched</span>
                  <div class="switch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="opentoSearch" value="1" class="onoffswitch-checkbox" id="myonoffswitch" <?php if($opentoSearch==1){
												echo 'checked'; } ?>>
                      <label class="onoffswitch-label" for="myonoffswitch"> <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span> </label>
                    </div>
                  </div>
                </div>
                <!--<div> <span>Open my update to others to comments</span>
                  <div class="switch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="opentoComment" value="1" class="onoffswitch-checkbox" id="myonoffswitch2" 
						<?php 
							//if($opentoComment==1){
							//	echo 'checked'; 
							//} 
						?>>
                      <label class="onoffswitch-label" for="myonoffswitch2"> <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span> </label>
                    </div>
                  </div>
                </div>-->
                <div> <span>E-mail me when someone adds me friend</span>
                  <div class="switch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="emailtoFriend" value="1" class="onoffswitch-checkbox" id="myonoffswitch3" <?php if($emailtoFriend==1){
												echo 'checked'; } ?>>
                      <label class="onoffswitch-label" for="myonoffswitch3"> <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span> </label>
                    </div>
                  </div>
                </div>
                <div> <span>E-mail me when receiving messages</span>
                  <div class="switch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="emailtoMessage" value="1" class="onoffswitch-checkbox" id="myonoffswitch4" <?php if($emailtoMessage==1){
												echo 'checked'; } ?>>
                      <label class="onoffswitch-label" for="myonoffswitch4"> <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span> </label>

                    </div>
                </div>     
<div> 
                  </div>
<br />     <input type="submit" name="" value="Save" class="save" />
                  <div id="settingsave" class="pull-right"></div>
                </div>
                <?php /*
                <div> <span>Open my friends and followers to</span>
                  <div class="shareto showcust">
                    <select class="showpublic"  name="openFnF">
                      <option class="pub" <?php if($openFnF=='Public'){ echo 'selected="selected"'; } ?>>Public</option>
                      <option class="fri" <?php if($openFnF=='Friends'){ echo 'selected="selected"'; } ?>>Friends</option>
                    </select>
                  </div>
                </div>
                <div> <span>Open my buying request posts to</span>
                  <div class="shareto showcust">
                    <select class="showpublic"  name="openBuypost">
                      <option class="pub" <?php if($openBuypost=='Public'){ echo 'selected="selected"'; } ?>>Public</option>
                      <option class="fri" <?php if($openBuypost=='Friends'){ echo 'selected="selected"'; } ?>>Friends</option>
                    </select>
                  </div> 
                </div>*/
                ?>
              </form>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>