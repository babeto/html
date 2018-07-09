<!DOCTYPE html>
<html>
<head>
<title>登录/注册</title>

<link rel="stylesheet" type="text/css" href="css/globalstyle.css"/>

</head>

<body>

<h2>登录/注册</h2>


<form name="loginform" action="logSession.php" method="Post">
	<table>
	<tr>
		<td>用户名</td>
		<td><label>
			<input name="txtUserName" type="text" id="txtUserName" value=""/>
		</label></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><label>
			<input name="txtUserPass" type="password" id="txtUserPass" value=""/>
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
