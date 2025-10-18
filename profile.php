<?php
if (isset($_GET['q'])) {
  $username_query = $_GET['q'];
} else {
  ?>
    <script>location.href="community"</script>
  <?php        
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $username_query ?> - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, <?php echo $username_query ?>">
  <meta name="description" content="In this page you can find the list of all the components uploaded by <?php echo $username_query ?>.">
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

    @media only screen and (max-width: 830px) {
      .shareButtons .h1 span {
        max-width: 270px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    }

  </style>

</head>

<body>

    <?php

      include 'header.php';
      include 'config.php';

    ?>

  <div class="section dashboard">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <a href="community">Community</a>
        <i class='bx bx-chevron-right'></i>
        <span><?php echo $username_query ?></span>
      </div>
      <div class="shareButtons">
        <h1 class="h1"><i class='bx bxs-user'></i><span><?php echo $username_query ?></span></h1>
      </div>
      <h2 class="h2">In this page you can find the list of all the components uploaded by <?php echo $username_query ?>.</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div data-aos="fade-in" data-aos-anchor-placement="top">

        <?php

            $tabella = "tbl_user";

            $mysqli_mail = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
            $mysqli_mail->select_db($db_name) or die("Unable to select database");
            mysqli_set_charset($mysqli_mail, "utf8");
            $query_mail = "SELECT id_us FROM $tabella WHERE username_us = '" . $username_query . "'";
            if ($result_mail = $mysqli_mail->query($query_mail)) {
              /* fetch associative array */
              while ($row = $result_mail->fetch_assoc()) {
                $id_us = $row["id_us"];
              }

            }

            /* free result set */
            $result_mail->free();
            $mysqli_mail->close();


            $tabella = "tbl_social";

            $mysqli_mail = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
            $mysqli_mail->select_db($db_name) or die("Unable to select database");
            mysqli_set_charset($mysqli_mail, "utf8");
            $query_mail = "SELECT website_url, instagram_url, facebook_url, linkedin_url, youtube_url FROM $tabella WHERE id_us = '" . $id_us . "'";
            if ($result_mail = $mysqli_mail->query($query_mail)) {
              /* fetch associative array */
              while ($row = $result_mail->fetch_assoc()) {
                $website_url = $row["website_url"];
                $instagram_url = $row["instagram_url"];
                $facebook_url = $row["facebook_url"];
                $linkedin_url = $row["linkedin_url"];
                $youtube_url = $row["youtube_url"];

                if (substr($instagram_url, -1) == "/") $instagram_url = rtrim($instagram_url, "/");
                $instagram_url = end(explode('/', $instagram_url));
                if (substr($facebook_url, -1) == "/") $facebook_url = rtrim($facebook_url, "/");
                $facebook_url = end(explode('/', $facebook_url));
                if (substr($linkedin_url, -1) == "/") $linkedin_url = rtrim($linkedin_url, "/");
                $linkedin_url = end(explode('/', $linkedin_url));
                if (substr($youtube_url, -1) == "/") $youtube_url = rtrim($youtube_url, "/");
                $youtube_url = end(explode('/', $youtube_url));

          }
            ?>

            <ul class="social-cont">
              <li class="<?php if ($website_url == "") echo 'disabled' ?>"><a href="<?php echo $website_url ?>" target="-blank"><i class='bx bx-link-alt' ></i><span><?php echo $website_url ?></span></a></li>
              <li class="<?php if ($instagram_url == "") echo 'disabled' ?>"><a href="https://www.instagram.com/<?php echo $instagram_url ?>" target="-blank"><i class='bx bxl-instagram' ></i><span><?php echo $instagram_url ?></span></a></li>
              <li class="<?php if ($facebook_url == "") echo 'disabled' ?>"><a href="https://www.facebook.com/<?php echo $facebook_url ?>" target="-blank"><i class='bx bxl-facebook' ></i><span><?php echo $facebook_url ?></span></a></li>
              <li class="<?php if ($linkedin_url == "") echo 'disabled' ?>"><a href="https://www.linkedin.com/in/<?php echo $linkedin_url ?>" target="-blank"><i class='bx bxl-linkedin' ></i><span><?php echo $linkedin_url ?></span></a></li>
              <li class="<?php if ($youtube_url == "") echo 'disabled' ?>"><a href="https://www.youtube.com/<?php echo $youtube_url ?>" target="-blank"><i class='bx bxl-youtube' ></i><span><?php echo $youtube_url ?></span></a></li>
            </ul>

            <?php

        }

        /* free result set */
        $result_mail->free();
        $mysqli_mail->close();

        ?>

    <div class="table-components">

    <?php

    $page = 1;
    $view_for_page = 3;     
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }

    $tabella = 'tbl_user_components';
    $count = 0;

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id, title, subtitle, id_user, user_name_c, html_code, css_code, javascript_code, views, page_url FROM $tabella WHERE user_name_c = '" . $username_query . "' AND status_bool = '2' ORDER BY id DESC";
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

      ?>
        </div>
      <?php
      if ($count == 0) {
      ?>

      <div class="emptyComponents" data-aos="fade-in">
        <img alt="" src="assets/images/no-data.svg">
        <h3>No Components Available</h3>
        <h4>You have not uploaded components yet.</h4>
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

    var delete_id = "";
    document.querySelectorAll(".butt").forEach((el, index) => {
        el.addEventListener("click", function (e) {
          e.stopPropagation();
        });
    });

    document.querySelectorAll(".delete").forEach((el, index) => {
        el.addEventListener("click", function (e) {
          document.querySelector(".delete-pop").classList.remove("hidden");
          delete_id = e.target.dataset.id;
        });
    });

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
