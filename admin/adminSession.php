<?php

session_start();

$UID=$_GET['txtUserName'];
$PSWD=$_GET['txtUserPass'];

$_SESSION['AdminName']=$UID;
$_SESSION['AdminPass']=$PSWD;

header("Location:index.php");

?>