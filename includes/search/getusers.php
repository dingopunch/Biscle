
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
$with=$_REQUEST['keyword'];
$with=mysqli_real_escape_string($con,$with);
$with=htmlentities($with); 
                                    $userId = $_SESSION['userid'];                  // Select clients who have ever conversation with user
                                    $q="SELECT *,u.id u_id FROM user u inner join friend f on  
									(u.id=f.userId1 and f.userId2='{$_SESSION['userid']}') 
									OR (u.id=f.userId2 and f.userId1='{$_SESSION['userid']}') 
									 where username like '%$with%' limit 10";
                                    $res=mysqli_query($con,$q);
                                    //echo $q; 
                                    $arr=array();   
                                    if(mysqli_num_rows($res)>0)
                                    while($row=mysqli_fetch_assoc($res)){
                                        $arr[$row['u_id']]=array();                                        
                                        $arr[$row['u_id']]['withName']=$row['username'];
                                        $arr[$row['u_id']]['with']=$row['u_id'];
                                        $arr[$row['u_id']]['imageUrl']=empty($row['imageUrl'])?"assets/img/user-pic.jpg":"assets/files/profile/".$row['imageUrl'];
                                    }
                                    echo json_encode($arr); 
                                  ?>