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

</script>

<?php
	include ('../class/articles.php');
	$articleID=$_GET['ArticleID'];
	$articles=new articles();
	$article=mysql_fetch_array($articles->getArticleByID($articleID));
?>

<form name="editForm" action="articleSave.php" method="Post">

<div class="edit">
<input type="hidden" name="articleID" value="<?php echo $articleID; ?>" />
<input type="hidden" name="flag" value="edit" />
<ul>
<li class="tag">标题</li>
<li class="inputBox"> 
<input name="txtTitle" type="text" id="txtTitle" value="<?php echo $article['Title'];?>" />
</li>
</ul>
<ul>
<li class="tag">内容</li>
<li class="inputBox">
<textarea name="txtContent" cols="50" rows="10" >
<?php echo $article['Content']; ?>
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