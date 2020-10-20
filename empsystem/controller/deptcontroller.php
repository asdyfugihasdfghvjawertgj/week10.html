<?php
include_once('model/department.php');
class DeptController extends Department
{
	
	public function createDepartment($name,$email,$phone)
	{
		return $this->add($name,$email,$phone);
			//echo "success";
		
	}
	public function showDepts()
	{
		return $this->getDepts();
	}
	public function viewDep($depid)//$results
	{
		return $this->getviewDept($depid);
	}
	public function deleteDep($depid)
	{
		return $this->getdeleteDep($depid);
	}
	public function deleteDep1($depid)
	{
		return $this->getdeleteDep1($depid);
	}
	public function updateDep($depid,$name,$email,$phone)
	{
		//echo "ss";
		return $this->getupdateDep($depid,$name,$email,$phone);
	}

}
?>