<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">
			<li <?php if ($admin_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('users_list');?>
                    	</a></li>
			<li <?php if ($admin_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="active"';}?>>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_admin');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div <?php if ($admin_id=='1'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="list">
				<h4><?php echo get_phrase('admin_list');?></h4>
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('email');?></div></th>
                    		<th><div><?php echo get_phrase('password');?></div></th>
                            <th><div><?php echo get_phrase('level');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($users as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['password'];?></td>
                            <td><?php echo $row['level'];?></td>
							<td><?php if($row['status']=='0'){ echo 'Restricted'; }else{ echo 'Functional';}?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_user/<?php echo $row['admin_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    
                                    
                                    <!-- DELETION LINK -->
                                    <?php if($row['level'] != '1'){?>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/users/delete/<?php echo $row['admin_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                   <?php } ?>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <br />
                <br />
                <h4><?php echo get_phrase('Teacher List');?></h4>
                <table class="table table-bordered datatable" id="table_export2">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('email');?></div></th>
                    		<th><div><?php echo get_phrase('password');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($teacherusers as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['password'];?></td>
							<td><?php if($row['status']=='0'){ echo 'Restricted'; }else{ echo 'Functional';}?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal2('<?php echo base_url();?>index.php?admin/users/status/<?php echo $row['teacher_id'];?>/teacher/0');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('Suspend');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal2('<?php echo base_url();?>index.php?admin/users/status/<?php echo $row['teacher_id'];?>/teacher/1');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('Restore');?>
                                        </a>
                                   </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
                <br />
                <br />
                <h4><?php echo get_phrase('Students List');?></h4>
                <table class="table table-bordered datatable" id="table_export2">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('email');?></div></th>
                    		<th><div><?php echo get_phrase('password');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($studentusers as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['password'];?></td>
							<td><?php if($row['status']=='0'){ echo 'Restricted'; }else{ echo 'Functional';}?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal2('<?php echo base_url();?>index.php?admin/users/status/<?php echo $row['student_id'];?>/student/0');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('Suspend');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal2('<?php echo base_url();?>index.php?admin/users/status/<?php echo $row['student_id'];?>/student/1');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('Restore');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
                <br />
                <br />
                <h4><?php echo get_phrase('Parent List');?></h4>
                <table class="table table-bordered datatable" id="table_export4">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('email');?></div></th>
                    		<th><div><?php echo get_phrase('password');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($parentusers as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['password'];?></td>
							<td><?php if($row['status']=='0'){ echo 'Restricted'; }else{ echo 'Functional';}?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal2('<?php echo base_url();?>index.php?admin/users/status/<?php echo $row['parent_id'];?>/parent/0');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('Suspend');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal2('<?php echo base_url();?>index.php?admin/users/status/<?php echo $row['parent_id'];?>/parent/1');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('Restore');?>
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
			<div <?php if ($admin_id=='2'){ echo 'style="display:none;"';}else{ echo 'class="tab-pane box active"';}?> id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/users/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('level');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="level"/>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label"><?php //echo get_phrase('status');?></label>
                                <div class="col-sm-5">
                                    <select name="status" class="form-control" style="width:100%;">
                                    		<option value="0am">0 am</option>
                                            <option value="1am">1 am</option>
                                    </select>
                                </div>
                            </div>-->
                            
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_admin');?></button>
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
		
		
		var datatable = $("#table_export2").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
		
		var datatable = $("#table_export3").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
		
		var datatable = $("#table_export4").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>