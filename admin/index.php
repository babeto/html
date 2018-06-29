<!DOCTYPE html>
<html>
<!--<?php include ('isAdmin.php'); ?> --> 
<head>
<title>网站管理</title>

<link rel="stylesheet" type="text/css" href="../css/globalstyle.css"/>


</head>

<frameset rows="20%,80%">
	<frame name="title" src="frame_title.php" scrolling="auto" frameborder="0">


	<frameset cols="20%,80%">
		<frame name="contents" src="left.php" scrolling="auto" frameborder="0">
		<frame name="right" src="../listArticles.php" scrolling="auto" frameborder="0">	

		<noframes>
		<body>
	
		<p>网页使用框架，但您的浏览器不支持框架、</p>
		</body>
		</noframes>
	</frameset>

</frameset>

</html>