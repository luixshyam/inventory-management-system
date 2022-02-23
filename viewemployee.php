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
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
        $("#go2").click(function(e) {
            var name=$("#name").val();
			if(name=="")
			{
				alert("Enter employee name to search");
				e.preventDefault();	
			}
        });
    });
</script>
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
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"> Menu</button>
  <span class="w3-bar-item w3-right w3-bar-item">Inventory Management System</span>
</div>

<!-- Sidebar/menu -->
<?php include "sidebar.php"; ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px; height:600px;margin-top:43px;">
 <!-- Header -->
 <header class="w3-container w3-center w3-border-bottom" style="padding-top:10px">
    <h5><b> Admin Panel</b></h5>
  </header>
 <p><span class="w3-main w3-white" style="margin-left:80%;margin-top:43px;width:50%;position:right;">
   <a  href="addemployee.php"> <input type="submit" name="submit" id="submit" value="+ Add Employee" class="w3-btn w3-indigo w3-round-medium">
  </a></span></p>
 <tr >
     <td colspan="4" class="w3-row-padding-64">
            <form id="form1" name="form1" method="post" action="viewemployee.php">	
              <table width="55%" border="0" cellspacing="0">
               
                    <tr>
                       
                        <td width="5%">&nbsp;  </td>
                        <td width="38%"><input name="name" type="text" class="w3-input w3-border w3-round" id="name" placeholder="Type Item Name" ></td>
                        <td width="21%"><input type="submit" name="go2" id="go2" value="Search" class="w3-btn w3-indigo w3-round"></td>
                       
                        <td width="15%"><input type="submit" name="go3" id="go3" value="View All" class="w3-btn w3-indigo w3-round"></td>
                         <td width="20%">&nbsp;  </td>
                        <td width="20%">&nbsp;  </td>
                        <td width="20%">&nbsp;  </td>
                        <td width="20%">&nbsp;  </td>
                    </tr>
                   
                </table>
            </form>
    </td>
  </tr>
    
 <div class="w3-row-padding w3-margin-bottom" style="margin-top:20px">
    
    <table class="w3-table-all">
    <tr class="w3-indigo">
        <td width="15%">Name</td>
        <td width="4%">Gender</td>
        <td width="7%">Designation</td>
        <td width="7%">Department</td>
        <td width="8%">Username</td>
        <td width="8%">Password</td>
        <td width="12%">Email</td>
        <td width="9%">Phone</td>
        <td width="6%">Image</td>
        <td width="15%">Action</td>
      </tr>
      <?php
	  	include "connect.php";
		$sql="";
		if(isset($_POST["go2"]))
		{
			$name=$_POST["name"];	
			$sql="Select * from employee where name like '$name%'";
		}
		else
		{
			$sql="Select * from employee";
    }
    $result=mysqli_query($con,$sql);
    $n=mysqli_num_rows($result);
	  if($n==0)
		{
			echo '<span class="w3-text-red">No Record Found</span>';	
		}
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>';
			echo '<td>'.$row[1].'</td>';
			echo '<td>'.$row[2].'</td>';
			echo '<td>'.$row[3].'</td>';
      echo '<td>'.$row[4].'</td>';
      echo '<td>'.$row[5].'</td>';
			echo '<td>'.$row[6].'</td>';
			echo '<td>'.$row[7].'</td>';
			echo '<td>'.$row[8].'</td>';
			echo '<td><img src="'.$row[9].'" width="40" height="40" ></td>';
			echo '<td><a class="w3-btn w3-indigo w3-round" href="editemp.php?id='.$row["0"].'">Edit</a> <a class="w3-btn w3-red w3-round" style="width:65px;" href="delemp.php?id='.$row["0"].'" onClick="return condel()">Delete</a></td?';
			echo '</tr>';
		}
	  ?>
     
       
    </table>
   
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
