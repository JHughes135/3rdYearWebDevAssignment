
<?php
	session_start();
	if (isset($_SESSION['Login_Status'])) //Is logged in? - set button text
	{
		$login = "Logout";
	}
	else
	{
		$login = "Login";
	}
?>

<div>
<head>
</head>
<body style="margin:0px;padding:0px">
<header>
	<link rel="stylesheet" type="text/css" href="pharmacy.css">
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


<div style="float:left;width:30%;margin-left:20px">
	<center><h1 style="color:blue;margin-bottom:10px">We Care About our Service</h1></center>
	<center><img src="images/img1.jpg" style="width:80%"/></center>
	<center><p>We have amazing service, so great you will never want to shop anywhere else."</p></center>
</div>
<div style="float:left;width:30%;margin-left:20px">
	<center><h1 style="color:blue;margin-bottom:10px">We Care About Health</h1></center>
	<center><img src="images/img2.jpg" style="width:80%"/></center>
	<center><p>All of our staff are trained medical professionals, we have a 96% satisfaction rate</p></center>
</div>
<div style="float:left;width:30%;margin-left:20px">
	<center><h1 style="color:blue;margin-bottom:10px">We Care About You</h1></center>
	<center><img src="images/img3.jpg" style="width:80%"/></center>
	<center><p>We care about you the customer you are our main concern and we always keep you in mind.</p></center>
</div>
<div style="width:100%"/>
</body>
</html>
