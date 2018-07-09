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
			#echo("connect succeed </br>");
		    mysql_select_db($this->database, $this->con);
			#echo("select DB succeed </br>");
		}
	}

	function __destruct()
	{

		mysql_close($this->con);

	}

	function createDatabase()
	{
	
		$sql="CREATE DATABASE IF NOT EXISTS magic_data COLLATE ";
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

	function createArticlesTable()
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

	function createAdminsTable(){
		$sql="CREATE TABLE Admins
		(
		ID  int NOT NULL AUTO_INCREMENT,
	 	AdminName varchar(255) NOT NULL,
	 	AdminPassword varchar(255) NOT NULL,
	 	PRIMARY KEY(ID)
	 	)";
		if(mysql_query($sql,$this->con)){
			echo "Admins table created";
			return true;
		}
		else{
			echo "Admins table created failed".mysql_error();
			return false;
		}
	}
	
	function createUsersTable(){
		$sql="CREATE TABLE Users
		(
		ID  int NOT NULL AUTO_INCREMENT,
		UserName varchar(255) NOT NULL,
		UserPass varchar(255) NOT NULL,
		IsDisable int,
		PRIMARY KEY(ID)
		)";
		if(mysql_query($sql, $this->con)){
			echo "Users Table created";
			return true;
		}
		else{
			echo "Users table created failed".mysql_error();
			return false;
		}
	}
	
	function createDownloadTable(){
		$sql ="CREATE TABLE Download
		(
		ID  int NOT NULL AUTO_INCREMENT,
		ResourceName varchar(255) NOT NULL,
		ResourceSize int,
		DownloadLink1 varchar(255),
		DownloadLink2 varchar(255),
		PRIMARY KEY(ID)
		)";
		if(mysql_query($sql,$this->con)){
			echo "Download Table created";
			return true;
		}
		else{
			echo "Download Table create failed".mysql_error();
			return false;
		}
	}



}