<?php 
$edit_data		=	$this->db->get_where('tuition' , array('tution_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_tution');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/tution_centers/do_update/'.$row['tution_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('center_number');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="center_no" value="<?php echo $row['center_no'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('center_name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="center_name" value="<?php echo $row['center_name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('center_manger');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="center_manger" value="<?php echo $row['center_manger'];?>"/>
                        </div>
                    </div>
                     <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_address');?></label>
                                <div class="col-sm-5">
                                    <input type="text" value="<?php echo $row['center_address'];?>" class="form-control" name="center_address"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('center_contact');?></label>
                                <div class="col-sm-5">
                                    <input type="text" value="<?php echo $row['center_contact'];?>" class="form-control" name="center_contact"/>
                                </div>
                            </div>
                            
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_tution');?></button>
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


