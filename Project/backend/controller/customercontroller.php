<?php
include_once('model/customer.php');
class CustomerController extends Customer
{
	
	public function createCustomer($name,$email,$phone,$address,$township,$city,$bname)
	{
		return $this->add($name,$email,$phone,$address,$township,$city,$bname);
			//echo "success";
		
	}
	public function showCus()
	{
		return $this->getCus();
	} 

	public function viewCus($cusid)//$results
	{
		return $this->getviewCus($cusid);
	}

	public function updateCus($cusid,$name,$email,$phone,$address,$township,$city,$bname)
	{
		//echo "ss";
		return $this->getupdateCus($cusid,$name,$email,$phone,$address,$township,$city,$bname);
	}
	public function deleteCus($cusid)
	{
		return $this->getdeleteCus($cusid);
	}

}
?>