<?php
session_start();

  //Deletes a product from the db

if (isset($_SESSION['Login_Status']))
{
    $login = "Logout";
	$db = mysqli_connect("localhost","root","","pharmacy");
	$pid = $_GET['id'];
    $result = mysqli_query($db,"delete from ourproducts where productid =$pid ");
	header("location: staff-area.php");
}
else
{
    header("location: login.php");
    $login = "Login";
}
?>
