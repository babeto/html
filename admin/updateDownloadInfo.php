<?php

include_once ('../class/downloadFileScan.php');
include_once ('../class/folderScan.php');
include_once ('../class/downloadFile.php');
include_once ('../class/download.php');


$downloadFileScan=new downloadFileScan("/down");

echo step1;
$downloadFiles=$downloadFileScan->getDownloadFileInfo();

echo step2;
$downloadSql=new download();
echo step3;
$downloadSql->files=$downloadFiles;
echo step4;
$downloadSql->refreshDownloadInfo();

$downloadSql->showDownload();


?>