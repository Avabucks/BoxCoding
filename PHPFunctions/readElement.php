<?php

$id = $_POST['id'];
$return_arr = array();

// variabili di connessione al DB

include 'config.php';

$tabella = 'tbl_elements';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id, id_elem, name_el, description_el, image_el, category_id, preview_el, preview_size, html_text, css_text, javascript_text  FROM $tabella WHERE id = $id ";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
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

  $return_arr[] = array(
    "id" => $id,
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

}
}

echo json_encode($return_arr);

/* free result set */
$result->free();
$mysqli->close();
?>