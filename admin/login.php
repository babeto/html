<!DOCTYPE html>

<html>
<head>
<title>管理员登录</title>

<link rel="stylesheet" type="text/css" href="../css/admin.css"/>

</head>

<body>

<h1>
管理员登录
</h1>

<div class="logBox">
<form name="loginform" action="./adminSession.php" method="Post">
<ul>
	<li class="liName">用户名:</li>
	<li>
		<input name="txtUserName" type="text" id="txtUserName" value=""/>
	</li>

	<li class="liName">密码:</li>
	<li>
		<input name="txtUserPass" type="text" id="txtUserPass" value=""/>
	</li>
	<li class="liName"></li>
	<li>
		<input name="submit" type="submit" id="submit" value="提交"/>
		<input name="reset" type="reset" id="reset" value="重置"/>
	</li>

</ul>




</form>
</div>


</body>

</html>
