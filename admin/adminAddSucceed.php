<?php

session_start();

ECHO "Admin added succeed!";
#sleep(10);

echo $_SESSION['AdminName'];

header("Location:index.php");

?>