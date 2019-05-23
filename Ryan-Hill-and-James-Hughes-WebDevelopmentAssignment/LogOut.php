<?php

session_start();

unset($_SESSION['Login_Status']);
// Delete all session variables
 session_destroy();

// Jump to login page
header('Location: index.php');




 ?>
