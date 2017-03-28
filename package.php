<?php include('includes/header.php'); ?>
    <section id="middle">
    	<div class="container">
            <div class="info-sheet">
            	
                <div class="info-table packages">
                	<h2>What is a BisMail?</h2>
                  <p class="orange-txt lrgtxt">A BisMail allows you to contact person that is not your friend.</p>
                  
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="pbox">
                          <div class="head blu-back">Free</div>
                          <div class="b-body">
                            <p class="first-line"></p>
                            <p class="price"><span class="currency">$</span><span class="amount">0</span></p>
                            <p class="package"></p>
                          </div> 
                          <div class="b-footer">
                            <p class="first-para">Create your profile, product and connect to potenial business partner</p>
                            <p>1 free BisMail a day<br /><span class="orange-txt">*can not accumulate</span></p>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="pbox">
                          <div class="head green-back">Basic</div>
                          <div class="b-body">
                            <p class="first-line">single purchase</p>
                            <p class="price"><span class="currency">$</span><span class="amount">2</span></p>
                            <p class="package">1 BisMail </p>
                            <a href="javascript:void(0);" onclick="orderp(<?php echo $userId; ?>,2)" class="start-btn">Start</a>
                            <img class="paypal-logo" alt="paypal-logo" src="assets/img/paypal-payment.png" />
                          </div>
                          <div class="b-footer">
                            <p class="first-para">Only want to connect to 1 person? You only need to spend $2. Don’t spend more than you need to!</p>
                            <p>1 free BisMail a day <br /><span class="orange-txt">*can not accumulate</span><br />1 BisMail that you can use anytime you want <br /><span class="green-txt">*can accumulate</span></p>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="pbox">
                          <div class="head red-back">Premium </div>
                          <div class="b-body">
                            <p class="first-line">monthly plan</p>
                            <p class="price"><span class="currency">$</span><span class="amount">25</span><span class="timespam">/month</span></p>
                            <p class="package">$300 /year</p>
                            <a class="start-btn" href="javascript:void(0);" onclick="orderp(<?php echo $userId; ?>,3)">Start</a>
                            <img class="paypal-logo" alt="paypal-logo" src="assets/img/paypal-payment.png" />
                          </div>
                          <div class="b-footer">
                            <p class="first-para">Premium plan allows you to connect to more people everyday. A good choice start our service.</p>
                            <p>4 BisMails a day for a month.<br /><span class="orange-txt">*can not accumulate</span></p>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="pbox">
                          <div class="head purple-back">Premium Plus </div>
                          <div class="b-body">
                            <p class="first-line">yearly plan</p>
                            <p class="price"><span class="currency">$</span><span class="amount">20</span><span class="timespam">/month</span></p>
                            <p class="package">$240 /year</p>
                            <a href="javascript:void(0);" onclick="orderp(<?php echo $userId; ?>,4)" class="start-btn">Start</a>
                            <img class="paypal-logo" alt="paypal-logo" src="assets/img/paypal-payment.png" />
                          </div>
                          <div class="b-footer">
                            <p class="first-para">Best deal for sales people to connect to people for less than 25cents per person.</p>
                            <p>4 BisMails a day for a year.<br /><span class="orange-txt">*can not accumulate</span></p>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                  </div>
                  
                </div>
                
            </div>
        </div>
    </section>
</div>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display:none">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="hidden" name="custom" value="<?php echo $userId; ?>">
<input type="image" src="https://www.paypalobjects.com/en_US/TW/i/btn/btn_buynowCC_LG_wCUP.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" id="paybtn1">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display:none">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6XFV7ZT6J8K6C">
<input type="hidden" name="custom" value="<?php echo $userId; ?>">
<input type="image" src="https://www.paypalobjects.com/en_US/TW/i/btn/btn_buynowCC_LG_wCUP.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" id="paybtn2">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display:none">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="59U65VBWRYAR4">
<input type="hidden" name="custom" value="<?php echo $userId; ?>">
<input type="image" src="https://www.paypalobjects.com/en_US/TW/i/btn/btn_buynowCC_LG_wCUP.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" id="paybtn3">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<button id="pn6" style="visibility:hidden;"   class="paynow-button"

	data-business="icygamesteam@gmail.com"

	data-item_name="25dollarConnection"
	data-custom="<?php echo $userId; ?>"
	data-amount="25"

	data-quantity="1"

	data-currency_code="USD"
    
    data-on1="Option"
    data-os1=""
    data-src="1"
    data-a3="25"
    data-p3="1"
    data-t3="M"
    
    >

        <span  class="paynow-label">Pay Fee </span>

</button>

<button id="pn7" style="visibility:hidden;"   class="paynow-button"

	data-business="icygamesteam@gmail.com"

	data-item_name="240dollarConnection"
	data-custom="<?php echo $userId; ?>"
	data-amount="240"

	data-quantity="1"

	data-currency_code="USD"
    
    data-on1="Option"
    data-os1=""
    data-src="1"
    data-a3="240"
    data-p3="1"
    data-t3="M"
    
    >
    

        <span  class="paynow-label">Pay Fee </span>

</button>
<?php include('includes/footer.php'); ?>