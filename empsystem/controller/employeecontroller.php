<?php
include_once('model/employee.php');
class EmployeeController extends Employee
{
	public function createEmployee($name,$email,$phone,$address,$nrc,$dept_id)
	{
		if ($this->add($name,$email,$phone,$address,$nrc,$dept_id)) {
			echo "success";
		}
		
	}
	public function deptid()
	{
		return $this->getdept();
	}
	public function showEmp()
	{
		return $this->getEmp();
	}
	public function viewEmp($empid)
	{ 
		return $this->getviewEmp($empid);
	}
	 public function editEmp($empid,$name,$email,$phone,$address,$dept_id)
    {
        return $this->updateEmp($empid,$name,$email,$phone,$address,$dept_id);
    }
    public function deleteEmp($empid){
    	//echo "success";
    	return $this->getdeleteEmp($empid);
    }
	
}
?>