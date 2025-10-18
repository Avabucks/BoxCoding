<?php

  if (isset($_GET['q']) && $_GET['q'] == "logout") {
    setcookie('username', '');
    unset($_COOKIE['username']);

    setcookie('login_user', '');
    unset($_COOKIE['login_user']);
  }

  ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, HTML, CSS, UI, Components">
  <meta name="description" content="Explore UI/UX Designs, Website Templates and Source Code in HTML, CSS and JavaScript that can be used in your next project.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.png">

  <!-- Include FILES -->
  <link rel="stylesheet" href="./style_boxcoding.css?v=1.1">
  <link rel="stylesheet" href="./responsive.css?v=1.1">
  <script src="./js/script.js"></script>

  <!-- ===== HIGHLIGHT ===== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/atom-one-dark.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>

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

    .header {
      position: absolute !important;
    }

    .home {
      position: relative;
      background-image: url("assets/bg.svg");
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      border-bottom: 1px solid rgb(255, 255, 255, .1);
    }

    .home>div:nth-child(1) {
      position: relative;
      padding-block: 30vh;
      display: flex;
      justify-content: center;
      padding-inline: 100px;
      flex-direction: column;
      gap: 25px;
      z-index: 1;
      width: 60%;
    }

    .home>div:nth-child(2) {
      position: relative;
      z-index: 1;
      width: 40%;
      padding-block: 30vh;
    }
    .home>div:nth-child(2) > div {
      width: 80%;
      aspect-ratio: 1 / .9;
      background-color: rgb(100, 100, 100, .1);
      border-radius: 10px;
      position: relative;
    }
    .home .code {
      position: absolute;
      transform: none;
      width: 400px;
      padding: 10px;
      background-color: rgb(20, 20, 20) !important;
      border: 1px solid rgb(255, 255, 255, .1);
      transition: .3s;
    }

    .home .code:nth-child(1) {
      top: -60px;
      right: 50px;
    }
    .home .code:nth-child(1):hover {
      transform: scale(1.02) translateY(-5px) !important;
    }
    .home .code:nth-child(2) {
      top: 50%;
      transform: translateY(-50%);
      right: -50px;
    }
    .home .code:nth-child(2):hover {
      transform: scale(1.02) translateY(-50%) !important;
    }
    .home .code:nth-child(3) {
      bottom: -60px;
      right: 70px;
    }
    .home .code:nth-child(3):hover {
      transform: scale(1.02) translateY(5px) !important;
    }

    .home .code .header_code span {
      margin-left: 9px;
      color: var(--light);
      font-weight: 500;
      font-size: .9em;
    }
    .home .code .snippetCode {
      height: 105px;
      padding: 0;
    }
    .code code {
      background-color: rgb(20, 20, 20) !important;
      padding: 5px 10px 0 !important;
    }

    .home::after {
      content: '';
      top: 0;
      left: 0;
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: rgb(0, 0, 0, .1);
      z-index: 0;
    }

    .home .label-home {
      font-weight: 500;
      font-size: .8em;
      display: flex;
      align-items: center;
      color: var(--light);
      padding: 8px 15px;
      background-color: rgb(255, 255, 255, .2);
      border-radius: 50em;
      width: fit-content;
      gap: 10px;
    }

    .home .label-home i {
      font-size: 1.3em;
    }

    .home .title {
      width: 90%;
    }

    .home .subtitle {
      width: 80%;
    }

    .home .buttcont-home {
      display: flex;
      gap: 20px;
      margin-top: 20px;
    }

    .community-cards {
      margin-top: 50px;
      display: flex;
      flex-direction: column;
      gap: 40px;
    }
    .community-cards > .card {
      display: flex;
      cursor: pointer;
      justify-content: space-between;
      align-items: center;
      border-radius: 10px;
      background-color: var(--dark);
      padding: 40px 50px;
      box-shadow: inset 0 0 1000px rgb(0, 0, 0, 0);
      transition: .3s;
    }
    .community-cards > .card:hover {
      box-shadow: inset 0 0 1000px rgb(0, 0, 0, .2);
    }
    .community-cards > .card .butt {
      width: 230px;
      justify-content: center;
    }
    .community > div .header-card {
      display: flex;
      align-items: center;
      gap: 7px;
      margin-bottom: 10px;
    }
    .community > div .header-card i {
      font-size: 1.4em;
    }
    .community > div .header-card h2 {
      font-weight: 600;
      font-size: 1.2em;
    }
    .community > div span {
      font-size: .9em;
      opacity: .8;
    }

    .community-cards > .card.share {
      background: linear-gradient(144deg,var(--primary),#5b42f3 50%,#00ddeb);
      color: var(--light);
      gap: 20px;
    }
    .community-cards > .card.share .butt {
      color: var(--light);
      outline: 1px solid var(--light);
    }

    .components .tranish {
      position: relative;
      margin-top: -450px;
      height: 450px;
      pointer-events: none;
      background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, var(--bg) 100%);
    }

    .components .butt-black {
      position: relative;
      margin: 30px auto 0;
    }

    .library .library-grid {
      margin-top: 50px;
      margin-bottom: 40px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 25px;
      user-select: none;
    }

    .library .library-grid .card {
      background-color: var(--dark);
      border-radius: 10px;
      padding: 40px 50px;
      cursor: pointer;
      transition: .3s;
    }

    .library .library-grid .card:hover {
      background-color: rgb(255, 255, 255, .1);
      transform: translateY(-5px);
    }

    .library .library-grid .card .icon {
      position: relative;
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3em;
      margin-top: 5px;
      color: var(--primary);
    }

    .library .library-grid .card .icon::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      background-color: var(--primary);
      border-radius: 50em;
      opacity: .2;
      z-index: 0;
    }

    .library .library-grid .card .title {
      margin-top: 25px;
      font-weight: 600;
      font-size: 1.2em;
      line-height: 28px;
      color: var(--light);
      opacity: .9;
    }

    .library .library-grid .card .description {
      margin-top: 15px;
      font-weight: 500;
      font-size: .9em;
      line-height: 22px;
      color: var(--light);
      opacity: .8;
      height: 90px;
    }

    .library .library-grid .card a {
      margin-top: 30px;
      text-decoration: none;
      font-weight: 500;
      font-size: .9em;
      line-height: 28px;
      display: flex;
      align-items: center;
      gap: 10px;
      color: var(--primary);
    }

    .library .library-grid .card a i {
      font-size: 1.3em;
      margin-top: 2px;
      transition: .3s;
    }

    .library .library-grid .card:hover a i {
      transform: translateX(-5px);
    }

    .popup .text {
      line-height: 30px;
      margin-bottom: 20px;
    }
    .popup .text b {
      font-weight: 500;
    }
    .table-components {
      gap: 25px;
    }

    .popular-label {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 1.5em;
      margin-top: 10px;
      margin-bottom: -20px;
    }
    .popular-label i {
      font-size: 1.6em;
      color: var(--light);
      opacity: .5;
    }
    .divider.popular {
      background-color: var(--light);
      opacity: .4;
      margin-bottom: -40px;
    }

    .show-all-community {
      margin-top: 60px;
      display: flex;
      justify-content: center;
      align-items: center !important;
    }

  </style>

</head>

<body>

  <div class="popup ad hidden">
    <div id="ad">
      <div class="header-popup"><i class='bx bxs-bell'></i>Share your work!</div>
      <div class="text">Now you can add and share your Frontend Components.<br><b>Join the BoxCoding community!</b></div>
      <div class="butt-cont">
        <button class="butt butt-outline close-popup">Got It</button>
        <button onclick="location.href='manage_component?id=0';" class="butt butt-black close-popup">Start Now!</button>
      </div>
    </div>
  </div>

  <div class="loader">
    <div>
      <div>
        <h2>BoxCoding</h2>
        <h3>by Avabucks</h3>
      </div>
      <div class="progress"><div></div></div>
    </div>
  </div>

  <?php include 'header.php'; ?>

  <div class="home">
    <div>
      <div class="label-home"><i class='bx bxs-diamond'></i>We are 100K+ users</div>
      <h1 class="h1 title">Free Open Source Frontend CSS Components</h1>
      <h2 class="h2 subtitle">Explore and Share UI Components and Source Code in HTML, CSS and JavaScript that can be used in your next project.</h2>
      <div class="buttcont-home">
        <button class="butt butt-white" onclick="location.href='component';">Browse Components</button>
        <button class="butt butt-primary" onclick="location.href='community';">Community</button>
      </div>
    </div>
    <div data-aos="fade-in">
      <div>
        <div class="code">
          <div class="header_code">
            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="14" viewBox="0 0 54 14">
              <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                <circle cx="6" cy="6" r="6" fill="#FF5F56" stroke="#E0443E" stroke-width=".5"></circle>
                <circle cx="26" cy="6" r="6" fill="#FFBD2E" stroke="#DEA123" stroke-width=".5"></circle>
                <circle cx="46" cy="6" r="6" fill="#27C93F" stroke="#1AAB29" stroke-width=".5"></circle>
              </g>
            </svg>
            <span>HTML</span>
          </div>
          <div class="snippetCode" translate="no"><pre><code class="language-xml">&#60;div>&#10;&#32;&#32;BoxCoding by Avabucks&#10;&#60;/div></code></pre></div>
        </div>
        <div class="code">
          <div class="header_code">
            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="14" viewBox="0 0 54 14">
              <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                <circle cx="6" cy="6" r="6" fill="#FF5F56" stroke="#E0443E" stroke-width=".5"></circle>
                <circle cx="26" cy="6" r="6" fill="#FFBD2E" stroke="#DEA123" stroke-width=".5"></circle>
                <circle cx="46" cy="6" r="6" fill="#27C93F" stroke="#1AAB29" stroke-width=".5"></circle>
              </g>
            </svg>
            <span>CSS</span>
          </div>
          <div class="snippetCode" translate="no"><pre><code class="language-css">.animate {&#10;&#32;&#32;transform: scale(1.1);&#10;&#32;&#32;transition: .3s;&#10;}</code></pre></div>
        </div>
        <div class="code">
          <div class="header_code">
            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="14" viewBox="0 0 54 14">
              <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                <circle cx="6" cy="6" r="6" fill="#FF5F56" stroke="#E0443E" stroke-width=".5"></circle>
                <circle cx="26" cy="6" r="6" fill="#FFBD2E" stroke="#DEA123" stroke-width=".5"></circle>
                <circle cx="46" cy="6" r="6" fill="#27C93F" stroke="#1AAB29" stroke-width=".5"></circle>
              </g>
            </svg>
            <span>JavaScript</span>
          </div>
          <div class="snippetCode" translate="no"><pre><code class="language-javascript">function animate() {&#10;&#32;&#32;document.querySelector("div")&#10;&#32;&#32;&#32;&#32;&#32;&#32;.classList.add("animate");&#10;}</code></pre></div>
        </div>
      </div>
    </div>
  </div>

  <div class="section community">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="top-bottom">
      <h3 class="h3">Community</h3>
      <h1 class="h1">Discover Community</h1>
      <h2 class="h2">Share and explore code from the community of frontend programmers.</h2>
      <div class="divider" data-aos="zoom-in-right" data-aos-anchor-placement="bottom-bottom"></div>
    </div>
    <div class="community-cards">
      <div class="share card" onclick="location.href='manage_component?id=0';" data-aos="fade-in" data-aos-anchor-placement="top-bottom">
        <div>
          <div class="header-card">
            <i class='bx bx-share-alt'></i>
            <h2>Share Your Work</h2>
          </div>
          <span>Share your components and knowledge with the BoxCoding community. Learn from each other and get noticed.</span>
        </div>
        <div>
          <button class="butt butt-outline" onclick="location.href='manage_component?id=0';"><i class='bx bx-plus' ></i>Add Your Component</button>
        </div>
      </div>
    </div>
  </div>

  <div class="h-divider"></div>

  <div class="section trending">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <h3 class="h3">Community</h3>
      <h1 class="h1">Community Components</h1>
      <h2 class="h2">Random components from the community.</h2>
      <div class="divider" data-aos="zoom-in-right" data-aos-anchor-placement="bottom-bottom"></div>
    </div>
      <div class="table-components">

      <?php

        $tabella = 'tbl_user_components';
        $count = 0;

        $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
        $mysqli->select_db($db_name) or die("Unable to select database");
        mysqli_set_charset($mysqli, "utf8");
        $query = "SELECT id, title, subtitle, id_user, user_name_c, html_code, css_code, javascript_code, views, page_url FROM $tabella WHERE status_bool = '2' AND category_id = '0' ORDER BY RAND()";
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

            if ($count < 4) {

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

      <?php if ($count < 3) { ?>
          <div class="cool-divider" data-aos="fade-in">
            <i class='bx bx-crown'></i>
          </div>
        <?php } ?>

        <?php
            } // if count
          }
        }

        /* free result set */
        $result->free();
        $mysqli->close();

        ?>

      </div>

      <div class="show-all-community">
        <button class="butt butt-black" data-aos="zoom-in" onclick="location.href='community';">Show All Components</button>
      </div>

  </div>

  <div class="h-divider"></div>

  <div class="section components">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <h3 class="h3">Components</h3>
      <h1 class="h1">BoxCoding's Components</h1>
      <h2 class="h2">Beautifully crafted UI components, ready for your next project.</h2>
      <div class="divider" data-aos="zoom-in-right" data-aos-anchor-placement="bottom-bottom"></div>
    </div>
    <div class="table-grid">

      <?php

      // variabili di connessione al DB

      include 'config.php';

      $tabella = 'tbl_category';
      $max6 = 0;

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT id, name_category, image_path, link_path FROM $tabella ORDER BY name_category ASC";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {

          if ($max6 == 6) break;

          $id = $row["id"];
          $name_category = $row["name_category"];
          $image_path = $row["image_path"];
          $link_path = $row["link_path"];

          /* GET COUNT COMPONENTS PER CATEGORY */
          $count = 0;
          $tabella_count = 'tbl_user_components';

          $mysqli_count = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
          $mysqli_count->select_db($db_name) or die("Unable to select database");
          mysqli_set_charset($mysqli_count, "utf8");
          $query_count = "SELECT category_id FROM $tabella_count WHERE category_id = '" . $id . "'  ";
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

          $max6++;

        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();
      ?>

    </div>
    <div class="tranish"></div>
    <button class="butt butt-black" data-aos="zoom-in" onclick="location.href='component';">Show All Components</button>
  </div>

  <div class="h-divider"></div>

  <div class="section library">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <h1 class="h1">UI Library</h1>
      <h2 class="h2">The easiest way to create beautiful websites.</h2>
      <div class="divider" data-aos="zoom-in-right" data-aos-anchor-placement="bottom-bottom"></div>
    </div>
    <div class="library-grid">
      <div onclick="location.href='component';" class="card" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
        <div class="icon"><i class='bx bx-edit-alt'></i></div>
        <p class="title">Easy to customize</p>
        <p class="description">Everything is styled with utility CSS classes, just open the template in your editor and change whatever you want.</p>
        <a href="component">Browse All Components<i class='bx bx-right-arrow-alt'></i></a>
      </div>
      <div onclick="location.href='component';" class="card" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="icon"><i class='bx bx-devices'></i></div>
        <p class="title">Modern technologies</p>
        <p class="description">Each template is reponsive and well structured, giving you a codebase that’s productive and enjoyable to work in.</p>
        <a href="component">Browse All Components<i class='bx bx-right-arrow-alt'></i></a>
      </div>
      <div onclick="location.href='component';" class="card" data-aos="fade-left" data-aos-anchor-placement="bottom-bottom">
        <div class="icon"><i class='bx bx-sun'></i></div>
        <p class="title">Clean Design</p>
        <p class="description">All the templates are made with clear, concise, useful, minimal and modern design pattern.</p>
        <a href="component">Browse All Components<i class='bx bx-right-arrow-alt'></i></a>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    AOS.init();
    hljs.highlightAll();

    setTimeout(() => {
      //document.querySelector(".ad").classList.remove("hidden");
    }, 3100);

  </script>

</body>

</html>
