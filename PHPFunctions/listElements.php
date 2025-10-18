<?php

// variabili di connessione al DB

include 'config.php';

$tabella = 'tbl_elements';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id_elem, name_el, description_el, image_el, category_id FROM $tabella ORDER BY id_elem DESC";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $name_el = $row["name_el"];
    $id_elem = $row["id_elem"];
    $description_el = $row["description_el"];
    $image_el = $row["image_el"];
    $category_id = $row["category_id"];

?>


    <div class='elementCard fade-in' data-category="<?php echo $category_id ?>" data-id="<?php echo $id_elem ?>" onclick='openPopup("viewElem", this, "open");'>
      <div class='image' style='background-image: url("<?php echo $image_el ?>"), url("images/Shiny Overlay.svg");'></div>
      <span class='tag free allowSearch'>FREE</span>  
      <p class='title allowSearch'><?php echo $name_el ?></p>
      <p class='description allowSearch'><?php echo $description_el ?></p>
      <p class='price'><span>Price:</span>FREE</p>
    </div>

<?php
  }
}

/* free result set */
$result->free();
$mysqli->close();
?>