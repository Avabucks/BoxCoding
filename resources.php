<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resources - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Resources, Tools, Productivity, Creativity">
  <meta name="description" content="Tools to boost your productivity and creativity.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.png">

  <!-- Include FILES -->
  <link rel="stylesheet" href="./style_boxcoding.css?v=1.1">
  <link rel="stylesheet" href="./responsive.css?v=1.1">
  <script src="./js/script.js"></script>

  <!-- ===== AOS ===== -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- ===== AJAX ===== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- ===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <style>
    .tab-resources {
      margin-top: 50px;
    }
  </style>

</head>

<body>

  <?php include 'header.php'; ?>

  <div class="section resources">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Resources</span>
      </div>
      <h1 class="h1">Resources</h1>
      <h2 class="h2">Tools to boost your productivity and creativity.</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div class="tab-resources" data-aos="fade-in" data-aos-anchor-placement="top">

      <?php

      // variabili di connessione al DB

      include 'config.php';

      $tabella = 'tbl_resources';

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT url_website FROM $tabella ORDER BY url_website ASC";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {

          $url_website = $row["url_website"];

      ?>

          <div onclick="window.open('http://<?php echo $url_website ?>/', '_blank');" class="card">
            <div class="favicon">
              <img alt="" data-url="<?php echo $url_website ?>" />
            </div>
            <div class="text">
              <span class="title"><?php echo ucfirst($url_website) ?></span>
              <span class="description" data-url="<?php echo $url_website ?>"></span>
            </div>
          </div>
          <div class="cool-divider" data-aos="fade-in">
            <i class='bx bx-meteor'></i>
          </div>

      <?php

        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();

      ?>

    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    AOS.init();

    window.addEventListener('load', (event) => {

      document.querySelectorAll(".favicon img").forEach((el, index) => {
        url = el.getAttribute('data-url');
        el.src = "https://icon.horse/icon/" + url;
      });

      document.querySelectorAll(".description").forEach((el, index) => {
        url = el.getAttribute('data-url');
        $.ajax({
          url: "getmeta",
          type: 'POST',

          data: {
            url: url
          },

          success: function (data) {
            el.innerText = data;
          }
        });
      });

    });

    var pos = document.querySelectorAll(".tab-resources .cool-divider").length - 1;
    document.querySelectorAll(".tab-resources .cool-divider")[pos].remove();

  </script>

</body>

</html>
