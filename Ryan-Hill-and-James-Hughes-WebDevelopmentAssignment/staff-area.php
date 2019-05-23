<?php
session_start();

//On this page products can be added, deleted or edited only by logged in users

if (isset($_SESSION['Login_Status'])) //is logged in
{
    $login = "Logout";
    $db = mysqli_connect("localhost","root","","pharmacy");
	$welcome = $_SESSION['Login_Status'];
	$delete = "delete.php?id="; //php file to delete
	$update = "update.php?id="; //php file to update
}
else //not logged in
{
    header("location: login.php");
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
    <img src="images/home.jpg" style="width:90%"/>
</div>


<div style="width:100%;float:left;margin:20px">
    <h1 style="color:blue;margin-bottom:10px"><?php echo "Welcome, $welcome" ?></h1><br/>
</div>

<div style="width:100%;float:left;margin:20px">
    <h1 style="color:blue;margin-bottom:10px">Products Database Editor ( Use with Extreme Caution! )</h1><br/>
</div>

<div style="width:100%;float:left;margin:20px">

    <?php
    $db = mysqli_connect("localhost","root","","pharmacy");
    $result = mysqli_query($db,"select PRODUCTNAME,PRICE,STOCKSTATUS,PRESCRIPTIONREQ,PRODUCTID from ourproducts");


    if ($result->num_rows > 0) // non zero result
    {
        echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th><th>ID</th><th>Delete Product</th><th>Edit Product</th></tr>";

        while($row = $result->fetch_assoc()) //while still has rows print them
        {
            echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" . $row["PRESCRIPTIONREQ"]."</td><td>" .$row['PRODUCTID']. "</td><td><a href=".$delete .$row['PRODUCTID']. ">Delete</a></td><td><a href=".$update .$row['PRODUCTID']. ">Edit</a></td></tr>";
        }
        echo "</table>";
    }
    else // zero result
    {
        echo "Nothing to Display";
    }
    ?>

</div>


<div style="width:100%;float:left;margin:20px">

	<form action="add.php" method="post">
		<center><h1 style="color:blue;margin-bottom:10px">Add Product</h1><br/><br/>

		<label>Product Name: </label><br/><input type="text"  id="pname" name="pname"><br/><br>

		<label>Price: </label><br/><input type="text"  id="price" name="price"><br/><br/>

		<label>Stock Status: </label><br/><input type="radio"  id="stock" name="stock" value="In Stock"> In Stock <input type="radio"  id="stock" name="stock" value="Not In Stock"> Not In Stock<br/><br/>

    <label>Prescription Required: </label><br/><input type="radio"  id="presc" name="presc" value="Yes"> Yes<input type="radio"  id="presc" name="presc" value="No"> No<br/><br/>

		<label>Product Number (Must Be Unique!!!): </label><br/><input type="text"  id="pnum" name="pnum"><br/><br/>

		<input type="submit" value="submit"></center>

	</form>



</div>



</body>
</html>
