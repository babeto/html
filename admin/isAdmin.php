<?php

session_start();
$adminname=$_SESSION['AdminName'];
$adminpass=$_SESSION['AdminPass'];

echo $adminname;
echo $adminpass;

include ('../class/Admin.php');

$admin=new Admin();
if($username<>""){
	$admin->setAdminName($adminname);
	$admin->setPass($adminpass);
	if(!$admin->HaveAdmin()){
		echo "don not admin";
		#header("Location:login.php");
	}
}
else{
	echo "admin empty";
	#header("Location:login.php");
}


?>