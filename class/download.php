<?php

include_once ('database.php');

include_once ('downloadFile.php');

class download extends database {
	
		function refreshDownloadInfo(){
			
			echo fine;

			if(count($this->files)!=0){
			
				$sql="DELETE FROM Download";
				if(mysql_query($sql,$this->con)){
					echo "delete all download data from table succeed";
				}
				else {
					echo "delete download data failed".mysql_error();
				}
			
				foreach($this->files as $this->file){
					$this->insertDownload();
				}
			
			}
			else{
			
				echo "NO files to be updated";
			}
		
		}
		
	
		function getDownloadListByPage($page,$pageSize){
			$sql="SELECT * FROM Download LIMIT ".($page-1)*$pageSize.",".$pageSize;
			if($result=mysql_query($sql,$this->con)){
				return $result;
			}
			else{
				die("Download query failed:".mysql_error());
			}
		}
	
		function getRecordCount(){
			$sql="SELECT COUNT(*) FROM Download";
			if($result=mysql_query($sql,$this->con)){
				$row=mysql_fetch_array($result);
				return $row[0];
			}
			else{
				die("Download query failed:".mysql_error());
			}
		}
	
		function getDownloadByID($downloadID){
			$sql="SELECT * FROM Download WHERE ID=".$downloadID;
			echo $sql;
			if($result=mysql_query($sql,$this->con)){
				return $result;
			}
			else{
				die("Get download info failed:".mysql_error());
			}
		}
	
		function insertDownload(){
			$sql="INSERT INTO Download (ResourceName,DownloadLink1) VALUES
			('".$this->file->fileName."','".$this->file->fileFullPath."')";
			if(!mysql_query($sql,$this->con)){
				die("insert download data failed:".mysql_error());
			}
			else{
				echo ("download item added");
			}
		}
		
		function showDownload(){
			$sql="SELECT ResourceName, DownloadLink1 FROM Download";
			
			if(($result=mysql_query($sql,$this->con))!=false){
				while($row=mysql_fetch_array($result)){
					echo $row[0]." ".$row[1]."</br>";
				}
				
			}
			else{
				echo "failed".mysql_error();
			}
		}

	
	
}


?>