<?php

include_once ('../../class/downloadFileScan.php');
include_once ('../../class/folderScan.php');


$download=new downloadFileScan("admin/down");
$filePath=$download->getDownloadInfo();
$fileName=$download->filesName;



?>