<?php

session_start();

$UID=$_GET['txtUserName'];
$PSWD=$_GET['txtUserPass'];

$_SESSION['UserName']=$UID;
$_SESSION['UserPwd']=$PSWD;

header("Location:index.php");

?>