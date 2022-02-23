<?php
session_start();
include('connect.php');
if(isset($_POST['submit']))
{
	$id=$_POST['empid'];
   	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$des =$_POST['des'];
    $dept=$_POST['dept'];
    $uname=$_POST['uname'];
    //$pass=$_POST['password'];
    $email=$_POST['email'];
    $phno=$_POST['tel'];
	$image="";
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
	$copy=move_uploaded_file($_FILES["file1"]["tmp_name"], $target_path);
    if($copy)
	{

		$image="employee/" . $fileName;
	}
	else
	{
		$image=$_POST["photo"];
	}
    $sql="update employee set id='$id',name='$name',gender='$gender',des='$des',dept='$dept',email='$email',phno='$phno',image='$image' where id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
	   header('location:viewemployee.php');
    }
    else
    {
	   echo mysqli_error();	
    }
}
?>