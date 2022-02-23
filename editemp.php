<?php
	session_start();
    include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="image/logo.png" type="image" rel="icon">
<title>Inventory Management System</title>
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/w3style.css">
<link rel="stylesheet" href="css/fonts.googleapis.css">
<link href="css/style2.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="css/all.css">
<link href="css/fonts.css" type="text/css" rel="stylesheet">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
         .dropdown-container {
    display: none;
  
    padding-left: 8px;
}
    .dropdown-btn {
    padding: 6px 8px 6px 16px;
    color: black;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
   
}
.dropdown-btn:hover {
    color: ;
}

	label.error{
		color:#F00;
	}
  blink {
    -webkit-animation: 1s linear infinite condemned_blink_effect; // for android
    animation: 1s linear infinite condemned_blink_effect;
	}
	
	@keyframes condemned_blink_effect {
		0% {
			visibility: hidden;
		}
		50% {
			visibility: hidden;
		}
		100% {
			visibility: visible;
		}
	}
</style>
<script>
	$(document).ready(function() {
		 jQuery.validator.addMethod("lettersonly", function(value, element) {
		  return this.optional(element) || /^[a-z\s]+$/i.test(value);
		}, "Please type letters only"); 
		
                $("#form1").validate({
					rules: {
						empid:{
							digits:true
						},
						name:{
							lettersonly: true
						},
						tel: {
							digits:true,
							minlength:10,
							maxlength:10
						},
						email: {
							email:true
						},
						password:{
							required:true,
							minlength:8
						},
						password2:{
							equalTo:"#password"
						}
					},
					messages: {
						empid:{
							digits:"Enter only digits"
						},
						tel: {
							digits: "Enter only digits",
							minlength: "Enter 10 digit mobile no",
							maxlength: "Enter 10 digit mobile no"
						},
						email: {
							email: "Enter valid email id"
							
						},
						password:{
							required: "Enter Pasword",
							minlength: "Password should be minimum 8 characters long"
						},
						password2:{
							equalTo: "Both Passwords are not matching"
						}
					}
			});
    });
</script>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">Menu</button>
  <span class="w3-bar-item w3-right w3-bar-item">Inventory Management System</span>
</div>

<!-- Sidebar/menu -->
<?php include "sidebar.php"; ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
 
  
  <div class="w3-card-4 w3-margin-bottom" style="width:700px; margin:50px auto;">
  	<div class="w3-container w3-indigo w3-center">
    	<h5>Edit Employee Record</h5>
    </div>
  	<div class="w3-container w3-light-gray w3-padding-16">
          <?php

include('connect.php');
if(isset($_GET['id']))
 {
  $id=$_GET['id'];
}
$sql="Select * from employee where id='$id'";
  
$result=$con->query($sql);
while($row=$result->fetch_assoc())
{
	$id=$row['id'];
   	$name=$row['name'];
	$gender=$row['gender'];
	$des =$row['des'];
    $dept=$row['dept'];
    $uname=$row['uname'];
    $email=$row['email'];
    $phno=$row['phno'];
	$img=$row['image'];
?>
  	  <form method="post" action="updemp.php" enctype="multipart/form-data" name="form1" id="form1">
  	    <table width="100%" border="0" cellspacing="2">
  	      <tr>
  	        <td width="39%" height="60">Employee ID :</td>
  	        <td width="61%"><input type="text" name="empid" required id="empid" value="<?php echo $id; ?>" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="56"> Name :</td>
  	        <td><input type="text" name="name" required id="name" value="<?php echo $name; ?>" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="24">Gender :</td>
  	        <td><table width="400" >
  	          <tr>
  	            <td><label>
  	              <input type="radio" name="gender" value="male" id="RadioGroup1_0" <?php if($gender=="male") echo 'checked="checked"'; ?>>
  	              Male</label></td>
	            <td><label>
  	              <input name="gender" type="radio" id="RadioGroup1_1" value="female" <?php if($gender=="female") echo 'checked="checked"'; ?>>
  	              Female</label></td>
	            </tr>
	          </table>
  	          </td>
          </tr>
  	      <tr>
  	        <td height="63">Designation :</td>
  	        <td><input type="text" name="des" required id="des" value="<?php echo $des; ?>" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="58">Department :</td>
  	        <td><input type="text" name="dept" required id="dept" value="<?php echo $dept; ?>" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="54">Username :</td>
  	        <td><input type="text" name="uname" required id="uname" value="<?php echo $uname; ?>" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="52">E-mail :</td>
  	        <td><input type="email" name="email" id="email" required value="<?php echo $email; ?>"  class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="51">Phone No :</td>
  	        <td><input type="tel" name="tel" id="tel" required value="<?php echo $phno; ?>"  pattern="[0-9]{10}" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="52">Image :</td>
  	        <td>
            <img src="<?php echo $img; ?> " width="80" height="80"><br>
            <input type="file" name="file1" id="file1">
            <input type="hidden" name="photo" id="photo" value="<?php echo $img; ?>"></td>
          </tr>
        </table>
        <span class="w3-main w3-white" style="margin-left:80%;margin-top:43px;">
            <input type="submit" name="submit" id="submit" value="Update" class="w3-btn w3-indigo w3-round-medium w3-right">
        </span>
      </form>
        <?php
}
?>
  	</div>
  </div>
  <br>

  <!-- Footer --><!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
     var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

</body>
</html>
<?php
	if(isset($_GET["ok"]))
	{
		echo '<script> alert("Update employee record"); </script>';	
	}
?>
