<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Links - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Social, Links">
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
    .input-cont-badge {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      margin: 70px auto;
      width: 100%;
      align-items: flex-start;
    }
    .input-cont-badge .input {
      display: flex;
      align-items: center;
      width: 100%;
      border: 1px solid rgb(255, 255, 255, .2);
      background-color: rgb(0, 0, 0, .7);
      outline: 0 solid rgb(0, 0, 0, 0);
      border-radius: 10px;
      transition: .3s;
    }
    .input-cont-badge .input input {
      color: var(--light);
    }

    .input-cont-badge label {
      font-size: .95em;
      margin-bottom: -12px;
    }

    .input-cont-badge .input input {
      padding-inline: 25px;
      background-color: transparent;
      outline: 0;
      border: 0;
      font-size: 1em;
      width: 100%;
      height: 50px;
    }

    .input-cont-badge .input:focus-within {
      outline: 1px solid var(--primary);
    }

    .input-cont-badge .badge {
      padding-inline: 25px;
      background-color: rgb(255, 255, 255, .1);
      height: 50px;
      display: flex;
      align-items: center;
      border-radius: 10px 0 0 10px;
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
      } else {
        $user_id = $_COOKIE["login_user"];
      }

  ?>

  <div class="section resources">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <a href="dashboard">Dashboard</a>
        <i class='bx bx-chevron-right'></i>
        <span>Social Links</span>
      </div>
      <h1 class="h1">Social Links</h1>
      <h2 class="h2">Add links to your social networks so that you can be contacted for business</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div data-aos="fade-in" data-aos-anchor-placement="top">

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
    $website_url = $_POST['website_url'];
    $instagram_url = $_POST['instagram_url'];
    $facebook_url = $_POST['facebook_url'];
    $linkedin_url = $_POST['linkedin_url'];
    $youtube_url = $_POST['youtube_url'];

    $tabella = 'tbl_social';

    $exist = "0";

    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
    $mysqli->select_db($db_name) or die("Unable to select database");
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT id FROM $tabella WHERE id_us = '" . $user_id . "'";
    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $exist = "1";
        }
    }

      /* free result set */
      $result->free();
      $mysqli->close();

                // Connessione al db
              $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
      $mysqli->select_db($db_name) or die( "Unable to select database");
        mysqli_set_charset($mysqli,"utf8");

        if ($exist == "0") {
          $query="INSERT INTO $tabella (id_us, website_url, instagram_url, facebook_url, linkedin_url, youtube_url) VALUES ('$user_id', '$website_url', '$instagram_url', '$facebook_url', '$linkedin_url', '$youtube_url') ";
        } else {
          $query="UPDATE $tabella SET website_url = '$website_url', instagram_url = '$instagram_url', facebook_url = '$facebook_url', linkedin_url = '$linkedin_url', youtube_url = '$youtube_url' WHERE id_us = '" . $user_id . "' ";
        }

        if (mysqli_query($mysqli, $query)) {
          ?>
          <script>location.href="dashboard"</script>
          <?php
        }

        $mysqli->close();


    } else { 
      
        $website_url = "";
        $instagram_url = "";
        $facebook_url = "";
        $linkedin_url = "";
        $youtube_url = "";

        $tabella = 'tbl_social';

        $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die("Unable to connect");
        $mysqli->select_db($db_name) or die("Unable to select database");
        mysqli_set_charset($mysqli, "utf8");
        $query = "SELECT website_url, instagram_url, facebook_url, linkedin_url, youtube_url FROM $tabella WHERE id_us = '" . $user_id . "' ";
        if ($result = $mysqli->query($query)) {
          /* fetch associative array */
          while ($row = $result->fetch_assoc()) {
            $website_url = $row["website_url"];
            $instagram_url = $row["instagram_url"];
            $facebook_url = $row["facebook_url"];
            $linkedin_url = $row["linkedin_url"];
            $youtube_url = $row["youtube_url"];

        }
        }

        /* free result set */
        $result->free();
        $mysqli->close();

      }

      ?>
    
      <form name="form1" method="post" enctype="multipart/form-data">
        <div class="input-cont-badge">

          <label for="website_url">Website Url</label>
          <div class="input">
            <div class="badge">https://</div>
            <input type="text" name="website_url" id="website_url" placeholder="Website Url" value="<?php echo $website_url ?>">
          </div>

          <label for="instagram_url">Instagram Username</label>
          <div class="input">
            <div class="badge">https://www.instagram.com/</div>
            <input type="text" name="instagram_url" id="instagram_url" placeholder="Instagram Username" value="<?php echo $instagram_url ?>">
          </div>

          <label for="facebook_url">Facebook Username</label>
          <div class="input">
            <div class="badge">https://www.facebook.com/</div>
            <input type="text" name="facebook_url" id="facebook_url" placeholder="Facebook Username" value="<?php echo $facebook_url ?>">
          </div>

          <label for="linkedin_url">Linkedin Username</label>
          <div class="input">
            <div class="badge">https://www.linkedin.com/in/</div>
            <input type="text" name="linkedin_url" id="linkedin_url" placeholder="Linkedin Username" value="<?php echo $linkedin_url ?>">
          </div>

          <label for="youtube_url">Youtube Username</label>
          <div class="input">
            <div class="badge">https://www.youtube.com/</div>
            <input type="text" name="youtube_url" id="youtube_url" placeholder="Youtube Username" value="<?php echo $youtube_url ?>">
          </div>

          <button class="butt butt-black" name="submit" type="submit"><i class='bx bx-check'></i>Submit</button>

        </div>
      </form>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    AOS.init();
  </script>


</body>

</html>
