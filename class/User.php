<?php

include_once ('database.php');

class Admin extends database {
	Private $userName;
	Private $userPass;
	function HaveUser(){
			
		$sql="SELECT COUNT(*) FROM Users WHERE UserName='".$this->userName."' AND UserPassword='".$this->userPass."'";
		echo $sql;
		$result=mysql_query($sql,$this->con);
		if($row=mysql_fetch_array($result)){
				if($row[0]!=0){
					echo "user exists";
					return true;					
				}
				else {
					echo "user not exists";
					return false;
				}
				
		}
		else{
			echo "user doesn't exist!";
			return false;
		}
			
	}
	
	function setUserName($username){
		$this->adminName=$adminname;
	}
	
	function setPass($userpass){
		$this->userPass=$userpass;
	}
	
	function createAdminsTable(){
		$sql="CREATE TABLE Users
		(
		ID  int NOT NULL AUTO_INCREMENT,
	 	UserName varchar(255) NOT NULL,
	 	UserPassword varchar(255) NOT NULL,
	 	PRIMARY KEY(ID)
	 	)";
		if(mysql_query($sql,$this->con)){
			echo "Users table created";
			return true;
		}
		else{
			echo "Users table created failed".mysql_error();
			return false;
		}
	
	}
	function addUser($userName,$userPass){
		
		$sql="INSERT INTO Users (UserName, UserPassword) VALUES ('$userName','$userPass')";
		echo $sql;
		if(mysql_query($sql, $this->con)){
			echo "user added";
			return true;
		}
		else{
			echo "user added failed".mysql_error();
			return false;
		}
	}



}


?>