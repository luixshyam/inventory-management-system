<?php
session_start();
  
if(!isset($_SESSION['a_id']))
{
    header('location:adminlogin.php');
}
include('connect.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="image/logo.png" type="image" rel="icon">
  <title>Inventory Management System</title>
<link rel="stylesheet" href="css/w3style.css">
<link rel="stylesheet" href="css/fonts.googleapis.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
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
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">  Menu</button>
  <span class="w3-bar-item w3-right w3-bar-item">Inventory Management System</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey w3-collapse  w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   <!--
    <div class="w3-col s4">
      <img src="images/avatar3.png" class="w3-circle w3-margin-right" style="width:80px">
    </div>
-->
    <div class="w3-col s8 w3-bar" style="font-size:large;">
      <span>Welcome <strong><?php echo $_SESSION["a_user"]; ?></strong></span><br><br>
      <a href="logout.php" class="w3-bar-item w3-button w3-dark-gray w3-round">Logout</a>
    </div>
  </div>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"> Close Menu</a> 
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding">  Admin Home</a>
    <a href="addemployee.php" class="w3-bar-item w3-button w3-padding"> Add New Employee</a>
    <a href="viewemployee.php" class="w3-bar-item w3-button w3-padding"> View Employees</a>
    <a href="assignmanager.php" class="w3-bar-item w3-button w3-padding"> Assign Stock Manager</a>
       <!--<a href="viewitem.php" class="w3-bar-item w3-button w3-padding"> View Item</a>-->
    <a href="viewstock.php" class="w3-bar-item w3-button w3-padding"> View Stock</a>
    <!--<a href="viewrequests.php" class="w3-bar-item w3-button w3-padding">  View New Requests</a>
      <a href="viewallrequests.php" class="w3-bar-item w3-button w3-padding">  View Old Requests</a>-->
     <button class="dropdown-btn w3-bar-item w3-button w3-padding"> View Item Requests
     		<?php
				$str="select * from requisition where status='Sent'";
				$result=mysqli_query($con,$str);
				$n=mysqli_num_rows($result);
				if($n>0)
				{
					echo '<blink> <span class="w3-text-red"><strong>'.$n.' </strong></span></blink>';	
				}
			?>
      </button>
        <div class="dropdown-container">
            <a href="viewrequests.php" class="w3-bar-item w3-button w3-padding"> View New Requests</a>
            <a href="viewallrequests.php" class="w3-bar-item w3-button w3-padding"> View Forwarded Requests</a>
            <a href="viewissuedrequests.php" class="w3-bar-item w3-button w3-padding"> View Issued Requests</a>
        </div>
    <a href="viewissuerec.php" class="w3-bar-item w3-button w3-padding">View Issue Details</a>
    <a href="viewreports.php" class="w3-bar-item w3-button w3-padding">  View Reports</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
 <header class="w3-container w3-center w3-border-bottom" style="padding-top:10px">
    <h5><b>Admin Panel</b></h5>
  </header>

  <div class="w3-container" style="margin-top:20px">
   		<div class="w3-card-2" style="width:70%; margin:0 auto; padding:16px;">
        	<h4 align="center">EDIT REQUESTED ITEM</h4>
        	<form method="post" action="proedititem.php">
            	<div class="w3-container w3-padding-16">
                	<p><label>Request Id</label><input type="text" name="rid" readonly class="w3-input w3-border w3-light-blue" value="<?php echo $_GET["rid"]; ?>"></p>
                    <p><label>Item</label><input type="text" name="item" readonly class="w3-input w3-border  w3-light-blue" value="<?php echo $_GET["item"]; ?>"></p>
                    <p><label>Quantity</label><input type="text" name="qty" class="w3-input w3-border  w3-light-blue" value="<?php echo $_GET["qty"]; ?>"></p>
                    <span class="w3-main w3-white" style="margin-left:80%;margin-top:43px;">
                      <input type="submit" name="submit" id="submit" value="Update Details" class="w3-btn w3-indigo w3-round-medium w3-right">
                      <input type="button" name="back" id="reset" value="Back" onclick="history.back()" class="w3-btn w3-blue-gray w3-round-medium w3-right" >
                    </span>
                </div>
            </form>
        </div>
  </div>

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
