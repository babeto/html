<!DOCTYPE html>

<html>
<head>
<title>管理员登录</title>

<link rel="stylesheet" type="text/css" href="../css/admin.css"/>

</head>

<body>

<div id="header">
<h2>
管理
</h2>
</div>

<form name="loginform" action="./adminSession.php" method="Post">
<div class="logBox">
<ul>
	<li class="tag">用户名:</li>
	<li class="inputBox">
		<input name="txtUserName" type="text" id="txtUserName" value=""/>
	</li>

	<li class="tag">密码:</li>
	<li class="inputBox">
		<input name="txtUserPass" type="text" id="txtUserPass" value=""/>
	</li>
	<li class="tag"></li>
	<li class="button">
		<input name="submit" type="submit" id="submit" value="登录"/>
		<input name="reset" type="reset" id="reset" value="重置"/>
	</li>

</ul>
</div>



</form>



</body>

</html>
