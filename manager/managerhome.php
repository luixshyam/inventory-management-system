<?php
session_start();
if(!isset($_SESSION['empid']))
{
    header('location:managerlogin.php');
}
include('../connect.php');
?>

<!DOCTYPE html>
<html>
<title>Inventory Management System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../image/logo.png" type="image" rel="icon">
<link rel="stylesheet" href="../css/w3style.css">
<link rel="stylesheet" href="../css/fonts.googleapis.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
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
<?php include "sidebar.php"; ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="height:600px;margin-left:300px;margin-top:33px;">
<p class="w3-right w3-xlarge w3-text-red ">
	<?php
// 	echo "". date("l")  . "&nbsp;&nbsp;" . date("d-m-Y"). "&nbsp;&nbsp;" . date("h:i:sa");
	?>
</p>


  <!-- Header -->
  <header class="w3-container w3-center" style="padding-top:22px">
    <h5><b></b></h5>
  </header>
     <div class="w3-row-padding" style="margin-top:50px;">
 	<div class="w3-twothird">
    	<div class="w3-row" style="padding:16px 0;">
        	<div class="w3-third w3-center w3-small">
            	<img src="../images/additem.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="additem.php" class="w3-btn w3-teal w3-round">Add Item</a>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="../images/stockentry.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="stockentry.php" class="w3-btn w3-teal w3-round">Stock Entry</a>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="../images/computer.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewstock.php" class="w3-btn w3-teal w3-round">View Stock</a>
            </div>
        </div>
        <div class="w3-row" style="padding:16px 0;">
        <div class="w3-third w3-center w3-small">
            	<img src="../images/request.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="viewrequests.php" class="w3-btn w3-teal w3-round">View Item Requests</a><br>
                <?php
					$str="select * from requisition where status='Forwarded'";
					$result=mysqli_query($con,$str);
					$n=mysqli_num_rows($result);
					if($n>0)
					{
						echo '<blink> <span class="w3-text-red"><strong>You have '.$n.' unseen request</strong></span></blink>';	
					}
				?>
            </div>
            <div class="w3-third w3-center w3-small">
            	<img src="../images/index.png" class="w3-circle" style="width:80px;"/><br><br>
        		<a href="changepass.php" class="w3-btn w3-teal w3-round">Change Password</a>
            </div>
        </div>
    </div>
    <div class="w3-third w3-border" style="height:360px;">
    	<h4 align="center" class="w3-border-bottom">Notifications</h4>
        <div class="w3-container w3-text-red" style="line-height:1.8;">
        	<?php
				include "../connect.php";
				$sql="Select item,sum(qty) as cnt from stockmaster group by item";
				$result=mysqli_query($con,$sql);
				echo '<ul>';
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

 <!-- <div class="w3-row-padding w3-margin-bottom" style="margin-top:100px">
    <div class="w3-quarter">
      <div class="w3-container w3-blue-gray w3-padding-16 w3-circle w3-center" style="height:240px;">
      		<br><br>
      		<img src="../images/additem.png" class="w3-circle" style="width:110px;"/>
        	<h4><a href="additem.php" class="w3-btn w3-hover-blue-gray w3-text-white">Add Item</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16 w3-circle w3-center" style="height:240px;">
        <br><br>
      		<img src="../images/stockentry.png" class="w3-circle" style="width:100px;"/>
        	<h4><a href="stockentry.php" class="w3-btn w3-hover-green w3-text-white">Stock Entry</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16 w3-circle w3-center" style="height:240px;">
        <br><br>
      		<img src="../images/issue.png" class="w3-circle" style="width:100px;"/>
        	<h4><a href="#" class="w3-btn w3-hover-teal w3-text-white">Issue Item</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16 w3-circle w3-center" style="height:240px;">
        <br><br>
      		<img src="../images/index.png" class="w3-circle" style="width:80px;"/>
        	<h4><a href="changepass.php" class="w3-btn w3-hover-red w3-text-white">Change Password</a></h4>
      </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><br>
</p>-->
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



</script>

</body>
</html>
