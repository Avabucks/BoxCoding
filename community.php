<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Community - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, HTML, CSS, UI, Community">
  <meta name="description" content="">
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
  <script async src="https://fundingchoicesmessages.google.com/i/pub-5682947198534776?ers=1" nonce="5BxGSG5pgEYSlhPfDugkeQ"></script><script nonce="5BxGSG5pgEYSlhPfDugkeQ">(function() {function signalGooglefcPresent() {if (!window.frames['googlefcPresent']) {if (document.body) {const iframe = document.createElement('iframe'); iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;'; iframe.style.display = 'none'; iframe.name = 'googlefcPresent'; document.body.appendChild(iframe);} else {setTimeout(signalGooglefcPresent, 0);}}}signalGooglefcPresent();})();</script>
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
    .add-butt {
      display: flex;
      flex-direction: column;
      gap: 40px;
    }
    .cta-buttons .selected {
      outline: 2px solid var(--primary);
    }
    .search-label {
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 10px 20px;
      border-bottom: 1px solid rgb(255, 255, 255, .1);
    }
    .search-label span.label {
      opacity: .7;
    }
    .search-label i {
      margin-top: 2px;
      font-size: 1.4em;
    }

  </style>

</head>

<body>

  <?php include 'header.php'; ?>

  <div class="section components">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Community</span>
      </div>
      <h1 class="h1">Explore Community</h1>
      <h2 class="h2">Find inspiration from UI components and front-end developers.</h2>
      <div class="divider" data-aos="zoom-in-right" data-aos-anchor-placement="bottom-bottom"></div>
    </div>

    <?php
      $filter = "trending";
      if (isset($_GET['filter'])) {
        $filter = $_GET['filter'];
      }
      if ($filter == "new") {
        $column_filter = "id";
      } else if ($filter == "trending") {
        $column_filter = "views";
      }

      $page = 1;
      $view_for_page = 3;     
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }

      $show_boxcoding_components = " AND category_id = '0' ";
      $searchKey = "";
      if (isset($_GET['search'])) {
        $searchKey = $_GET['search'];
        $show_boxcoding_components = "";
        $column_filter = "views";
      }

    ?>

    <div class="table-components" data-aos="fade-in" data-aos-anchor-placement="top-bottom">
      <div class="add-butt">
        <div class="cta-buttons">
          <a class="butt butt-black" onclick="location.href='manage_component?id=0';"><i class='bx bx-plus' ></i>Add Your Component</a>
          <div class="more-menu hidden-menu">
            <?php if ($searchKey == "") {?>
              <a class="butt butt-outline <?php if ($filter == "trending") echo 'selected'; ?>" onclick="location.href='?filter=trending';"><i class='bx bx-trending-up' ></i>Trending</a>
              <a class="butt butt-outline <?php if ($filter == "new") echo 'selected'; ?>" onclick="location.href='?filter=new';"><i class='bx bx-collection' ></i>New</a>
            <?php } else { ?>
              <div class="search-label"><i class='bx bx-search' ></i><span class="label">Search results for </span><span>"<?php echo $searchKey ?>"</span></div>
            <?php } ?>
          </div>
          <a class="butt butt-outline more-butt"><i class='bx bx-dots-vertical-rounded' ></i></a>
        </div>
        <div class="h-divider"></div>
      </div>
      <?php

      $tabella = 'tbl_user_components';
      $count = 0;

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT id, title, subtitle, id_user, user_name_c, html_code, css_code, javascript_code, views, page_url FROM $tabella WHERE status_bool = '2'" . $show_boxcoding_components . " AND (title LIKE '%" . $searchKey . "%' OR subtitle LIKE '%" . $searchKey . "%' OR user_name_c LIKE '%" . $searchKey . "%') ORDER BY " . $column_filter . " DESC";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {

          $count++;

          $id = $row["id"];
          $title = $row["title"];
          $subtitle = $row["subtitle"];
          $id_user = $row["id_user"];
          $user_name_c = $row["user_name_c"];
          $html_code = base64_decode($row["html_code"]);
          $css_code = base64_decode($row["css_code"]);
          $javascript_code = base64_decode($row["javascript_code"]);
          $views = $row["views"];
          if ($views > 1000) {
            $views = round($views/1000, 1) . 'K';
          }
          $page_url = $row["page_url"];

          if ($count > $page*$view_for_page-$view_for_page && $count <= $page*$view_for_page) {

      ?>

      <div class="card-components">
        <div class="toolbar">
          <div class="title-cont" onclick="location.href='<?php echo $page_url ?>';">
            <h3 class="title-component"><?php echo $title ?></h3>
            <h3 class="subtitle-component"><?php echo $subtitle ?></h3>
          </div>
          <div class="butt-cont">
            <div class="device-views">
              <i data-id="device-<?php echo $page_url ?>" class='bx bx-desktop desktop selected'></i>
              <i data-id="device-<?php echo $page_url ?>" class='bx bx-mobile-alt mobile' ></i>
            </div>

            <?php

              $tabella = 'tbl_likes';
              // EXIST LIKE
              if (isset($_COOKIE["login_user"])) {
                $user_id = $_COOKIE["login_user"];
                $exist = "0";

                  $mysqli_exist = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
                  $mysqli_exist->select_db($db_name) or die("Unable to select database");
                  mysqli_set_charset($mysqli_exist, "utf8");
                  $query_exist = "SELECT id FROM $tabella WHERE id_component = '" . $id . "' AND id_user = '" . $user_id . "'";
                  if ($result_exist = $mysqli_exist->query($query_exist)) {
                    /* fetch associative array */
                    while ($row = $result_exist->fetch_assoc()) {
                        $exist = "1";
                      }
                  }

                    /* free result set */
                    $result_exist->free();
                    $mysqli_exist->close();
              } // if exist cookie login

              // COUNT LIKES
              $count_likes = 0;
              $mysqli_likes = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
              $mysqli_likes->select_db($db_name) or die("Unable to select database");
              mysqli_set_charset($mysqli_likes, "utf8");
              $query_likes = "SELECT id FROM $tabella WHERE id_component = '" . $id . "'";
              if ($result_likes = $mysqli_likes->query($query_likes)) {
                /* fetch associative array */
                while ($row = $result_likes->fetch_assoc()) {
                    $count_likes++;
                  }
              }

              if ($count_likes > 1000) {
                $count_likes = round($count_likes/1000, 1) . 'K';
              }

                /* free result set */
                $result_likes->free();
                $mysqli_likes->close();
            ?>

            <button class="butt butt-outline add-like <?php if ($exist == "1") echo "like-selected"; ?>" data-id="<?php echo $id ?>"><i class='bx <?php if ($exist == "1") echo "bxs-heart"; else echo "bx-heart" ?>' ></i><span><?php echo $count_likes ?></span></button>
            <button class="butt butt-black" onclick="location.href='<?php echo $page_url ?>';"><i class='bx bx-code-alt' ></i>View Code</button>
          </div>
        </div>
        <div>
          <div>
            <div class="preview">
              <iframe sandbox="allow-scripts" srcdoc='
              <html>
                <head>
                  <!-- ===== Boxicons CSS ===== -->
                  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

                  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

                  <style>
                    body {
                      width: 100%;
                      min-height: 500px;
                      margin: 0;
                      height: 100%;
                    }
                    * {
                      font-family: "Inter", sans-serif;
                      -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
                      -webkit-tap-highlight-color: transparent;
                    }
                      <?php echo str_replace("'", '\"', $css_code) ?>
                  </style>
                </head>
                <body>
                    <?php 
                      $html_preview = str_replace("'", '&apos;', $html_code);
                      $html_preview = str_replace('href="#', "", $html_preview);
                      echo $html_preview;
                    ?>
                  <script>
                    <?php echo str_replace("'", '\"', $javascript_code) ?>
                  </script>
                </body>
              </html>
              '></iframe>
            </div>
          </div>
        </div>
        <div class="footer-card">
          <h4 class="created-component"><span>by</span> <a href="profile?q=<?php echo $user_name_c ?>"><?php echo $user_name_c ?><?php if ($id_user == $admin_id) {?><i class='bx bxs-badge-check'></i><?php } ?></a></h4>
          <span><?php echo $views ?> views</span>
        </div>
      </div>

      <?php if (($count + 1) % 2 == 0) { ?>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5682947198534776"
          crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-format="fluid"
            data-ad-layout-key="-fb+5w+4e-db+86"
            data-ad-client="ca-pub-5682947198534776"
            data-ad-slot="9720923876"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

      <?php } ?>

          <div class="cool-divider" data-aos="fade-in">
            <i class='bx bx-crown'></i>
          </div>

      <?php
          } // if page
        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();

      if ($count == 0) {

        ?>

          <div class="emptyComponents" data-aos="fade-in" data-aos-anchor-placement="top-bottom">
            <img alt="" src="assets/images/no-data.svg">
            <h3>No Results Available Yet</h3>
            <h4>Your search returned no results.</h4>
          </div>

        <?php

      } else {

        if ($page != 1 || $page*$view_for_page < $count) {

      ?>

      <div class="page-navigation">
        <?php if ($page != 1) {?> <a class="butt butt-black" onclick="appendParam('<?php echo $page-1 ?>')"><i class='bx bx-chevron-left' ></i></a> <?php } ?>
        <?php if ($page*$view_for_page < $count) {?> <a class="butt butt-black" onclick="appendParam('<?php echo $page+1 ?>')"><i class='bx bx-chevron-right'></i></a> <?php } ?>
      </div>

      <?php }
     } ?>

    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    AOS.init();

    function appendParam(value) {
      const url = new URL(location.href);
      url.searchParams.set("page", value);

      location.href = url;
    }

    var pos = document.querySelectorAll(".table-components .cool-divider").length - 1;
    document.querySelectorAll(".table-components .cool-divider")[pos].remove();

  </script>

</body>

</html>
