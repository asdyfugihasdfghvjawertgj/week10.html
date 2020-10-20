<?php
include_once('controller/deptcontroller.php');
$depid=$_GET['id'];
$deptController=new DeptController();
$results=$deptController->viewDep($depid);
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$deptController=new DeptController();
	$deptController->updateDep($depid,$name,$email,$phone);
	header('location:departmentindex.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Department</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
<body>
<div class="container bg-light mt-5">
<form method="POST">
<?php
foreach ($results as $result) {
	# code...

?>
	<div class="row pt-3">
		<div class="col-md-12">
			<div class="form-group">
				<label>Name</label>
				<input type="text" id="input1" name="name" value="<?php echo $result['name'];?>" class="form-control">
				<span style="color: red" id="span1"></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Email</label>
				<br>
				<input type="text" id="input2" name="email" value="<?php echo $result['email'];?>" class="form-control">
				<span style="color: red" id="span2"></span>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="col-md-12">
		<div class="form-group">
				<label>Phone</label>
				<input type="text" id="input3" name="phone" value="<?php echo $result['phone'];?>" class="form-control">
				<span style="color: red" id="span3"></span>
		</div>
	</div>
		
	</div>
<?php
}
?>
	<div style="text-align: center;" class="pt-4 pb-3">
		<button type="submit" name="submit" id="show" class="btn-success p-2" style="text-align: center; border-radius: 5%; border:1px solid green; width: 100px;">Submit
		</button>
	</div>

	</form>
</div>
<script src="../jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/department.js"></script>
</body>
</html>