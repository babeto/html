
<?php
include 'dataOpt.php';

class articles {

public   $host = "localhost";
private  $adminUser = "siteadmin";
private  $adminPassword = "User@123";
public   $database = "magic_data";
public	 $con;


function __construct()
{
	$this->con = mysql_connect("$this->host","$this->adminUser","$this->adminPassword");
	if(!$this->con)
	{
        	die('could not connect:'. mysql_error());
	}
	else
	{
		echo("connect succeed </br>");
		mysql_select_db($this->database, $this->con);
	}
}

function __destruct()
{

	mysql_close($this->con);

}

function createDatabase()
{
	
	$sql="CREATE DATABASE magic_data";
	echo $sql;
	if(mysql_query($sql,$this->con))
	{
        	echo "Database created";
	}
	else
	{
        	echo "Error creating database: ". mysql_error();
	}
}


function createArticleTable()
{
	
	$sql = "CREATE TABLE Articles
	(
	 ID  int NOT NULL AUTO_INCREMENT,
	 Title varchar(255) NOT NULL,
	 Author varchar(255),
	 Content  text,
	 Datetime datetime,
	 PRIMARY KEY(ID)
	)";


	if(mysql_query($sql,$this->con))
	{
	echo "table created";
	}

	else
	{
	echo "error creating table: ".mysql_error();
	}

}

function insertArticle()
{
	$now=date("y-m-d h:i:sa");


	echo "$now";

	$sql="INSERT INTO Articles (Title, Author, Content, Datetime)
	VALUES
	('凉州词','王之焕','黄河远上白云间，一片孤城万仞山。羌笛何须怨杨柳，春风不度玉门关。', '$now')";



	if(mysql_query($sql,$this->con))
	{
	echo "item added";
	}
	else
	{
	echo "error adding item:".mysql_error();
	}
}

function getArticles()
{
	$sql="SELECT * FROM Articles";

	$result=mysql_query($sql, $this->con);
/**
	while($row=mysql_fetch_array($result))
	{
	echo $row['Title'];
	echo "<br />";
	}
*/
	return $result;
}

function listArticles(){
	
	
	$sql="SELECT COUNT(*) FROM Articles";
	$Result=mysql_query($sql,$this->con);
	$row=mysql_fetch_array($Result);
	$recordCount=$row[0];
	
	#$artList=$this->getArticles();

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
	

	while($article=mysql_fetch_array($artList)){
		#echo ("<a href=&quot;http://www.baidu.com&quot;>test</a>" );
		#echo $article['Title'];
		echo ("<a href=viewArticle.php?ArticleID=".$article['ID'].">".$article['Title']."</a>" ); 
		echo "</br>";
	}
	
}

	
}


class article extends database {

	public $Title;
	public $Content;
	public $Datetime;
	function	getArticle($articleID){
		
		$sql="SELECT * FROM Articles WHERE ID=".$articleID;
		
		if($result=mysql_query($sql,$this->con)){
			if($article=mysql_fetch_array($result)){
				$this->Title=$article['Title'];
				$this->Content=$article['Content'];
				$this->Datetime=$article['Datetime'];
				echo $this->Title;
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
		
		echo $this->Title;
		echo $this->Content;
		echo $this->Datetime;
	}
	
	

}




?>
