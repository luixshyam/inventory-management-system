<link href="../css/style2.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="../css/all.css">
<link href="../css/fonts.css" type="text/css" rel="stylesheet">
<nav class="w3-sidebar w3-lime w3-collapse  w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <?php
		$id=$_SESSION["empid"];
		$sql="Select * from employee where id='$id'";
		$result=$con->query($sql);
		while($row = mysqli_fetch_array($result))
		{   
			$name=$row['name'];
			$img=$row['image'];
    ?>
    <div class="w3-container w3-row">
        <div class="container center">
            <img src="../<?php echo $img; ?>" class="w3-circle" style="width:30%">
        </div>
        <div class="container center">
            <span>Welcome <strong>&nbsp;<?php echo $name; ?></strong></span><br>
            <a href="logout.php" class="w3-button w3-red w3-circle"><i class="fa fa-sign-out-alt"></i></a>
        </div>
    </div>
    <?php
    }
    ?>
    <hr>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"> Close Menu</a>
        <a href="managerhome.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i> Home</a>
        <a href="additem.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> Add Item</a>
        <a href="viewitem.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Item</a>
         <a href="stockentry.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> Stock Entry</a>
        <a href="viewstock.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Stock </a>
        <a href="viewrequests.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> View Item Requests
        <?php
			$str="select * from requisition where status='Forwarded'";
			$result=mysqli_query($con,$str);
			$n=mysqli_num_rows($result);
			if($n>0)
			{
				echo '<blink> <span class="w3-text-red"><strong> '.$n.' </strong></span></blink>';	
			}
		?>
        </a>
         <a href="changepass.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chevron-circle-right"></i> Change Password</a>
        <br><br>
    </div>
</nav>