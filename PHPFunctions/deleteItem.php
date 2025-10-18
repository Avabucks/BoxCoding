<?php
$id = $_POST['id'];
$tabella = $_POST['tabella'];

if ($_POST['login_user'] != '00000') return;

// variabili di connessione al DB

      include 'config.php';

        // Connessione al db
        $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
        $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

        $query="DELETE FROM $tabella WHERE id = $id";

        $mysqli->query($query) or die( "Unable to query insert cantiere");
        $mysqli->close();

      echo "done";

?>
