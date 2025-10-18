<?php

include 'config.php';
$id = $_GET['id'];
$tabella = 'tbl_user_components';

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT page_url FROM $tabella WHERE id = '" . $id . "'";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
        $page_url = $row["page_url"];
        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();

      unlink($page_url);

        // Connessione al db
        $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
        $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

        $query="DELETE FROM $tabella WHERE id = $id";

        $mysqli->query($query) or die( "Unable to query insert cantiere");
        $mysqli->close();

        header("location: dashboard");

?>
