<?php

class database {
	
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
			echo("select DB succeed </br>");
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


}

?>