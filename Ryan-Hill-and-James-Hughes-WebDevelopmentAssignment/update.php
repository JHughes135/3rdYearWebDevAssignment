<?php
session_start();
if (isset($_SESSION['Login_Status'])) // check login
{
    $login = "Logout";
    $db = mysqli_connect("localhost","root","","pharmacy");
	$pid = $_GET['id']; //get selected product
	$result = mysqli_query($db,"select PRODUCTNAME,PRICE,STOCKSTATUS,PRESCRIPTIONREQ,PRODUCTID from ourproducts where PRODUCTID = $pid "); // get product row
	if (!$result) // if fail
	{
		header("location: staff-area");
	}
	$row = $result->fetch_assoc();
	
}
else //not logged in
{
    header("location: login.php");
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="pharmacy.css">
</head>
<body style="margin:0px;padding:0px">
<header>
    <ul>
        <li><a  href="index.php">Home</a></li>
        <li><a  href="about-us.php">About Us</a></li>
        <li><a  href="our-staff.php">Our Staff</a></li>
        <li><a  href="our-products.php">Our Products</a></li>
        <li><a  href="contact-us.php">Contact</a></li>
        <li><a  href="staff-area.php">Staff Area</a></li>
        <li style="float:right;"><a  href="login.php"><?php
                echo $login;
                ?></a></li>
    </ul>
</header>


<div style="width:100%;padding:0;margin:0;margin-bottom:10px">
    <img src="images/home.jpg" style="width:100%"/>
</div>



<div style="width:100%;float:left;margin:20px">
    <h1 style="color:blue;margin-bottom:10px">Editing Product: <?php echo $row['PRODUCTNAME']; ?></h1><br/>
</div>


<div style="width:100%;float:left;margin:20px">

	<form action="updatesave.php?id=<?php echo $pid ?>" method="post">
		<center><label>Product Name: </label><br/><input type="text"  id="pname" name="pname" value="<?php echo $row['PRODUCTNAME'] ?>"><br/><br/>
		<label>Price: </label><br/><input type="text"  id="price" name="price" value="<?php echo $row['PRICE'] ?>"><br/><br/>
		<label>Stock Status: </label><br/><input type="text"  id="stock" name="stock" value="<?php echo $row['STOCKSTATUS'] ?>"><br/><br/>
		<label>Presciption Required?: </label><br/><input type="text"  id="presc" name="presc" value="<?php echo $row['PRESCRIPTIONREQ'] ?>"><br/><br/>
		<label>Product Number (Must Be Unique!!!): </label><br/><input type="text"  id="pnum" name="pnum" value="<?php echo $row['PRODUCTID'] ?>"><br/><br/>
		<input type="submit" value="submit"></center>
		
	</form>



</div>


</body>
</html>