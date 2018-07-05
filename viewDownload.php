<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/globalstyle.css"/>
<title>正</title>
</head>

<body>

<div id="header">
<h2>下载</h2>
</div>


<div class="article">

<?php

include ('./class/download.php');

$downloadID=$_GET['DownloadID'];

echo $downloadID;
$download = new download();

$result=$download->getDownloadByID($downloadID);
while($downloadinfo=mysql_fetch_array($result)){
?>
<ul>
<li class="title"><?php echo $downloadinfo['ResourceName']?></li>
<li class="detail"><a href=<?php echo $downloadinfo['DownloadLink1']?>>下载地址一</a></li>
<li class="detail"><a href=down/金刚经.mobi>下载地址二</a></li>
</ul>
<?php } ?>

</div>
</body>

</html>