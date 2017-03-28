<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">
			<li <?php if ($class_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Manage_Tuition_Centres');?>
                    	</a></li>
			<li <?php if ($class_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Add_new_Tuition_Centres');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div <?php if ($class_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Centre_No.');?></div></th>
                    		<th><div><?php echo get_phrase('Centre_Name');?></div></th>
                    		<th><div><?php echo get_phrase('Centre_Manager');?></div></th>
                            <th><div><?php echo get_phrase('Centre_Address');?></div></th>
                    		<th><div><?php echo get_phrase('Centre_Contact');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($tuition as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['center_no'];?></td>
							<td><?php echo $row['center_name'];?></td>
                            <td><?php echo $row['center_manger'];?></td>
							<td><?php echo $row['center_address'];?></td>
                            <td><?php echo $row['center_contact'];?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_tution/<?php echo $row['tution_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/tution_centers/delete/<?php echo $row['tution_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>        
                                    <li>
                                        <a href="<?php echo base_url();?>index.php?admin/view_tution/view/<?php echo $row['tution_id'];?>" >
                                            <i class="entypo-eye"></i>
                                                <?php echo get_phrase('View');?>
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
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div <?php if ($class_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/tution_centers/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_no');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="center_no" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="center_name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_manger');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="center_manger"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_address');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="center_address"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_contact');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="center_contact"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_tution');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
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