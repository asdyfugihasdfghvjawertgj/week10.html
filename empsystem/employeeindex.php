<?php
include_once('controller/employeecontroller.php');
$employeecontroller=new Employeecontroller();
$results=$employeecontroller->showEmp();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Department</title>
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<div class='float-right' style="background-color: green; opacity: 0.7;">
    <a href='create_employee.php' class='btn btn-default pull-right'>Create Emp</a>
</div>
 <table class="table table-striped">
<thead>
<tr>
<td>No</td>
<td>Name</td>
<td>Email</td>
<td>Phone</td>
<td>Address</td>
<td>NRC</td>
<td>Deptname</td>
<td>Actions</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
foreach($results as $result)
{

 ?>
<tr>
<td><?php echo $i++?> </td>
<td><?php echo $result['name'];?> </td>
<td><?php echo $result['email'];?> </td>
<td><?php echo $result['phone']?> </td>
<td><?php echo $result['address']?></td>
<td><?php echo $result['nrc']?></td>
<td><?php echo $result['dname']?></td>

<td><a class="btn btn-primary" href="employeeview.php?id=<?php echo $result['eid'];?>" ><i class="fa fa-eye"></i></a><a class="btn btn-success" href="employeeedit.php?id=<?php echo $result['eid'];?>"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" onclick="return deleteuser(<?php echo $result['eid'];?>);"><i class="fa fa-trash"></i></a></td>
</tr>

<?php

}
?>
</tbody>

</table>	
</div>
<script type="text/javascript">
	function deleteuser(eid){
		$result=confirm("are you sure to delete?");
		if ($result) {
			window.location.href="employeedelete.php?id="+eid;
			return true;
		}
	}
	</script>	
</body>
</html>