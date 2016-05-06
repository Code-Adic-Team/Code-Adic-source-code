<?php

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: register");
}

$fname = $_POST["name"];
$myfile = fopen('./pages/' . $fname, "w") or die("Unable to open file!");
$txt = $_POST["code"];
fwrite($myfile, $txt);
fclose($myfile);

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$name = $_POST["name"];
$author = $userRow['username'];
if(mysql_query("INSERT INTO users(Author,project) VALUES('$author','$name')"))
 {
  ?>
        <script>alert('Successfully Submitted! ');</script>
        <?php
 }
header('Location:/pages/' . $name);
?>