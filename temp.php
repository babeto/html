<?php

	$page=$_GET('page');
	if($page==0)
	{
		$page=1;
	}
	$pageSize=6;
	$row=$artList->fetch_row();
	echo $row;
	$recordCount=$row[0];
	if($recordCount){
		if($recordCount<$pageSize){
			$pageCount=1;
		}
		if($recordCount%$pageSize){
			$pageCount=$recordCount%$pageSize+1;
		}
		else{
			$pageCount=$recordCount%$pageSize;
		}
	}
	else{
		$pageCount=0;
	}
?>