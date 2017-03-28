
<?php include('../connection.php'); ?>
<?php
  function humanTiming ($time)
	{
	
			$time = time() - $time; // to get the time since that moment
			$time = ($time<1)? 1 : $time;
			$tokens = array (
					31536000 => 'year',
					2592000 => 'month',
					604800 => 'week',
					86400 => 'day',
					3600 => 'hour',
					60 => 'minute',
					1 => 'second'
			);
	
			foreach ($tokens as $unit => $text) {
					if ($time < $unit) continue;
					$numberOfUnits = floor($time / $unit);
					return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
			}
	 
	} 
?>
<?php
session_start();
$with=$_POST['id'];
/*$with=explode("_",$with);
$with=$with[1]; */
$from=$_POST['from'];
$to=$_POST['to'];
$fromc="";
$toc="";
if($from!=-1)
$fromc="and  id<=$from  ";
if($to!=-1){
 /* $to=explode("_",$to);
$to=$to[1]; */ 
$toc="and  id>=$to  ";
}
if(strlen($fromc)>0)$limit="";
else 
$limit="limit 10";
                                    $userId = $_SESSION['userid'];                  // Select clients who have ever conversation with user
                                    $q="select m.id m_id,message,if(senderid=$userId,1,isread) isread
                                    ,lasttime,unix_timestamp(NOW())-unix_timestamp(m.lasttime) time_diff,type,`with`,imageUrl,username from 
(SELECT *,if(senderid=$userId,'me','you') type,if(senderid='$userId',receiverid,senderid) `with`
 FROM messages m where (senderid=$userId and receiverid=$with) or (receiverid=$userId and senderid=$with)  $fromc $toc
 order by id desc $limit) m
inner join user u1 on `senderid`=u1.id 
";
/*echo $q;
die();*/
                                    $res=mysqli_query($con,$q);
                                    //echo $q;  
                                    $arr=array();  
                                    if(mysqli_num_rows($res)>0)
                                    while($row=mysqli_fetch_assoc($res)){
                                        $arr[$row['m_id']]=array();
                                        $arr[$row['m_id']]['snip']=$row['message'];
                                        $arr[$row['m_id']]['time']=humanTiming($row['lasttime']);
                                        $arr[$row['m_id']]['timestamp']=($row['lasttime']);
                                        $arr[$row['m_id']]['time_diff']=(time()-$row['lasttime']);
                                        $arr[$row['m_id']]['isread']=$row['isread'];
                                        $arr[$row['m_id']]['withName']=$row['username'];
                                        $arr[$row['m_id']]['type']=$row['type'];
                                        $arr[$row['m_id']]['with']=$row['with'];
                                        $arr[$row['m_id']]['with']=$row['with'];
                                        $arr[$row['m_id']]['imageUrl']=empty($row['imageUrl'])?"assets/img/user-pic.jpg":"assets/files/profile/".$row['imageUrl'];
                                    }
                                    $q="UPDATE messages SET isRead='1' where senderId='$with'"; 
                                    $res=mysqli_query($con,$q); 
                                    echo json_encode($arr); 
                                  ?>