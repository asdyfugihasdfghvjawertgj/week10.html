<?php
include_once("controller/employeecontroller.php");
include_once("controller/deptcontroller.php");
$empid=$_GET["id"];
$empController=new EmployeeController();
$results=$empController->viewEmp($empid);

$deptController=new DeptController();
$dept_results=$deptController->showDepts();
if(isset($_POST['submit']))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $dept_id=$_POST["dept"];
    $empController=new EmployeeController();
    $check=$empController->editEmp($empid,$name,$email,$phone,$address,$dept_id);
    if($check)
    {
        echo "<div class='alert alert-success'>Employee was successfully updated.</div>";
        Database::disconnect();
        header("location:employeeindex.php");
    }
    else{
        echo "<div class='alert alert-danger'>Unable to update employee.</div>";
        Database::disconnect();

    }

}


?>



<form  method="post">
<?php
foreach($results as $result)
{
?>
    <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control"   value="<?php echo $result['name'] ;?>">
    </div>
    </div>
    <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control"  value="<?php echo $result['email'];?>" >
    </div>
    </div>
    <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control"  value="<?php echo $result['phone'];?>">
    </div>
    </div>
    <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" name="address" class="form-control"  value="<?php echo $result['address'];?>">
    </div>
    </div>
    <?php
}
?>
    <div class="form-group row">
    <label for="dept" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10">
      <select name="dept">
      <?php

        foreach($dept_results as $dresult)
        {
            if($dresult['id']==$result['dept_id'])
            {
      ?>
      <option value="<?php echo $dresult['id'];?>" selected><?php echo $dresult['name'];?> </option>
      <?php
            }
            else
            {
        
      ?>
      <option value="<?php echo $dresult['id'];?>"><?php echo $dresult['name'];?> </option>
      <?php
            }}
      ?>
      </select>
    </div>
    </div>
   <div class="form-group row">
    <div class="col-auto">
      <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
    </div>
    
      
</form>