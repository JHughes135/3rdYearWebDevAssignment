<?php
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
	<img src="images/home.jpg" style="width:90%"/>
</div>

<div style="width:100%;margin-bottom:10px;margin-left:10px;">
    <div style="width:30%;float:left;margin:10px;">
        <img src="images/img3.jpg" style="width:80%"/>
    </div>

    <div style="width:60%;float:left;">
        <h1 style="color:blue;margin-bottom:10px">Pharmacists</h1><br/>
        <p>Committed to giving you a happy, cheerful experience, their main responsibility, helping you the customer and
		advising you on the best products.</p>
    </div>
</div>
<div style="width:100%;float:left;"/>

<div style="width:100%margin-bottom:10px;margin-left:10px;">
	<div style="width:60%;float:left;">
		<h1 style="color:blue;margin-bottom:10px">Top expert Dr. A Schelling</h1><br/>
	<p>Our pharmacy uses the science and technique of preparing and dispensing drugs.
	It is a health profession that links health sciences with chemical sciences and aims to
	ensure the safe and effective use of pharmaceutical drugs.</p>
	</div>
	<div style="width:30%;float:left;margin:10px;">
		<img src="images/img4.jpg" style="width:80%"/>
	</div>
</div>
<div style="width:100%;float:left;"/>



<div style="width:100%;float:left;"/>


</body>
</html>
