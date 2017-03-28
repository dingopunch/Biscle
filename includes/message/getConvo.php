
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

                                    $userId = $_SESSION['userid'];                  // Select clients who have ever conversation with user
                                    $q="select m.id,message,if(senderid=$userId,1,isread) isread
                                    ,lasttime lasttime,type,`with`,imageUrl,username from 
(SELECT *,if(senderid=$userId,'me','you') type,if(senderid='$userId',receiverid,senderid) `with`
 FROM messages m where senderid=$userId or receiverid=$userId order by id desc) m
inner join user u1 on `with`=u1.id 

group by `with`";
                                    $res=mysqli_query($con,$q);
                                    // echo $q;
                                    // die();
                                    $arr=array();  
                                    while($row=mysqli_fetch_assoc($res)){
                                        $arr[$row['with']]=array();
                                        $arr[$row['with']]['snip']=$row['message'];
                                        $arr[$row['with']]['time']=humanTiming($row['lasttime']);
                                        $arr[$row['with']]['timestamp']=($row['lasttime']);
                                        $arr[$row['with']]['time_diff']=(time()-$row['lasttime']);
                                        $arr[$row['with']]['isread']=$row['isread'];
                                        $arr[$row['with']]['withName']=$row['username'];
                                        $arr[$row['with']]['type']=$row['type'];
                                        $arr[$row['with']]['imageUrl']=empty($row['imageUrl'])?"assets/img/user-pic.jpg":"assets/files/profile/".$row['imageUrl'];
                                    } 
                                    echo json_encode($arr); 
                                  ?>