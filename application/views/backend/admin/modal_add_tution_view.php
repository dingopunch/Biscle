<?php 
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_rooms');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/view_tution/create/' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('room_number');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="room_no" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('capacity');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="capacity" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('Available time');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="time" value=""/>
                        </div>
                    </div>
                     
                            
                            
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('add_room');?></button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
?>


