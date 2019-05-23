<?php
session_start();

//adds a product to the db

if (isset($_SESSION['Login_Status'])) // if logged in
{
    $login = "Logout";
    $db = mysqli_connect("localhost","root","","pharmacy");
	//get variables
	$pname = $_POST["pname"];
	echo "pname = $pname";
	$price = $_POST["price"];
	echo "price = $price";
	$stock = $_POST["stock"];
	echo "stock = $stock";
	$presc= $_POST["presc"];
	echo "prescription = $presc";
	$pnum = $_POST["pnum"];
	echo "new pid = $pnum";
	$result = mysqli_query($db,"INSERT INTO OURPRODUCTS VALUES('$pname',$price,'$stock','$presc',$pnum);");
	header("location: staff-area.php"); //back to staff-area


}
else //not logged in
{
    header("location: login.php");
}
?>
