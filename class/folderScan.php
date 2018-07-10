<?php


class folder {

	public $folderPath;
	public $allFilesfullPath=array();
	public $allFilesName=array();
	public $allFilesWithoutExt=array();
	
	function getFiles($path){
		$dir=scandir($path);
		$dir_nodot=array_slice($dir,2);
		$files=array();
		$temp=array();
		foreach($dir_nodot as $key => $entry){
	
			if(is_dir($path.DIRECTORY_SEPARATOR.$entry))
			{
				$temp=$this->getFiles($path.DIRECTORY_SEPARATOR.$entry);
				foreach($temp as $value){
					$files[]=$value;
				}
			}
			else{
				$files[]=$path.DIRECTORY_SEPARATOR.$entry;
			}
		}
		
		
		return $files;
		
	}
	
	function __Construct($path){
		if(substr($path,-1)=="/"){
			$this->folderPath=substr($path,0,-1);
		}
		else{
			$this->folderPath=$path;
		}
	}
	
	function getFilesFullPath(){
		$this->allFilesfullPath = $this->getFiles($this->folderPath);
		return $this->allFilesfullPath;
	}
	
	function getFilesName()
	{
		if(count($this->allFilesfullPath)!=0){
			foreach($this->allFilesfullPath as $filePath){
				$this->allFilesName[]=array_pop(explode("/",$filePath));

			}
		}
		else{
			$this->allFilesfullPath=$this->getFiles($this->folderPath);
			foreach($this->allFilesfullPath as $filePath){
				$this->allFilesName[]=array_pop(explode("/",$filePath));
			}
		}	
		
		return $this->allFilesName;
	}

	function getFilesWithoutExt(){
		if(count($this->allFilesName)!=0){
			foreach($this->allFilesName as $fileName){
				$fileNameArray=array();
				$fileNameArray=explode(".",$fileName);
				$this->allFilesWithoutExt[]=$fileNameArray[0];
			}
		}
		else{
			$this->allFilesName=$this->getFilesName();
			foreach($this->allFilesName as $fileName){
				$fileNameArray=array();
				$fileNameArray=explode(".",$fileName);
				$this->allFilesWithoutExt[]=$fileNameArray[0];
			}
		}	
		
		return $this->allFilesWithoutExt;
	
	}

}



?>