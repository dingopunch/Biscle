<?php 
$edit_data		=	$this->db->get_where('class' , array('class_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_class');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/classes/do_update/'.$row['class_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="subject" value="<?php echo $row['subject'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="yeaar" value="<?php echo $row['yeaar'];?>"/>
                        </div>
                    </div>
                     <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <input type="text" value="<?php echo $row['teacher'];?>" class="form-control" name="teacher"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('start_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="start_date" value="<?php echo $row['start_date'];?>"/>
                                </div>
                            </div>
                            
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_class');?></button>
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


