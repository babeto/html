<?php

session_start();

$UID=$_POST['txtUserName'];
$PSWD=$_POST['txtUserPass'];

include ('../class/Admin.php');

$_SESSION['AdminName']=$UID;
$_SESSION['AdminPass']=$PSWD;

$admin = new Admin();

if($UID<>""){
	if($admin->addAdmin($UID, $PSWD)){
		header("Location:adminAddSucceed.php");
}
	else{
		header("Location:adminAddFailed.php");
	}
	
}
else{
	header("Location:adminAddFailed.php");
}

?>