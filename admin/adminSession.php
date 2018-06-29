<?php

session_start();

$UID=$_POST['txtUserName'];
$PSWD=$_POST['txtUserPass'];

$_SESSION['AdminName']=$UID;
$_SESSION['AdminPass']=$PSWD;

header("Location:index.php");

?>