<?php include('includes/header.php'); ?>
<?php include "IPN/php/functions.php"; ?>
<?php
$userId = $_SESSION['userid'];
$info = getConnectionsInfo ($userId);
$userinfo= mysqli_query($con,"SELECT * FROM user where id='$userId'");
	while($row=mysqli_fetch_array($userinfo)){
		$username=$row['username'];
		$useremail=$row['email'];
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
		$birthdate=$row['birthdate'];
	}
$userpckg= mysqli_query($con,"SELECT * FROM packages where userid='$userId' order by id DESC LIMIT 1");
	while($row22=mysqli_fetch_array($userpckg)){
		$packagetype=$row22['package'];
		$today_remain_msg=$row22['today_remain_msg'];
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
                  <li><a href="<?php echo $dir_path ?>home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li><a href="<?php echo $dir_path ?>update"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="<?php echo $dir_path ?>wall"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="<?php echo $dir_path ?>profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="<?php echo $dir_path ?>product" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul>
                <div class="set-btn"> <a href="<?php echo $dir_path ?>settings" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="row">
          <?php include('includes/leftbar.php');?>
          <div class="col-md-6">
            <div class="my-info">
              <h1>My Information</h1>
              <div class="account">
                <div class="pull-left">
                  <h2>Account</h2>
                  <div class="email bluelink"><?php echo $useremail; if($useremail==''){ echo $username; }?></div>
                </div>
                <div class="pull-right">
                  <a class="blue" href="<?php echo $dir_path ?>package">Plan Upgrade</a>
                </div>
				<br><br><br><br>
                <div class="plan-info">
                  <span><font color="red"> Account Plan</font> - <?php echo $info["planName"]; ?></span><br>
				  <span> BisMail Remaining Today - <?php echo $info["planCount"]; ?></span><br>
				  <span> Purchased BisMail - <?php echo $info["singleCount"]; ?></span><br>
				  <span> BisMail Remaining Total - <?php echo $info["planCount"] + $info["singleCount"]; ?></span><br />
                 
                </div><br />
              </div>
              <div class="ps-change">
                <h2>Change Password</h2>&nbsp;&nbsp;<span id="password-result"></span>
                <form id="password_change" class="ps-new" action="javascript:void(0);" method="post">
                  <label>
                    <input type="password" name="currentpasword"  />
                    Current password</label>
                  <label>
                    <input type="password" name="newpasword"  />
                    New password</label>
                  <label>
                    <input type="password" name="paswordagain"  />
                    Confirm password</label>
                  <label>
                    <input type="submit" onclick="password_change();" class="save" name="" value="Save"  />
                  </label>
                </form>
              </div>
              <div class="nm-change">
                <div class="nm-edit">Edit</div>
                <h2>Name </h2>&nbsp;&nbsp;<span id="bithdate-result"></span>
                <div id="bithdateold">
                  <div id="current-name" class="current-name"><?php echo $firstname.'&nbsp;'.$lastname ?></div>
                  <div style="display:none;" id="current-birth" class="current-birth"><?php if($birthdate !=''){echo $birthdate;}else {echo 'December 31, 1980';} ?></div>
                </div>
                <div id="bithdate-result">
                </div>
                <form id="bithdate_change" class="nm-update" action="javascript:void(0);" method="post">
                  <div>
                    <label> <span style="display:none;" id="fnametxt">Field is blank!</span>
                      <input id="fname" type="text" name="firstname" placeholder="First Name"  />
                    </label>
                    <label> <span style="display:none;" id="lnametxt">Field is blank!</span>
                      <input type="text" id="lname" name="lastname" placeholder="Last Name"  />
                    </label>
                  </div>
                  <div>
                    <label style="display:none;"> <span style="display:none;" id="daytxt">Field is blank!</span>
                      <select style="display:none;" id="day" name="day" >
                        <option value="0">Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                    </label>
                    <label style="display:none;"> <span style="display:none;" id="monthtxt">Field is blank!</span>
                      <select style="display:none;" id="month" name="month" >
                        <option value="0">Month</option>
                        <option value="jun">Jun</option>
                        <option value="feb">Feb</option>
                        <option value="mar">Mar</option>
                        <option value="apr">Apr</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="agust">Agust</option>
                        <option value="sep">Sep</option>
                        <option value="oct">Oct</option>
                        <option value="nov">Nov</option>
                        <option value="dec">Dec</option>
                      </select>
                    </label>
                    <label style="display:none;"> <span style="display:none;" id="yeartxt">Field is blank!</span>
                      <select style="display:none;" id="year" name="year">
                        <option value="0">Year</option>
                        <option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
                      </select>
                    </label>
                  </div>
                  <label>
                    <input type="submit" onclick="bithdate_change();" class="save" name="" value="Save"  />
                  </label>
                </form>
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php');?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
function password_change(){
		 $.ajax({
			 type: "POST",
			 url: "includes/profile/changepassword.php",
			 data: $("#password_change").serialize(),
		 beforeSend: function() {                                
		$("#password-result").html("");           
		 },
					 success: function(data){
			$("#password-result").html(data);
					 }
			});
		return false;
}
function bithdate_change(){
	var fname=document.getElementById('fname').value;
	var lname=document.getElementById('lname').value;
	var day=document.getElementById('day').value;
	var month=document.getElementById('month').value;
	var year=document.getElementById('year').value;
	if(fname==''){
		document.getElementById('fnametxt').style.display='block';
		return false;
	}else {
		document.getElementById('fnametxt').style.display='none';
		}
	if(lname==''){
		document.getElementById('lnametxt').style.display='block';
		return false;
	}else {
		document.getElementById('lnametxt').style.display='none';
		}
	if(day=='0'){
		//document.getElementById('daytxt').style.display='block';
		//return false;
	}else {
		document.getElementById('daytxt').style.display='none';
		}
	if(month=='0'){
		//document.getElementById('monthtxt').style.display='block';
		//return false;
	}else {
		document.getElementById('monthtxt').style.display='none';
		}
	if(year=='0'){
		//document.getElementById('yeartxt').style.display='block';
		//return false;
	}else {
		document.getElementById('yeartxt').style.display='none';
		}
		 $.ajax({
			 type: "POST",
			 url: "includes/profile/editbithdate.php",
			 data: $("#bithdate_change").serialize(),
		 beforeSend: function() {                                
		$("#bithdate-result").html("");           
		 },
					 success: function(data){
						 document.getElementById('bithdateold').style.display='none';
			$("#bithdate-result").html(data);
					 }
			});
		return false;
}
</script>
</body>
</html>
