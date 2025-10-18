<?php

$id_item = $_POST['id'];
$id_us = $_POST['id_us'];
$date_saved = $_POST['date_saved'];
$action = $_POST['action'];

// variabili di connessione al DB

include 'config.php';
$tabella = 'tbl_saved';

// Connessione al db
$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
$mysqli->select_db($db_name) or die( "Unable to select database");
mysqli_set_charset($mysqli,"utf8");

if ($action == 'add') {
    $query="INSERT INTO $tabella (id_item, id_us, date_saved) VALUES ('$id_item', '$id_us', '$date_saved') ";
    if (mysqli_query($mysqli, $query)) {
        echo "added";
    }
} else if ($action == 'remove') {
    $query="DELETE FROM $tabella WHERE id_item = '". $id_item. "' AND id_us = '". $id_us. "'  ";
    $mysqli->query($query) or die( "Unable to query insert cantiere");
    echo "removed";
}


$mysqli->close();


?>
