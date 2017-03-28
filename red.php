<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('includes/header-public.php');?>
<section id="middle">
      <div class="container">
      	<div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3">
            </div>
          </div>
        </div>
      </div>
</section>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Attention!</h4>
      </div>
      <div class="modal-body">
        <p>You Have tried to Access No Guest Area. You need to log in or signup</p>
      </div>
      <div class="modal-footer">
        
        <a href="<?php echo BASE_URL; ?>"  class="btn btn-primary" >log In</a> 
        <a href="<?php echo $_GET['ref']; ?>" onclick="history.back(); return false;" class="btn btn-default" >Go Back</a>   
      </div>
    </div>

  </div>
</div>
                
<?php include('includes/footer.php');?>
<script>

$(document).ready(function(){
    $('#myModal').modal();   
});

</script>