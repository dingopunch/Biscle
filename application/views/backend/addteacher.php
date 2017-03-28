<?php
	$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	$text_align	=	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
	$account_type 	=	$this->session->userdata('login_type');
	?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
<head>
	
	<title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Ekattor School Manager Pro - Creativeitem" />
	<meta name="author" content="Creativeitem" />
	
	

	<?php include 'includes_top.php';?>
	
</head>
<body class="page-body" >
	<div class="page-container <?php if ($text_align == 'right-to-left') echo 'right-sidebar';?>" >
     <div class="page-header2 navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<ul class="list-inline links-list pull-right">
        <!-- Language Selector -->			
           <li class="dropdown language-selector">
                    <a style="background: #f5f5f6;" href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        	<i class="entypo-user"></i> <?php echo $this->session->userdata('login_type');?>&nbsp;<i class="fa fa-angle-down"></i>
                    </a>
				
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
                    <li>
						<a href="<?php echo base_url();?>index.php?login/logout">
                        	<i class="entypo-logout right"></i>Log Out 
						</a>
					</li>
				</ul>
				
			</li>
        </ul>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
		<?php include $account_type.'/navigation.php';?>	
		<div class="main-content">
		
			<?php include 'header.php';?>

           <h3 style="margin:20px 0px; color:#818da1; font-weight:200;">
           	<i class="entypo-right-circled"></i> 
				<?php echo $page_title;?>
           </h3>

			<?php include $account_type.'/'.$page_name.'.php';?>
            
            <div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					add teacher            	</div>
            </div>
			<div class="panel-body">
				
                 <?php echo form_open('admin/teacher/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">name</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="" autofocus="">
						</div>
					</div>
                    
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Surname</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="srname" data-validate="required" data-message-required="Value Required" value="" autofocus="">
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">address</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">Post Code</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pcode" value="">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">Telephone Home</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="hphone" value="">
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">Mobile phone</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">Work phone</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="wphone" value="">
						</div> 
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Email Address</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">password</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="password" value="">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-4 control-label">DBS Certificate Number</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="certifinumber" data-validate="required" data-message-required="Value Required" value="" autofocus="">
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">DBS Issue Date</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="dbsissudate" value="" data-start-view="2">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-5 control-label">Is your DBS registered for online service ?</label>
                        
						<div class="col-sm-5">
							<input style="float: left;clear: none;display: inline-block;width: 15%;" type="radio" class="form-control" name="onlineservice" value="Yes" checked>
                            <input style="float: left;clear: none;display: inline-block;width: 15%;" type="radio" class="form-control" name="onlineservice" value="No">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">QTS Expiry Date</label>
                        
						<div class="col-sm-5">
                            <input type="text" class="form-control datepicker" name="qtsexpiry" value="" data-start-view="2">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">QTS Qualified</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="qtsqyaulify" value="">
						</div> 
					</div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Upload Experience Certificates</label>
                        
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
						<label for="field-1" class="col-sm-3 control-label">Upload Education Certificates</label>
                        
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
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info">add teacher</button>
						</div>
					</div>
                </form>            </div>
        </div>
    </div>

			<?php include 'footer.php';?>

		</div>
		<?php //include 'chat.php';?>
        	
	</div>
    <?php include 'modal.php';?>
    <?php include 'includes_bottom.php';?>
    
</body>
</html>