<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/globalstyle.css"/>
<title>乐游城</title>
</head>

<body>

<div id="header">

<h2>文章</h2>

</div>


<?php 
	
	include('./articles.php');
	
	$page=$_GET['Page'];
	$articles = new articles();
	$articles->listArticles($page);
	
?>





</body>

</html>
