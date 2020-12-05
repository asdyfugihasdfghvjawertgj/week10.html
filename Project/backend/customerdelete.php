<?php
include_once('controller/customercontroller.php');
$cusid=$_GET['id'];
$cusController=new CustomerController();
$results=$cusController->deleteCus($cusid);
header('location:customerindex.php');
?>