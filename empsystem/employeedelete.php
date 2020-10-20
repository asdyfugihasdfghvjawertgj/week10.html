<?php
include_once('controller/employeecontroller.php');
$empid=$_GET["id"];
$employeecontroller=new EmployeeController();
$employeecontroller->deleteEmp($empid);
header('location:employeeindex.php');
?>