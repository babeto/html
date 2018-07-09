<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/globalstyle.css"/>
<title>正</title>
</head>

<body>

<h2>文章</h2>

<div class="articlelist">

<?php
	
	include('./class/articles.php');
	
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

<ul>
<?php while($row=mysql_fetch_array($results)) { ?>
<li><a href="./viewArticle.php?ArticleID=<?php echo $row['ID']; ?>"> <?php echo $row['Title']; ?> </a> </li>
<?php } ?>

</ul>

<ul>
<li class="pageUpDown">
<?php 
	if($page==1){
		echo "首页";
	}
	else{
		echo ("<a href=listArticles.php?Page=1>首页</a>");
	}
?>
</li>
<li class="pageUpDown">
<?php 
	if($page==1){
		echo "上页";
	}
	else{
		echo ("<a href=listArticles.php?Page=".($page-1).">上页</a>");
	}
?>
</li>

<li class="pageUpDown">
<?php 
	if($page==$pageCount){
		echo "下页";
	}
	else{
		echo ("<a href=listArticles.php?Page=".($page+1).">下页</a>");
	}
?>
</li>

<li class="pageUpDown">
<?php 
	if($page==$pageCount){
		echo "末页";
	}
	else{
		echo ("<a href=listArticles.php?Page=".$pageCount.">末页</a>");
	}
?>
</li>
</ul>

</div>

</body>

</html>
