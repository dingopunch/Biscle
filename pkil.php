<?php
session_start();
$userId = $_SESSION['userid'];
$platform=$_POST['status'];

include('includes/connection.php');
include "IPN/php/functions.php";

$add=mysqli_query($con,"Select * from free_share where userId='$userId' and platform='$platform'");
if(mysqli_num_rows($add)>0){
    echo false;
}
else
{
    addFirstPackage($userId, 500) ;


    $add1=mysqli_query($con,"INSERT INTO free_share (userId, platform)
VALUES ('$userId', $platform)");
    if (!$add1){

        echo"<b>Error !</b> Please check again".mysqli_error($con);

    }
}

?>
