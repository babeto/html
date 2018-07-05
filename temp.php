
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

-->