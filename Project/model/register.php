<?php
include_once('include/dbconn.php');
class Register{
	private $pdo;
	public function add($input5,$input7){
		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="insert into register (email,password) values (:email,:password)";
		//prepare sql statement
		$stmt=$this->pdo->prepare($sql);
		//bind parameter
		$stmt->bindParam(':email',$input5);
		$stmt->bindParam(':password',$input7);
		if ($stmt->execute())
		 {
			return true;
		}
		else {
			return false;
		}
	}
	public function getReg(){
		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="select * from register";
    		//prepare sql statement
    		$stmt=$this->pdo->prepare($sql);
    		$stmt -> execute();
    		$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
			return $results;
	}
	public function getCus($email){
		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="select * from register where email=:email";
    		//prepare sql statement
    		$stmt=$this->pdo->prepare($sql);
    		$stmt->bindParam(':email',$email);
    		$stmt -> execute();
    		$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
			return $results;
	}
	
}
?>