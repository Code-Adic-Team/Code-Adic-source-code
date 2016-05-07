<?php

session_start();
include_once 'dbconnect.php';

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$account = $userRow['username'];


if(!isset($_SESSION['user']))
{
 $account = $_POST['name'];
}


$to = "myemail";
$subject = $_POST['sub'];
$txt = $_POST['msg'];
$email = $_POST['email'];
$headers = "From: Ahitt-Industries || " . $email . " || " . $account;

mail($to,$subject,$txt,$headers);
?>
