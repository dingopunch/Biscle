<?php 

include('includes/connection.php');
session_start();

//$_SESSION['last_u']=;
$not=Array();
$not['message']=array();
$not['not']=array();

//get All new messages


$q="SELECT * FROM messages where 
(receiverid={$_SESSION['userid']} OR senderid={$_SESSION['userid']}) and isRead=0
 ";//and str_to_date(lasttime,'%Y-%m-%d %h:%i:%s%p')>=from_unixtime($last)";
 //echo $q;
$res=mysqli_query($con,$q); 
$i=0;
$n=0;
    while($row=mysqli_fetch_assoc($res)){
        $not['message'][$i]=array();
        $not['message'][$i]['body']=$row['message'];
        if($_SESSION['userid']==$row['senderId'])
        $not['message'][$i]['type']="user-me";
        else
        $not['message'][$i]['type']="user-friend";
        $not['message'][$i]['senderid']=$row['senderId'];
        $not['message'][$i]['recid']=$row['receiverId'];
        $not['message'][$i]['read']=$row['isRead'];
        $not['message'][$i]['id']=$row['id'];
        $i++;
    }
    
    $q="SELECT * FROM notification where notificationReceiver='{$_SESSION['userid']}' and ntime>{$_SESSION['last_u']};";
    // echo $q;
    // die();
    $res=mysqli_query($con,$q);
    while($row=mysqli_fetch_assoc($res)){
        $qU="SELECT * FROM user where id={$row['notificationSender']};";
        $resU=mysqli_query($con,$qU);
        $rowU=mysqli_fetch_assoc($resU);
        if($row['notificationType']=='follow'){
            $not['not'][$n]="{$rowU['username']} is Following You ";
        }else {
            $not['not'][$n]="{$rowU['username']} sent You a request.";
        }
            $_SESSION['last_u']=$row['id'];
            $n++;
    }
    $not['log']="$q";
    $last=time();
$_SESSION['last_u']=$last;
$str=json_encode($not);
echo $str;
//

?>