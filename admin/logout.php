<?php

session_start();

$_SESSION['AdminName']="";
$_SESSION['AdminPass']="";

header("Location:login.php");

?>