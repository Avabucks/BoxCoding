<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Component - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, New, Edit, Components">
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

  <!-- ===== AJAX ===== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- ===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

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

  <style>
    .input-cont-css {
      margin: 70px auto;
      width: 100%;
      align-items: flex-start;
    }
    #html_code_visible, #css_code_visible, #javascript_code_visible {
      height: 500px;
    }
    .align-input-cont {
      display: flex;
      gap: 20px;
      width: 100%;
      align-items: center;
    }
    .show {
      display: flex;
      align-items: center;
      gap: 7px;
      margin-top: 25px;
    }
    .show label {
      white-space: nowrap;
    }

    .input-disabled {
      opacity: .5;
      pointer-events: none;
    }

    .butt {
      width: 200px !important;
      margin: 30px auto 0 !important;
    }
    .butt i {
      font-size: 1.4em;
    }

    .preview-label {
      margin-bottom: -45px;
      font-size: .95em;
    }
    
  </style>

</head>

<body>

  <?php
      include 'header.php';
      include 'config.php';

      if (!isset($_COOKIE["login_user"])) {
        ?>
          <script>location.href="login"</script>
        <?php
      }

      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id == 0) $event = "Add Component";
        if ($id != 0) $event = "Edit Component";
      }

  ?>

  <div class="section resources">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <a href="dashboard">Dashboard</a>
        <i class='bx bx-chevron-right'></i>
        <span><?php echo $event ?></span>
      </div>
      <h1 class="h1"><?php echo $event ?></h1>
      <h2 class="h2">Fill in the fields to add/edit your component and wait for approval.</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div data-aos="fade-in" data-aos-anchor-placement="top">

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
    if (isset($_GET['id'])) $id = $_GET['id'];

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    if ($_COOKIE["login_user"] == $admin_id) {
      $category_id = $_POST['category'];
    } else {
      $category_id = 0;
    }
    $description_c = $_POST['description'];
    $page_url = "assets/components/". time().".php";
    $id_user = $_COOKIE["login_user"];
    $user_name_c = $_COOKIE["username"];
    $show_contacts = 0;
    if (isset($_POST['show_contact'])) {
      $show_contacts = 1;
    }
    $views = 0;
    $status_bool = $_POST['status_bool'];
    if (isset($_POST['edited'])) {
      $status_bool = 0;      
    }
    if ($_COOKIE["login_user"] == $admin_id) $status_bool = 2;

    $tabella = 'tbl_user_components';

                // Connessione al db
              $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
      $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

    $html_code = htmlentities($_POST['html_code']);
    $css_code = htmlentities($_POST['css_code']);
    $javascript_code = htmlentities($_POST['javascript_code']);
        if ($id == 0) {
          $query="INSERT INTO $tabella (title, subtitle, description_c, page_url, id_user, user_name_c, show_contacts, views, status_bool, html_code, css_code, javascript_code, category_id) VALUES ('$title', '$subtitle', '$description_c', '$page_url', '$id_user', '$user_name_c', '$show_contacts', '$views', $status_bool, '$html_code', '$css_code', '$javascript_code', $category_id) ";
          include 'page_creation.php';
        } else {
          $query="UPDATE $tabella SET description_c = '$description_c', show_contacts = '$show_contacts', status_bool = $status_bool, html_code = '$html_code', css_code = '$css_code', javascript_code = '$javascript_code', category_id = $category_id WHERE id = $id ";
        }

        if (mysqli_query($mysqli, $query)) {
          
          if ($status_bool == 0) {
            mail('info.boxcoding@gmail.com', 'Request add component', "Request add component by: " . $user_name_c, 'From: noreply@avabucks.it' . "\r\n" .
    'Reply-To: noreply@avabucks.it' . "\r\n" .
    'X-Mailer: PHP/' . phpversion());
          ?>
          <script>location.href="dashboard?q=send"</script>
          <?php
          } else {
            ?>
            <script>location.href="dashboard"</script>
            <?php
          }
        }

        $mysqli->close();


    } else { 
      
      $title = "";
      $subtitle = "";
      $description_c = "";
      $show_contacts = "";
      $html_code = "";
      $css_code = "";
      $javascript_code = "";
      $status_bool = 0;
      $category_id = 0;
      if ($_COOKIE["login_user"] == $admin_id) $status_bool = 2;

      if (isset($_GET['id']) && $_GET['id'] != "0") {
        $id = $_GET['id'];
        $tabella = 'tbl_user_components';

        $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
        $mysqli->select_db($db_name) or die("Unable to select database");
        mysqli_set_charset($mysqli, "utf8");
        $query = "SELECT title, subtitle, description_c, show_contacts, html_code, css_code, javascript_code, id_user, page_url, status_bool, category_id  FROM $tabella WHERE id = $id ";
        if ($result = $mysqli->query($query)) {
          /* fetch associative array */
          while ($row = $result->fetch_assoc()) {
            $title = $row["title"];
            $subtitle = $row["subtitle"];
            $description_c = $row["description_c"];
            $category_id = $row["category_id"];
            $show_contacts = $row["show_contacts"];
            if ($show_contacts == 1) {
              $show_contacts = "checked";
            }
            $html_code = base64_decode($row["html_code"]);
            $css_code = base64_decode($row["css_code"]);
            $javascript_code = base64_decode($row["javascript_code"]);
            
            $page_url = $row["page_url"];
            $status_bool = $row["status_bool"];

            if ($row["id_user"] != $_COOKIE["login_user"]) {
              ?>
              <script>location.href="dashboard"</script>
              <?php
            }

        }
        }

        /* free result set */
        $result->free();
        $mysqli->close();

      }

          if ($id != "0" && $title == "") {
          ?>
          <script>location.href="dashboard"</script>
          <?php
          }

      ?>
    
      <form name="form1" method="post" enctype="multipart/form-data">
        <div class="input-cont-css">

        <div class="align-input-cont">
          <div class="input <?php if (isset($_GET['id']) && $_GET['id'] != "0" || $status_bool == 1) echo "input-disabled" ?>">
            <label for="title">Title</label>
            <input class="input" type="text" name="title" id="title" placeholder="Title" value="<?php echo $title ?>" required>
          </div>
          <div class="input <?php if (isset($_GET['id']) && $_GET['id'] != "0" || $status_bool == 1) echo "input-disabled" ?>">
            <label for="subtitle">Subtitle</label>
            <input class="input" type="text" name="subtitle" id="subtitle" placeholder="Subtitle" value="<?php echo $subtitle ?>" required>
          </div>
          <div class="show <?php if ($status_bool == 1) echo "input-disabled" ?>">
            <label for="show-contact">Show Contact</label>
            <div id="show-contact" class="switch">
                <input type="checkbox" id="switch" name="show_contact" <?php echo $show_contacts ?> />
                <label for="switch"></label>
            </div>
          </div>
        </div>

        <?php if ($_COOKIE["login_user"] == $admin_id) { ?>
          <div class="input">
            <label for="category">Category</label>
            <input class="input" type="text" name="category" id="category" placeholder="Category" value="<?php echo $category_id ?>">
          </div>
        <?php } ?>

          <div class="input <?php if ($status_bool == 1) echo "input-disabled" ?>">
            <label for="description">Description</label>
            <textarea class="input" name="description" id="description" placeholder="Description" required><?php echo $description_c ?></textarea>
          </div>

          <span class="preview-label">Preview</span>
          <div class="preview">
              <iframe id="preview_iframe" sandbox="allow-scripts" srcdoc='
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
                    <?php echo $javascript_code ?>
                  </script>
                </body>
              </html>
              '></iframe>
          </div>

          <div class="align-input-cont <?php if ($status_bool == 1) echo "input-disabled" ?>">
            <div class="input">
              <label for="html_code">HTML Code</label>
              <textarea class="input" name="html_code_visible" id="html_code_visible" placeholder="HTML Code"><?php echo $html_code ?></textarea>
            </div>
            <div class="input">
              <label for="css_code">CSS Code</label>
              <textarea class="input" name="css_code_visible" id="css_code_visible" placeholder="CSS Code"><?php echo $css_code ?></textarea>
            </div>
            <div class="input">
              <label for="javascript_code">JavaScript Code</label>
              <textarea class="input" name="javascript_code_visible" id="javascript_code_visible" placeholder="JavaScript Code"><?php echo $javascript_code ?></textarea>
            </div>
          </div>

          <textarea class="input hidden" name="html_code" id="html_code" placeholder="HTML Code"><?php echo $html_code ?></textarea>
          <textarea class="input hidden" name="css_code" id="css_code" placeholder="CSS Code"><?php echo $css_code ?></textarea>
          <textarea class="input hidden" name="javascript_code" id="javascript_code" placeholder="JavaScript Code"><?php echo $javascript_code ?></textarea>

          <input class="hidden" type="checkbox" id="edited" name="edited" />
          <input class="hidden" type="text" id="status_bool" name="status_bool" value="<?php echo $status_bool ?>" />

          <?php if ($status_bool != 1) { ?>
          <button class="butt butt-black" name="submit" type="submit"><i class='bx bx-check'></i>Submit</button>
          <?php } ?>

        </div>
      </form>
      <?php } ?>
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

      $('form').submit(function (e) {

        form1.html_code.value = Base64.encode(form1.html_code_visible.value);
        form1.css_code.value = Base64.encode(form1.css_code_visible.value);
        form1.javascript_code.value = Base64.encode(form1.javascript_code_visible.value);

      });

      function htmlEntities(str) {
          return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
      }

    });

  </script>

  <script type='module'>
    import prettier from 'https://unpkg.com/prettier@2.8.1/esm/standalone.mjs';
    import parserHtml from 'https://unpkg.com/prettier@2.8.1/esm/parser-html.mjs';
    import parserCss from 'https://unpkg.com/prettier@2.8.1/esm/parser-postcss.mjs';
    import parserJavaScript from 'https://unpkg.com/prettier@2.8.1/esm/parser-typescript.mjs';

    document.querySelectorAll(".input").forEach((el, index) => {
        el.addEventListener("keydown", function (e) {
          document.querySelector("#edited").checked = true;
        });
    });

    document.querySelector("#html_code_visible").addEventListener("change", function (e) {
      e.target.value = formatHTML(e.target.value).trim();
      createPreview();
      disableSubmits();
    });
    document.querySelector("#css_code_visible").addEventListener("change", function (e) {
      e.target.value = formatCSS(e.target.value).trim();
      createPreview();
    });
    document.querySelector("#javascript_code_visible").addEventListener("change", function (e) {
      e.target.value = formatJavaScript(e.target.value).trim();
      createPreview();
    });

    function formatHTML(code) {
      return prettier.format(code, {
          parser: 'html',
          plugins: [parserHtml],
      })
    }
    function formatCSS(code) {
      return prettier.format(code, {
          parser: 'css',
          plugins: [parserCss],
      })
    }
    function formatJavaScript(code) {
      return prettier.format(code, {
          parser: 'typescript',
          plugins: [parserJavaScript],
      })
    }

    $(document).ready(function() {
      disableSubmits();
    });
    
    function disableSubmits() {
        $('.preview button').click(function() {
            $(this).prop('disabled', true);
        })
    }

  </script>


</body>

</html>
