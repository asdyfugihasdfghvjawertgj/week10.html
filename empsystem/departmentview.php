<?php

include_once('controller/deptcontroller.php');
$depid=$_GET['id'];
$departmentcontroller=new DeptController();
$results=$departmentcontroller->viewDep($depid);//$results;

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
		<?php
	}
		?>
</div>
<script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/employee.js"></script>
</body>
</html>