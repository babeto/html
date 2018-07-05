<?php

include ('database.php');

class download extends database{
	
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
		('金刚经','down/金刚经.mobi')";
		if(!mysql_query($sql,$this->con)){
			die("insert download data failed:".mysql_error());
		}
		else{
			echo ("download item added");
		}
	}
}

?>