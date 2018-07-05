<!DOCTYPE html>
<html>
<head>
<title>管理员添加</title>

<link rel="stylesheet" type="text/css" href="../css/admin.css"/>

</head>

<body>
<div id="header">
<h2>
管理员添加
</h2>
</div>

<script Language="JavaScript">

function ChkFields(){
	if(document.loginform.txtUserName.value==''){
		window.alert("请输入用户名！");
		loginform.txtUserName.focus();
		return false;
		}
	if(document.loginform.txtUserName.value.length<=2){
		window.alert("用户名长度必须大于2!");
		
		loginform.txtUserName.focus();
		return false;
	}
	if(document.loginform.txtUserPass.value==''){
		window.alert("请输入用户密码");
		loginform.txtUserPass.focus();
		return false;
	}
	if(document.loginform.txtUserPass.value.length<6){
		window.alert("用户密码长度须大于等于6!");
		loginform.txtUserPass.focus();
		return false;
	}
	if(document.loginform.txtUserPasscfr.value==''){
		window.alert("请确认用户密码");
		loginform.txtUserPasscfr.focus();
		return false;
	}
	if(document.loginform.txtUserPass.value!=document.loginform.txtUserPasscfr.value){
		window.alert("两次输入的密码必须相同!");
		return false;
	}
	return true;
	
}

</script>

<form name="loginform" action="adminAddSession.php" method="Post" onsubmit="return ChkFields()">
<div class="logBox">

<ul>
	<li class="tag">用户名:</li>
	<li class="inputBox">
		<input name="txtUserName" type="text" id="txtUserName" value=""/>
	</li>

	<li class="tag">密码:</li>
	<li class="inputBox">
		<input name="txtUserPass" type="password" id="txtUserPass" value=""/>
	</li>
	<li class="tag">密码确认:</li>
	<li class="inputBox">
		<input name="txtUserPasscfr" type="password" id="txtUserPasscfr" value=""/>
	</li>
	<li class="tag"></li>
	<li class="button">
		<input name="submit" type="submit" id="submit" value="提交"/>
		<input name="reset" type="reset" id="reset" value="重置"/>
	</li>

</ul>
	
</div>
</form>


</body>

</html>