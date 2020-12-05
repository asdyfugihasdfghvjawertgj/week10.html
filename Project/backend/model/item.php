<?php
include_once('include/dbconn.php');
class Item
{
	

	private $pdo;
	
	public function add($name,$fullpath,$code,$size,$color,$price,$pro_id){

		$this->pdo=Database::connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//sql query
		$sql="insert into item (name,photo,code,size,color,price,productid) values (:name,:photo,:code,:size,:color,:price,:productid)";
		//prepare sql statement
		$stmt=$this->pdo->prepare($sql);
		//bind parameter
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':photo',$fullpath);
        $stmt->bindParam(':code',$code);
        $stmt->bindParam(':size',$size);
        $stmt->bindParam(':color',$color);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':productid',$pro_id);

		if ($stmt->execute())
		 {
			return true;
		}
		else {
			return false;
		}

    }
    public function getpro(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // sql query
        $sql="select * from product";
        //prepare sql statement
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $results;
    }

	public function getitem()
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // sql query
    $sql="select item.*,product.name as productid from item inner join product on item.productid=product.id";
    //prepare sql statement
    $stmt=$this->pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $results;

    } 
    
    public function getviewitem($itemid)
	{
		
		$this->pdo = Database::connect();
    		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    		// sql query
    		$sql="select item.*,product.name as productid from item inner join product on item.id=:id AND item.productid=product.id";
    		//prepare sql statement
    		$stmt=$this->pdo->prepare($sql);
    		$stmt->bindParam(':id',$itemid);
    		$stmt->execute();
    		$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
   		 	return $results;
	}

    public function updateitem($itemid,$fullpath,$name,$code,$size,$color,$price,$pro_id)
{
    $this->pdo = Database::connect();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="update item set name=:name,photo=:photo,code=:code,size=:size,color=:color,price=:price,productid=:productid where id=:id";
    $stmt=$this->pdo->prepare($sql);
    //bind parameters
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':photo',$fullpath);
    $stmt->bindParam(':code',$code);
    $stmt->bindParam(':size',$size);
    $stmt->bindParam(':color',$color);
    $stmt->bindParam(':price',$price);

    $stmt->bindParam(':productid',$pro_id);
    $stmt->bindParam(':id',$itemid);
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
public function getdeleteitem($itemid)
{
	$this->pdo=Database::connect();
	$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="delete from item where id=:id";
	$stmt=$this->pdo->prepare($sql);
	$stmt->bindParam(':id',$itemid);
	$stmt->execute();

}

}
?>