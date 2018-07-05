<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/admin.css" />
<!-- <?php include('isAdmin.php'); ?> -->
</head>
<body>

<?php
	
	include ('../class/articles.php');
	$articleTitle=$_POST['txtTitle'];
	$articleContent=$_POST['txtContent'];
	$articleID=$_POST['articleID'];
	$articles=new articles();
	if($_POST['flag']=="edit")
	{
		ECHO COOL;
		if(!$articles->updateArticleByID($articleID, $articleTitle, $articleContent)){
?>
<script Language="JavaScript">
	alert("文章更新失败！");
	history.go(-1);
</script>
<?php 
		}
		else{
			echo("<h2>文章已更新</h2>");
		}
	}
	else {
		$articles->ArticleTitle=$articleTitle;
		$articles->ArticleContent=$articleContent;
		if(!$articles->insertArticle()){ ?>
<script type="text/javascript">
alert("文章添加失败！");
history.go(-1);
</script>
<?php 	}
		else{
			echo("<h2>文章已添加</h2>");
		}
	}
		
?>
</body>
<script Language="JavaScript">

opener.location.reload();
setTimeout("window.close()",3000);

</script>

</html>