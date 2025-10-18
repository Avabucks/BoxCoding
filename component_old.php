<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Components - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, HTML, CSS, UI, Components">
  <meta name="description" content="Beautifully crafted UI components, ready for your next project.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.png">

  <!-- Include FILES -->
  <link rel="stylesheet" href="./style_boxcoding.css?v=1.1">
  <link rel="stylesheet" href="./responsive.css?v=1.1">
  <script src="./js/script.js"></script>

  <!-- ===== AOS ===== -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- ===== ADS ===== -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5682947198534776"
     crossorigin="anonymous"></script>

  <meta name="google-site-verification" content="5fNstpNHNIM7XPTKAehcb7c-N3Uf42Zvk6xEl4cfrcY" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-228119520-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-228119520-3');
  </script>

  <!-- ===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <style>
  </style>

</head>

<body>

  <?php include 'header.php'; ?>

  <div class="section components">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Components</span>
      </div>
      <h1 class="h1">BoxCoding's Components</h1>
      <h2 class="h2">Our UI components made with HTML & CSS, ready for your next project.</h2>
      <div class="divider" data-aos="zoom-in-right" data-aos-anchor-placement="bottom-bottom"></div>
    </div>
    <div class="table-grid">

      <?php

      // variabili di connessione al DB

      include 'config.php';

      $tabella = 'tbl_category';

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT id, name_category, image_path, link_path FROM $tabella ORDER BY name_category ASC";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {

          $id = $row["id"];
          $name_category = $row["name_category"];
          $image_path = $row["image_path"];
          $link_path = $row["link_path"];

          /* GET COUNT COMPONENTS PER CATEGORY */
          $count = 0;
          $tabella_count = 'tbl_components';

          $mysqli_count = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
          $mysqli_count->select_db($db_name) or die("Unable to select database");
          mysqli_set_charset($mysqli_count, "utf8");
          $query_count = "SELECT id_category FROM $tabella_count WHERE id_category = '" . $id . "'  ";
          if ($result_count = $mysqli_count->query($query_count)) {
            /* fetch associative array */
            while ($row_count = $result_count->fetch_assoc()) {
              $count++;
            }
          }

          /* free result set */
          $result_count->free();
          $mysqli_count->close();

      ?>

          <div onclick="location.href='<?php echo $link_path ?>';" class="card" data-aos="zoom-in">
            <div class="preview" style="background-image: url('<?php echo $image_path ?>');"></div>
            <span class="title"><?php echo $name_category ?></span>
            <span class="subtitle"><?php echo $count ?> components</span>
          </div>

      <?php

        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();
      ?>

    </div>

    <ins class="adsbygoogle"
         style="display:block; text-align:center;"
         data-ad-layout="in-article"
         data-ad-format="fluid"
         data-ad-client="ca-pub-5682947198534776"
         data-ad-slot="5780294696"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

  </div>

  <?php include 'footer.php'; ?>

  <script>
    AOS.init();
  </script>

</body>

</html>
