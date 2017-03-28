<?php include('includes/header.php'); ?>
<?php
  $userId = $_SESSION['userid'];
	
	$userprofileinfo = mysqli_query($con,"SELECT * FROM profile where userId='$userId'");
	$rowcount=mysqli_num_rows($userprofileinfo);
	if($rowcount>=1){
	  while($row=mysqli_fetch_array($userprofileinfo)){
			$company = $row['company'];
			$position = $row['position'];
			$country = $row['country'];
			$state = $row['state'];
			$city = $row['city'];
			$businessType = $row['businessType'];
			$oldbusinessType = $row['businessType'];
			$product = $row['product'];
			$industry = $row['industry'];
			$description = $row['description'];
			$contact = $row['contact'];
			$city = $row['city']; 
			$access = $row['access']; 
	  }
	}
	else {
		  $company = '';
			$position = '';
			$country = '';
			$state = '';
			$city = '';
			$businessType = '';
			$product = '';
			$industry = '';
			$description = '';
			$contact = '';
			$city = '';
			$access = '';
	}
?>
    <section id="middle">
    	<div class="container">   
        	            
            <div class="row">
            	<div class="col-md-4">
                	<div class="edit-left">
                    	<div class="edit-title">
                        	<h1>Add Info</h1>
                            <div class="edit-item">
                            	<div data-subject="#f1">Company Name</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f2">Position</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f3">Country / Region</div>
                            </div>
							<div class="edit-item">
                            	<div data-subject="#f4">Province / State</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f5">City</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f6">Business Type</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f7">Product</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f8">Industry</div>
                            </div>
                            <div class="edit-item">
                            	<div data-subject="#f9">E-Mail</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8">
                	<div class="edit-details">
                    	<h1>Profile</h1>
                        <div class="form-preview">
                        	<form action="includes/profile/editprofile.php" method="post">
                            	<table border="0" cellpadding="0" cellspacing="0">
                                	<tr id="f1">
                                    	<td>Company</td>
                                        <td><input type="text" name="company" value="<?php echo $company; ?>" /></td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr id="f2" style="<?php if(empty($position)) echo "display:none";?>">
                                    	<td>position</td>
                                        <td><input type="text" name="position" value="<?php echo $position; ?>" /></td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr> 
                                    <tr>  
                                    	<td>Country</td> 
                                        <td class="showcust">  
                                        	<select class="scountry" style="display: none !important;" name="country">
                                                <?php if($country !='' ){
																							echo '<option value="'.$country.'">'.$country.'</option>';
																						   }else {
																								 echo '<option value="">Choose Country...</option>';
																								 }
          $qP="SELECT title FROM countries";
          $resP=mysqli_query($con,$qP);
          echo "";
          while($row2 = mysqli_fetch_assoc($resP)){
              $sel = $country==$row2['title'] ? "selected" : " ";
              echo "<option ".$sel." value='".$row2['title']."' >".$row2['title']."</option>";
          }
          echo "";?>
                                            </select>
                                        </td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
									 <tr id="f4" style="<?php if(empty($state)) echo "display:none";?>">
                                    	<td>Province / State</td>
                                        <td><input type="text" value="<?php echo $state; ?>" name="state" /></td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr id="f5" style="<?php if(empty($city)) echo "display:none";?>">
                                    	<td>City</td>
                                        <td><input type="text" value="<?php echo $city; ?>" name="city" /></td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr id="f6">
                                    	<td>Business Type</td>
                                        <td>
                                        	<div class="select-section">
                                                <div class="type-option">
                                                    <div class="item-show clearfix">
                                                    	<div <?php if (strpos($businessType,'Distributor') !== false) { echo ' style="display:block;" '; } ?>
                                                             class="c1">Distributor<span></span></div> 
                                                        <div  <?php if (strpos($businessType,'Manufacturer') !== false) { echo ' style="display:block;" '; } ?>
                                                         class="c2">Manufacturer<span></span></div>
                                                        <div  <?php if (strpos($businessType,'Broker') !== false) { echo ' style="display:block;" '; } ?>
                                                        class="c3">Broker<span></span></div>
                                                        <div   <?php if (strpos($businessType,'Supplier') !== false) { echo ' style="display:block;" '; } ?>
                                                        class="c4">Supplier<span></span></div>
                                                        <div <?php if (strpos($businessType,'Retailer') !== false) { echo ' style="display:block;" '; } ?>
                                                       class="c5">Retailer<span></span></div>
                                                        <div <?php if (strpos($businessType,'Carrier') !== false) { echo ' style="display:block;" '; } ?>
                                                       class="c6">Carrier<span></span></div>
                                                        <div <?php if (strpos($businessType,'Designer') !== false) { echo ' style="display:block;" '; } ?>
                                                       class="c7">Designer<span></span></div>
                                                    </div>
                                                    <div class="item-option">
                                                      <div class="c1"><input 
																											<?php if (strpos($businessType,'Distributor') !== false) { echo 'checked="checked"'; } ?> 
                                                      type="checkbox" name="businessType[]" value="Distributor" />Distributor</div>
                                                      <div class="c2"><input
                                                      <?php if (strpos($businessType,'Manufacturer') !== false) { echo 'checked="checked"'; } ?>
                                                       type="checkbox" name="businessType[]" value="Manufacturer" />Manufacturer</div>
                                                      <div class="c3"><input
                                                      <?php if (strpos($businessType,'Broker') !== false) { echo 'checked="checked"'; } ?>
                                                       type="checkbox" name="businessType[]" value="Broker" />Broker</div>
                                                      <div class="c4"><input
                                                      <?php if (strpos($businessType,'Supplier') !== false) { echo 'checked="checked"'; } ?>
                                                       type="checkbox" name="businessType[]" value="Supplier" />Supplier</div>
                                                      <div class="c5"><input
                                                      <?php if (strpos($businessType,'Retailer') !== false) { echo 'checked="checked"'; } ?>
                                                       type="checkbox" name="businessType[]" value="Retailer" />Retailer</div>
                                                      <div class="c6"><input
                                                       <?php if (strpos($businessType,'Carrier') !== false) { echo 'checked="checked"'; } ?>
                                                       type="checkbox" name="businessType[]" value="Carrier" />Carrier</div>
                                                      <div class="c7"><input
                                                      <?php if (strpos($businessType,'Designer') !== false) { echo 'checked="checked"'; } ?>
                                                       type="checkbox" name="businessType[]" value="Designer" />Designer </div>
                                                       <input type="hidden" name="oldbusinessType[]" value="<?php echo $oldbusinessType; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr id="f7" style="<?php if(empty($product)) echo "display:none";?>">
                                    	<td>Product</td>
                                        <td><input type="text" name="product" value="<?php echo $product; ?>" /></td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr id="f8" style="<?php if(empty($industry)) echo "display:none";?>">
                                    	<td>Industry</td>
                                        <td class="showcust">
                                          <select class="scountry" style="display: none !important;" name="industry[]">
                                            <?php if($industry !='' ){
																							echo '<option value="'.$industry.'">'.$industry.'</option>';
																						   }else {
																								 echo '<option value="">Choose industry...</option>';
																								 }
                                            $qP="SELECT * FROM industries";
          $resP=mysqli_query($con,$qP);
          echo ""; 
          while($row2=mysqli_fetch_assoc($resP)){
              echo "<option value='".$row2['title']."' >".$row2['title']."</option>";
          }
          echo ""; 
											?>
                                            
                                            
                                                               </select>

                                        </td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr id="f9" style="<?php if(empty($contact)) echo "display:none";?>">
                                    	<td>E-Mail</td>
                                        <td><input type="text" name="contact" value="<?php echo $contact; ?>"  /></td>
                                        <td><a class="fm-close" href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                    	<td>Description</td>
                                        <td><textarea name="description" ><?php echo $description; ?></textarea></td>
                                        <td></td>
                                    </tr>
                                </table>
                                <div class="save-option">
                                	
                                    <div class="shareto">
                      <select name="access">
                        <option>Public</option>
                        <option>Friends</option>
                      </select>
                    </div>
                                    <div>
                                    	<input type="submit" class="btn1" name="" value="Save changes" />
                                        <input type="button" name="" onclick="canceledit();" class="btn2" value="Cancel" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
</div>
<?php include('includes/footer.php');?>
<script type="text/javascript">
  function canceledit() {    
		window.location.href="<?php echo BASE_URL; ?>profile";
	} 
    $(document).on("click",".fm-close",function(evt){
evt.preventDefault();
ele=$(evt.target);
if(ele.parent().parent().prop("tagName")=="TD")
trg=ele.parent().parent().parent().find("input,select");
else 
trg=ele.parent().parent().find("input,select");
trg.val(" ");
});
</script>