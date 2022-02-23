<?php
	include 'connect.php';
	if(isset($_GET["action"]))
	{
		$rid=$_GET["rid"];
		mysqli_query($con,"Update requisition set status='Forwarded' where reqid='$rid'");
		header("location:dashboard.php?list=forward");
	}
?>