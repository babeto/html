<?php

include_once ('../class/downloadFileScan.php');
include_once ('../class/folderScan.php');
include_once ('../class/downloadFile.php');
include_once ('../class/download.php');

$downloadFileScan=new downloadFileScan("/down");

$downloadFiles=$downloadFileScan->getDownloadFileInfo();

$downloadSql=new download();

$downloadSql->files=$downloadFiles;

$downloadSql->refreshDownloadInfo();

$downloadSql->showDownload();


?>