<!DOCTYPE html>
<html>
<head>
<title>管理员登录</title>

<link rel="stylesheet" type="text/css" href="../css/globalstyle.css"/>

</head>

<body>

<h1>
管理员登录
</h1>

<form name="loginform" action="logsession.php" method="Post">
	<table>
	<tr>
		<td>用户名:</td>
		<td><label>
			<input name="txtUserName" type="text" id="txtUserName" value=""/>
		</label></td>
	</tr>
	<tr>
		<td>密码:</td>
		<td><label>
			<input name="txtUserPass" type="text" id="txtUserPass" value=""/>
		</label></td>
	</tr>
	<tr>
		<td>
		</td>
		<td><label>
			<input name="submit" type="submit" id="submit" value="提交"/>
		</label>
		<label>	
		<input name="reset" type="reset" id="reset" value="重置"/>
		</label></td>
	</tr>
	</table>
</form>


</body>

</html>