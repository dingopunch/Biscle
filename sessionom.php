<?php
session_start();
$buyeruserid = $_POST['userid'];
$packageid = $_POST['pid'];
$_SESSION["buyeruserid"]=$buyeruserid;
$_SESSION["packageid"]=$packageid;
 
?>
