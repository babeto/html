<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/globalstyle.css"/>
<title> 幻游山</title>
</head>

<body>
<h2>文章</h2>
<?php 
	include('./articles.php');

	$articles = new articles();
	$articles->listArticles();




?>



</body>

</html>
