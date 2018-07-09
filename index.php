<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" type="text/css" href="./css/globalstyle.css" >
<!--  <?php include ('./isUser.php'); ?> -->
<title></title>
<script src="./jquery/jquery-3.3.1.min.js"></script>

<script>
$(document).ready(function(){
	$("#section").load("listArticles.php");
	$("#artlist").click(function(){
		$("#section").load("./listArticles.php");
	});
	$("#login").click(function(){
		$("#section").load("./login.php");
	});
	$("#down").click(function(){
		$("#section").load("./downloadList.php");
	});
})

</script>


</head>

<body>
<div class="container">
<div class="main">
	<div id="header">

	<h1>ANWANG</h1>

	</div>

		<div id="nav">
		<ul>

		<li><a href=# id="artlist">文章</a></li>
		<li><a href=# id="login">登录</a></li>
		<li><a href=# id="down">下载</a></li>
		<li><a href="./comments.php">留言</a></li>
		<li><a href="./admin/adminIndex.php">管理</a></li>

		</ul>

		</div>

		<div id="section">

		</div>

</div>
		<div id="footer">

		<p>www.coolmax.com</p>

		</div>
</div>
</body>

</html>