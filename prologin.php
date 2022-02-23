<?php
        session_start();
        include "connect.php";
        $utype=$_POST["utype"];
	    $uname=$_POST["uname"];
		$pass=$_POST["password"];

        if($utype=="Admin")
        {
            $result=mysqli_query($con,"select * from adminlogin where a_user='$uname' and a_pass='$pass'");
            $row = mysqli_fetch_array($result);
            if($row['a_user']== $uname && $row['a_pass']== $pass )
            {          
                $_SESSION["a_user"]=$row['a_user'];
                //$_SESSION["a_id"]=$row['a_id'];
                header("location:dashboard.php");
            }
            else
            {
                header("location:index.php?error=1");
            }
        }
		elseif($utype=="Store Manager")
        {
            $result=mysqli_query($con,"select * from manager where username='$uname' and password='$pass'");
            $row = mysqli_fetch_array($result);
            if($row['username']== $uname && $row['password']== $pass )
            {
              //  echo "login success...";
                  $_SESSION["uname"]=$row['uname'];
                  $_SESSION["empid"]=$row['empid'];
              //  $_SESSION["status"]=true;
               header("location:manager/managerhome.php");
            }
            else
            {
                header("location:index.php?error=1");
            }
        }
        else
        {
            $result=mysqli_query($con,"select * from employee where uname='$uname' and pass='$pass'");
            $row = mysqli_fetch_array($result);
            if($row['uname']== $uname && $row['pass']== $pass )
            {
              //  echo "login success...";
               $_SESSION["uname"]=$row['uname'];
               $_SESSION["id"]=$row['id'];
              //  $_SESSION["status"]=true;
               header("location:emp/emphome.php");
            }
            else
            {
                header("location:index.php?error=1");
            }

        }

		
	
?>