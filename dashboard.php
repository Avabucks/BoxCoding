<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Dashboard">
  <meta name="description" content="Explore UI/UX Designs, Website Templates and Source Code in HTML, CSS and JavaScript that can be used in your next project.">
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
    .delete {
      background-color: #f22b29;
      color: var(--light);
    }
    .butt i {
      font-size: 1.4em !important;
      opacity: .7 !important;
      pointer-events: none;
    }

    @media only screen and (max-width: 830px) {
      .shareButtons .h1 span {
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

    }

  </style>

</head>

<body>

    <?php

      if (!isset($_COOKIE["login_user"])) {
        ?>
          <script>location.href="login"</script>
        <?php
      }

      if (isset($_GET['q']) && $_GET['q'] == "send") {
        ?>
          <div class="popup send">
            <div id="send">
              <div class="header-popup"><i class='bx bx-info-circle'></i>Info</div>
              <div class="text">Your component has been sent! Wait for approval.</div>
              <div class="butt-cont">
                <button class="butt butt-black close-popup">Got It!</button>
              </div>
            </div>
          </div>
        <?php
      }

      $tab = "components";
      if (isset($_GET['tab'])) {
        $tab = $_GET['tab'];
      }

      include 'header.php';
      include 'config.php';

  ?>

  <div class="popup delete-pop hidden">
    <div id="delete-pop">
      <div class="header-popup"><i class='bx bx-info-circle'></i>Alert</div>
      <div class="text">Are you sure you want delete this component?</div>
      <div class="butt-cont">
        <button class="butt butt-outline close-popup">No</button>
        <a class="butt butt-black close-popup" onclick='location.href="delete?id=" + delete_id;'>Yes</a>
      </div>
    </div>
  </div>

  <div class="section dashboard">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Dashboard</span>
      </div>
      <div class="shareButtons">
        <h1 class="h1"><i class='bx bxs-user'></i><span><?php echo $_COOKIE["username"] ?></span></h1>
      </div>
      <h2 class="h2">This is your account dashboard. Here you can view your components.</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div class="table-components" data-aos="fade-in" data-aos-anchor-placement="top">
      <div class="cta-buttons">
        <a class="butt butt-black" href='manage_component?id=0'><i class='bx bx-plus' ></i>Add Your Component</a>
        <div class="more-menu hidden-menu">
          <a class="butt butt-outline" href="social_links"><i class='bx bx-link' ></i>Social Links</a>
          <a class="butt butt-outline" href="profile?q=<?php echo $_COOKIE["username"] ?>" target="_blank"><i class='bx bx-link-external' ></i>Share User Page</a>
          <a class="butt butt-outline" href='index?q=logout'><i class='bx bx-power-off' ></i>Log Out</a>
        </div>
        <a class="butt butt-outline more-butt"><i class='bx bx-dots-vertical-rounded' ></i></a>
      </div>
      <div class="tab-likes">
        <div>
          <label onclick="location.href='?tab=components';">
            <input type="radio" name="radio_components" value="Components" <?php if ($tab == "components") echo "checked"; ?> />
            <span><i class='bx bx-collection'></i>Your Components</span>
          </label>
        </div>
        <div>
          <label onclick="location.href='?tab=likes';">
            <input type="radio" name="radio_likes" value="Likes" <?php if ($tab == "likes") echo "checked"; ?> />
            <span><i class='bx bxs-heart'></i>Likes</span>
          </label>
        </div>
      </div>

    <?php
      if ($tab == "components") {
    ?>

      <div class="tab-resources tab-dashboard">

    <?php

    $tabella = 'tbl_user_components';
    $count = 0;

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id, title, subtitle, show_contacts, status_bool, views, page_url FROM $tabella WHERE id_user = '" . $_COOKIE["login_user"] . "' ORDER BY id DESC";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {

        $count++;

        $id = $row["id"];
        $title = $row["title"];
        $subtitle = $row["subtitle"];
        $show_contacts = $row["show_contacts"];
        $status_bool = $row["status_bool"];
        $views = $row["views"];
        if ($views > 1000) {
          $views = round($views/1000, 1) . 'K';
        }

        $page_url = $row["page_url"];

        if ($show_contacts == 0) {
          $show_contacts = "No";
        } else {
          $show_contacts = "Yes";
        }

    ?>
          <div onclick="location.href='manage_component?id=' + <?php echo $id ?>" class="card type-<?php echo $status_bool ?>" data-id="<?php echo $id ?>">

            <div class="info-cont">
              <div class="text">
                <span class="title"><?php echo $title ?></span>
                <span class="description"><?php echo $subtitle ?></span>
                <span class="info">Show Contacts: <?php echo $show_contacts ?></span>
              </div>
            </div>

            <div class="details-cont">

                <?php if ($status_bool == 2) { ?>
                  <div class="td-icon published"><span><i class='bx bx-world'></i>Published</span></div>
                <?php } else if ($status_bool == 1) { ?>
                  <div class="td-icon declined"><span><i class='bx bx-error-circle'></i>Declined</span></div>
                <?php } else if ($status_bool == 0) { ?>
                  <div class="td-icon reviewing"><span><i class='bx bx-alarm'></i>Reviewing</span></div>
                <?php } ?>

                <div class="td-icon"><span><i class='bx bxs-bar-chart-alt-2' ></i><?php echo $views ?> <span class="views-label">views</span></span></div>
            
            </div>


            <div class="butt-cont">
              <div>
                <a class="butt butt-outline" name="preview" href="<?php echo $page_url ?>" target="blank"><i class='bx bx-link-external' ></i>Preview</a>
              </div>
              <div>
                <a class="butt butt-black delete" name="delete" data-id="<?php echo $id ?>"><i class='bx bx-trash'></i>Delete</a>
              </div>
            </div>

          </div>
          <div class="cool-divider" data-aos="fade-in" data-aos-anchor-placement="top-bottom">
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
      <?php
      if ($count == 0) {
      ?>

      <div class="emptyComponents" data-aos="fade-in">
        <img alt="" src="assets/images/no-data.svg">
        <h3>No Components Available</h3>
        <h4>You have not uploaded any components yet.</h4>
      </div>

      <?php
      }

    } else if ($tab == "likes") {



      $page = 1;
      $view_for_page = 3;     
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }

      $count = 0;

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT * FROM tbl_likes AS L, tbl_user_components AS C WHERE id_component = C.id AND L.id_user = '" . $_COOKIE["login_user"] . "' ORDER BY L.id DESC";
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

      <div class="emptyComponents" data-aos="fade-in">
        <img alt="" src="assets/images/no-data.svg">
        <h3>No Components Liked</h3>
        <h4>You have not liked any components yet.</h4>
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
     }

    }
      ?>

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

    var pos = document.querySelectorAll(".cool-divider").length - 1;
    document.querySelectorAll(".cool-divider")[pos].remove();

    function appendParam(value) {
      const url = new URL(location.href);
      url.searchParams.set("page", value);

      location.href = url;
    }

  </script>

</body>

</html>
