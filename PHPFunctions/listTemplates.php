<?php

// variabili di connessione al DB

include 'config.php';

$tabella = 'tbl_templates';

$mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
$mysqli->select_db($db_name) or die("Unable to select database");
mysqli_set_charset($mysqli, "utf8");
$query = "SELECT id_templ, name_tp, description_tp, image_tp, category_id, price_tp FROM $tabella ORDER BY id_templ DESC";
if ($result = $mysqli->query($query)) {
  /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
    $name_tp = $row["name_tp"];
    $id_templ = $row["id_templ"];
    $description_tp = $row["description_tp"];
    $image_tp = $row["image_tp"];
    $category_id = $row["category_id"];
    $price_tp = $row["price_tp"];

?>


    <div class='elementCard fade-in' data-category="<?php echo $category_id ?>" data-id="<?php echo $id_templ ?>" onclick='openPopup("viewElem", this, "open");'>
      <div class='image' style='background-image: url("<?php echo $image_tp ?>"), url("images/Light Template.svg");'></div>
      <span class='tag premium allowSearch'>PREMIUM</span>
      <p class='title allowSearch'><?php echo $name_tp ?></p>
      <p class='description allowSearch'><?php echo $description_tp ?></p>
      <p class='price'><span>Price:</span><?php echo $price_tp ?></p>
    </div>

<?php
  }
}

/* free result set */
$result->free();
$mysqli->close();
?>