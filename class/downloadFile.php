<?php 


class downloadFile {
	
	public $fileID;
	public $fileName;
	public $fileWithoutExt;
	public $fileFullPath;
	public $fileFullPath2;

	function __construct($fileFullPath){
		
		$this->fileFullPath=$fileFullPath;
		
		$fileFullPathArray=explode("/", $fileFullPath);
		
		$this->fileName=array_pop($fileFullPathArray);
		if(strrpos($this->fileName,'.')!=false){
			$this->fileWithoutExt=substr($this->fileName,0,strrpos($this->fileName,'.'));
		}
		else{
			$this->fileWithoutExt=$this->fileName;
		}
		
	}
	
	function showFile(){
		echo $this->fileFullPath."</br>";
		echo $this->fileName."</br>";
		echo $this->fileWithoutExt."</br>";
	}
	
}

#test code
#$file=new downloadFile("10.156.52.82/admin/down/t2/tt2/tt2a.tst");
#$file->showFile();
				
						
			
		
?>