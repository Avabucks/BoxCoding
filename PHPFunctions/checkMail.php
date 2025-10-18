<?php
  $mail = $_POST['mail'];

  include 'config.php';

  $tabella = 'tbl_user';

        // Connessione al db
          $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
  $mysqli->select_db($db_name) or die( "Unable to select database");
    mysqli_set_charset($mysqli,"utf8");

    $query="SELECT email_us FROM $tabella";
    if ($result = $mysqli->query($query)) {
               /* fetch associative array */
               while ($row = $result->fetch_assoc()) {
                if (strtolower($row["email_us"]) == strtolower($mail)) echo "exist";
            }

          }
      /* free result set */
            $result->free();
      $mysqli->close();


?>
