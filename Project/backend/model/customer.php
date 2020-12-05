<?php
include_once('include/dbconn.php');
class Customer
{
	
	private $pdo;
	
	public function add($name,$email,$phone,$address,$township,$city,$bname){

        $this->name=$name;
        $this->email=$email;
        $this->phone=$phone;
        $this->address=$address;
        $this->township=$township;
        $this->city=$city;
        $this->bname=$bname;

		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="insert into customer (name,email,phone,address,township,city,bname) values (:name,:email,:phone,:address,:township,:city,:bname)";
		//prepare sql statement
		$stmt=$this->pdo->prepare($sql);
		//bind parameter
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':phone',$this->phone);
		$stmt->bindParam(':address',$this->address);
		$stmt->bindParam(':township',$this->township);
		$stmt->bindParam(':city',$this->city);
		$stmt->bindParam(':bname',$this->bname);

		if ($stmt->execute())
		 {
			return true;
		}
		else {
			return false;
		}

    }
        public function getCus()
        {
            $this->pdo = Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // sql query
            $sql="select * from customer";
            //prepare sql statement
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $results;
        
        }

        public function getviewCus($cusid)
        {
            $this->pdo = Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // sql query
            $sql="select * from customer where id=:id";
            //prepare sql statement
            $stmt=$this->pdo->prepare($sql);
            $stmt->bindParam(':id',$cusid);
            $stmt->execute();
            $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $results;
        
        }

        public function getupdateCus($cusid,$name,$email,$phone,$address,$township,$city,$bname)
        {
            $this->pdo = Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // sql query
            $sql="update customer set name=:name,email=:email,phone=:phone,address=:address,township=:township,city=:city,bname=:bname where id=:id";
            //prepare sql statement
            $stmt=$this->pdo->prepare($sql);
            $stmt->bindParam(':id',$cusid);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':township',$township);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':bname',$bname);
            if ($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        
        }

        public function getdeleteCus($cusid)
{
$this->pdo= Database::connect();
$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="delete  from customer where id=:id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(':id',$cusid);
$stmt->execute();


}
    
}