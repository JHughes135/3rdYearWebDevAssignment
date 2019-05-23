<?php
session_start();

  //Saves updated product to db

if (isset($_SESSION['Login_Status'])) // check login
{
    $login = "Logout";
    $db = mysqli_connect("localhost","root","","pharmacy");
	//get the varibales
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
	$prow = $_GET['id'];
	echo "old pid = $prow";
	$result = mysqli_query($db,"update ourproducts set PRODUCTNAME = '$pname' , PRICE = $price, STOCKSTATUS = '$stock', PRESCRIPTIONREQ = '$presc', PRODUCTID = $pnum where PRODUCTID = $prow ");
	header("location: staff-area.php"); //redir


}
else // not logged in
{
    header("location: login.php"); //redir login
}
?>
