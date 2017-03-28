<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">
			<li <?php if ($class_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Class_Details');?>
                    	</a></li>
			<li <?php if ($class_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('allocate_class');?>
                    	</a></li>
                        
           <li>
            	<a href="#time" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Time_Allocation');?>
                    	</a></li>
           <li>
            	<a href="#teacher" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Teacher_Allocation');?>
                    	</a></li>
           <li>
            	<a href="#year" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Year_Allocation');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
		<div class="tab-content">
        
        
        <div class="tab-pane box " id="time" style="padding: 5px">
                <div class="box-content">
                	New Requirment
                </div>                
			</div>
            <div class="tab-pane box " id="teacher" style="padding: 5px">
                <div class="box-content">
                	New Requirment
                </div>                
			</div>
            <div class="tab-pane box " id="year" style="padding: 5px">
                <div class="box-content">
                	New Requirment
                </div>                
			</div>
        
            <!----TABLE LISTING STARTS--->
            <div <?php if ($class_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('class_name');?></div></th>
                    		<th><div><?php echo get_phrase('Subject');?></div></th>
                    		<th><div><?php echo get_phrase('Year');?></div></th>
                            <th><div><?php echo get_phrase('Teacher');?></div></th>
                    		<th><div><?php echo get_phrase('Start Date');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($classes as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['subject'];?></td>
                            <td><?php echo $row['yeaar'];?></td>
							<td><?php echo $row['teacher'];?></td>
                            <td><?php echo $row['start_date'];?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class/<?php echo $row['class_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/classes/delete/<?php echo $row['class_id'];?>');">
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
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div <?php if ($class_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/classes/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="subject"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="yeaar"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="teacher"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="start_date"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_class');?></button>
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