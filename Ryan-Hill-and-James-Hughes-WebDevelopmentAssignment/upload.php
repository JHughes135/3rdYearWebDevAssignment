<?php
session_start();
require_once 'connection.php';

//This file saves the users image to tthe uploads file and renames it to 'profile<userid>' it also adds the details to the db

$result = mysqli_query($link, "SELECT id FROM users WHERE email = '$_SESSION[Login_Status]'");

  while($row = $result->fetch_assoc()){

    $id = $_SESSION['id'];

  }



$id = $_SESSION['id'];

  $sql = "SELECT id FROM users WHERE Email = '".$_SESSION[Login_Status]."'";
  $result = mysqli_query($link, $sql);

    while($row = $result->fetch_assoc()){

      $userid = $row["id"];
    }

      $sqlimg = "SELECT * FROM profilepictures WHERE userid = '$userid'";
      $resultimg = mysqli_query($link, $sqlimg);


  if(isset($_POST['submit'])){

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){

      if($fileError === 0){

        if($fileSize < 1000000){
          $fileNameNew = "profile".$userid.".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);

          $sql = "UPDATE profilepictures SET status=0 WHERE userid='$userid'";
          $result = mysqli_query($link, $sql);

          header("Location: profile.php");

        }else{
          echo "Your file is too big";
        }

      }else{
        echo "There was an error uploading file";
      }

    }else{
      echo "File type not allowed!";
    }


  }

 ?>
