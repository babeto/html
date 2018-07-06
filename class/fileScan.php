<?php

function getFiles($path){

	$dir=dir($path);
	$files=array();
	while($entry=$dir->read()){
		if(is_dir($entry))
		{
			if($entry)
			$files=getFiles($entry);
		}
		else {
			$files[]=$entry;
		}

	}
	
	$dir->close();
	return files;
}

echo hello;
echo $file=getFiles('/var/www/html/down');
echo how;

?>