<?php include('includes/header.php'); ?>
<?php
  $searchfield=$_REQUEST['search'];
?>
    <section id="middle">
      <div id="content" class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li class="current"><a href="user-home.php"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li><a href="user-update.php"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="my-wall.php"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="user-profile.php" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="user-product.php" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul> 
                <div class="set-btn"> <a href="settings.php" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        
        <div class="row">
          <?php include('includes/leftbar.php');?>
          <div class="col-md-6 ">
              <form style="display:none;" action="javascript:void(0);" method="post" onsubmit="customsearch();" id="customsearch">
                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tbody><tr>
                                        <td>
                                            <span>Looking For</span>
                                            <select name="userType">
                                            	<option value="">Select</option>
                                              <option selected value="Post">Post</option>
                                              <option value="Distributor">Distributor</option>
                                              <option value="Manufacturer">Manufacturer</option>
                                              <option value="Broker">Broker</option>
                                              <option value="Supplier">Supplier</option> 
                                              <option value="Retailer">Retailer</option> 
                                              <option value="Carrier">Carrier</option> 
                                              <option value="Designer">Designer</option>
                                        	</select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Country/Region</span>
                                            <select name="country">
                                            	<option value="0">Please Select a country</option>
                                                <option value="United States">United States</option> 
                                                <option value="United Kingdom">United Kingdom</option> 
                                                <option value="Afghanistan">Afghanistan</option> 
                                                <option value="Albania">Albania</option> 
                                                <option value="Algeria">Algeria</option> 
                                                <option value="American Samoa">American Samoa</option> 
                                                <option value="Andorra">Andorra</option> 
                                                <option value="Angola">Angola</option> 
                                                <option value="Anguilla">Anguilla</option> 
                                                <option value="Antarctica">Antarctica</option> 
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                                                <option value="Argentina">Argentina</option> 
                                                <option value="Armenia">Armenia</option> 
                                                <option value="Aruba">Aruba</option> 
                                                <option value="Australia">Australia</option> 
                                                <option value="Austria">Austria</option> 
                                                <option value="Azerbaijan">Azerbaijan</option> 
                                                <option value="Bahamas">Bahamas</option> 
                                                <option value="Bahrain">Bahrain</option> 
                                                <option value="Bangladesh">Bangladesh</option> 
                                                <option value="Barbados">Barbados</option> 
                                                <option value="Belarus">Belarus</option> 
                                                <option value="Belgium">Belgium</option> 
                                                <option value="Belize">Belize</option> 
                                                <option value="Benin">Benin</option> 
                                                <option value="Bermuda">Bermuda</option> 
                                                <option value="Bhutan">Bhutan</option> 
                                                <option value="Bolivia">Bolivia</option> 
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                                                <option value="Botswana">Botswana</option> 
                                                <option value="Bouvet Island">Bouvet Island</option> 
                                                <option value="Brazil">Brazil</option> 
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                                                <option value="Brunei Darussalam">Brunei Darussalam</option> 
                                                <option value="Bulgaria">Bulgaria</option> 
                                                <option value="Burkina Faso">Burkina Faso</option> 
                                                <option value="Burundi">Burundi</option> 
                                                <option value="Cambodia">Cambodia</option> 
                                                <option value="Cameroon">Cameroon</option> 
                                                <option value="Canada">Canada</option> 
                                                <option value="Cape Verde">Cape Verde</option> 
                                                <option value="Cayman Islands">Cayman Islands</option> 
                                                <option value="Central African Republic">Central African Republic</option> 
                                                <option value="Chad">Chad</option> 
                                                <option value="Chile">Chile</option> 
                                                <option value="China">China</option> 
                                                <option value="Christmas Island">Christmas Island</option> 
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                                                <option value="Colombia">Colombia</option> 
                                                <option value="Comoros">Comoros</option> 
                                                <option value="Congo">Congo</option> 
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                                                <option value="Cook Islands">Cook Islands</option> 
                                                <option value="Costa Rica">Costa Rica</option> 
                                                <option value="Cote D'ivoire">Cote D'ivoire</option> 
                                                <option value="Croatia">Croatia</option> 
                                                <option value="Cuba">Cuba</option> 
                                                <option value="Cyprus">Cyprus</option> 
                                                <option value="Czech Republic">Czech Republic</option> 
                                                <option value="Denmark">Denmark</option> 
                                                <option value="Djibouti">Djibouti</option> 
                                                <option value="Dominica">Dominica</option> 
                                                <option value="Dominican Republic">Dominican Republic</option> 
                                                <option value="Ecuador">Ecuador</option> 
                                                <option value="Egypt">Egypt</option> 
                                                <option value="El Salvador">El Salvador</option> 
                                                <option value="Equatorial Guinea">Equatorial Guinea</option> 
                                                <option value="Eritrea">Eritrea</option> 
                                                <option value="Estonia">Estonia</option> 
                                                <option value="Ethiopia">Ethiopia</option> 
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                                                <option value="Faroe Islands">Faroe Islands</option> 
                                                <option value="Fiji">Fiji</option> 
                                                <option value="Finland">Finland</option> 
                                                <option value="France">France</option> 
                                                <option value="French Guiana">French Guiana</option> 
                                                <option value="French Polynesia">French Polynesia</option> 
                                                <option value="French Southern Territories">French Southern Territories</option> 
                                                <option value="Gabon">Gabon</option> 
                                                <option value="Gambia">Gambia</option> 
                                                <option value="Georgia">Georgia</option> 
                                                <option value="Germany">Germany</option> 
                                                <option value="Ghana">Ghana</option> 
                                                <option value="Gibraltar">Gibraltar</option> 
                                                <option value="Greece">Greece</option> 
                                                <option value="Greenland">Greenland</option> 
                                                <option value="Grenada">Grenada</option> 
                                                <option value="Guadeloupe">Guadeloupe</option> 
                                                <option value="Guam">Guam</option> 
                                                <option value="Guatemala">Guatemala</option> 
                                                <option value="Guinea">Guinea</option> 
                                                <option value="Guinea-bissau">Guinea-bissau</option> 
                                                <option value="Guyana">Guyana</option> 
                                                <option value="Haiti">Haiti</option> 
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                                                <option value="Honduras">Honduras</option> 
                                                <option value="Hong Kong">Hong Kong</option> 
                                                <option value="Hungary">Hungary</option> 
                                                <option value="Iceland">Iceland</option> 
                                                <option value="India">India</option> 
                                                <option value="Indonesia">Indonesia</option> 
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                                                <option value="Iraq">Iraq</option> 
                                                <option value="Ireland">Ireland</option> 
                                                <option value="Israel">Israel</option> 
                                                <option value="Italy">Italy</option> 
                                                <option value="Jamaica">Jamaica</option> 
                                                <option value="Japan">Japan</option> 
                                                <option value="Jordan">Jordan</option> 
                                                <option value="Kazakhstan">Kazakhstan</option> 
                                                <option value="Kenya">Kenya</option> 
                                                <option value="Kiribati">Kiribati</option> 
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                                                <option value="Korea, Republic of">Korea, Republic of</option> 
                                                <option value="Kuwait">Kuwait</option> 
                                                <option value="Kyrgyzstan">Kyrgyzstan</option> 
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                                                <option value="Latvia">Latvia</option> 
                                                <option value="Lebanon">Lebanon</option> 
                                                <option value="Lesotho">Lesotho</option> 
                                                <option value="Liberia">Liberia</option> 
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                                                <option value="Liechtenstein">Liechtenstein</option> 
                                                <option value="Lithuania">Lithuania</option> 
                                                <option value="Luxembourg">Luxembourg</option> 
                                                <option value="Macao">Macao</option> 
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                                                <option value="Madagascar">Madagascar</option> 
                                                <option value="Malawi">Malawi</option> 
                                                <option value="Malaysia">Malaysia</option> 
                                                <option value="Maldives">Maldives</option> 
                                                <option value="Mali">Mali</option> 
                                                <option value="Malta">Malta</option> 
                                                <option value="Marshall Islands">Marshall Islands</option> 
                                                <option value="Martinique">Martinique</option> 
                                                <option value="Mauritania">Mauritania</option> 
                                                <option value="Mauritius">Mauritius</option> 
                                                <option value="Mayotte">Mayotte</option> 
                                                <option value="Mexico">Mexico</option> 
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                                                <option value="Moldova, Republic of">Moldova, Republic of</option> 
                                                <option value="Monaco">Monaco</option> 
                                                <option value="Mongolia">Mongolia</option> 
                                                <option value="Montserrat">Montserrat</option> 
                                                <option value="Morocco">Morocco</option> 
                                                <option value="Mozambique">Mozambique</option> 
                                                <option value="Myanmar">Myanmar</option> 
                                                <option value="Namibia">Namibia</option> 
                                                <option value="Nauru">Nauru</option> 
                                                <option value="Nepal">Nepal</option> 
                                                <option value="Netherlands">Netherlands</option> 
                                                <option value="Netherlands Antilles">Netherlands Antilles</option> 
                                                <option value="New Caledonia">New Caledonia</option> 
                                                <option value="New Zealand">New Zealand</option> 
                                                <option value="Nicaragua">Nicaragua</option> 
                                                <option value="Niger">Niger</option> 
                                                <option value="Nigeria">Nigeria</option> 
                                                <option value="Niue">Niue</option> 
                                                <option value="Norfolk Island">Norfolk Island</option> 
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                                                <option value="Norway">Norway</option> 
                                                <option value="Oman">Oman</option> 
                                                <option value="Pakistan">Pakistan</option> 
                                                <option value="Palau">Palau</option> 
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 

                                                <option value="Panama">Panama</option> 
                                                <option value="Papua New Guinea">Papua New Guinea</option> 
                                                <option value="Paraguay">Paraguay</option> 
                                                <option value="Peru">Peru</option> 
                                                <option value="Philippines">Philippines</option> 
                                                <option value="Pitcairn">Pitcairn</option> 
                                                <option value="Poland">Poland</option> 
                                                <option value="Portugal">Portugal</option> 
                                                <option value="Puerto Rico">Puerto Rico</option> 
                                                <option value="Qatar">Qatar</option> 
                                                <option value="Reunion">Reunion</option> 
                                                <option value="Romania">Romania</option> 
                                                <option value="Russian Federation">Russian Federation</option> 
                                                <option value="Rwanda">Rwanda</option> 
                                                <option value="Saint Helena">Saint Helena</option> 
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                                <option value="Saint Lucia">Saint Lucia</option> 
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                                                <option value="Samoa">Samoa</option> 
                                                <option value="San Marino">San Marino</option> 
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                                <option value="Saudi Arabia">Saudi Arabia</option> 
                                                <option value="Senegal">Senegal</option> 
                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                                                <option value="Seychelles">Seychelles</option> 
                                                <option value="Sierra Leone">Sierra Leone</option> 
                                                <option value="Singapore">Singapore</option> 
                                                <option value="Slovakia">Slovakia</option> 
                                                <option value="Slovenia">Slovenia</option> 
                                                <option value="Solomon Islands">Solomon Islands</option> 
                                                <option value="Somalia">Somalia</option> 
                                                <option value="South Africa">South Africa</option> 
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                                                <option value="Spain">Spain</option> 
                                                <option value="Sri Lanka">Sri Lanka</option> 
                                                <option value="Sudan">Sudan</option> 
                                                <option value="Suriname">Suriname</option> 
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                                                <option value="Swaziland">Swaziland</option> 
                                                <option value="Sweden">Sweden</option> 
                                                <option value="Switzerland">Switzerland</option> 
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                                                <option value="Tajikistan">Tajikistan</option> 
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                                                <option value="Thailand">Thailand</option> 
                                                <option value="Timor-leste">Timor-leste</option> 
                                                <option value="Togo">Togo</option> 
                                                <option value="Tokelau">Tokelau</option> 
                                                <option value="Tonga">Tonga</option> 
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                                                <option value="Tunisia">Tunisia</option> 
                                                <option value="Turkey">Turkey</option> 
                                                <option value="Turkmenistan">Turkmenistan</option> 
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                                                <option value="Tuvalu">Tuvalu</option> 
                                                <option value="Uganda">Uganda</option> 
                                                <option value="Ukraine">Ukraine</option> 
                                                <option value="United Arab Emirates">United Arab Emirates</option> 
                                                <option value="United Kingdom">United Kingdom</option> 
                                                <option value="United States">United States</option> 
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                                                <option value="Uruguay">Uruguay</option> 
                                                <option value="Uzbekistan">Uzbekistan</option> 
                                                <option value="Vanuatu">Vanuatu</option> 
                                                <option value="Venezuela">Venezuela</option> 
                                                <option value="Viet Nam">Viet Nam</option> 
                                                <option value="Virgin Islands, British">Virgin Islands, British</option> 
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                                                <option value="Wallis and Futuna">Wallis and Futuna</option> 
                                                <option value="Western Sahara">Western Sahara</option> 
                                                <option value="Yemen">Yemen</option> 
                                                <option value="Zambia">Zambia</option> 
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                          <span>Industry</span>
                                          <select name="industry" class="">

                                            <option value="0">Please Select Industry</option>
                                            <option value="IT">IT</option>                                            
                                            <option value="Accounting">Accounting</option>
                                            <option value="Airlines/Aviation">Airlines/Aviation</option>
                                            <option value="Animation">Animation</option>
                                            <option value="Arts and Crafts">Arts and Crafts</option>
                                            <option value="Automotive">Automotive</option>
                                            <option value="Banking">Banking</option>
                                            <option value="Biotechnology">Biotechnology</option>
                                            <option value="Computer Games">Computer Games</option>
                                            <option value="Computer Hardware">Computer Hardware</option>
                                            <option value="Computer Networking">Computer Networking</option>
                                            <option value="Computer Software">Computer Software</option>
                                            <option value="Construction">Construction</option>
                                            <option value="Cosmetics">Cosmetics</option>
                                            <option value="Dairy">Dairy</option>
                                            <option value="Defense &amp; Space">Defense &amp; Space</option>
                                            <option value="Design">Design</option>
                                            <option value="Education Management">Education Management</option>
                                            <option value="E-Learning">E-Learning</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Events Services">Events Services</option>
                                            <option value="Farming">Farming</option>
                                            <option value="Financial Services">Financial Services</option>
                                            <option value="Fine Art">Fine Art</option>
                                            <option value="Graphic Design">Graphic Design</option>
                                            <option value="Hospitality">Hospitality</option>
                                            <option value="Human Resources">Human Resources</option>
                                            <option value="Import and Export">Import and Export</option>
                                            <option value="Industrial Automation">Industrial Automation</option>
                                            <option value="Information Services">Information Services</option>
                                            <option value="Insurance">Insurance</option>
                                            <option value="Judiciary">Judiciary</option>
                                            <option value="Music">Music</option>
                                            <option value="Newspapers">Newspapers</option>
                                            <option value="Online Media">Online Media</option>
                                            <option value="Photography">Photography</option>
                                            <option value="Printing">Printing</option>
                                            <option value="Program Development">Program Development</option>
                                            <option value="Publishing">Publishing</option>
                                            <option value="Ranching">Ranching</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Research">Research</option>
                                            <option value="Sports">Sports</option>
                                            <option value="Telecommunications">Telecommunications</option>
                                            <option value="Textiles">Textiles</option>
                                            <option value="Utilities">Utilities</option>
                                            <option value="Warehousing">Warehousing</option>
                                          </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span></span>
                                            <input type="text" value="<?php echo $searchfield; ?>" name="searchtext">
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        	<button type="submit" name="">Search</button>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </form>
              <div id="custemsearchresult" class="result-found">
                      </div>
            <div class="section-post wrap22">
                            <?php
							  $limit = 2; #item per page
							  $p = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
								# sql query
								# find out query stat point
								$start = ($p * $limit) - $limit;
								# query for p navigation
							    $postcount=1;
								$userId = $_SESSION['userid'];
								$username = $_SESSION['username'];
								$getfriends= mysqli_query($con,"SELECT * FROM friend where userId1='$userId' OR userId2='$userId' order by id DESC"); //select friends and followers
								while($row=mysqli_fetch_array($getfriends)){
										$senderid=$row['userId1'];
										$reciverid=$row['userId2'];
										if($postcount==2){
										  $userId=$_SESSION['userid'];	
										}
										elseif($senderid==$_SESSION['userid']){
										  $userId=$reciverid;	
										}elseif($reciverid==$_SESSION['userid']){
											$userId=$senderid;
										}
								
								$userproduct= mysqli_query($con,"SELECT * FROM buyrequest where userId='$userId' AND title LIKE '%$searchfield%' order by id DESC"); //select buyposts
								$makepagination= "SELECT * FROM buyrequest where userId='$userId' AND title LIKE '%$searchfield%' order by id DESC"; //select pagination
								if( mysqli_num_rows($userproduct) > ($p * $limit) ){
									
									$next = ++$p;
									
								}

								$query = mysqli_query($con, $makepagination . " LIMIT {$start}, {$limit}");
								
								
								while($row=mysqli_fetch_array($query)){
										$pid=$row['id'];
										$title = $row['title'];
										$description = $row['description'];
										$industry = $row['industry'];
										$country = $row['country'];
										$access = $row['access'];
										$duration = $row['duration'];
										$anonymous = $row['anonymous'];
										$date=$row['date'];
										$month=$row['month'];
										$day=$row['day'];
										$thisuserId = $row['userId'];
										$userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
										while($row2=mysqli_fetch_array($userinfo)){
											$thisuserid = $row2['id'];
											$thisuserfirstname = $row2['firstname'];
											$thisuserlastname = $row2['lastname'];
											$thisusername = $row2['username'];
											$profilepic1 = $row2['ImageUrl'];
											$loginType1 = $row2['loginType'];
										}
										$userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$thisuserid'"); //select user pinfo who posted this buypost
										while($row2=mysqli_fetch_array($userprofileinfo)){
											$thisusercompany = $row2['company'];
											$thisuserposition = $row2['position'];
										}
							?>
              
              <div id="postitme<?php echo $pid; ?>" class="post-item item22"> 
                <!-- single post -->
                <?php
                  if($thisuserid==$_SESSION['userid']){
								?>
                  <div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem('buyrequest',<?php echo $pid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary"><i class="fa fa-times"></i></a></div>
                <?php
									}
								?>
                <div class="industries">&nbsp;&nbsp;<?php echo $industry; ?>&nbsp;&nbsp;</div>
                <div class="question"><a class="question" href="posted.php?pid=<?php echo $pid; ?>"><?php echo $title; ?></a></div>
                <div class="post-owner"> 
                  <?php if($loginType1=='default'){ ?>
                    <?php if($profilepic1=='' || $profilepic1=='default'){ ?>
                      <img src="assets/img/user-pic.jpg" alt=""  />
                    <?php } else { ?>
                              <img src="assets/files/profile/<?php echo $profilepic1 ;?>" alt=""  />
                  <?php } } else { ?> 
                     <?php if($profilepic1=='' || $profilepic1=='default'){ ?>
                      <img src="assets/img/user-pic.jpg" alt=""  />
                      <?php } else { ?>
                    <img src="<?php echo $profilepic1 ;?>" alt=""  />
                  <?php } }?>
                  <div>
                    <p>
                    <?php if($anonymous=='on'){ 
										?>
											<a href="javascript:void(0);" class="bluelink"><?php echo 'Anonymous'; ?></a>
										<?php
										}else { 
										 ?>
											<a href="profile.php?user=<?php echo $thisusername; ?>" class="bluelink"><?php echo $thisuserfirstname.'&nbsp;'.$thisuserlastname.', '.$thisuserposition.', '.$thisusercompany;?></a>
										 <?php
										 }?>
                    
                    </p>
                    <time><?php echo $month.'&nbsp;'.$day ?></time>
                  </div>
                </div>
                <div class="post-content">
                  <div class="more_content">
                    <p><?php echo $description; ?></p>
                  </div>
                  <div class="row line"></div>
                </div>
                <div class="post-comments"> 
                <a href="#"><i class="fa fa-comment"></i>Comments</a>.
                <div id="likeup<?php echo $pid; ?>" style="display:inline-block;"> 
                <?php 
                $tblname='buypostlikes';
                $checklike = mysqli_query($con,"SELECT * FROM buypostlikes where userId='$userId' AND postId='$pid'");
                $likecheck=mysqli_num_rows($checklike);
                if($likecheck >= 1){ ?> 
                  <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 2, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a> 
                <?php } else { ?>
                  <a onclick="buylike(<?php echo $pid; ?>, <?php echo $userId; ?>, 1, '<?php echo $tblname;?>');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a> 
                <?php }?>
                </div>
                  <a href="#" class="simpleConfirm">Report</a>
                </div>
                <div class="row">
                  <div class="coments-box white">
                    <?php
                    $userId = $_SESSION['userid'];
                    $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
                    while($row2=mysqli_fetch_array($userinfo2)){
                      $thisuserid3 = $row2['id'];
                      $profilepic3 = $row2['ImageUrl'];
                      $loginType3 = $row2['loginType'];
                    }
										$isopentocomment=1;
										$checkthisusersettings= mysqli_query($con,"SELECT * FROM settings where userId='$thisuserid'");
										while($row22=mysqli_fetch_array($checkthisusersettings)){

											$isopentocomment=	$row22['opentoComment'];
										}
                    ?>
                    <div <?php if($isopentocomment != 1){ echo 'style="display:none;"';}?> class="text-area"> 
                      <?php if($loginType3=='default'){ ?>
                      <?php if($profilepic3=='' || $profilepic3=='default'){ ?>
                        <img src="assets/img/user-pic.jpg" alt=""  />
                      <?php } else { ?>
                                <img src="assets/files/profile/<?php echo $profilepic3 ;?>" alt=""  />
                    <?php } } else { ?> 
                       <?php if($profilepic3=='' || $profilepic3=='default'){ ?>
                        <img src="assets/img/user-pic.jpg" alt=""  />
                        <?php } else { ?>
                      <img src="<?php echo $profilepic3 ;?>" alt=""  />
                    <?php } }?>
                      <form onsubmit="sumitcomment(<?php echo $pid; ?>);" action="javascript:void(0);" id="comment-form<?php echo $pid; ?>" method="post">
                        <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                        <input type="hidden" name="postid" value="<?php echo $pid; ?>"  />
                        <input type="hidden" name="thisuserid" value="<?php echo $userId; ?>"  />
                        <input type="hidden" name="targetedtable" value="buypostcomment"  />
                        <a href="javascript:void(0);" class="post">
                          <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                        </a>
                      </form>
                    </div>
                    <div id="commentwrap<?php echo $pid; ?>">
                      <?php
                       $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC"); // get comments
                       while($row=mysqli_fetch_array($thispostcomment)){
                         $user_commented=$row['userId'];
                         $this_commentid=$row['id'];
                         $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
                         while($row2=mysqli_fetch_array($getusername)){
                                $thisusername2	=$row2['username'];
                                $profilepic2 = $row2['ImageUrl'];
                                $loginType2 = $row2['loginType'];
																$thisuserfirstname2 = $row2['firstname'];
																$thisuserlastname2 = $row2['lastname'];
                         }
                      ?>
                       <div id="commnetitem<?php echo $this_commentid; ?>" class="comments">
                        <?php
													if($thisuserid==$_SESSION['userid']){
												?>
													<div class="delete"><a onclick="if (confirm('Are you sure...?')) delitem2('buypostcomment',<?php echo $this_commentid; ?>, <?php echo $userId; ?>); return false" href="javascript:void(0);" class="btn-primary">x</a></div>
												<?php
													}
												?>
                        
                        <?php if($loginType2=='default'){ ?>
                          <?php if($profilepic2=='' || $profilepic2=='default'){ ?>
                            <img src="assets/img/user-pic.jpg" alt=""  />
                          <?php } else { ?>
                                    <img src="assets/files/profile/<?php echo $profilepic2 ;?>" alt=""  />
                          <?php } } else { ?> 
                           <?php if($profilepic2=='' || $profilepic2=='default'){ ?>
                            <img src="assets/img/user-pic.jpg" alt=""  />
                            <?php } else { ?>
                          <img src="<?php echo $profilepic2 ;?>" alt=""  />
                        <?php } }?>
                        <div class="comments-cont">
                          <p><span><?php echo $thisuserfirstname2.'&nbsp;'.$thisuserlastname2; ?></span><?php echo $row['content']; ?></p>
                          <div class="action">
                            <time><?php echo $row['month'].'&nbsp;'.$row['day']; ?></time>
                          </div>
                        </div>
                      </div> 
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
							    }
									
							   $postcount++;
								}
							 ?>
               <!--p navigation-->
							<?php if (isset($next)) { ?>
              <div class="nav">
                <a href='search-result.php?p=<?php echo $next?>'>Next</a>
              </div>
              <?php } ?>
            <!--single post end-->
            </div>
          </div>
          <?php include('includes/rightbar.php');?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<script>
            
                customsearch();
        </script>