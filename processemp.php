<?php 
session_start();
include('connect.php');
if(isset($_POST['submit']))
{
	$id=$_POST['empid'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$des=$_POST['des'];
	$dept=$_POST['dept'];
	$uname=$_POST['uname'];
	$pass=$_POST['password'];
	$email=$_POST['email']; 
	$phno=$_POST['tel']; 
	$rec1=mysqli_query($con,"Select * from employee where id='$id'");
	$n1=mysqli_num_rows($rec1);
	$rec1=mysqli_query($con,"Select * from employee where name='$name'");
	$n2=mysqli_num_rows($rec1);
	$rec1=mysqli_query($con,"Select * from employee where uname='$uname'");
	$n3=mysqli_num_rows($rec1);
	$rec1=mysqli_query($con,"Select * from employee where email='$email'");
	$n4=mysqli_num_rows($rec1);
	if($n1>0 || $n2>0 || $n3>0 || $n4>0)
	{
		header("location:addemployee.php?dupli=rec");
		return;	
	}
	
	$target_dir = "employee/";
	$file = $target_dir . basename($_FILES["file1"]["name"]);
	
	$fileData = pathinfo(basename($_FILES["file1"]["name"]));
	
			
	$fileName = uniqid() . '.' . $fileData['extension'];
	$target_path = "employee/" . $fileName;
		
	while(file_exists($target_path))
	{
		$fileName = uniqid() . '.' . $fileData['extension'];
		$target_path = "employee/" . $fileName;
	}
	move_uploaded_file($_FILES["file1"]["tmp_name"], $target_path);
	
	$image="employee/" . $fileName;
	
	
	
	$sql="insert into employee values('$id','$name','$gender','$des','$dept','$uname','$pass','$email','$phno','$image')";									
	$result=mysqli_query($con,$sql);
    if($result)
    {
	   header("location:addemployee.php?ok=1");	 
    }
    else
    {
	   //echo mysqli_error(); 
    }

}

?>	