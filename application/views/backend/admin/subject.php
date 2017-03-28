<div class="row">
	<div class="col-md-12">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">
			<li <?php if ($class_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Course_Details');?>
                    	</a></li>
			<li <?php if ($class_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_courses');?>
                    	</a></li>
                        
           <li>
            	<a href="#plan" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Modules_and_Teaching_Plan');?>
                    	</a></li>
                        
		</ul>
        
            <!----TABLE LISTING STARTS--->
           
        
    	<!------CONTROL TABS END------->
		<div class="tab-content">            
            <!----TABLE LISTING STARTS--->
            <div <?php if ($class_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('year');?></div></th>
                    		<th><div><?php echo get_phrase('subject_name');?></div></th>
                    		<th><div><?php echo get_phrase('sart_date');?></div></th>
                    		<th><div><?php echo get_phrase('end_date');?></div></th>
                            <th><div><?php echo get_phrase('action');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($subjects as $row):?>
                        <tr>
							<td><?php echo $row['yearn'];?></td>
							<td><?php echo $row['subject'];?></td>
							<td><?php echo $row['sdate'];?></td>
                            <td><?php echo $row['edate'];?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_subject/<?php echo $row['subject_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subject/delete/<?php echo $row['subject_id'];?>/<?php echo $class_id;?>');">
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
             <div class="tab-pane box " id="plan">
              <div class="box-content">
                	New Requirment
                </div>     
            </div>
            
			<!----CREATION FORM STARTS---->
			<div <?php if ($class_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?>  id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/subject/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <!--<div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                                <div class="col-sm-5">
                                    <select name="class_id" class="form-control" style="width:100%;">
                                    	<?php 
										$classes = $this->db->get('class')->result_array();
										foreach($classes as $row):
										?>
                                    		<option value="<?php //echo $row['class_id'];?>"><?php //echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php //echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control" style="width:100%;">
                                    	<?php 
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row):
										?>
                                    		<option value="<?php //echo $row['teacher_id'];?>"><?php //echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="yearn" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="subject" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control datepicker" name="sdate" value="" data-start-view="2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('end_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control datepicker" name="edate" value="" data-start-view="2">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_subject');?></button>
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