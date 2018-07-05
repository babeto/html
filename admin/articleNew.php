<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/admin.css" />

<!--<?php  include('isAdmin.php'); ?> -->
</head>
<body>
<script Language="JavaScript">
function custom_close(){
	if(confirm("您确定关闭本页吗？")){
		window.opener=null;
		window.open(',','_self');
		window.close();
	}
}

function ChkFields(){
	if(document.editForm.txtTitle.value==""){
			window.alert("请输入标题!");
			return false;
	}
	if(document.editForm.txtContent.value==""){
			window.alert("请输入内容");
			return false;
	}
	return true;
}

</script>


<form name="editForm" action="articleSave.php" method="Post" onsubmit="return ChkFields()">

<div class="edit">
<input type="hidden" name="flag" value="add">
<ul>
<li class="tag">标题</li>
<li class="inputBox"> 
<input name="txtTitle" type="text" id="txtTitle" value="">
</li>
</ul>
<ul>
<li class="tag">内容</li>
<li class="inputBox">
<textarea name="txtContent" cols="50" rows="10" >

</textarea>
</li>
</ul>
<ul>
<li class="button">
<input name="submit" type="submit" id="submit" value="保存" >
<input name="btnclose" type="button" id="btnclose" value="关闭本页" onclick="custom_close()" >
</li>

</ul>

</div>

</form>


</body>

</html>