<?php
include_once('include/dbconn.php');
class Department
{
	private $id;
	private $name;
	private $phone;
	private $email;
	private $pdo;
	function set_id($id){
		$this->id=$id;
	}
	function get_id(){
		return $this->id;
	}
	function set_name($name){
		$this->name=$name;
	}
	function get_name(){
		return $this->name;
	}
	function set_email($phone){
		$this->phone=$phone;
	}
	function get_email(){
		return $this->phone;
	}
	function set_phone($email){
		$this->email=$email;
	}
	function get_phone(){
		return $this->email;
	}
	public function add($name,$email,$phone){
		$this->name=$name;
		$this->email=$email;
		$this->phone=$phone;
		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="insert into department (name,email,phone) values (:name,:email,:phone)";
		//prepare sql statement
		$stmt=$this->pdo->prepare($sql);
		//bind parameter
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':phone',$this->phone);
		if ($stmt->execute())
		 {
			return true;
		}
		else {
			return false;
		}

	}
	public function getDepts()
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // sql query
    $sql="select * from department";
    //prepare sql statement
    $stmt=$this->pdo->prepare($sql);
    $stmt -> execute();
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $results;

}
public function getviewDept($depid)
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // sql query
    $sql="select * from department where id=:id";
    //prepare sql statement
    $stmt=$this->pdo->prepare($sql);
    $stmt->bindParam(':id',$depid);
    $stmt -> execute();
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $results;

}
public function getdeleteDep($depid)
{
$this->pdo= Database::connect();
$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="select * from employee where dept_id=:id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(':id',$depid);
$stmt -> execute();
$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
return $results;

}
public function getdeleteDep1($depid)
{
$this->pdo= Database::connect();
$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="delete from department where id=:id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(':id',$depid);
$stmt -> execute();

}
public function getupdateDep($depid,$name,$email,$phone)
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // sql query
    $sql="update department set name=:name,email=:email,phone=:phone where id=:id";
    //prepare sql statement
    $stmt=$this->pdo->prepare($sql);
    $stmt->bindParam(':id',$depid);
    $stmt->bindParam(':name',$name);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':phone',$phone);
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        return false;
    }

}
}
?>