<?php

$id = $_POST['id'];
$name_category = $_POST['name_category'];

if ($_POST['login_user'] != '00000') return;

// variabili di connessione al DB

      include 'config.php';

      $tabella = 'tbl_category';

            // Connessione al db
              $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
      $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

        if ($id == 0) {
          $query="INSERT INTO $tabella (name_category) VALUES ('$name_category') ";
        } else {
          $query="UPDATE $tabella SET name_category = '$name_category' WHERE id = $id ";
        }

        if (mysqli_query($mysqli, $query)) {
            echo "done";
        }

        $mysqli->close();


?>
