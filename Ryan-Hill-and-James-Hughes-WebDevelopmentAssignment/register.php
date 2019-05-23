<?php
// Include config file
require_once 'connection.php';


// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // Validate email
    if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter an email.";
    } else
    {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This email is already used.";
                } else{
                    $email = trim($_POST["email"]);
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
              }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST['password'])))
    {
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    } else
    {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = 'Please confirm password.';
    } else
    {
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }


    }

    $phone = trim($_POST['phone']);

    $name = trim($_POST['name']);

    $address = trim($_POST['address']);


    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err))
    {

        // Prepare an insert statement
        $sql = "INSERT INTO users (name, phone, address, email, hashed_password) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_phone, $param_address, $param_email, $param_password);

            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_phone =$phone;
            $param_address = $address;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
              $sql = "SELECT id FROM users WHERE Name = '$name' AND Phone = '$phone'";
              $result = mysqli_query($link, $sql);
              $row = mysqli_fetch_assoc($result);
              $id = $row['id'];

              $sql = "INSERT INTO profilepictures (userid, status)
              VALUES ('$id', 1)";

              mysqli_query($link, $sql);


                // Redirect to login page
                header("location: login.php");
            } else
            {
                echo "Something went wrong. Please try again later.";
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
    <center><h1 style="color:blue;margin-bottom:10px">Register</h1><br/></center>
</div>

<div class="wrapper">
		<h2>Sign Up</h2>
		<p3>Create an account.<br></p3><br>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

			<div class="form">
					<label>Name</label><br>
					<input type="text" name="name"class="form-control">
			</div>


				<div class="form <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
						<label>Email</label><br>
						<input type="text" name="email"class="form-control" >
						<span class="plsEnter"><?php echo $email_err; ?></span>
				</div>

				<div class="form">
						<label>Phone</label><br>
						<input type="text" name="phone"class="form-control">
				</div>

				<div class="form">
						<label>Address</label><br>
						<input type="text" name="address"class="form-control">
				</div>


				<div class="form <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<label>Password</label><br>
						<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
						<span class="plsEnter"><?php echo $password_err; ?></span>
				</div>

				<div class="form <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
						<label>Confirm Password</label><br>
						<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
						<span class="plsEnter"><?php echo $confirm_password_err; ?></span>
				</div>

				<div class="form">
						<input type="submit" class="btn btn-primary" value="Submit">
						<input type="reset" class="btn btn-default" value="Reset">
				</div>

				<p3>Already have an account? <a href="login.php">Login here</a>.</p3>
		</form>
</div>


</body>
</html>
