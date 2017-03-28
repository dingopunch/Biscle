<?php include('includes/header.php'); ?>
<?php error_reporting(E_ALL);ini_set("display_errors",1); ?>
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
        <style type="text/css">
          .buy-details table tr td {
            width: 25%;
          }
        </style>
        <div class="row">
          <div class="col-md-12">
            <form class="buy-details" action="includes/buy/buyrequest.php" method="post" style="position: relative;margin-top: 0px;opacity: 1;">
            	<table>
            		<tr>
            			<td colspan="4"><span>Request</span></td>
                </tr>
                <tr>
            			<td colspan="4">
                    <span>
		                  <input onKeyPress="filterwords('rtitle');" placeholder="I am looking for Product/ Service provider." id="rtitle"  type="text" name="title"  required/>
		                  <span id="err_rtitle" style='color:red;width: 100%;display: none;'><b>Title must be atleast 20 characters long</b> </span>
		                </span>
              		</td>
            		</tr>

            		<tr>
            			<td colspan="4">
            				<span>Description</span>
            			</td>
                </tr>
                <tr>
            			<td colspan="4">
            				<span>
			                <textarea onKeyPress="filterwords('rdesc');" minlength="50" id="rdesc" name="description" placeholder="Details of your requested product and service" required></textarea>
			                <span id="err_rdesc" style='color:red;width: 100%;display: none;'><b>Description Must be atleast 50 characters long</b> </span>
			                </span>
            			</td>
            		</tr>

            		<tr>
                  <td></td>
                  <td></td>
            			<td>
            				<span style="display: inline;width: initial;">Valid Time</span>
            				<span style="display: inline;width: initial;">
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
		                  	</span>
            			</td>
                  <td>
                    <span style="display: inline;width: initial;">Open To</span>
                    <span style="display: inline;width: initial;">
                        <select name="access">
                          <option value="Public">Public</option>
                          
                        </select>
                        </span>
                  </td>
            		</tr>

                <tr>
                  <td colspan="2">
                    <span>Industry</span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <span><?php insertIndustries($con);  ?></span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

            		<tr>
            			<td colspan="2">
            				<span>Country/Region</span>
            			</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
            			<td colspan="2">
            				<span><?php insertCountries($con);  ?></span>
            			</td>
                  <td></td>
                  <td></td>
            		</tr>

            		<tr>
            			<td>
            				<span>
			                <input type="checkbox" name="anonymous" value="on" />
			                Add anonymously</span>
			                <div style="color: red;font-weight: 700;" id="filterresult"></div>
            			</td>
            			<td>
            				<span></span>
            			</td>
            			<td></td>
                  <td>
                    <!-- <button class="btn cancel" name="">Cancel</button> -->
                      <button class="btn" id="filterbtn" type="submit" name="">Submit</button>
                    
                  </td>
            		</tr>
            	</table>

              <!-- <div></div>
              <div></div>
              <div>
                <label> </label>
                <label>   </label>
              </div>
              <div>
                <label>   </label>
                <label>   </label>
              </div>
              <div></div>
              <div></div> -->
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>