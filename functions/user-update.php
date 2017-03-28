<?php 
	include('../includes/connection.php');
	//include('templates/buyPostTemplate.php');
	//include('templates/postTemplate.php');
	//session_start();
	//$_SESSION['userId']=10;
	//echo getUpdatePagePostsHTML(10,0,4);
	//print_r(getBuyPosts(10, 0, 4));
	
function getBuyPostHtmlTemplate($row){
		global $con;
		
		$pid=$row['id'];
		$title = $row['title'];
		$description = $row['description'];
		$industry = $row['industry'];
		$country = $row['country'];
		$access = $row['access'];
        $thisuserId = $row['userId'];
		$thisusername = '';
		$thisuserposition = '';
		$thisusercompany = '';
		$duration = $row['duration'];
		$anonymous = $row['anonymous'];
		$date=$row['date'];
		$month=$row['month'];
		$day=$row['day'];
		
		$userinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'"); //select user info who posted this buypost
		while($row2=mysqli_fetch_array($userinfo)){
			$thisuserid = $row2['id'];
			$thisuserfirstname = $row2['firstname'];
			$thisuserlastname = $row2['lastname'];
			$thisusername = $row2['username'];
			$profilepic1 = $row2['ImageUrl'];
			$loginType1 = $row2['loginType'];
		}
		
		$userprofileinfo= mysqli_query($con,"SELECT * FROM profile where userId='$thisuserid'"); //select user pinfo who posted this buypost
		while($row2=mysqli_fetch_array($userprofileinfo)){
			$thisusercompany = $row2['company'];
			$thisuserposition = $row2['position'];
		}
										
		$html = '<div id="postitem3'.$pid.'" class="post-item item22">';
        
		$userId = $_SESSION['userid'];
		
		if($thisuserid == $userId){
            $html .= '	<div class="delete">
							<a onclick="if (confirm(\'Are you sure...?\')) delitem(\'buyrequest\','.$pid.', '.$userId.'); return false" href="javascript:void(0);" class="btn-primary">
								<i class="fa fa-times"></i>
							</a>
						</div>';
        }
		
		$html .= '	<div class="industries">&nbsp;&nbsp;'.$industry.'
						&nbsp;&nbsp;
					</div>
					<div class="question">
						<a class="question" href="posted.php?pid=$pid">'.
							$title
						.'</a>
					</div>
					<div class="post-owner">';
					
		if($loginType1=='default'){
            if($profilepic1=='' || $profilepic1=='default'){
                $html .= '<img src="assets/img/user-pic.jpg" alt=""  />';
            } else {
                $html .= '<img src="assets/files/profile/$profilepic1" alt=""  />';
            } 
		} else {
            if($profilepic1=='' || $profilepic1=='default'){
                $html .= '<img src="assets/img/user-pic.jpg" alt=""  />';
            } else {
                $html .= '<img src="$profilepic1" alt=""  />';
            } 
		}
        
		$html .= '<div>
					<p>';
        
		if($anonymous=='on'){
			$html .= '<a href="javascript:void(0);" class="bluelink">Anonymous</a>';
		}else {
			$html .= '<a href="profile.php?user=$thisusername" class="bluelink">'.$thisuserfirstname.'&nbsp;'.$thisuserlastname.','.$thisuserposition.','.$thisusercompany.'</a>';
		}
        
		$html .= '</p>
                    <time>'.$month.'&nbsp;'.$day.'</time>
                  </div>
                </div>
                <div class="post-content">
                  <div class="more_content">
                    <p>'.$description.'</p>
                  </div>
                  <div class="row line"></div>
                </div>
                <div class="post-comments"> 
                <a href="#"><i class="fa fa-comment"></i>Comments</a>.
                <div id="likeup$pid;" style="display:inline-block;">';
        
        $tblname='buypostlikes';
        $checklike = mysqli_query($con,"SELECT * FROM buypostlikes where userId='$userId' AND postId='$pid'");
        $likecheck=mysqli_num_rows($checklike);
        if($likecheck >= 1){
            $html .= '	<a onclick="buylike('.$pid.', '.$userId.', 2, \''.$tblname.'\');" href="javascript:void(0);">
							<i class="fa fa-thumbs-up"></i>Liked
						</a>';
		} else {
            $html .= '<a onclick="buylike('.$pid.', '.$userId.', 2, \''.$tblname.'\');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a>';
        }
        
		$html .= '		</div>
						<a href="#" class="simpleConfirm">Report</a>
					</div>';
					
		if(isset($isSearch)&&$isSearch){
			goto apl;
		}
        
		$html .= '<div class="row">
                  <div class="coments-box white">';
				  
        //$userId = $_SESSION['userid'];
        $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");  // get current loged in user info
        
		$profilepic3 = '';
        $loginType3 = '';
		while($row2=mysqli_fetch_array($userinfo2)){
            $thisuserid3 = $row2['id'];
            $profilepic3 = $row2['ImageUrl'];
            $loginType3 = $row2['loginType'];
        }
		
		$isopentocomment=1;
		$checkthisusersettings= mysqli_query($con,"SELECT * FROM settings where userId='$thisuserid'");
		while($row22=mysqli_fetch_array($checkthisusersettings)){
			$isopentocomment = $row22['opentoComment'];
		}
		
		if($isopentocomment == 1){
			$html .= '<div  class="text-area">';
			
            if($loginType3=='default'){
                if($profilepic3=='' || $profilepic3=='default'){
                    $html .= '<img src="assets/img/user-pic.jpg" alt=""  />';
                } else {
                    $html .= '<img src="assets/files/profile/'.$profilepic3.'" alt=""  />';
                } 
			} else {
                if($profilepic3=='' || $profilepic3=='default'){
                    $html .= '<img src="assets/img/user-pic.jpg" alt=""  />';
                } else {
                    $html .= '<img src="'.$profilepic3.'" alt=""  />';
                } 
			}
			
            $html .= '<form onsubmit="sumitcomment('.$pid.');" action="javascript:void(0);" id="comment-form'.$pid.'" method="post">
                        <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                        <input type="hidden" name="postid" value="'.$pid.'"  />
                        <input type="hidden" name="thisuserid" value="'.$userId.'"  />
                        <input type="hidden" name="targetedtable" value="buypostcomment"  />
                        <a href="javascript:void(0);" class="post">
                          <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                        </a>
                      </form>
                    </div>';
		}
                    
      //  $html .= '  <div id="commentwrap'.$pid.'">';
		
        $this_commentid = 0;
        $thispostcomment= mysqli_query($con,"SELECT * FROM buypostcomment where postId='$pid' order by id DESC "); // get comments

$row_cnt = mysqli_num_rows($thispostcomment);
$muV="";
if($row_cnt>2)
	$muV="style='display:none'";


$html.='<div id="commentwrop'.$pid.'"  >';

	$iter=0;
	while($row=mysqli_fetch_array($thispostcomment)){

		$iter++;
		if($iter==3)
		{
			if($muV!="")
			{
				$html.= "<a class='kkk' id='viewComment$pid' >Load More Comments</a>";
				$html.=" <div id='commentwrap2-$pid'  $muV   >";
			}




		}


            $user_commented=$row['userId'];
            $this_commentid=$row['id'];
            $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
            
			while($row2=mysqli_fetch_array($getusername)){
                $thisusername2	=$row2['username'];
                $profilepic2 = $row2['ImageUrl'];
                $loginType2 = $row2['loginType'];
				$thisuserfirstname2 = $row2['firstname'];
				$thisuserlastname2 = $row2['lastname'];
            }
                         
            $html .= '<div id="commnetitem'.$this_commentid.'" class="comments">';
            
			if($thisuserid == $userId){
				$html .= '<div class="delete"><a onclick="if (confirm(\'Are you sure...?\')) delitem2(\'buypostcomment\', \''.$this_commentid.'\', '.$userId.'); return false" href="javascript:void(0);" class="btn-primary">x</a></div>';
			}
                        
            if($loginType2=='default'){
                if($profilepic2=='' || $profilepic2=='default'){
                    $html .= '<img src="assets/img/user-pic.jpg" alt=""  />';
                } else {
					$html .= '<img src="assets/files/profile/'.$profilepic2.'" alt=""  />';
                } 
			} else { 
                if($profilepic2=='' || $profilepic2=='default'){
                    $html .= '<img src="assets/img/user-pic.jpg" alt=""  />';
				} else {
                    $html .= '<img src="'.$profilepic2.'" alt=""  />';
                } 
			}
                        
			$html .= '<div class="comments-cont">
                          <p>
							<a href="profile.php?user=$thisusername2" class="bluelink">
								'.$thisuserfirstname2.'&nbsp;'.$thisuserlastname2.' 
							</a>'.
							$row["content"]
						.'</p>
                          <div class="action">
                            <time>'.$row['month'].'&nbsp;'.$row['day'].'</time>
                          </div>
                      </div>
                      </div> ';




        }
        if($iter>=3)
		{
			$html .= '</div>';
		}
		$html .= '</div>
                  </div>
                </div>';
				
        apl:
              
		$html .= '</div>';
		return $html;
	}
	function getUpdatePagePostsHTML($userId, $start, $limit){
		$html = '';
		
		$posts = getPosts($userId, $start, $limit);
		foreach($posts as $post){
			$html .= getPostHtmlTemplate($post);
		}
		
		return $html;
	}
	
	function getBuyPosts ($userId, $start, $limit){
		global $con;
		if ($con !== null) {
			$sql = "SELECT buyrequest.id, buyrequest.access,buyrequest.title,buyrequest.description,buyrequest.industry,buyrequest.country,buyrequest.duration,buyrequest.anonymous,buyrequest.userId,buyrequest.date,buyrequest.month,buyrequest.day,buyrequest.status FROM buyrequest,friend,follower where 
			(
				(
					(
						(friend.userId1=buyrequest.userId and friend.userId2=$userId) 
						OR (friend.userId2=buyrequest.userId and friend.userId1=$userId)
					) 
					AND (buyrequest.access  = 'Friends' OR buyrequest.access  = 'Public')
				) 
				OR 
				(
					(
						(follower.userId1=buyrequest.userId and follower.userId2=$userId) 
						OR (follower.userId2=buyrequest.userId and follower.userId1=$userId)
					) 
					AND buyrequest.access  = 'Public'
				) 
				OR (buyrequest.userId = $userId)
			)
			GROUP By buyrequest.id ORDER BY buyrequest.date DESC
			LIMIT {$start}, {$limit}";
			
			$result = $con->query($sql);
			
			$posts = array();
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					array_push($posts,$row);
				}
			}
			
			return $posts;
		}
	}
	
	function getPosts ($userId, $start, $limit){
		global $con;
		if ($con !== null) {
			$sql = "SELECT post.id,post.userId,post.date,post.content,post.imgUrl,post.access,post.month,post.day,post.status FROM post,friend,follower where 
			(
				(
					(
						(friend.userId1=post.userId and friend.userId2=$userId) 
						OR (friend.userId2=post.userId and friend.userId1=$userId)
					) 
					AND (post.access  = 'Friends' OR post.access  = 'Public')
				) 
				OR
				(
					(
						(follower.userId1=post.userId and follower.userId2=$userId) 
						OR (follower.userId2=post.userId and follower.userId1=$userId)
					) 
					AND post.access  = 'Public'
				)
				OR (post.userId = $userId)
			)
			GROUP By post.id desc
			LIMIT {$start}, {$limit}";
			
			$result = $con->query($sql);
			
			$posts = array();
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					array_push($posts,$row);
				}
			}
			
			return $posts;
		}
	}
?>