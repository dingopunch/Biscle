<style type="text/css">
  .list_style {
	padding: 10px 0px;
    border-bottom: 1px solid #eee;
    margin-bottom: 10px;
	  }
   .list_style span {
	   font-size:14px;
	   color:#000;
	   }
</style>
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#details" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Centre Details');?>
                    	</a>
            </li>
			<li>
            	<a href="#rooms" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Rooms');?>
                    	</a>
           </li>
                        
           <li>
            	<a href="#hours" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Opening Hours');?>
                    	</a>
           </li>
           <li>
            	<a href="#staff" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Staff Details');?>
                    	</a>
           </li>
           <li>
            	<a href="#invoices" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Invoices');?>
                    	</a>
           </li>
           <li>
            	<a href="#marketing" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Marketing');?>
                    	</a>
           </li>
		</ul>
    	<!------CONTROL TABS END------->
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="details">
				
                    		
                    	<?php $count = 1;foreach($tuition as $row):?>
							<div class="list_style"><span><?php echo get_phrase('Centre_No.');?>:</span>&nbsp; <?php echo $row['center_no'];?></div>
							<div class="list_style"><span><?php echo get_phrase('Centre_Name');?>:</span>&nbsp; <?php echo $row['center_name'];?></div>
                            <div class="list_style"><span><?php echo get_phrase('Centre_Manager');?>:</span>&nbsp; <?php echo $row['center_manger'];?></div>
							<div class="list_style"><span><?php echo get_phrase('Centre_Address');?>:</span>&nbsp; <?php echo $row['center_address'];?></div>
                            <div style="border-bottom:0px;" class="list_style"><span><?php echo get_phrase('Centre_Contact');?>:</span>&nbsp; <?php echo $row['center_contact'];?></div>
							
                        <?php endforeach;?>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box " id="rooms" style="padding: 5px">
               <div class="box-content">
                   <a style="padding: 10px;display: block;float: none;clear: both;max-width: 140px;background-color: #373e4a;color: #fff;    margin-bottom: 20px;" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_add_tution_view/<?php echo $row['room_id'];?>');"><i class="entypo-plus-circled"></i> <?php echo get_phrase('Add_New_Rooms');?></a>
                	<table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Room Number.');?></div></th>
                    		<th><div><?php echo get_phrase('Capacity');?></div></th>
                    		<th><div><?php echo get_phrase('Available time');?></div></th>
                            <th><div><?php echo get_phrase('Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($rooms as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['room_no'];?></td>
							<td><?php echo $row['capacity'];?></td>
                            <td><?php echo $row['time'];?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_tution_view/<?php echo $row['room_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/view_tution/delete/<?php echo $row['room_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                  
                                    
                                    
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                </div>                 
			</div>
            
			<!----CREATION FORM ENDS--->
            <div class="tab-pane box " id="hours" style="padding: 5px">
                <div class="box-content">
                	New Requirment
                </div>
            </div>
            <div class="tab-pane box " id="staff" style="padding: 5px">
                <div class="box-content">
                	New Requirment
                </div>
            </div>
            <div class="tab-pane box " id="invoices" style="padding: 5px">
                <div class="box-content">
                New Requirment
                </div>
            </div>
            <div class="tab-pane box " id="marketing" style="padding: 5px">
                <div class="box-content">
                New Requirment
                </div>
            </div>
            
            
		</div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>