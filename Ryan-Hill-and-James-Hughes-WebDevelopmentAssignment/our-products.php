<?php

require_once 'connection.php';


	session_start();

	if (isset($_SESSION['Login_Status']))
	{
		$login = "Logout";
	}
	else
	{
		$login = "Login";
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

	<?php if(isset($_SESSION['Login_Status'])) :  ?>
		 <li style="float:left;"><a  href="profile.php">Profile</a></li>

	<?php endif; ?>

<?php if(!isset($_SESSION['Login_Status'])) : ?>
		<li style="float:right;"><a  href="register.php">Register</a></li>

	  <li style="float:right;"><a  href="login.php">Login</a></li>

<?php endif; ?>

<?php if(isset($_SESSION['Login_Status'])) : ?>

	<li style="float:right;"><a  href="LogOut.php">Logout</a></li>
<?php endif; ?>



</a></li>
</ul>
</header>

<div style="width:100%;padding:0;margin:0;margin-bottom:10px">
	<img src="images/home.jpg" style="width:100%"/>
</div>

<div style="width:100%;float:left;margin:20px">
    <h1 style="color:blue;margin-bottom:10px">Our Products</h1><br>
</div>


<!-- Search bar for advanced search-->
<div style="width:100%;float:left;margin:20px">

		 Search Products
		<input id="search" type="text"  placeholder "search..." />

		In stock
		<select id="stock">
			<option value="any" selected="selected"> Any </option>
			<option value="In Stock"> In Stock </option>
		</select>

		Prescription required
		<select id="prescrip">
			<option value="any" selected="selected"> Any </option>
			<option value="Yes"> Yes </option>
			<option value="No"> No </option>
		</select>



</div>



<div id='search_results' style='width:100%;float:left;margin:20px'>

	<?php   if(!isset($_POST['search_status'])){

		$sql = "select PRODUCTNAME,PRICE,STOCKSTATUS,PRESCRIPTIONREQ from ourproducts";
		$search = mysqli_query($link, $sql);
		echo "<div style='width:100%;float:left;margin:20px'>";

		echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

			while($row = mysqli_fetch_assoc($search)) {

		echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" . $row["PRESCRIPTIONREQ"]. "</td><tr>";
	}
	echo "</table>

	</div>";
	}

		?>


	<!-- Search results are displayed here -->

</div>



<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/search.js"></script>

</body>
</html>
