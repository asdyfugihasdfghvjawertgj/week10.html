<?php
include_once('controller/deptcontroller.php');
$depid=$_GET['id'];
$deptController=new DeptController();
$results=$deptController->deleteDep($depid);
if ($results) {
	echo "sorry!you cannot delete this department";
	//header('location:departmentindex.php');
}
else{
	//$depid=$_GET['id'];
	$deptController=new DeptController();
	$deptController->deleteDep1($depid);
	header('location:departmentindex.php');
}
?>