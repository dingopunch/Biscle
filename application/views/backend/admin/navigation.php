<div class="sidebar-menu">
		<header class="logo-env" >
			
            <!-- logo -->
			<div class="logo" style="">
				<a href="<?php echo base_url();?>">
					<img src="uploads/logo.png"  style="max-height:60px;"/>
				</a>
			</div>
            
			<!-- logo collapse icon -->
			<div class="sidebar-collapse" style="">
				<a href="#" class="sidebar-collapse-icon with-animation">
                
					<i class="entypo-menu"></i>
				</a>
			</div>
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation">
					<i class="entypo-menu"></i>
				</a>
			</div>
		</header>
		
		<div style="border-top:1px solid rgba(69, 74, 84, 0.7);"></div>	
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            
           
           <!-- DASHBOARD -->
           <li class="<?php if($page_name == 'dashboard')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/dashboard">
					<i class="entypo-gauge"></i>
					<span><?php echo get_phrase('dashboard');?></span>
				</a>
           </li>
           
             <!-- Tution Centers -->
           <li class="<?php if($page_name == 'tution_centers')echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-flow-tree"></i>
					<span><?php echo get_phrase('Tuition Centres');?></span>
				</a>
                <ul>
              
              <li class="<?php if($class_id == '1')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/tution_centers/1">
                          <span><?php echo get_phrase('Manage_Tuition_Centres');?></span>
                      </a>
                  </li>
                  
              <li class="<?php if($class_id == '2')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/tution_centers/2">
                          <span><?php echo get_phrase('Add_new_Tuition_Centres');?></span>
                      </a>
                  </li>
              </ul>
                
           </li>
           
           <!-- STUDENT -->
			<li class="<?php if($page_name == 'student_information' || 
									$page_name == 'student_add' || 
										$page_name == 'student_marksheet')
											echo 'opened active has-sub';?> ">
				<a href="#">
					<i class="fa fa-group"></i>
					<span><?php echo get_phrase('students');?></span>
				</a>
				<ul>
                	
                  
                  <!-- STUDENT INFORMATION -->
					<li class="<?php if($page_name == 'student_information')echo 'opened active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/student_information/">
									<span><i class="entypo-dot"></i> <?php echo get_phrase('Manage_Students');?></span>
								</a>
                        
					</li>
                    
                    <!-- STUDENT ADMISSION -->
					<li class="<?php if($page_name == 'student_add')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/student_add">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('Add_new_Students');?></span>
						</a>
					</li>
                    
                  <!-- STUDENT MARKSHEET -->
					
				</ul>
			</li>
            
           <!-- TEACHER -->
           <!--<li class="<?php //if($page_name == 'teacher' )echo 'active';?> ">
				<a href="<?php //echo base_url();?>index.php?admin/teacher">
					<i class="entypo-users"></i>
					<span><?php// echo get_phrase('teacher');?></span>
				</a>
           </li>-->
           
           <li class="<?php if($page_name == 'teacher' || 
									$page_name == 'Online_Applications' || 
										$page_name == 'new_registrations' ||
										    $page_name == 'List_of_Teachers')
											echo 'opened active has-sub';?> ">
				<a href="#">
					<i class="entypo-users"></i>
					<span><?php echo get_phrase('teachers');?></span>
				</a>
				<ul>
                	<!-- Teacher Online_Applications -->
					
                  
                  <!-- Teacher List_of_Teachers -->
					<li class="<?php if($page_name == 'teacher')echo 'opened active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/teacher">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('Manage_Teachers');?></span>
						</a>
                        
					</li>
                    
                    <!-- Teacher New_Registrations -->
					<li class="<?php if($page_name == 'new_registrations')echo 'opened active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/new_registrations">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('Add_new_Teachers');?></span>
						</a>
                        
					</li>
                    
				</ul>
			</li>
            
           <!-- PARENT -->
           <!--<li class="<?php// if($page_name == 'parent')echo 'opened active';?> ">
				<a href="<?php //echo base_url();?>index.php?admin/parent">
					<i class="entypo-user"></i>
					<span><?php// echo get_phrase('parent');?></span>
				</a>
                <ul>
					<?php //$classes	=	$this->db->get('class')->result_array();
                   // foreach ($classes as $row):?>
                    <li class="<?php //if ($page_name == 'parent' && $class_id == $row['class_id']) echo 'active';?>">
                        <a href="<?php //echo base_url();?>index.php?admin/parent/<?php //echo $row['class_id'];?>">
                            <span><?php //echo get_phrase('class');?> <?php// echo $row['name'];?></span>
                        </a>
                    </li>
                    <?php //endforeach;?>
                </ul>
           </li>-->
            
          
            
           <!-- SUBJECT -->
           <li class="<?php if($page_name == 'subject')echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-docs"></i>
					<span><?php echo get_phrase('Course');?></span>
				</a>
              <ul>
              
              <li class="<?php if($class_id == '1')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/subject/1">
                          <span><?php echo get_phrase('Manage_Courses');?></span>
                      </a>
                  </li>
                  
              <li class="<?php if($class_id == '2')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/subject/2">
                          <span><?php echo get_phrase('Add_new_course');?></span>
                      </a>
                  </li>
                  
                  <?php //$classes	=	$this->db->get('class')->result_array();
                 // foreach ($classes as $row):?>
                  <!--<li class="<?php //if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active';?>">
                      <a href="<?php //echo base_url();?>index.php?admin/subject/<?php //echo $row['class_id'];?>">
                          <span><?php //echo get_phrase('class');?> <?php //echo $row['name'];?></span>
                      </a>
                  </li>-->
                  <?php // endforeach;?>
              </ul>
           </li>
           
            <!-- CLASS -->
           <li class="<?php if($page_name == 'class')echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-flow-tree"></i>
					<span><?php echo get_phrase('class');?></span>
				</a>
                <ul>
              
              <li class="<?php if($class_id == '1')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/classes/1">
                          <span><?php echo get_phrase('Manage_Class');?></span>
                      </a>
                  </li>
                  
              <li class="<?php if($class_id == '2')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/classes/2">
                          <span><?php echo get_phrase('Add_new_Class');?></span>
                      </a>
                  </li>
              </ul>
                
           </li>
            
           <!-- CLASS ROUTINE -->
           <li style="display:none;" class="<?php if($page_name == 'class_routine')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/class_routine">
					<i class="entypo-target"></i>
					<span><?php echo get_phrase('class_routine');?></span>
				</a>
           </li>
            
           <!-- DAILY ATTENDANCE -->
           <li style="display:none;" class="<?php if($page_name == 'manage_attendance')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/manage_attendance/<?php echo date("d/m/Y");?>">
					<i class="entypo-chart-area"></i>
					<span><?php echo get_phrase('daily_attendance');?></span>
				</a>
                
           </li>
            
           <!-- EXAMS -->
           <li style="display:none;" class="<?php if($page_name == 'exam' ||
		   								$page_name == 'grade' ||
												$page_name == 'marks')echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-graduation-cap"></i>
					<span><?php echo get_phrase('exam');?></span>
				</a>
                <ul>
					<li class="<?php if($page_name == 'exam')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/exam">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('exam_list');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'grade')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/grade">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('exam_grades');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'marks')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/marks">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('manage_marks');?></span>
						</a>
					</li>
                </ul>
           </li>
            
           <!-- PAYMENT -->
           <li style="display:none;" class="<?php if($page_name == 'invoice')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/invoice">
					<i class="entypo-credit-card"></i>
					<span><?php echo get_phrase('payment');?></span>
				</a>
           </li>
            
           <!-- LIBRARY -->
           <li style="display:none;" class="<?php if($page_name == 'book')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/book">
					<i class="entypo-book"></i>
					<span><?php echo get_phrase('library');?></span>
				</a>
           </li>
            
           <!-- TRANSPORT -->
           <li style="display:none;" class="<?php if($page_name == 'transport')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/transport">
					<i class="entypo-location"></i>
					<span><?php echo get_phrase('transport');?></span>
				</a>
           </li>
            
           <!-- DORMITORY -->
           <li style="display:none;" class="<?php if($page_name == 'dormitory')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/dormitory">
					<i class="entypo-home"></i>
					<span><?php echo get_phrase('dormitory');?></span>
				</a>
           </li>
            
           <!-- NOTICEBOARD -->
           <li class="<?php if($page_name == 'noticeboard')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/noticeboard">
					<i class="entypo-doc-text-inv"></i>
					<span><?php echo get_phrase('noticeboard');?></span>
				</a>
           </li>
            
           <!-- SETTINGS -->
           <li style="display:none;" class="<?php if($page_name == 'system_settings' ||
		   								$page_name == 'manage_language')echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-lifebuoy"></i>
					<span><?php echo get_phrase('settings');?></span>
				</a>
                <ul>
					<li class="<?php if($page_name == 'system_settings')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/system_settings">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('general_settings');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'manage_language')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?admin/manage_language">
							<span><i class="entypo-dot"></i> <?php echo get_phrase('language_settings');?></span>
						</a>
					</li>
                </ul>
           </li>
            
           <!-- ACCOUNT -->
           <li style="display:none;" class="<?php if($page_name == 'manage_profile')echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?admin/manage_profile">
					<i class="entypo-lock"></i>
					<span><?php echo get_phrase('account');?></span>
				</a>
           </li>
                
          <!-- USERS -->
           <li class="<?php if($page_name == 'users')echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-users"></i>
					<span><?php echo get_phrase('users');?></span>
				</a>
                <ul>
              
              <li class="<?php if($admin_id == '1')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/users/1">
                          <span><?php echo get_phrase('add_admins');?></span>
                      </a>
                  </li>
                  
              <li class="<?php if($admin_id == '2')echo 'active';?> ">
                      <a href="<?php echo base_url();?>index.php?admin/users/2">
                          <span><?php echo get_phrase('manage_users');?></span>
                      </a>
                  </li>
              </ul>
                
           </li>
            
           
		</ul>
        		
</div>