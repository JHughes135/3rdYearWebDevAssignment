<?php
// Include config file
require_once 'connection.php';

session_start();



if(isset($_SESSION['Login_Status']))
{


  header("location: index.php");
}

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = 'Please enter email.';
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }


    // Validate credentials
    if(empty($email_err) && empty($password_err)){

        // Prepare a select statement
        $sql = "SELECT email, hashed_password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){

                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){

                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the email to the session */
                            session_start();
                            $_SESSION['Login_Status'] = $email;
                            header("location: index.php");

                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = 'No account found with that email.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="pharmacy.css">
</head>
<body style="margin:0px;padding:0px">
<header>
    <ul style="margin-bottom: 20px">
        <li><a  href="index.php">Home</a></li>
        <li><a  href="about-us.php">About Us</a></li>
        <li><a  href="our-staff.php">Our Staff</a></li>
        <li><a  href="our-products.php">Our Products</a></li>
        <li><a  href="contact-us.php">Contact</a></li>
        <li><a  href="staff-area.php">Staff Area</a></li>
        <li style="float:right;"><a  href="login.php">Login</a></li>
    </ul>
</header>
<div style="width:100%;padding:0;margin:0;margin-bottom:10px">
    <img src="images/home.jpg" style="width:100%"/>
</div>

<div style="width:100%;float:left;margin-top:20px">
    <center><h1 style="color:blue;margin-bottom:10px">Login</h1><br/></center>
</div>

<div style="width:100%;float:left;margin:20px">
  <h2>Login</h2>
  <p3>Please login to use our website.<br></p3><br>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form">
          <label>Email</label><br>
          <input type="email" name="email"class="form-control" value="<?php echo $email; ?>">
          <span class="plsEnter"><?php echo $email_err; ?></span>
      </div>

      <div class="form">
          <label>Password</label><br>
          <input type="password" name="password" class="form-control">
          <span class="plsEnter"><?php echo $password_err; ?></span>
      </div>

      <div class="form">
          <input type="submit" class="submit" value="Login">
      </div>

      <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>

  </form>
</div>


</body>
</html>
