<?php
    session_start();  
    if(!isset($_SESSION['a_user']))
    {
        header('location:index.php');
    }
    include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inventory Management System</title>
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
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">Menu</button>
  <span class="w3-bar-item w3-right w3-bar-item">Inventory Management System</span>
</div>

<?php include "sidebar.php"; ?>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px;margin-top:43px;height:600px;">

  <!-- Header -->
 <header class="w3-container w3-center w3-border-bottom" style="padding-top:22px">
    <h3><b> Admin Panel</b></h3>
 </header>
 
 <div class="w3-row-padding" style="margin-top:50px;">
 	<div class="w3-twothird">
    	<div class="w3-row" style="padding:16px 0;">
        	<div class="w3-third w3-center w3-small">
            	<img src="images/addemployee.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="addemployee.php" class="w3-btn w3-teal w3-round">Add Employee</a>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="images/emps.jpg" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewemployee.php" class="w3-btn w3-teal w3-round">View Employees</a>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="images/computer.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewstock.php" class="w3-btn w3-teal w3-round">View Stock</a>
            </div>
        </div>
        <div class="w3-row" style="padding:16px 0;">
            <div class="w3-third w3-center w3-small">
            	<img src="images/request.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewrequests.php" class="w3-btn w3-teal w3-round">View Item Requests</a><br>
                <?php
					$str="select * from requisition where status='Sent'";
					$result=mysqli_query($con,$str);
					$n=mysqli_num_rows($result);
					if($n>0)
					{
						echo '<blink> <span class="w3-text-red"><strong>You have '.$n.' unseen requests</strong></span></blink>';	
					}
				?>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="images/issue.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewissuerec.php" class="w3-btn w3-teal w3-round">View Issue Details</a>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="images/report.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewreports.php" class="w3-btn w3-teal w3-round">View Reports</a>
            </div>
        </div>
    </div>
    <div class="w3-third w3-border" style="height:360px;">
    	<h4 align="center" class="w3-border-bottom">Notifications</h4>
        <div class="w3-container w3-text-red" style="line-height:1.8;">
        	<?php
				/*$sql="Select * from stockmaster";
				$result=mysqli_query($con,$sql);
				echo '<ul>';
				while($row=mysqli_fetch_array($result))
				{
					if($row[1]=="Fixed" and $row[4]<=2)
					{
						echo '<li class="w3-animate-bottom">Stock Low for the item '.$row[3].'</li>';
					}
					else if($row[1]=="Stationary" and $row[4]<=10)
					{
						echo '<li>Stock Low for the item '.$row[3].'</li>';
					}
				}
				echo '</ul>';*/
				/*echo '<ul>';
				$str1="Select * from issuenotice ";
				$rec1=mysqli_query($con,$str1);
				while($row=mysqli_fetch_array($rec1))
				{
					echo '<li><a href="Viewreqdetails.php?id='.$row["rid"].'">'.$row["detail"].'</a></li>';		
				}*/
				$sql="Select item,sum(qty) as cnt from stockmaster group by item";
				$result=mysqli_query($con,$sql);
			
				while($row=mysqli_fetch_array($result))
				{
					$itemname=$row[0];
					$str="Select category from stockmaster where item='$itemname'";
					$result1=mysqli_query($con,$str);
					$row1=mysqli_fetch_array($result1);
					$cat=$row1[0];
					if($cat=="Fixed" and $row[1]<=2)
					{
						echo '<li class="w3-animate-bottom">Stock Low for the item '.$row[0].'</li>';
					}
					else if($cat=="Stationary" and $row[1]<=10)
					{
						echo '<li>Stock Low for the item '.$row[0].'</li>';
					}
				}
				echo '</ul>';
			?>
        </div>
    </div>
 </div>
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
