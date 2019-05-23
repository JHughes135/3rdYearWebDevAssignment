<?php
  session_start();

  // Include config file
  require_once 'connection.php';

  $Email = $_SESSION['Login_Status'];


  if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $query = "SELECT id, Name, Phone, Address, Email FROM users WHERE Email = '".$Email."'";
  $result = mysqli_query($link, $query);

  if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

      $userid = $row["id"];
      $username = $row["Name"];
      $userphone = $row["Phone"];
      $useraddress = $row["Address"];
      $useremail = $row["Email"];
    }


  }


 ?>
<html>
<head>

  <html>
  <head>
      <link rel="stylesheet" type="text/css" href="profile.css">
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


  </header>


</head>
<body>
<?php if(isset($_SESSION['Login_Status'])) :?>

  <div style="width:100%;clear: both;margin:20px">
      <h1 style="color:blue;margin-bottom:10px">Profile</h1><br/>
  </div>

  <div class="profile">


      <?php
          if(isset($_SESSION['Login_Status'])){

              //form to upload profile image
              echo "<h2> Profile image </h2>


              <form action='upload.php' method='POST' enctype='multipart/form-data'>
              <input type='file' name='file'>
              <button type='submit' name='submit'>UPLOAD</button>
              </form>";

              //Select users profile image from db
              $sqlimg = "SELECT * FROM profilepictures WHERE userid = '$userid'";
              $resultimg = mysqli_query($link, $sqlimg);
          while($rowimg = mysqli_fetch_assoc($resultimg)){
              echo "<div>";
                if($rowimg['STATUS'] == 0){
                    echo "<img src='uploads/profile".$userid.".jpg' height='128' width='200'>";
                } else {
                  echo "<img src='uploads/profiledefault.jpg'>";
                }

              echo "</div>";


          }

        }
            ?>



    <div class="details">
      <div class="name">
        <h2>Name: </h2> <p2><?php echo $username; ?></p2>
      </div>

      <div class="address">
        <h2>Address: </h2> <p2><?php echo $useraddress; ?></p2>
      </div>

      <div class="email">
        <h2>Email: </h2> <p2><?php echo $useremail; ?></p2>
      </div>

      <div class="phone">
        <h2>Phone: </h2> <p2><?php echo $userphone; ?></p2>
      </div>

      </div>

  </div>

<?php endif; ?>

<?php if(!isset($_SESSION['Login_Status'])) :?>
  <h2>Please log in to view profile.</h2>
<?php endif;?>


  <?php


  // Close connection
  mysqli_close($link);

    ?>


</body>

</html>
