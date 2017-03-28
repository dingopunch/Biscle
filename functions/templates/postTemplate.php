<?php
	function getPostHtmlTemplate($row){
		global $con;
		
		$pid=$row['id'];
		$thisuserId	=$row['userId'];

		$userprofileinfo= mysqli_query($con,"SELECT * FROM user where id='$thisuserId'");
		while($row2=mysqli_fetch_array($userprofileinfo)){
			$thisusername	=$row2['username'];
			$thisuserfirstname = $row2['firstname'];
			$thisuserlastname = $row2['lastname'];
			$profilepic1 = $row2['ImageUrl'];
		    $loginType1 = $row2['loginType'];
		}
		
        $html = '<div id="postitme'.$pid.'" class="post-item item22">';
        
		$userId = $_SESSION['userid'];
		
		if($thisuserId == $userId){
            $html .= '	<div class="delete">
							<a onclick="if (confirm(\'Are you sure...?\')) delitem(\'buyrequest\',$pid, $userId); return false" href="javascript:void(0);" class="btn-primary">
								<i class="fa fa-times"></i>
							</a>
						</div>';
        }
		
		$html .='<div class="post-owner">';
		
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
                      <p><a href="profile.php?user='.$thisusername.'" class="bluelink">'.$thisuserfirstname.'&nbsp;'.$thisuserlastname.'</a></p>
                      <time>'.$row['month'].''.$row['day'].'</time>
                  </div>
                  </div>
                  <div class="post-content">
                    <p>'.$row['content'].'</p>
                  <div class="post-thumb clearfix">';
				
		$imgUrl2=$row['imgUrl'];
		if($row['imgUrl']!=''){
            $araycount=count($imgUrl2);
            $imgUrl2 = (explode(", ", $imgUrl2));
            foreach ($imgUrl2 as $value) {
                $html .= '<img src="assets/files/post/'.$value.'" alt=""  />';
            } 
		}
		
		$html .= '</div>
                  </div>
                  <div class="post-comments"> 
                	<a href="#"><i class="fa fa-comment"></i>Comments</a>. 
                  <div id="likeup'.$pid.'" style="display:inline-block;">';
		
        $tblname='postlikes';
        $checklike = mysqli_query($con,"SELECT * FROM postlikes where userId='$userId' AND postId='$pid'");
        $likecheck=mysqli_num_rows($checklike);
        if($likecheck >= 1){
            $html .= '<a onClick="buylike($pid, $userId, 2, \''.$tblname.'\');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Liked</a>';
        } else {
            $html .= '<a onClick="buylike($pid, $userId, 1, \''.$tblname.'\');" href="javascript:void(0);"><i class="fa fa-thumbs-up"></i>Like</a>';
        }
        
		$html .= '</div> 
                  <a href="#" class="simpleConfirm">Report</a>
                  </div>
                  <div class="row">
                  <div class="coments-box white">';
					
        $userinfo2 = mysqli_query($con,"SELECT * FROM user where id='$userId'");
		while($row2=mysqli_fetch_array($userinfo2)){
			$thisuserid3 = $row2['id'];
			$profilepic3 = $row2['ImageUrl'];
			$loginType3 = $row2['loginType'];
		}
		
		$isopentocomment=1;
		$checkthisusersettings= mysqli_query($con,"SELECT * FROM settings where userId='$thisuserId'");
		while($row22=mysqli_fetch_array($checkthisusersettings)){
			$isopentocomment=	$row22['opentoComment'];
		}
		
		if($isopentocomment == 1){		
            $html .= '<div class="text-area">';
            
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
            
			$html .= '<form onSubmit="sumitcomment('.$pid.');" action="javascript:void(0);" id="comment-form'.$pid.'">
                          <textarea name="comment" class="comentbox" placeholder="Comments here"></textarea>
                          <input type="hidden" name="postid" value="'.$pid.'"  />
                          <input type="hidden" name="thisuserid" value="'.$userId.'"  />
                          <input type="hidden" name="targetedtable" value="postcomment"  />
                          <a href="javascript:void(0);" class="post">
                            <input id="submitcoment" class="postcomment bnt-comment" type="submit"  name="" value="Comment">
                          </a>
                        </form>
                      </div>
                     <div id="commentwrap'.$pid.'"';

            $thispostcomment= mysqli_query($con,"SELECT * FROM postcomment where postId='$pid' order by id DESC");
            $row_cnt = mysqli_num_rows($thispostcomment);
            $muV="";
            if($row_cnt>2)
                $muV="style='display:none'";

            $iter=0;
            while($row=mysqli_fetch_array($thispostcomment)){
                $iter++;
                if($iter==3)
                {
                    if($muV!="")
                    {
                       $html.= "<a class='kkk' id='viewComment$pid' >Load More Comments</a>";
                       $html.= " <div id='commentwrap2-$pid'  $muV   >";
                    }




                }

                $user_commented=$row['userId'];
                $this_commentid=$row['id'];
                $getusername= mysqli_query($con,"SELECT * FROM user where id='$user_commented'");
                while($row2=mysqli_fetch_array($getusername)){
                    $thisusername2	=$row2['username'];
                    $thisuserfirstname2 = $row2['firstname'];
                    $thisuserlastname2 = $row2['lastname'];
                    $profilepic2 = $row2['ImageUrl'];
                    $loginType2 = $row2['loginType'];
                }

                $html .= '<div id="commnetitem'.$this_commentid.'" class="comments">';

                if($thisuserId==$_SESSION['userid']){
                    $html .= '<div class="delete"><a onClick="if (confirm(\'Are you sure...?\')) delitem2(\'postcomment\','.$this_commentid.', '.$userId.'); return false" href="javascript:void(0);" class="btn-primary">x</a></div>';
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
                            <p><span>'.$thisuserfirstname2.'&nbsp;'.$thisuserlastname2.'</span>'.$row['content'].'</p>
                            <div class="action">
                              <time>'.$row['month'].'&nbsp;'.$row['day'].'</time>
                            </div>
                          </div>
                        </div>';

            }
if($iter>=3)
{
    $html .= '</div>';
}
            $html .= '</div>
</div>
                    </div>
                  </div>
                </div>';

            return $html;
        }
    }
?>