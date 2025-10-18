<!DOCTYPE html>
<html>

<head>

  <title>Admin - BoxCoding</title>
  <link rel="icon" type="image/x-icon" href="favicon.png">

  <meta charset="utf-8" />
  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, HTML, CSS, JavaScript, Template, Elements, Tutorial, Blog">
  <meta name="description" content="We share free resources about web design and development to inspire design-focused frontend developers and to improve your coding skills.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Include FILES -->
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./header.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/atom-one-dark.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>

  <!-- ===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <script src="https://unpkg.com/blob-util@2.0.2/dist/blob-util.js"></script>

</head>

<body style='background-color: var(--body-color); color: var(--text-color);'>

      <div id="bg" style="position: relative; top: 0; left: 0; width: 100%; height: 100%; z-index: 10000; background-color: white;"></div>

<div id="content">

  <div id='alert' class='fade-in' style='display: none; padding: 20px; border-radius: 8px; background-color: green; position: fixed; left: 10px; bottom: 10px; z-index: 10000;'></div>

  <div id='alertDelete' class='fade-in' style='display: none; padding: 20px; border-radius: 8px; background-color: rgb(100, 100, 100, .2); position: fixed; left: 10px; bottom: 10px; z-index: 10000;'>
      Do you want to delete this item?
      <p style='text-align: center; font-size: 13px; opacity: .6; margin-top: 5px;'></p>
      <div style='display: flex; justify-content: center;'>
        <span class='button' style='display: inline-block; margin: 20px 10px 10px; background-color: rgb(0, 0, 0, 0); outline: 2px solid var(--text-color); --button-hover-color: rgb(100, 100, 100, .4); --button-active-color: rgb(100, 100, 100, .3);' onclick="this.parentNode.parentNode.style.display = 'none'; canDelete = true; buttDel.click();">Yes</span>
        <span class='button' style='display: inline-block; margin: 20px 10px 10px; background-color: rgb(0, 0, 0, 0); outline: 2px solid var(--text-color); --button-hover-color: rgb(100, 100, 100, .4); --button-active-color: rgb(100, 100, 100, .3);' onclick="this.parentNode.parentNode.style.display = 'none'; canDelete = false;">No</span>
      </div>
  </div>

  <div style='height: 100vh; width: 100vw; overflow: scroll; position: fixed; top: 0; left: 0;'>

  <div style='width: 600px; margin: 10px auto; padding: 20px;'>
    <br>Elements:<br><br>
  
    <?php

      // variabili di connessione al DB

      include 'PHPFunctions/config.php';

      $tabella = 'tbl_elements';

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT id, id_elem, name_el, description_el, image_el, category_id, preview_el, preview_size, HTML_text, CSS_text, JavaScript_text FROM $tabella ";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
          $id = $row["id"];
          $name_el = $row["name_el"];
          $id_elem = $row["id_elem"];
          $description_el = $row["description_el"];
          $image_el = $row["image_el"];
          $category_id = $row["category_id"];
          $preview_el = $row["preview_el"];
          $preview_size = $row["preview_size"];
          $HTML_text = $row["HTML_text"];
          $CSS_text = $row["CSS_text"];
          $JavaScript_text = $row["JavaScript_text"];

      ?>

          <div style='display: flex;'>
            <a style='color: var(--text-color); width: 80px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $id_elem ?></a>
            <a style='width: 200px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $name_el ?></a>
            <a style='width: 250px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $description_el ?></a>
            <a style='width: 50px; padding: 2px; border: 1px solid var(--text-color); display: flex; align-items: center; justify-content: center;'><i onclick='document.querySelector(".editElement").style.display = null; readElement("<?php echo $id ?>");' class='bx bxs-edit-alt material-icon-button' style='font-size: 18px;'></i></a>
            <a style='width: 50px; padding: 2px; border: 1px solid var(--text-color); display: flex; align-items: center; justify-content: center;'><i onclick='deleteItem(this, "<?php echo $id ?>", "tbl_elements");' class='bx bxs-x-circle material-icon-button' style='font-size: 18px; color: rgb(224, 108, 117, .8);'></i></a>
          </div>

      <?php
        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();
    ?>

      <p style='text-align: right; margin: 10px 8px;'><i onclick='document.querySelector(".editElement").style.display = null; readElement(0);' class='bx bx-plus material-icon-button' style='font-size: 18px;'></i></p>
    </div>

    <div data-id='' class='editElement slide-top' style='position: fixed; width: 100vw; height: 100vh; top: 0; left: 0; z-index: 1000; background-color: var(--body-color); transform: translate(0, 0); display: none;'>
      <div onclick="this.parentNode.style.display = 'none'; setTimeout(function () {location.reload();}, 20);" style='position: fixed; top: 15px; right: 15px;'><i class='bx bx-x material-icon-button'></i></div>
        <div style='display: flex; height: 100vh; align-items: center;'>
          <div style='width: 600px; max-height: 90vh; margin: 5vh auto; overflow: hidden scroll; flex-direction: column; padding: 20px;'>
          Elements
          <hr style='width: 106%; height: 1px; background-color: var(--text-color); opacity: .2; margin: 15px -3% 10px;'>
          <span style='font-size: 13px;'>Id:</span>
          <input id="elementIdText" onchange="if (id_elem == '0') document.getElementById('image-path').innerText = 'project/' + this.value.replaceAll(' ', '').toLowerCase() + '.png'" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Element Id" value='' />
          <span style='font-size: 13px;'>Name:</span>
          <input id="elementNameText" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Element Name" value='' />
          <span style='font-size: 13px;'>Description:</span>
          <input id="elementDescriptionText" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Element Description" value='' />
          <span style='font-size: 13px;'>Image:</span>
          <input type="file" id="imageSelect" name="imageSelect" onchange="openImage(this);" accept="image/*"/>
          <span id="image-path" style="display: none;"></span>
          <img id="imageElement" style='width: 50%; min-height: 100px; margin: 5px 25% 15px; cursor: pointer; border: 1px solid rgb(255, 255, 255, .2); border-radius: 7px;' />
          <span style='font-size: 13px;'>Category Id:</span>
          <input id="elementCategoryText" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Category Id" value='' />
          <span style='font-size: 13px;'>Preview (0/1):</span>
          <input id="previewText" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Preview (0/1)" value='1' />
          <span style='font-size: 13px;'>Preview Size:</span>
          <input id="previewSizeText" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Preview Size" value='100x200' />
          <span style='font-size: 13px;'>HTML:</span>
          <textarea id="HTMLText" class='inputBox' style='width: 100%; margin: 5px auto 15px; resize: none; height: 150px; overflow: auto;' placeholder="HTML" ></textarea>
          <span style='font-size: 13px;'>CSS:</span>
          <textarea id="CSSText" class='inputBox' style='width: 100%; margin: 5px auto 15px; resize: none; height: 300px; overflow: auto;' placeholder="CSS" ></textarea>
          <span style='font-size: 13px;'>JavaScript:</span>
          <textarea id="JavaScriptText" class='inputBox' style='width: 100%; margin: 5px auto 15px; resize: none; height: 150px; overflow: auto;' placeholder="JavaScript" ></textarea>

          <div onclick='addElement();' class='button' style='width: 100%; justify-content: center; margin: 50px auto 10px; padding: 10px; --button-hover-color: rgb(97, 61, 193, .6); --button-active-color: rgb(97, 61, 193, .5);'><i class='bx bx-check' style='margin-right: 10px; font-size: 20px;'></i>Save</div>
        </div>
      </div>
    </div>

    <hr style='width: 96%; height: 1px; background-color: var(--text-color); opacity: .2; margin: 0 2%;'>

      <!-- -------------------------------------------------------- -->

    <div style='width: 600px; margin: 10px auto; padding: 20px;'>
    <br>Category:<br><br>
  
    <?php

      // variabili di connessione al DB

      include 'PHPFunctions/config.php';

      $tabella = 'tbl_category';

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT id, name_category FROM $tabella ";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
          $id = $row["id"];
          $name_category = $row["name_category"];

      ?>

          <div style='display: flex;'>
            <a style='color: var(--text-color); width: 80px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $id ?></a>
            <a style='width: 450px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $name_category ?></a>
            <a style='width: 50px; padding: 2px; border: 1px solid var(--text-color); display: flex; align-items: center; justify-content: center;'><i onclick='document.querySelector(".editCategory").style.display = null; readCategory(<?php echo $id ?>);' class='bx bxs-edit-alt material-icon-button' style='font-size: 18px;'></i></a>
            <a style='width: 50px; padding: 2px; border: 1px solid var(--text-color); display: flex; align-items: center; justify-content: center;'><i onclick='deleteItem(this, "<?php echo $id ?>", "tbl_category");' class='bx bxs-x-circle material-icon-button' style='font-size: 18px; color: rgb(224, 108, 117, .8);'></i></a>
          </div>

      <?php
        }
      }

      /* free result set */
      $result->free();
      $mysqli->close();
    ?>

      <p style='text-align: right; margin: 10px 8px;'><i onclick='document.querySelector(".editCategory").style.display = null; readCategory(0);' class='bx bx-plus material-icon-button' style='font-size: 18px;'></i></p>
    </div>

    <div data-id='' class='editCategory slide-top' style='position: fixed; width: 100vw; height: 100vh; top: 0; left: 0; z-index: 1000; background-color: var(--body-color); transform: translate(0, 0); display: none;'>
      <div onclick="this.parentNode.style.display = 'none'; setTimeout(function () {location.reload();}, 20);" style='position: fixed; top: 15px; right: 15px;'><i class='bx bx-x material-icon-button'></i></div>
      <div style='display: flex; height: 100vh; align-items: center;'>
        <div style='width: 600px; max-height: 90vh; margin: 5vh auto; overflow: hidden scroll; flex-direction: column; padding: 20px;'>
          Category
          <hr style='width: 106%; height: 1px; background-color: var(--text-color); opacity: .2; margin: 15px -3% 10px;'>
          <span style='font-size: 13px;'>Category Name:</span>
          <input id="categoryNameText" class='inputBox' style='width: 100%; margin: 5px auto 15px;' placeholder="Element Category Name" value='' />
          <div onclick='addCategory();' class='button' style='width: 100%; justify-content: center; margin: 50px auto 10px; padding: 10px; --button-hover-color: rgb(97, 61, 193, .6); --button-active-color: rgb(97, 61, 193, .5);'><i class='bx bx-check' style='margin-right: 10px; font-size: 20px;'></i>Save</div>
        </div>
      </div>
    </div>

      <!-- -------------------------------------------------------- -->

    <div style='width: 600px; margin: 10px auto; padding: 20px;'>
    <br>User:<br><br>
  
    <?php

      // variabili di connessione al DB

      include 'PHPFunctions/config.php';

      $tabella = 'tbl_user';

      $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
      $mysqli->select_db($db_name) or die("Unable to select database");
      mysqli_set_charset($mysqli, "utf8");
      $query = "SELECT id, username_us, email_us, premium_us FROM $tabella ";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
          $id = $row["id"];
          $username_us = $row["username_us"];
          $email_us = $row["email_us"];
          $premium_us = $row["premium_us"];

      ?>

          <div style='display: flex;'>
            <a style='color: var(--text-color); width: 80px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $id ?></a>
            <a style='width: 200px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $username_us ?></a>
            <a style='width: 450px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $email_us ?></a>
            <a style='width: 50px; padding: 10px; border: 1px solid var(--text-color);'><?php echo $premium_us ?></a>
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

 </div>
      <script>

      $.ajax({
        url: "PHPFunctions/checkAdmin.php",
        data: {id: localStorage.getItem("login_user")},
        type: 'POST',

        success: function (data) {
          if (data == 'no') {
            document.getElementById("content").remove();
          } else {
            document.getElementById("bg").style.display = 'none';
          }
        }
      });

      function alertFun(text) {
        document.getElementById('alert').innerText = text;
        document.getElementById('alert').style.display = null;
        setTimeout(() => {
          document.getElementById('alert').style.display = 'none';
        }, 3000);
      }

  </script>

</body>

</html>