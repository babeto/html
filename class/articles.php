<?php

include_once ('database.php');

class articles extends database  {

	public $ArticleID;
	public $ArticleTitle;
	public $ArticleAuthor;
	public $ArticleContent;
	public $ArticleDatetime;

	function insertArticle()
	{
		$now=date("y-m-d h:i:sa");
		$sql="INSERT INTO Articles (Title, Author, Content, Datetime)
		VALUES
		('".$this->ArticleTitle."','".$this->ArticleAuthor."','".$this->ArticleContent."','".$now."')";
		echo $sql;
		if(mysql_query($sql,$this->con))
		{
			echo "item added";
			return true;
		}
		else
		{
			echo "error adding item:".mysql_error();
			return false;
		}
	}
	
	function deleteArticle()
	{
		$sql="DELETE FROM Articles WHERE ID=".$this->ArticleID;
		if(!mysql_query($sql,$this-con)){
			echo ("failed del article:".mysql_error());
			return false;
		}
		else {
			echo ("del article succed!");
			return true;
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

function listArticles($page){
	
	
	$sql="SELECT COUNT(*) FROM Articles";
	$Result=mysql_query($sql,$this->con);
	$row=mysql_fetch_array($Result);
	$recordCount=$row[0];

	echo $sql;
	#$artList=$this->getArticles();

	if($page==0)
	{
		$page=1;
	}
	$pageSize=6;
	#$row=$artList->fetch_row();
	#echo $row;
	#$recordCount=$row[0];
	if($recordCount){
		if($recordCount<$pageSize){
			$pageCount=1;
		}
		if($recordCount%$pageSize){
			$pageCount=(int)($recordCount/$pageSize)+1;
		}
		else{
			$pageCount=$recordCount/$pageSize;
		}
	}
	else{
		$pageCount=0;
	}

	
	$sql="SELECT * FROM Articles LIMIT ".($page-1)*$pageSize.",".$pageSize;
	
	#echo $sql;
	$artList=mysql_query($sql,$this->con);
	
	echo "<table>";
	
	while($article=mysql_fetch_array($artList)){
		#echo ("<a href=&quot;http://www.baidu.com&quot;>test</a>" );
		#echo $article['Title'];
		echo ("<tr><td><a href=viewArticle.php?ArticleID=".$article['ID'].">".$article['Title']."</a><td><tr>" ); 
	}
	echo "</table>";
	
	echo "<table>";
	if($page==1)
		echo "<tr><td>首页 </td>";
	else
		echo "<td><a href=listArticles.php?Page=1>首页</a> </td>";
	if($page==1)
		echo "<td>前页 </td>";
	else
		echo "<td><a href=listArticles.php?Page=".($page-1).">前页</a> </td>";
	if($page==$pageCount)
		echo "<td>后页 </td>";
	else
		echo "<td><a href=listArticles.php?Page=".($page+1).">后页</a> </td>";
	if($page==$pageCount)
		echo "<td>末页 </td>";
	else
		echo "<td><a href=listArticles.php?Page=".$pageCount.">末页</a> </td></tr>";
	echo "</table>";
	
}

	function getRecordCount(){
		
		$sql="SELECT COUNT(*) FROM Articles";
		if($Result=mysql_query($sql,$this->con)){
			$row=mysql_fetch_array($Result);
			$recordCount=$row[0];
			return $recordCount;
		}
		else{
			echo "error getting count!".mysql_error();
			return -1;
		}
	}
	
	function getArticleListByPage($page,$pageSize){
		$sql="SELECT * FROM Articles LIMIT ".($page-1)*$pageSize.",".$pageSize;
		if($result=mysql_query($sql,$this->con)){
			return $result;
		}
		else{
			echo "get Article list by page failed:".mysql_error();
		}
	}
	
	function getArticleByID($articleID){
		$sql="SELECT * FROM Articles WHERE ID=".$articleID;
		if($result=mysql_query($sql,$this->con)){
				return $result;
		}
		else{
				die("Article query failed:".mysql_error());
		}
	}
	
	function updateArticleByID($articleID,$title,$content){
		$sql="UPDATE Articles
		SET Title='".$title."',Content='".$content."' WHERE ID=".$articleID;
		if(!mysql_query($sql,$this->con)){
			echo ("update article failed:".mysql_error());
			return false;
		}
		else{
			echo ("update article succeed!");
			return true;
		}
	}
	
	function delArticleByID($articleID){
		$sql="DELETE FROM Articles WHERE ID=".$articleID;
		echo $sql;
		if(!mysql_query($sql,$this->con)){
			echo("delete article failed:".mysql_error());
			return false;
		}
		else{
			echo ("delete article succeed");
			return true;
		}
	}
}


?>
