<?php

$id = $_POST['id'];
$name_el = $_POST['name_el'];
$id_elem = $_POST['id_elem'];
$description_el = $_POST['description_el'];
$image_el = $_POST['image_el'];
$category_id = $_POST['category_id'];
$preview_el = $_POST['preview_el'];
$preview_size = $_POST['preview_size'];
$html_text = $_POST['HTML_text'];
$css_text = $_POST['CSS_text'];
$javascript_text = $_POST['JavaScript_text'];

if ($_POST['login_user'] != '00000') return;

// variabili di connessione al DB

      include 'config.php';

      $tabella = 'tbl_elements';

            // Connessione al db
              $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
      $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");
          echo $id_elem;

        if ($id == 0) {
          $query="INSERT INTO $tabella (id_elem, name_el, description_el, image_el, category_id, preview_el, preview_size, html_text, css_text, javascript_text) VALUES ('$id_elem', '$name_el', '$description_el', '$image_el', '$category_id', '$preview_el', '$preview_size', '$html_text', '$css_text', '$javascript_text') ";
        } else {
          $query="UPDATE $tabella SET id_elem = '$id_elem', name_el = '$name_el', description_el = '$description_el', category_id = '$category_id', preview_el = '$preview_el', preview_size = '$preview_size', html_text = '$html_text', css_text = '$css_text', javascript_text = '$javascript_text' WHERE id = $id ";
        }

        if (mysqli_query($mysqli, $query)) {
            echo "done";
        }

        $mysqli->close();


?>
