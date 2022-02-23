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
<link href="css/style2.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="css/all.css">
<link href="css/fonts.css" type="text/css" rel="stylesheet">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
        $("#Search").click(function(e) {
            var item=$("#item").val();
			if(item=="")
			{
				alert("Enter Item name to search");
				e.preventDefault();	
			}
        });
		$("#sub").click(function(e) {
            var brand=$("#brand").val();
			if(brand=="Select Brand Name")
			{
				alert("Select a brand to search");
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
<div class="w3-main w3-white" style="height:100%;margin-left:300px;margin-top:33px;">
<!--<p class="w3-right w3-xlarge w3-text-red ">
	<?php
/*	echo "". date("l")  . "&nbsp;&nbsp;" . date("d-m-Y"). "&nbsp;&nbsp;" . date("h:i:sa");*/
    if(isset($_POST["go1"]))
		{
			$cat=$_POST["cat"];	
			$sql="Select * from stockmaster where category='$cat'";
		}
    else if(isset($_POST["submit"]))
		{
			$item=$_POST["item"];
			$sql="Select * from stockmaster where item='$item'";
		}
		else if(isset($_POST["submit1"]))
		{
			$item=$_POST["item"];
			$brand=$_POST["brand"];
			$sql="Select * from stockmaster where item='$item' and brand='$brand'";	
		}
		else
		{
			$sql="Select * from stockmaster";
		}
		$result=mysqli_query($con,$sql);
    $resultx=mysqli_query($con,$sql);
    $c=0;
		while($r=mysqli_fetch_array($resultx))
		{
			$q=$r["qty"];
			$c=$c+$q;
			echo $c;	
		}
		//$c=mysqli_num_rows($result);
	?>
</p>-->

    <br>
   <center> 
  <div class="w3-row-padding w3-margin-bottom" style="margin-top:1%;width:90%;">
  	<div class="w3-container w3-padding-4  w3-medium">
     <table class="w3-table-all">
     <h5>ITEMS STOCK RECORDS</h5>
     <br>
      <tr>
        <td colspan="5">
    	<form id="form1" name="form1" method="post" action="viewstock.php">
        	<table width="100%" cellspacing="6">
          <tr>
                        <td width="30%">
                            <select name="cat" id="cat" class="w3-input w3-border w3-round">
                                <option>---Select Category---</option>
                                <option>Fixed</option>
                                <option>Stationary</option>
                            </select>
                        </td>
                        <td width="13%"><input type="submit" name="go1" id="go1" value="Search" class="w3-btn w3-indigo w3-round"></td>
                      
   
                	<td width="30%">
                    	<input name="item" type="text" class="w3-input w3-border" id="item" placeholder="Type Item Name" value="<?php if(isset($_POST["submit"])) { echo $_POST["item"]; } ?>"/>
                        <div class="w3-right-align" style="padding-top:5px;">
                        	<span id="tot1" class="w3-text-red"><?php if(isset($_POST["submit"])) { echo 'No. of Items '.$c; } ?></span>&nbsp;&nbsp;<input type="submit" name="submit" id="Search" value="Search" class="w3-btn w3-indigo w3-round">
                        </div>
                    </td>
                    <td width="40%">
                    	<select name="brand" id="brand" class="w3-input w3-border">
                        	<option selected="selected"><?php if(isset($_POST["submit1"])) { echo $_POST["brand"]; } else { echo 'Select Brand Name'; } ?></option>
                            <?php
                            	$sql2="Select distinct(brand) from stockmaster";
                $result2=mysqli_query($con,$sql2);
								while($row2=mysqli_fetch_array($result2))
								{
									echo '<option>'.$row2[0].'</option>';
								}
							?>
                        </select>
                        <div class="w3-right-align" style="padding-top:5px;">
                        	<span id="tot2" class="w3-text-red"><?php if(isset($_POST["submit1"])) { echo 'No. of Items '.$c; } ?></span>&nbsp;&nbsp;<input type="submit" name="submit1" id="sub" value="Search" class="w3-btn w3-indigo w3-round">
                        </div>
                    </td>
                    <td width="15%" valign="bottom" align="right">
                    	<a href="viewstock.php"><input type="button" name="submit2" value="View All" class="w3-btn w3-indigo w3-round"></a>
                    </td>
                </tr>
            </table>
  	  	</form>
    <!--</div>-->
    <table class="w3-table-all">
       <tr class="w3-indigo">
       <td class="w3-center">Ctegory</td>
        <td class="w3-center">Item </td>
        <td class="w3-center">Brand</td>
        <td class="w3-center">Quantity</td>
        <td class="w3-center">Unit</td>
      </tr>
      <?php
       $n=mysqli_num_rows($result);
       if($n==0)
       {
         echo '<span class="w3-text-red">No Record Found</span>';	
       }
		while($row=mysqli_fetch_array($result))
		{
      echo '<tr>';
      echo '<td class="w3-center">'.$row[1].'</td>';
			echo '<td class="w3-center">'.$row[3].'</td>';
			echo '<td class="w3-center">'.$row[2].'</td>';
      echo '<td class="w3-center">'.$row[5].'</td>';
      echo '<td class="w3-center">'.$row[4].'</td>';
			echo '</tr>';
		}
	  ?>
    </table>
   </td>
  </tr>
</table>

  </div>
</center> 
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
