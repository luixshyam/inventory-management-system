<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
		label.error	{
									color:#F00;
								}
  	blink {
    				-webkit-animation: 1s linear infinite condemned_blink_effect; // for android
    				animation: 1s linear infinite condemned_blink_effect;
					}
		@keyframes condemned_blink_effect {
																				0%  {
																							visibility: hidden;
																						}
																				50% {
																							visibility: hidden;
																						}
																				100%  {
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
  <span class="w3-bar-item w3-right w3-bar-item">Store Management System</span>
</div>

<!-- Sidebar/menu -->
<?php include "sidebar.php"; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px; margin-top:43px; padding-top:32px;">
   <div class="w3-content w3-card-4 w3-margin-bottom" style="max-width:700px;">
  	<div class="w3-container w3-center w3-border-bottom">
    	<h5>ADD NEW EMPLOYEE</h5>
    </div>
  	<div class="w3-container w3-padding-16">
  	  <form method="post" action="processemp.php" enctype="multipart/form-data" name="form1" id="form1">
  	    <table width="100%" border="0" cellspacing="2">
  	      <tr>
  	        <td width="39%" height="60">Employee ID :</td>
  	        <td width="61%"><input type="text" name="empid" required id="empid" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="56"> Name :</td>
  	        <td><input type="text" name="name" required id="name" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="30">Gender :</td>
  	        <td>
                <table width="400" >
  	               <tr>
  	                 <td><label><input type="radio" name="gender" value="male" id="RadioGroup1_0">Male</label></td>
  	                 <td><label><input type="radio" name="gender" value="female" id="RadioGroup1_1">Female</label></td>
	               </tr>
	            </table>
           </td>
         </tr>
  	      <tr>
  	        <td height="63">Designation :</td>
  	        <td><input type="text" name="des" required id="des" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="58">Department :</td>
  	        <td><input type="text" name="dept" required id="dept" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="54">Username :</td>
  	        <td><input type="text" name="uname" required id="uname" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="51">Password :</td>
  	        <td><input type="password" name="password" required id="password" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="51">Confirm Password:</td>
  	        <td><input type="password" name="password2" required id="password2" class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="52">E-mail :</td>
  	        <td><input type="email" name="email" id="email" required  class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="51">Ph No :</td>
  	        <td><input type="tel" name="tel" id="tel" required class="w3-input w3-border w3-round-medium"></td>
          </tr>
  	      <tr>
  	        <td height="52">Image :</td>
  	        <td><input type="file" name="file1" required id="file1"></td>
          </tr>
        </table>
        <span class="w3-main w3-white w3-center" style="margin-left:80%;margin-top:43px;">
            <input type="submit" name="submit" id="submit" value="Submit Record" class="w3-btn w3-indigo w3-round-xxlarge w3-right">&nbsp;&nbsp;
            <!--<input type="reset" name="reset" id="reset" value="Reset" class="w3-btn w3-green w3-round-medium w3-right" >-->
        </span>
        <br>
      </form>
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
		echo '<script> alert("Employee Registered"); </script>';	
	}
	if(isset($_GET["dupli"]))
	{
		echo '<script> alert("Duplicate Details. Please Check!!!"); </script>';	
	}
?>
