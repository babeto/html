<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>
<title>正</title>
</head>

<body>

<div id="header">

<h2>管理员账户</h2>

</div>
<div>
<ul>
<li class="nostyle">
<input name="btnadd" type="button" id="btnadd" value="添加管理员" onclick="newWindow('adminNew.php')" />
</li>
</ul>
</div>
<div class="articlelist">

<script Language="JavaScript">

	function newWindow($url){
		window.open($url);
		}
	function newWindowDel($url,$title){
		if(confirm("确认删除："+$title)==true)
		{
				window.open($url);
		}
	}

</script>



<?php
	
	include('../class/articles.php');
	
	$page=$_GET['Page'];
	$articles = new articles();
	$pageSize=6;
	$recordCount=$articles->getRecordCount();
	if($recordCount%$pageSize){
		$pageCount=(int)($recordCount/$pageSize)+1;
	}
	else{
		$pageCount=$recordCount/$pageSize;
	}

	if($page==null||$page<=0){ 
		$page=1;
	}
	else if($page>$pageCount) {
		$page=$pageCount;
	}

	$results=$articles->getArticleListByPage($page, $pageSize);
	#$articles->listArticles($page);
?>

<?php while($row=mysql_fetch_array($results)) { ?>
<ul>
<li class="article"><a href="./viewArticle.php?ArticleID=<?php echo $row['ID']; ?>"> <?php echo $row['Title']; ?> </a> </li>

<li><a href=# onClick="newWindow('articleEdit.php?ArticleID=<?php echo $row['ID']; ?>')">修改</a></li>

<li><a href=# onClick="newWindowDel('articleDel.php?ArticleID=<?php echo $row['ID']; ?>','<?php echo $row['Title']?>')">删除</a></li>
</ul>
<?php } ?>



<ul>
<li class="pageUpDown">
<?php 
	if($page==1){
		echo "首页";
	}
	else{
		echo ("<a href=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?Page=1>首页</a>");
	}
?>
</li>
<li class="pageUpDown">
<?php 
	if($page==1){
		echo "上页";
	}
	else{
		echo ("<a href=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?Page=".($page-1).">上页</a>");
	}
?>
</li>

<li class="pageUpDown">
<?php 
	if($page==$pageCount){
		echo "下页";
	}
	else{
		echo ("<a href=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?Page=".($page+1).">下页</a>");
	}
?>
</li>

<li class="pageUpDown">
<?php 
	if($page==$pageCount){
		echo "末页";
	}
	else{
		echo ("<a href=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?Page=".$pageCount.">末页</a>");
	}
?>
</li>
</ul>

</div>

</body>

</html>
