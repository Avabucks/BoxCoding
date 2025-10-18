<?php
    include "config.php";


    $tabella = "tbl_user_components";

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id, title, subtitle, description_c, show_contacts, id_user, user_name_c, status_bool, views, html_code, css_code, javascript_code FROM $tabella WHERE page_url = '" . $page_url . "'";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {

        $id = $row["id"];
        $title = $row["title"];
        $subtitle = $row["subtitle"];
        $description_c = $row["description_c"];
        $show_contacts = $row["show_contacts"];
        $status_bool = $row["status_bool"];
        $views = $row["views"];
        $id_user = $row["id_user"];
        $user_name_c = $row["user_name_c"];
        $html_code = base64_decode($row["html_code"]);
        $css_code = base64_decode($row["css_code"]);
        $javascript_code = base64_decode($row["javascript_code"]);

        if ($status_bool == 0 && !isset($_COOKIE["login_user"]) && $_COOKIE["login_user"] != $admin_id) {
          ?>
            <script>location.href="index"</script>
          <?php
        }

        if (isset($_COOKIE["login_user"]) && $id_user != $_COOKIE["login_user"] || !isset($_COOKIE["login_user"])) {
          if (!isset($_COOKIE["viewed"]) || $_COOKIE["viewed"] != $id) {
            $tabella = "tbl_user_components";

            // Connessione al db
            $mysqli_views = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
            $mysqli_views->select_db($db_name) or die( "Unable to select database");
            mysqli_set_charset($mysqli_views,"utf8");

            $views ++;

            $query_views="UPDATE $tabella SET views = '$views' WHERE page_url = '" . $page_url . "'";

                if (mysqli_query($mysqli_views, $query_views)) {
                  setcookie("viewed", $id);
                }

                $mysqli_views->close();

          }

        }

                }
      }

      /* free result set */
      $result->free();
      $mysqli->close();

    ?>
