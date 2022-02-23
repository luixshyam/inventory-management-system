<?php
	include 'connect.php';
	$rid=$_POST["rid"];
	$item=$_POST["item"];
	$qty=$_POST["qty"];
	mysqli_query($con,"Update reqdupli set qty='$qty' where reqid='$rid' and item='$item'");
	header("location:reqdetails.php?rid=".$rid);
?>