<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/globalstyle.css"/>
<title> 幻游山</title>
</head>

<body>

<div id="header">
<h2>文章</h2>
</div>


<div class="article">

<?php

include ('../class/articles.php');
echo 2;
$articleID=$_GET['ArticleID'];

echo $articleID;
$articles = new articles();

$result=$articles->getArticleByID($articleID);
while($article=mysql_fetch_array($result)){
?>
<ul>
<li class="title"><?php echo $article['Title']?></li>
<li class="detail"><?php echo $article['Content']?></li>
<li class="date"><?php echo $article['Datetime']?></li>
</ul>
<?php } ?>

</div>
</body>

</html>