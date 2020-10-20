<?php
include_once('include/dbconn.php');
		class Employee
		{
			private $name;
			private $email;
			private $phone;
			private $address;
			private $nrc;
			private $dept_id;
			private $pdo;
		function set_name($name){
		$this->name=$name;
		}
		function get_name(){
			return $this->name; 
		}
		function set_email($email){
			$this->email=$email;
		}
		function get_email(){
			return $this->email; 
		}
		function set_phone($phone){
			$this->phone=$phone;
		}
		function get_phone(){
			return $this->phone; 
		}
		function set_address($address){
			$this->address=$address;
		}
		function get_address(){
			return $this->address; 
		}
		function set_nrc($nrc){
			$this->nrc=$nrc;
		}
		function get_nrc(){
			return $this->nrc;
		}
		function set_deptid($dept_id){
			$this->dept_id=$dept_id;
		}
		function get_deptid(){
			return $this->dept_id; 
		}
		public function add($name,$email,$phone,$address,$nrc,$dept_id){
		$this->name=$name;
		$this->email=$email;
		$this->phone=$phone;
		$this->address=$address;
		$this->nrc=$nrc;
		$this->dept_id=$dept_id;
		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="insert into employee (name,email,phone,address,nrc,dept_id) values (:name,:email,:phone,:address,:nrc,:dept_id)";
		//prepare sql statement
		$stmt=$this->pdo->prepare($sql);
		//bind parameter
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':phone',$this->phone);
		$stmt->bindParam(':address',$this->address);
		$stmt->bindParam(':nrc',$this->nrc);
		$stmt->bindParam(':dept_id',$this->dept_id);
		if ($stmt->execute())
		 {
			return true;
		}
		else {
			return false;
		}

	}
		public function getdept(){
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
		public function getEmp()
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // sql query
    $sql="select employee.*,department.name as dname from employee inner join department on employee.dept_id=department.id";
    //prepare sql statement
    $stmt=$this->pdo->prepare($sql);
    $stmt -> execute();
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $results;

	}
	public function getviewEmp($empid)
	{
		
		$this->pdo = Database::connect();
    		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    		// sql query
    		$sql="select employee.*,department.name as dname from employee inner join department ON employee.eid=:eid AND employee.dept_id=department.id";
    		//prepare sql statement
    		$stmt=$this->pdo->prepare($sql);
    		$stmt->bindParam(':eid',$empid);
    		$stmt -> execute();
    		$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
   		 	return $results;
	}
	public function updateEmp($empid,$name,$email,$phone,$address,$dept_id)
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="update employee set name=:name,email=:email,phone=:phone,address=:address,dept_id=:deptid where eid=:eid";
    $stmt=$this->pdo->prepare($sql);
    //bind parameters
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':address',$address);
    $stmt->bindParam(':deptid',$dept_id);
    $stmt->bindParam(':eid',$empid);
    //execute
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
}
public function getdeleteEmp($empid)
{
	$this->pdo=Database::connect();
	$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="delete from employee where eid=:eid";
	$stmt=$this->pdo->prepare($sql);
	$stmt->bindParam(':eid',$empid);
	$stmt->execute();

}
}
?>
