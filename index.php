<?php
session_start();
include('connect.php');
if(isset($_SESSION['a_user']))
{
  header('location:dashboard.php');
}
if(isset($_SESSION['empid']))
{
    header('location:manager/managerhome.php');
}
if(isset($_SESSION['id']))
{
    header('location:emp/emphome.php');
}
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inventory Management System, ONGC</title>
<link rel="stylesheet" href="css/style2.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet"> 
<style>
    body{
		font-family: 'Montserrat', sans-serif;
	}
	.title{
		background-image:url(images/tbg.jpg);
		background-repeat:repeat-x;
	}
	label.error{
			color:#F00;	
			font-size:x-small;
		}
	#marea{
	  display: table;
	  width: 100%;
	  height: 100vh;
	  background: url(images/background.jpg) top center fixed;
	  background-size: cover;
	}
	#marea .marea-container {
	  /*background: rgba(0, 0, 0, 0.8);*/
	  display: table-cell;
	  margin: 0;
	  padding: 0;
	  text-align: center;
	  vertical-align: middle;
	}
</style>
<body>
<div id="marea">
    	<div class="marea-container">
        	<div class="right" style="width: 400px; margin-right:48px;">
             	<div class="white card-2">
                	<div class="container center" style="padding-top:12px;">
                    	<img src="images/avatar2.png" class="circle" style="width:25%;"><br>
                    	<span class="xlarge">USER LOGIN</span>
                    </div>
                    <div class="container padding-16">
                    	<form method="post" action="prologin.php">
                            <p>
                                <select name="utype" class="select border" required>
                                    <option selected value="">-Select User Type-</option>
                                    <option>Admin</option>
                                    <option>Store Manager</option>
                                    <option>Employee</option>
                                </select>
                            </p>
                        	<p>
                            	<input type="text" name="uname" class="input border hover-border-aqua tbun" placeholder="User Id" required autofocus autocomplete="off"/>
                            </p>
                            <p>
                            	<input type="password" name="password" class="input border hover-border-aqua tbpass" required placeholder="Password" />
                            </p>
                            <p>
                            	<input type="submit" name="submit" class="btn block indigo" value="Login" />
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
	if(isset($_GET["err"]))
	{
		echo "<script> alert('Incorrect username or password'); </script>";
	}
?>

