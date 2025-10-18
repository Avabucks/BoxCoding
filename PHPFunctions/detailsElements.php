<?php

$id_elem = $_POST['elId'];
$id_us = $_POST['id_us'];
$return_arr = array();

// variabili di connessione al DB

include 'config.php';

//TABLE ELEMENTS
$tabella = 'tbl_elements';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id_elem, name_el, description_el, image_el, category_id, preview_el, preview_size, html_text, css_text, javascript_text  FROM $tabella WHERE id_elem = '". $id_elem. "'  ";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $name_el = $row["name_el"];
    $id_elem = $row["id_elem"];
    $description_el = $row["description_el"];
    $image_el = $row["image_el"];
    $category_id = $row["category_id"];
    $preview_el = $row["preview_el"];
    $preview_size = $row["preview_size"];
    $html_text = $row["html_text"];
    $css_text = $row["css_text"];
    $javascript_text = $row["javascript_text"];
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
$query = "SELECT date_saved FROM $tabella WHERE id_item = '". $id_elem. "' AND id_us = '". $id_us. "'  ";
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
    "name_el" => $name_el,
    "id_elem" => $id_elem,
    "description_el" => $description_el,
    "image_el" => $image_el,
    "category_id" => $category_id,
    "preview_el" => $preview_el,
    "preview_size" => $preview_size,
    "html_text" => $html_text,
    "css_text" => $css_text,
    "javascript_text" => $javascript_text
  );

echo json_encode($return_arr);


?>