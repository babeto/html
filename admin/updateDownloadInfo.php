<?php

include ('../class/fileScan.php');


$rootPath='http://'.$_SERVER['HTTP_HOST'];

$downFolder="admin/down";

$currentPage=$_SERVER['PHP_SELF'];

$relativePath=array();
$relativeLevel=array();

$downFolderArray=explode("/", $downFolder);

$currentPageArray=explode("/", $currentPage);

$flag=true;

while ($flag){
	
	if(($popDown=array_pop($downFolderArray))!=null){
		if(($popPage=array_pop($currentPageArray))!=null){
			if($popDown==null){
			}
			if($relativePath[0]==""){
				$relativeLevel[]='.';
				array_push($relativePath,$popDown);
				$flag=false;
			}
			else{
				$flag=false;
			}
		}
			
	}
	if(($popPage=array_pop($currentPageArray))==null)
	{
		if($relativePath[0]==""){
			$relativeLevel[]='.';
			array_push($relativePath,$popDown);
			$flag=false;
		}
		else{
				
			$flag=false;
		}
	}
	else{
		
		if($popDown==$popPage){
			if($relativePath[0]==""){
				$relativeLevel[]='.';
				array_push($relativePath,$popDown);
				$flag=false;
			}
			else{
				
				$flag=false;
			}
		}
		else {
			if($relativePath[0]==""){
				$relativeLevel[]='../';
				array_push($relativePath,$popDown);
			}
			else{
				$relativeLevel[]='../';
				array_push($relativePath,$popDown);
			}

		}
	}

}


$foler=new folder("../down");






?>