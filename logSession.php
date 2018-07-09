<?PHP
	session_start();
	$UID =$_POST['txtUserName'];
	$PSWD=$_POST['txtUserPass'];
	
	$_SESSION['UserName']=$UID;
	$_SESSION['UserPass']=$PSWD;
	
	header("Location:index.php");
	
?>
