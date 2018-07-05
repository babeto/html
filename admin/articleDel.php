<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/admin.css" />
<!-- <?php include('isAdmin.php'); ?> -->
</head>
<body>

<?php
	
	include ('../class/articles.php');
	$articleID=$_GET['ArticleID'];
	echo $articleID;
	$articles=new articles();
	$articles->ArticleID=$articleID;
	if(!$articles->delArticleByID($articleID)){
?>
<script Language="JavaScript">
	alert("文章删除失败！");
	history.go(-1);
</script>
<?php }
	else {
			echo("<h2>文章已删除</h2>");
		}

?>
</body>
<script Language="JavaScript">

opener.location.reload();
setTimeout("window.close()",3000);

</script>

</html>