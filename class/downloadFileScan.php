<?php

include_once ('./folderScan.php');
include_once ('./downloadFile.php');

class downloadFileScan {
	
	public $serverProtocol;
	
	public $serverPath;
	
	public $currentPage;
	
	public $downFolder;
	
	public $folder;
	
	public $files=array();
	
function __construct($downFolder,$currentPage,$serverPath,$serverProtocol){
	if($serverPath!=""){
		$this->serverPath=$serverPath;
	}
	else{
		$this->serverPath=$_SERVER['HTTP_HOST'];
	}
	if($currentPage!=""){
		$this->currentPage=$currentPage;
	}
	else{
		$this->currentPage=$_SERVER['PHP_SELF'];
	}
	if($serverProtocol!=""){
		$this->serverProtocol=$serverProtocol;
	}
	else{
		$this->serverProtocol="http://";
	}
	$this->downFolder=$downFolder;
}

function getDownloadFileInfo(){
	
	$serverPath=$this->serverPath;
	$currentPage=$this->currentPage;
	$downFolder=$this->downFolder;
	#如果指定路径开头和末尾有"/"符号 则去除

	if((substr($downFolder,0,1))=="/"){
		$downFolder=substr($downFolder,1);
	}
	if((substr($downFolder,-1))=="/"){
		$downFolder=substr($downFolder,0,-1);
	}

	if((substr($currentPage,0,1))=="/"){
	$currentPage=substr($currentPage,1);
	}
	if((substr($currentPage,-1))=="/"){
		$currentPage=substr($currentPage,0,-1);
	}


	$downFolderArray=explode("/", $downFolder);

	$currentPageArray=explode("/", $currentPage);

	$flag=true;

	# 比较当前页面和下载目录从哪个目录开始不同，
	# 以此得到下载目录相对于目前页面的路径
	# 根据相对路径扫描目录文件

	while ($flag){
	
		if(($down=array_shift($downFolderArray))==null){
		
			$flag=false;
		}
		else{
			if(($page=array_shift($currentPageArray))!=null){

				if($down!=$page){
					array_unshift($downFolderArray,$down);
					array_unshift($currentPageArray,$page);
					$flag=false;
				}
			}
			else{
					array_unshift($downFolderArray,$down);
					$flag=false;
			}

		}
	}
	$relativeLevel=array();
	
	if(count($currentPageArray)==1){
		$relativeLevel[]="./";
	}
	else{
		$temp=array_pop($currentPageArray);
		while(($temp=array_pop($currentPageArray))!=null){
			$relativeLevel[]="../";
		}
	}
	
	$relativePath;
	
	while(($temp=array_pop($relativeLevel))!=null){
		$relativePath=$relativePath.$temp;

	}
	
	while(($temp=array_shift($downFolderArray))!=null){
		$relativePath=$relativePath.$temp."/";

	}
	
	
	$this->folder=new folder($relativePath);
	
	
	$folder=$this->folder;
	
	$filesPath=array();
	
	$filesPath=$folder->getFilesFullPath();
	
	
	# 得到符合正则表达式格式字符串，截取相对路径之后内容
	$relativePathCharRegArray=array();
	$relativePathChar=preg_split('//',$relativePath,-1,PREG_SPLIT_NO_EMPTY);
		foreach($relativePathChar as $char){
			if($char=="/"||$char=="."){
				$relativePathCharRegArray[]="\\".$char;
			}
			else {
				$relativePathCharRegArray[]=$char;
			}
		}
		foreach($relativePathCharRegArray as $char){
			$relativePathCharReg=$relativePathCharReg.$char;
		}
	#将得到的文件路径去除相对路径， 并根据指定的主机路径和目录路径得到所有文件的绝对路径
	
	$fileAbsolutePath=array();
	foreach ($filesPath as $value) {
		preg_match("/$relativePathCharReg(?<right>.*)/",$value, $matches);
		$fileAbsolutePath[]="http://".$serverPath.DIRECTORY_SEPARATOR.$downFolder.DIRECTORY_SEPARATOR.$matches[1];
	}
	
	foreach($fileAbsolutePath as $value){
		$file=new downloadFile($value);
		$this->files[]=$file;
		#echo $value;
	}
	
	return $this->files;
	
}
}


?>