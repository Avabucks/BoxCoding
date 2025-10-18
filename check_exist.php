<?php
    include 'config.php';

  $tabella = 'tbl_user';

  $email_check = $_POST['email_check'];

  $exist = "0";

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id FROM $tabella WHERE email_us = '" . $email_check . "'";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $exist = "1";
        }
    }

    echo $exist;
      

      /* free result set */
      $result->free();
      $mysqli->close();

?>