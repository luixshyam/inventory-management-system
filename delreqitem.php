<?php
	include "connect.php";
	$rid=$_GET["rid"];
	$item=$_GET["item"];
	$sql="delete from reqdupli where reqid='$rid' and item='$item'";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		header("location:reqdetails.php?rid=".$rid);	
	}
?>