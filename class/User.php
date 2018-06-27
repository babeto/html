<?php

include ('../dataOpt.php');

class User extends database {
	Private $userName;
	Private $userPass;
	function HaveUser(){
			
		$sql="SELECT COUNT(*) FROM Users WHERE UserName=".$this->userName."AND UserPassword=".$this->userPass;
		$result=mysql_query($sql,$this->con);
		if($row=mysql_fetch_array($result)){
			echo "User exists!";
			return true;
		}
		else{
			echo "User doesn't exists!";
			return false;
		}
			
	}
	
	function setUserName($username){
		$this->userName=$username;
	}
	
	function setPass($userpass){
		$this->userPass=$userpass;
	}
	
	function createUsersTable(){
		
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



?>