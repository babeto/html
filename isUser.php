<?php

session_start();
$username=$_SESSION['UserName'];
$userpass=$_SESSION['UserPass'];


include ('../class/User.php');

$user=new User();
if($username<>""){
	$user->setUserName($username);
	$user->setPass($userpass);
	if(!$user->HaveUser()){
		header("Location:login.php");
	}
}
else{
	header("Location:login.php");
}


?>