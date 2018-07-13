<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>
<title>正</title>
</head>

<body>

<h2>下载</h2>

<div class="main">

<?php

	include('../class/download.php');
	
	$page=$_GET['Page'];
	$download = new download();
	#$download->createDownloadTable();
	#$download->insertDownload();
	$pageSize=6;
	$recordCount=$download->getRecordCount();
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

	$results=$download->getDownloadListByPage($page, $pageSize);
	#$articles->listArticles($page);
?>

<ul>
<?php if($recordCount==0){ ?>
<li>No download resource found</li>

<?php } else{
  while($row=mysql_fetch_array($results)) { ?>
<li class="downloadlist"><a href="./viewDownload.php?DownloadID=<?php echo $row['ID']; ?>"> <?php echo $row['ResourceName']; ?> </a> </li>
<?php } }?>

</ul>

<ul>
<li class="pageUpDown">
<?php 
	if($page==1){
		echo "首页";
	}
	else{
		echo ("<a href=downloadList.php?Page=1>首页</a>");
	}
?>
</li>
<li class="pageUpDown">
<?php 
	if($page==1){
		echo "上页";
	}
	else{
		echo ("<a href=downloadList.php?Page=".($page-1).">上页</a>");
	}
?>
</li>

<li class="pageUpDown">
<?php 
	if($page==$pageCount){
		echo "下页";
	}
	else{
		echo ("<a href=downloadList.php?Page=".($page+1).">下页</a>");
	}
?>
</li>

<li class="pageUpDown">
<?php 
	if($page==$pageCount){
		echo "末页";
	}
	else{
		echo ("<a href=downloadList.php?Page=".$pageCount.">末页</a>");
	}
?>
</li>
</ul>

</div>

</body>

</html>
