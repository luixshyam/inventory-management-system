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
<link rel="stylesheet" href="css/w3style.css">
<link rel="stylesheet" href="css/fonts.googleapis.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
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
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
        $("#submit").click(function(e) {
            var sd=$("#Datepicker1").val();
			if(sd=="")
			{
				alert("Select Start Date");
				e.preventDefault();	
			}
        });
				$("#submit").click(function(e) {
            var ed=$("#Datepicker2").val();
			if(ed=="")
			{
				alert("Select End Date");
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
    });
</script>
<script>
$(function() {
	$("#Datepicker1").datepicker(); 
});
$(function() {
	$("#Datepicker2").datepicker(); 
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

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px; margin-top:43px;">

  <div class="w3-row-padding w3-margin-bottom" style="">
   		<h3 align="center" class="w3-border-bottom">Stock Entry Report</h3>
  </div>
  <div class="w3-container" style="padding:8px;">
  		<form method="post" action="viewreports.php">
  		  <table width="100%" cellspacing="2" class="w3-table">
  		  <tr>
  		    <td><table width="65%" cellspacing="4">
  		     <!-- <tr>
  		        <td width="22%">Select Start Date</td>
  		        <td width="17%">Select End date</td>
  		        <td width="53%">Enter Item Name</td>
  		        <td width="53%">&nbsp;</td>
	          </tr>-->
  		      <tr>
  		        <td width="33%"><input type="text" id="Datepicker1" name="sdate" placeholder="Select Start Date" class="w3-input w3-border w3-round w3-small"></td>
  		        <td width="33%"><input type="text" id="Datepicker2" name="edate" placeholder="Select End date" class="w3-input w3-border w3-round w3-small"></td>
							<td width="33%"><input type="text" name="item" id="item" placeholder="Search by Item" class="w3-input w3-border w3-round w3-small"></td>
  		        <td width="33%"><a href="viewreports.php" class="w3-btn w3-indigo w3-small w3-round">Refresh</a></td>
	          </tr>
  		      <tr>
  		        <td>&nbsp;</td>
  		        <td align="right"><input type="submit" name="submit" id="submit" value="Search" class="w3-round w3-btn w3-indigo w3-small"></td>
  		        <td align="right"><input type="submit" name="submit2" id="submit2" value="Search" class="w3-round w3-btn w3-indigo w3-small"></td>
  		        <td align="right">&nbsp;</td>
	          </tr>
	        </table></td>
  		  </tr>
  		  </table>
  		</form>
  </div>
  <div class="w3-container" style="padding:8px 16px;">
  		<?php
			if(isset($_POST["submit"]))
			{
				$sd=mysqli_real_escape_string($con,$_POST["sdate"]);
				$sdate=date("Y-m-d",strtotime($sd));
				$ed=mysqli_real_escape_string($con,$_POST["edate"]);
				$edate=date("Y-m-d",strtotime($ed));
				if($edate=="1970-01-01")
				{
					$sql="Select * from stockin where date='$sdate'";
					echo '<span class="w3-text-deep-orange">Selected Date: '.$sdate.'</span>';
				}
				else
				{
					$sql="Select * from stockin where date>='$sdate' and date<='$edate'";
					echo '<span class="w3-text-deep-orange">Selected Period (From '.$sdate.' To '.$edate.')</span>';
				}
			}
			if(isset($_POST["submit2"]))
			{
				$item=$_POST["item"];
				$sql="Select * from stockin where item like '$item%'";
			}
			else
			{
				$sql="Select * from stockin";	
			}
		?>
  		<table class="w3-table-all" id="dt">
        	<tr class="w3-indigo">
            	<td>In Date</td>
                <td>Invoice No</td>
                <td>Invoice Date</td>
                <td>Item</td>
                <td>Brand</td>
                <td>Particulars</td>
                <td>Unit</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>
						<?php
						$tamt=0;
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
					echo '<td>'.$row[9].'</td>';
					echo '<td style="text-align:right;">'.$row[10].'</td>';
					$tamt=$tamt+$row[10];
					echo '</tr>';
				}
				echo '<tr>';
				echo '<td colspan="10" style="text-align:right;">Grand Total: Rs.'.$tamt.'</td>';
				echo '</tr>';
			?>
        </table>
  </div>
</div>

<!--<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.bootstrap-autohidingnavbar.js"></script>
<script type="text/javascript" src="js/xlsx.core.min.js"></script>
<script type="text/javascript" src="js/Blob.js"></script>
<script type="text/javascript" src="js/FileSaver.js"></script>
<script type="text/javascript" src="js/Export2Excel.js"></script>
<!--<script type="text/javascript" src="js/TableExport.js/jquery.tableexport.js"></script>-->
<script type="text/javascript" src="js/jquery.tableexport.v2.js"></script>
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
