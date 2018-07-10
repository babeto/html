<?php

include_once ('../../class/downloadFileScan.php');
include_once ('../../class/folderScan.php');
include_once ('../../class/downloadFile.php');

$download=new downloadFileScan("admin/down");

$files=$download->getDownloadFileInfo();

foreach($files as $value){
	$value->showFile();
}


?>