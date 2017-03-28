<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <?php echo form_open('admin/teacher/do_update/'.$row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker fill-up" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('sex');?></label>
                                <div class="col-sm-5">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="password" value="<?php echo $row['password'];?>"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="userfile" id="imgInp" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" alt="your image" height="100" />
                                </div>
                            </div>
                            
                            <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?php echo $row['name'];?>" autofocus="">
						</div>
					</div>
                    
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Surname');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="srname" data-validate="required" data-message-required="Value Required" value="<?php echo $row['srname'];?>" autofocus="">
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Post Code');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pcode" value="<?php echo $row['pcode'];?>">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Telephone Home');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="hphone" value="<?php echo $row['hphone'];?>">
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Mobile phone');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Work phone');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="wphone" value="<?php echo $row['wphone'];?>">
						</div> 
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Email Address');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('DBS Certificate Number');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="certifinumber" data-validate="required" data-message-required="Value Required" value="<?php echo $row['certifinumber'];?>" autofocus="">
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('DBS Issue Date');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="dbsissudate" value="<?php echo $row['dbsissudate'];?>" data-start-view="2">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-5 control-label"><?php echo get_phrase('Is your DBS registered for online service ?');?></label>
                        
						<div class="col-sm-5">
							<input style="float: left;clear: none;display: inline-block;width: 15%;" type="radio" class="form-control" name="onlineservice" value="Yes" checked>
                            <input style="float: left;clear: none;display: inline-block;width: 15%;" type="radio" class="form-control" name="onlineservice" value="No">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('QTS Expiry Date');?></label>
                        
						<div class="col-sm-5">
                            <input type="text" class="form-control datepicker" name="qtsexpiry" value="<?php echo $row['qtsexpiry'];?>" data-start-view="2">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('QTS Qualified');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="qtsqyaulify" value="<?php echo $row['qtsqyaulify'];?>">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Upload Experience Certificates');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select Certificate</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="expcerti" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Upload Education Certificates');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select Certificate</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="educerti" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_teacher');?></button>
                        </div>
                    </form>
                    <?php endforeach;?>
                </div>
			</div>