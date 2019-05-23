<?php

  session_start();

  require_once 'connection.php';

  /* The search bar uses the keyup JQ funtion to search the products db an onchange function is then used to filter the items by stock or prescription */


  if(isset($_POST['search_term']) && isset($_POST['stock_status']) && isset($_POST['prescription_req'])){

    $search_term = mysqli_real_escape_string($link, htmlentities($_POST['search_term']));

    $stock_status = mysqli_real_escape_string($link, htmlentities($_POST['stock_status']));

    $prescription_req = mysqli_real_escape_string($link,htmlentities($_POST['prescription_req']));


    if(empty($search_term) ){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` ");
      $result_count = mysqli_num_rows($search);

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }

    }elseif(!empty($search_term) && $stock_status == 'any' && $prescription_req == 'any'){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` WHERE `PRODUCTNAME` LIKE '%$search_term%' ");
      $result_count = mysqli_num_rows($search);

      $suffix = ($result_count != 1) ? 's' : '';

      echo '<p>Your search for ',$search_term ,' returned ', $result_count  ,' result', $suffix, '</p>';

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }


    }elseif(!empty($search_term) && $stock_status == 'In Stock' && $prescription_req == 'any'){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` WHERE `PRODUCTNAME` LIKE '%$search_term%' and `STOCKSTATUS` LIKE '$stock_status' ");
      $result_count = mysqli_num_rows($search);

      $suffix = ($result_count != 1) ? 's' : '';

      echo '<p>Your search for ',$search_term ,' returned ', $result_count  ,' result', $suffix, '</p>';

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }


    }elseif(!empty($search_term) && $stock_status == 'In Stock' && $prescription_req == 'Yes'){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` WHERE `PRODUCTNAME` LIKE '%$search_term%' and `STOCKSTATUS` LIKE '$stock_status' and `PRESCRIPTIONREQ` LIKE '$prescription_req' ");
      $result_count = mysqli_num_rows($search);

      $suffix = ($result_count != 1) ? 's' : '';

      echo '<p>Your search for ',$search_term ,' returned ', $result_count  ,' result', $suffix, '</p>';

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }

    }elseif(!empty($search_term) && $stock_status == 'In Stock' && $prescription_req == 'No'){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` WHERE `PRODUCTNAME` LIKE '%$search_term%' and `STOCKSTATUS` LIKE '$stock_status' and `PRESCRIPTIONREQ` LIKE '$prescription_req' ");
      $result_count = mysqli_num_rows($search);

      $suffix = ($result_count != 1) ? 's' : '';

      echo '<p>Your search for ',$search_term ,' returned ', $result_count  ,' result', $suffix, '</p>';

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }

    }elseif(!empty($search_term) && $stock_status == 'any' && $prescription_req == 'Yes'){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` WHERE `PRODUCTNAME` LIKE '%$search_term%' and `PRESCRIPTIONREQ` LIKE '$prescription_req' ");
      $result_count = mysqli_num_rows($search);

      $suffix = ($result_count != 1) ? 's' : '';

      echo '<p>Your search for ',$search_term ,' returned ', $result_count  ,' result', $suffix, '</p>';

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }

    }elseif(!empty($search_term) && $stock_status == 'any' && $prescription_req == 'No'){

      $search = mysqli_query($link, "SELECT * FROM `ourproducts` WHERE `PRODUCTNAME` LIKE '%$search_term%' and `PRESCRIPTIONREQ` LIKE '$prescription_req' ");
      $result_count = mysqli_num_rows($search);

      $suffix = ($result_count != 1) ? 's' : '';

      echo '<p>Your search for ',$search_term ,' returned ', $result_count  ,' result', $suffix, '</p>';

      echo "<table><tr><th>Product Name</th><th>Price</th><th>In Stock?</th><th>Prescription?</th></tr>";

      while($row = mysqli_fetch_assoc($search)) {

        echo "<tr><td>" . $row["PRODUCTNAME"]. "</td><td>" . $row["PRICE"]. "</td><td>" . $row["STOCKSTATUS"]. "</td><td>" .$row["PRESCRIPTIONREQ"]. "</td><tr>";
      }

    }


  }

 ?>

 <html>
<head>
    <link rel="stylesheet" type="text/css" href="pharmacy.css">
</head>

 </html>
