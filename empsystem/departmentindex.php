<?php
include_once("controller/deptcontroller.php");
$deptController=new DeptController();
$results=$deptController->showDepts();
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
    <a href='create_dept.php' class='btn btn-default pull-right'>Create Dept</a>
</div>
 <table class="table table-striped">
<thead>
<tr>
<td>No</td>
<td>Name</td>
<td>Email</td>
<td>Phone</td>
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

<td><a class="btn btn-primary" href="departmentview.php?id=<?php echo $result['id'];?>" ><i class="fa fa-eye"></i></a><a class="btn btn-success" href="departmentedit.php?id=<?php echo $result['id'];?>"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" onclick="return deleteuser(<?php echo $result['id'];?>);"><i class="fa fa-trash"></i></a></td>
</tr>

<?php

}
?>
</tbody>

</table>	
</div>
<script type="text/javascript">
	function deleteuser(id){
		$result=confirm("Are you sure to delete?");
		if ($result) {
			window.location.href="departmentdelete.php?id="+id;
			return true;
		}
	}
</script>
</body>
</html>