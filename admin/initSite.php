<!DOCTYPE html>
<html>
<head>
<title>Website Initialize</title>

<link rel="stylesheet" type="text/css" href="../css/globalstyle.css" />

</head>

<body>

<?php

include ('../class/database.php');

$database=new database();

$database->createAdminsTable();
$database->createArticlesTable();
$database->createUsersTable();
$database->createDownloadTable();

?>


</body>

</html>