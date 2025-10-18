<?php

$id_templ = $_POST['elId'];
$id_us = $_POST['id_us'];
$return_arr = array();

// variabili di connessione al DB

include 'config.php';

//TABLE ELEMENTS
$tabella = 'tbl_templates';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id_templ, name_tp, description_tp, image_tp, category_id, file_tp, link_tp, price_tp  FROM $tabella WHERE id_templ = '". $id_templ. "'  ";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $name_tp = $row["name_tp"];
    $id_templ = $row["id_templ"];
    $description_tp = $row["description_tp"];
    $image_tp = $row["image_tp"];
    $category_id = $row["category_id"];
    $file_tp = $row["file_tp"];
    $link_tp = $row["link_tp"];
    $price_tp = $row["price_tp"];
  }
}

/* free result set */
$result->free();
$mysqli->close();

//TABLE SAVED
$isFavourite = 0;
$tabella = 'tbl_saved';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT date_saved FROM $tabella WHERE id_item = '". $id_templ. "' AND id_us = '". $id_us. "'  ";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $isFavourite++;
  }
}

/* free result set */
$result->free();
$mysqli->close();

  $return_arr[] = array(
    "isFavourite" => $isFavourite,
    "name_tp" => $name_tp,
    "id_templ" => $id_templ,
    "description_tp" => $description_tp,
    "image_tp" => $image_tp,
    "category_id" => $category_id,
    "file_tp" => $file_tp,
    "link_tp" => $link_tp,
    "price_tp" => $price_tp
  );

echo json_encode($return_arr);


?>