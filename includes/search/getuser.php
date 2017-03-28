
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
$with=$_REQUEST['id'];

                                    $userId = $_SESSION['userid'];                  // Select clients who have ever conversation with user
                                    $q="SELECT * FROM user where id=$with limit 10";
                                    $res=mysqli_query($con,$q);
                                    //echo $q;  
                                    $arr=array();  
                                    if(mysqli_num_rows($res)>0)
                                    while($row=mysqli_fetch_assoc($res)){
                                        $arr[$row['id']]=array();                                        
                                        $arr[$row['id']]['withName']=$row['username'];
                                        $arr[$row['id']]['with']=$row['id'];
                                        $arr[$row['id']]['imageUrl']=empty($row['imageUrl'])?"assets/img/user-pic.jpg":"assets/files/profile/".$row['imageUrl'];
                                    }
                                    echo json_encode($arr); 
                                  ?>