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
<script>
	function condel()
	{
		return confirm("Are you sure?");
	}
</script>
</head>
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
<div class="w3-main w3-white" style="margin-left:300px;margin-top:43px;height:600px;">

  <!-- Header -->
 <header class="w3-container w3-center w3-border-bottom" style="padding-top:10px">
    <h5><b>Admin Panel</b></h5>
  </header>

  <div class="w3-container" style="margin-top:20px">
   		<div class="w3-card-2" style="width:80%; margin:0 auto; padding:16px;">
        	<h4 align="center">REQUESTED ITEM DETAILS</h4>
        	<table class="w3-table-all">
            	<tr class="w3-indigo">
                	<td>Request ID</td>
                    <td>Item</td>
                    <td style="text-align:center;">Quantity asking for</td>
                    <td style="text-align:center;">Stock Available</td>
                    <!--<td colspan="2" width="20%">&nbsp;</td>-->
                </tr>
                <?php
					include('connect.php');
				 	$rid=$_GET['rid'];
					$str1="Select * from reqdupli where reqid='$rid'";
					$result1=mysqli_query($con,$str1);
					$x=mysqli_num_rows($result1);
					if($x==0)
					{
						$str2="Select * from reqdetail where reqid='$rid'";
						$result2=mysqli_query($con,$str2);
						while($row2=mysqli_fetch_array($result2))
						{
							$i=$row2[1];
							$q=$row2[2];
							$str3="insert into reqdupli values('$rid','$i','$q','Pending')";
							mysqli_query($con,$str3);
						}
					}
					$sql="Select A.*,B.qty from reqdupli as A, stockmaster as B where A.reqid='$rid' and A.item=B.item";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
						echo '<tr>';
						echo '<td>'.$row[0].'</td>';
						echo '<td>'.$row[1].'</td>';
						echo '<td style="text-align:center;">'.$row[2].'</td>';
						echo '<td style="text-align:center;">'.$row[4].'</td>';
						/*echo '<td align="right"><a href="editreqitem.php?rid='.$row[0].'&item='.$row[1].'&qty='.$row[2].'" class="w3-btn w3-indigo w3-small w3-round">Edit Item</a></td>';
						echo '<td align="right"><a href="delreqitem.php?rid='.$row[0].'&item='.$row[1].'" class="w3-btn w3-red w3-small w3-round" onClick="return condel();">Delete</a></td>';*/
						echo '</tr>';	
					}
				?>
                <tr>
                	<!--<td colspan="4"><a href="forwardreq.php?rid=<?php echo $rid; ?>&action=send" class="w3-btn w3-block w3-indigo">Forward to Stock Manager</a></td>-->
                  
                </tr>
            </table>
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
