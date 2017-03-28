<?php 
$edit_data		=	$this->db->get_where('rooms' , array('room_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_rooms');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/view_tution/do_update/'.$row['room_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('room_number');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="room_no" value="<?php echo $row['room_no'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('capacity');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="capacity" value="<?php echo $row['capacity'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('Available time');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="time" value="<?php echo $row['time'];?>"/>
                        </div>
                    </div>
                     
                            
                            
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_room');?></button>
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


