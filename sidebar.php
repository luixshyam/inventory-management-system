<nav class="w3-sidebar w3-light-grey w3-collapse  w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   <!--
    <div class="w3-col s4">
      <img src="images/avatar3.png" class="w3-circle w3-margin-right" style="width:80px">
    </div>
-->
    <div class="w3-col s8 w3-bar w3-medium w3-border-bottom w3-center" style="padding-bottom:24px;">
        <img src="images/avatar3.png" style="width:40%"><br>
      <span>Welcome <strong><?php echo $_SESSION["a_user"]; ?></strong></span><br>
      <a href="logout.php" class="w3-button w3-red w3-round-xlarge w3-small"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>
  
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"> Close Menu</a> 
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>  Admin Home</a>
    <a href="addemployee.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> Add New Employee</a>
    <a href="viewemployee.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Employees</a>
    
    <!--<a href="viewitem.php" class="w3-bar-item w3-button w3-padding"> View Item</a>-->
    <a href="viewstock.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Stock</a>
    
      
      
     <button class="dropdown-btn w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Item Requests <i class="fa fa-chevron-right"></i>
     <?php
				$str="select * from requisition where status='Sent'";
				$result=mysqli_query($con,$str);
				$n=mysqli_num_rows($result);
				if($n>0)
				{
					echo '<blink> <span class="w3-badge w3-red"><strong>'.$n.' </strong></span></blink>';	
				}
			?>
      </button>
        <div class="dropdown-container">
            <a href="viewrequests.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View New Requests</a>
            <a href="viewallrequests.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Forwarded Requests</a>
            <a href="viewissuedrequests.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Issued Requests</a>
        </div>
    <a href="viewissuerec.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Issue Details</a>
    <a href="viewreports.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Reports</a>
  </div>
</nav>