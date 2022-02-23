<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="image/logo.png" type="image" rel="icon">
<title>Inventory Management System</title>
<link rel="stylesheet" href="css/tableexport.css">
<link rel="stylesheet" href="css/w3style.css">
<link rel="stylesheet" href="css/fonts.googleapis.css">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/all.css">
<link href="css/fonts.css" type="text/css" rel="stylesheet">
<script>
	$(document).ready(function() {
        $("#submit").click(function(e) {
            var sd=$("#Datepicker1").val();
			if(sd=="")
			{
				alert("Select Date");
				e.preventDefault();	
			}
        });
        $("#submit1").click(function(e) {
            var employee=$("#employee").val();
			if(employee=="")
			{
				alert("Enter employee name to search");
				e.preventDefault();	
			}
        });
        $("#submit2").click(function(e) {
            var item=$("#item").val();
			if(item=="")
			{
				alert("Enter Item name to search");
				e.preventDefault();	
			}
        });
        $("#submit3").click(function(e) {
            var particulars=$("#particulars").val();
			if(particulars=="")
			{
				alert("Enter particulars name to search");
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
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script>
/*	$(document).ready(function() {
        $("#submit").click(function(e) {
            var sd=$("#Datepicker1").val();
			if(sd=="")
			{
				alert("Select Date");
				e.preventDefault();	
			}
        });
    });*/
    $(function() {
	$( "#Datepicker1" ).datepicker(); 
});
</script>
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
<div class="w3-main w3-white" style="margin-left:300px; height:600px;">

  <header class="w3-container w3-center w3-border-bottom" style="padding-top:10px">
    <h5><b> Admin Panel</b></h5>
</header>

  <div class="w3-container" style="margin-top:20px">
   		<div class="w3-card-2" style="width:90%; margin:0 auto; padding:16px;">
          <h4 align="center">ITEMS ISSUE DETAILS</h4>
          
  
  		<form method="post" action="viewissuerec.php">
  		  <table width="100%" cellspacing="5" class="w3-table">
  		  
  		      <tr>
  		        <td width="25%"><input type="text" id="Datepicker1" name="sdate" placeholder="Search by Date" class="w3-input w3-border w3-round w3-small"></td>
              <td width="25%"><input type="text" name="employee" id="employee" placeholder="Search by Employee" class="w3-input w3-border w3-round w3-small"></td>
              <td width="25%"><input type="text" name="item" id="item" placeholder="Search by Item" class="w3-input w3-border w3-round w3-small"></td>
              <td width="25%"><input type="text" name="particulars" placeholder="Search by Particulars" id="particulars" class="w3-input w3-border w3-round w3-small"></td>
              <td width="20%"><a href="viewissuerec.php" class="w3-btn w3-indigo w3-small w3-round">Refresh</a></td>
	          </tr>
  		      <tr>
            <td align="right"><input type="submit" name="submit" id="submit" value="Search" class="w3-btn w3-round w3-indigo w3-small"></td>
  		        <td align="left"><input type="submit" name="submit1" id="submit1" value="Search" class="w3-btn w3-round w3-indigo w3-small"></td>
  		        <td align="left"><input type="submit" name="submit2" id="submit2" value="Search" class="w3-btn w3-round w3-indigo w3-small"></td>
  		        <td align="left"><input type="submit" name="submit3" id="submit3" value="Search" class="w3-btn w3-round w3-indigo w3-small"></td>
  		        <td align="right">&nbsp;</td>
	          </tr>
  		  </table>
  		</form>
    <?php
	  	
		$sql="";
		if(isset($_POST["submit"]))
		{
			$sd=mysqli_real_escape_string($con,$_POST["sdate"]);
			$sdate=date("Y-m-d",strtotime($sd));
			$sql="Select A.*,B.name from issuedetail as A,employee as B,requisition as C where A.date like '$sdate%' and A.reqid=C.reqid and B.uname=C.employee";
		}
		else if(isset($_POST["submit1"]))
		{
			$employee=$_POST["employee"];	
			$sql="Select A.*,B.name from issuedetail as A,employee as B,requisition as C where B.name like '$employee%' and A.reqid=C.reqid and B.uname=C.employee";
		}
		else if(isset($_POST["submit2"]))
		{
			$item=$_POST["item"];	
			$sql="Select A.*,B.name from issuedetail as A,employee as B,requisition as C where A.item like '$item%' and A.reqid=C.reqid and B.uname=C.employee";
		}
		else if(isset($_POST["submit3"]))
		{
			$particulars=$_POST["particulars"];	
			$sql="Select A.*,B.name from issuedetail as A,employee as B,requisition as C where A.particulars like '$particulars%' and A.reqid=C.reqid and B.uname=C.employee";
		}
		/*else if(isset($_POST["go2"]))
		{
			$item=$_POST["item"];	
			$sql="Select * from stockmaster where item like '$item%'";
		}*/
		else
		{
			$sql="Select A.*,B.name from issuedetail as A,employee as B,requisition as C where A.reqid=C.reqid and B.uname=C.employee";
        }
        ?>

        	<table class="table table-striped table-bordered" data-name="cool-table" id="dt">
            	<tr class="w3-indigo">
                	<td>Request ID</td>
                    <td>Employee</td>
                    <td>Item</td>
                    <td>Brand</td>
                    <td>Particulars</td>
                    <td>Quantity</td>
                    <td>Issue Date</td>
                </tr>
                <?php
                    $result=mysqli_query($con,$sql);
                    $n=mysqli_num_rows($result);
                    if($n==0)
                      {
                          echo '<span class="w3-text-red">No Record Found</span>';	
                      }
					while($row=mysqli_fetch_array($result))
					{
						echo '<tr>';
						echo '<td>'.$row[0].'</td>';
						echo '<td>'.$row[6].'</td>';
						echo '<td>'.$row[1].'</td>';
						echo '<td>'.$row[2].'</td>';
						echo '<td>'.$row[3].'</td>';
						echo '<td>'.$row[4].'</td>';
						echo '<td>'.$row[5].'</td>';
						echo '</tr>';	
					}
				?>
            </table>
        </div>
  </div>

  <!-- Footer --><!-- End page content -->
</div>
<!--<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.bootstrap-autohidingnavbar.js"></script>
<script type="text/javascript" src="js/xlsx.core.min.js"></script>
<script type="text/javascript" src="js/Blob.js"></script>
<script type="text/javascript" src="js/FileSaver.js"></script>
<script type="text/javascript" src="js/main.js"></script>

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

