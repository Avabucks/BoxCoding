<?php

$id_us = $_POST['id_us'];

$return_arr = array();

// variabili di connessione al DB

include 'config.php';

$tabella = 'tbl_saved';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id_item, id_us, date_saved  FROM $tabella WHERE id_us = '". $id_us. "' ORDER BY date_saved DESC  ";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $id_item = $row["id_item"];
    $id_us = $row["id_us"];
    $date_saved = $row["date_saved"];

  $return_arr[] = array(
    "id_item" => $id_item,
    "id_us" => $id_us,
    "date_saved" => $date_saved
  );

}
}

echo json_encode($return_arr);

/* free result set */
$result->free();
$mysqli->close();
?>