<?php
$empid=$_GET['id'];
include_once('controller/employeecontroller.php');
$employeecontroller=new EmployeeController();
$results=$employeecontroller->viewEmp($empid);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Employee</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
<body>
<div class="container bg-light mt-5">
	<?php
	foreach ($results as $result) {
		
	?>
			<label>Name</label>
			<br>

				<?php echo $result['name']; ?>

				<label>Email</label>
				<br>
				<?php echo $result['email']; ?>
			
				<br>
				<label>Phone</label><br>
				<?php echo $result['phone']; ?>
				<br>
				<label>Address</label><br>
			
				<?php echo $result['address']; ?>
				<br>
				<label>NRC</label><br>
				<?php echo $result['nrc']; ?>
				<br>
				<label>Dept_id</label><br>
				<?php echo $result['dname']; ?>
		<?php
	}
		?>
</div>
<script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/employee.js"></script>
</body>
</html>