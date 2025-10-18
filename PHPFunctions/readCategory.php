<?php

$id = $_POST['id'];
$return_arr = array();

// variabili di connessione al DB

include 'config.php';

$tabella = 'tbl_category';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id, name_category  FROM $tabella WHERE id = $id ";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name_category = $row["name_category"];

  $return_arr[] = array(
    "id" => $id,
    "name_category" => $name_category
  );

}
}

echo json_encode($return_arr);

/* free result set */
$result->free();
$mysqli->close();
?>