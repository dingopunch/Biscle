<?php 
 session_start();
if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    $logged=true;
  }else $logged=false;
if($logged)
    include('includes/header.php'); 
else 
    include('includes/header-public.php');
 ?>
    <section id="search-result">
    	<div class="container">
        	<div class="src-result">	
            	<div class="row">
                    <div class="col-md-3">
                        <div class="search-box">
                            <form action="javascript:void(0);" method="post" onsubmit="customsearch();" id="customsearch">
                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr> 
                                        <td> 
                                            <span>Looking For</span>
                                            <select name="userType">
                                            	<option value="All">Select</option>
                                              <option value="Post">Post</option>
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
                                            <?php insertCountries2($con);  ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>                                            
                                          <span>Industry</span>
                                          <?php insertIndustries2($con);  ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span></span>
                                            <input value="<?php if(isset($_GET['search'])) echo $_GET['search'];  ?>" type="text" name="searchtext"  />
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        	<button type="submit" name="">Search</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9">
                    	<div id="custemsearchresult" class="result-found">
                      </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    

</div>


<?php include('includes/footer.php'); ?>
<script src="assets/js/pages/search.js"></script> 
<script>customsearch();</script>
<style>
span.pageNo {
    cursor: pointer;
    margin: 7px;
    padding: 10px;
    border: 1px solid gray;
}
div#pagination {
    margin-bottom: 40px;
    background: white;
}
</style>