<html>

<head>

</head>


<?php

session_start();

ECHO "Admin added Failed!";
#sleep(10);

echo $_SESSION['AdminName'];

header("Location:addAdmin.php");

?>


</html>