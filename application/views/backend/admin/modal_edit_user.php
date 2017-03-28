<?php 
$edit_data		=	$this->db->get_where('admin' , array('admin_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_user');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/users/do_update/'.$row['admin_id'] , array('admin' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                     <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('level');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="level" value="<?php echo $row['level'];?>"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                     
                   
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                                <div class="col-sm-5">
                                    <select name="status" class="form-control" style="width:100%;">
                                    	    <option value="<?php echo $row['status'];?>"><?php if($row['status']=='0'){ echo 'Restricted'; }else{ echo 'Functional';}?></option>
                                    		<option value="0">Restricted</option>
                                            <option value="1">Functional</option>
                                            
                                    </select>
                                </div>
                            </div>
                            <br />
                            <br />
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_admin');?></button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


