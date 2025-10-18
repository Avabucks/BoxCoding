<?php
  $mail = $_POST['mail'];
  $password = md5($_POST['password']);
  $return_arr = array();

  include 'config.php';

  $tabella = 'tbl_user';

        // Connessione al db
          $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
  $mysqli->select_db($db_name) or die( "Unable to select database");
    mysqli_set_charset($mysqli,"utf8");

    $query="SELECT username_us, email_us, password_us, id_us FROM $tabella";
    if ($result = $mysqli->query($query)) {
               /* fetch associative array */
               while ($row = $result->fetch_assoc()) {
                if ($row["email_us"] == $mail && $row["password_us"] == $password) {
                  $return_arr[] = array("username_us" => $row["username_us"],
                                  "id_us" => $row["id_us"]);

                }
            }

          }

          echo json_encode($return_arr);

      /* free result set */
            $result->free();
      $mysqli->close();


?>
