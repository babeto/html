<?php

include ('../dataOpt.php');

class Admin extends database {
	Private $adminName;
	Private $adminPass;
	function HaveAdmin(){
			
		$sql="SELECT COUNT(*) FROM Admins WHERE AdminName=".$this->userName."AND AdminPassword=".$this->userPass;
		$result=mysql_query($sql,$this->con);
		if($row=mysql_fetch_array($result)){
			echo "admin exists!";
			return true;
		}
		else{
			echo "admin doesn't exist!";
			return false;
		}
			
	}
	
	function setAdminName($adminname){
		$this->adminName=$adminname;
	}
	
	function setPass($adminpass){
		$this->adminPass=$adminpass;
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
	function addAdmin($adminName,$adminPass){
		
		$sql="INSERT INTO Admins (AdminName, AdminPassword) VALUES ('$adminName','$adminPass')";
		echo $sql;
		if(mysql_query($sql, $this->con)){
			echo "admin added";
			return true;
		}
		else{
			echo "admin added failed".mysql_error();
			return false;
		}
	}



}


?>