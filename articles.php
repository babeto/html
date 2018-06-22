
<?php

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

function listArticles()
{
	$sql="SELECT * FROM Articles";

	$result=mysql_query($sql, $this->con);

	while($row=mysql_fetch_array($result))
	{
	echo $row['Title'];
	echo "<br />";
	}
}



	
}

?>
