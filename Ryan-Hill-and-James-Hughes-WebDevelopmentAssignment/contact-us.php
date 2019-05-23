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

<div style="width:100%;float:left;margin:20px">
    <h1 style="color:blue;margin-bottom:10px">Contact Us</h1><br/>
</div>
<div style="width:100%;float:left;margin:20px">
    <p>If you need to contact us feel free to drop in to our store. If you need a private consultation,
        you can call on (01) 435 5658 or if you fell like droping us an email at aschelling@gmail.com you can tell us what
		what your having trouble with and we will get back to you as soon as possible</p>
</div>


<div style="float:left;width:30%;margin-left:20px">
    <center><img src="images/img1.jpg" style="width:80%"/></center>
</div>
<div style="float:left;width:30%;margin-left:20px">
    <center><img src="images/img2.jpg" style="width:80%"/></center>
</div>
<div style="float:left;width:30%;margin-left:20px">
    <center><img src="images/img3.jpg" style="width:80%"/></center>
</div>
<div style="width:100%"/>

</body>
</html>
