
<!--  
<div id="footer">

<p>www.coolmax.com</p>

</div>


class article extends database {

	public $Title;
	public $Content;
	public $Datetime;
	function	getArticle($articleID){
		
		$sql="SELECT * FROM Articles WHERE ID=".$articleID;
		echo $sql;
		if($result=mysql_query($sql,$this->con)){
			if($article=mysql_fetch_array($result)){
				$this->Title=$article['Title'];
				$this->Content=$article['Content'];
				$this->Datetime=$article['Datetime'];
			}
			else{
				echo "Article result is empty";
			}

		}
		else{
			echo "Article not Found or Removed!";
		}
	}
	
	function viewArticle(){
		echo "<table>";
		echo "<tr><td>".$this->Title."</td></tr>";
		echo "<tr><td>".$this->Content."</td></tr>";
		echo "<tr><td>".$this->Datetime."</td></tr>";
		echo "</table>";
	}
	
}

        text-align:center;
        font-size:24px;
        
        
        i=pop(a);
        if(i==null)
        { 
        	if(j=pop(b)!=null) {( s+=1;}
        	else ( $flag=false;}
        }
        else
        {
        	if(j=pop(b)!=null){
        	
        		if(i!=j) {
        			relative+=i;
        			s+=1;
        			}
        			else {
        			$flag=false;
        			}
        	}
        	else{
        			relative+=i;
        	}
        }
        
        while ($flag){
	
	if(($popDown=array_pop($downFolderArray))==null){
		if(($popPage=array_pop($currentPageArray))!=null){
			$relativeLevel[]="../";
		}
		else{
			$flag=false;
		}
	}
	else{
		if(($popPage=array_pop($currentPageArray))!=null){
			if($popDown!=$popPage){
				$relativeLevel[]="../";
				$relativePath[]=$popDown;
			}
			else{
				$flag=false;
			}
		}
		else{
			$relativePath[]=$popDown;
		}
	}
}
	
	while(($temp=array_pop($relativePath))!=null){
		echo $temp;
	}
	while(($temp=array_pop($relativeLevel))!=null){
		echo $temp;
	}
        
        
$folder = new folder("../down");
$files=array();
$filesname=array();
$files=$folder->getFilesFullPath();
$filesname=$folder->getFilesName();
$fileswithoutext=$folder->getFilesWithoutExt();

foreach ($files as $value){
echo $value."</br>";}

foreach ($filesname as $value){
echo $value."</br>";}

foreach ($fileswithoutext as $value){
echo $value."</br>";}
        

-->