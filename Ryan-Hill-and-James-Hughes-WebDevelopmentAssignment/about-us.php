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
<div style="float:left;width:100%;margin:20px">


<h1 style="color:blue;margin-bottom:10px">About Us</h1><br/>
<p>Established for over 50 years this is a family run buisness, we're a small pharmacy located in beautiful churchtown, Dublin.
<br>
We pride ourselves on our quality of service and customer care our staff are friendly and always willing to help</p>
</div>
<div style="float:left;width:100%;margin:20px">
	<center><img src="images/about1.jpg" style="width:80%"/></center>
</div>
<div style="float:left;width:100%;margin:20px">
<p>Our service is incredibly important to us, here's a quick video where you can see our staff working:</p>
<div style="float:left;width:100%;margin:20px">

	<center>
			<iframe width="620" height="350"

				source src="video/staff-video.mp4" type="video/mp4" >

			</iframe>
	</center>

</div>
<div style="float:left;width:100%;margin:20px">
	<p>In this video you can see our friendly staff and what they do each day</p>
</div>
</div>
</body>
</html>
