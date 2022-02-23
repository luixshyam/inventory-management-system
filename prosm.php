<?php 
    session_start();
    include('connect.php');
    if(isset($_POST['submit']))
    {
        $empid=$_POST['select'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="Select * from manager";
        $result=mysqli_query($con,$sql);
        $n=mysqli_num_rows($result);
        if($n>0)
        {
            header("location:assignmanager.php?manager=assigned");
            return;	
        }
        $sql1="INSERT INTO manager VALUES('$empid','$username','$password')";	
        $result1=mysqli_query($con,$sql1);
        if($result1)
        {
            header("location:assignmanager.php?ok=1");	 
        }
        else
        {
           echo mysqli_error($con); 
        } 
    }
?>