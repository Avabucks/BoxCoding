<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===== ADS ===== -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5682947198534776"
     crossorigin="anonymous"></script>
</head>
<body>

      <?php if ($status_bool == 0) { ?>
        <div class="is-reviewing" data-aos="fade-in" data-aos-anchor-placement="top-bottom">
          <i class='bx bx-info-circle'></i>We are reviewing this component. This page is visible only to you.
        </div>
      <?php } ?>

    <div class="user-page" data-aos="fade-in" data-aos-anchor-placement="top">

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

      <div class="toolbar">
        <div><span class="label-page">Description:</span><h3 class="description"><?php echo str_replace("\n", "<br>", $description_c) ?></h3></div>
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
            <button class="butt butt-outline fullscreen-butt"><i class='bx bx-fullscreen' ></i></button>
          </div>
      </div>

      <div>
        <div class="preview">
                <iframe sandbox="allow-scripts" srcdoc='
                <html>
                  <head>
                    <!-- ===== Boxicons CSS ===== -->
                    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

                    <style>
                      html {
                        height: 100%;
                      }
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
              <div class="footer-card">
                <h4 class="created-component"><span>by</span> <a href="../../profile?q=<?php echo $user_name_c ?>"><?php echo $user_name_c ?><?php if ($id_user == $admin_id) {?><i class='bx bxs-badge-check'></i><?php } ?></a>
                  <?php
                    if ($show_contacts == 1) {

                      $tabella = "tbl_user";

                      $mysqli_mail = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
                      $mysqli_mail->select_db($db_name) or die("Unable to select database");
                      mysqli_set_charset($mysqli_mail, "utf8");
                      $query_mail = "SELECT email_us FROM $tabella WHERE id_us = '" . $id_user . "'";
                      if ($result_mail = $mysqli_mail->query($query_mail)) {
                        /* fetch associative array */
                        while ($row = $result_mail->fetch_assoc()) {
                          $mail_to = $row["email_us"];
                      ?>
                        - <a href="mailto:<?php echo $mail_to ?>"><?php echo $mail_to ?></a>
                      <?php
                    }
                  }

                  /* free result set */
                  $result_mail->free();
                  $mysqli_mail->close();
                    }

                  if ($views > 1000) {
                    $views = round($views/1000, 1) . 'K';
                  }

                  ?>
                </h4>
                <span><?php echo $views ?> views</span>
              </div>

        <?php

            $tabella = "tbl_social";

            $mysqli_mail = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
            $mysqli_mail->select_db($db_name) or die("Unable to select database");
            mysqli_set_charset($mysqli_mail, "utf8");
            $query_mail = "SELECT website_url, instagram_url, facebook_url, linkedin_url, youtube_url FROM $tabella WHERE id_us = '" . $id_user . "'";
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

            <ul class="social-cont top-border">
              <li class="<?php if ($website_url == "") echo 'disabled' ?>"><a href="https://<?php echo $website_url ?>" target="-blank"><i class='bx bx-link-alt' ></i><span><?php echo $website_url ?></span></a></li>
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

            <div>
              <div class="code" data-code_id="<?php echo $id ?>">
                <div class="header_code">
                  <svg xmlns="http://www.w3.org/2000/svg" width="54" height="14" viewBox="0 0 54 14">
                    <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                      <circle cx="6" cy="6" r="6" fill="#FF5F56" stroke="#E0443E" stroke-width=".5"></circle>
                      <circle cx="26" cy="6" r="6" fill="#FFBD2E" stroke="#DEA123" stroke-width=".5"></circle>
                      <circle cx="46" cy="6" r="6" fill="#27C93F" stroke="#1AAB29" stroke-width=".5"></circle>
                    </g>
                  </svg>
                </div>
                <div class="tab-language">
                  <div>
                    <label data-property_id="<?php echo $id ?>">
                        <input data-id="<?php echo $id ?>" type="radio" name="radio_<?php echo $id ?>" value="HTML" checked />
                        <span>HTML</span>
                    </label>
                  </div>
                  <div>
                    <label data-property_id="<?php echo $id ?>">
                        <input data-id="<?php echo $id ?>" type="radio" name="radio_<?php echo $id ?>" value="CSS" />
                        <span>CSS</span>
                    </label>
                  </div>
                  <div>
                    <label data-property_id="<?php echo $id ?>">
                        <input data-id="<?php echo $id ?>" type="radio" name="radio_<?php echo $id ?>" value="JavaScript" />
                        <span>JavaScript</span>
                    </label>
                  </div>
                </div>
                <div class="snippetCode code_html" translate="no" data-code_html_id="<?php echo $id ?>"><pre><code class="language-xml"><?php echo htmlspecialchars($html_code) ?></code></pre></div>
                <div class="snippetCode code_css hidden" translate="no" data-code_css_id="<?php echo $id ?>"><pre><code><?php echo htmlspecialchars($css_code) ?></code></pre></div>
                <div class="snippetCode code_javascript hidden" translate="no" data-code_javascript_id="<?php echo $id ?>">
                  <?php if ($javascript_code != "") { ?>
                    <pre><code><?php echo htmlspecialchars($javascript_code) ?></code></pre>
                  <?php } else { ?>
                    <div class="emptyCode"><i class="bx bx-block"></i>No snippet code</div>
                  <?php } ?>
                </div>
              </div>
            </div>


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

          </div>
</body>
</html>