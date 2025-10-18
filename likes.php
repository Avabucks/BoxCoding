<?php
    include 'config.php';

  $tabella = 'tbl_likes';

  $id_component = $_POST['id_component'];
  $id_user = $_COOKIE["login_user"];

  $exist = "0";

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id FROM $tabella WHERE id_component = '" . $id_component . "' AND id_user = '" . $id_user . "'";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $exist = "1";
        }
    }

      /* free result set */
      $result->free();
      $mysqli->close();

    if ($exist == "0") {
      // Connessione al db
      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
      $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

        $query="INSERT INTO $tabella (id_component, id_user) VALUES ('$id_component', '$id_user') ";

        if (mysqli_query($mysqli, $query)) {
        }
        $mysqli->close();

    } else if ($exist == "1") {
        // Connessione al db
        $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
        $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

        $query="DELETE FROM $tabella WHERE id_component = '" . $id_component . "' AND id_user = '" . $id_user . "'";

        $mysqli->query($query) or die( "Unable to query insert cantiere");
        $mysqli->close();
    }

    // COUNT LIKES
    $count_likes = 0;
    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id FROM $tabella WHERE id_component = '" . $id_component . "'";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $count_likes++;
        }
    }

    if ($count_likes > 1000) {
      $count_likes = round($count_likes/1000, 1) . 'K';
    }


    echo $count_likes;

      /* free result set */
      $result->free();
      $mysqli->close();


?>