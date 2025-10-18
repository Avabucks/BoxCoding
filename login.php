<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Login">
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

    .login {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100%;
    }

    .login .logo {
      display: flex;
      justify-content: center;
      margin-bottom: 50px;
    }
    .login .logo a {
      display: flex;
      align-items: center;
      height: 60px;
      text-decoration: none;
    }
    .login .logo a img {
      height: 45px;
      margin-right: 10px;
    }
    .login .logo a h2 {
      font-weight: 600;
      font-size: 1.1em;
      line-height: 23px;
      color: var(--light);
    }

    .login .logo a h3 {
      font-weight: 500;
      font-size: .9em;
      line-height: 23px;
      color: var(--light);
      opacity: .7;
    }

    .login .cool-divider {
      margin: 40px 0;
    }
    .login .cool-divider span {
      opacity: .5;
    }

    .login .butt-white {
      width: 100%;
      background-color: rgb(100, 100, 100, .1);
      justify-content: center;
      color: var(--light);
      text-decoration: none;
    }

  </style>

</head>

<body>

  <?php

    include 'config.php';

  if (isset($_COOKIE["login_user"])) {
    header("location:dashboard");
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mail = $_POST['email'];
    $password = md5($_POST['password']);
    $return_arr = array();

    $tabella = 'tbl_user';

          // Connessione al db
            $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
    $mysqli->select_db($db_name) or die( "Unable to select database");
      mysqli_set_charset($mysqli,"utf8");

      $query="SELECT username_us, email_us, password_us, id_us FROM $tabella";
      if ($result = $mysqli->query($query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                  if ($row["email_us"] == $mail && $row["password_us"] == $password) {

                    setcookie("username", $row["username_us"], 2147483647);
                    setcookie("login_user", $row["id_us"], 2147483647);

                    header("location:dashboard");

                  }
              }

            }

        /* free result set */
              $result->free();
        $mysqli->close();
   
  }

  ?>
  <div class="login">
    <div data-aos="fade-in" data-aos-anchor-placement="top">

      <div class="logo">
        <a href="<?php echo $folder ?>/index">
          <img src="<?php echo $folder ?>/favicon.png" alt="" />
          <div>
            <h2>BoxCoding</h2>
            <h3>by Avabucks</h3>
          </div>
        </a>
      </div>

      <form method="post" enctype="multipart/form-data">
        <div class="input-cont-css">

          <div class="input">
            <label for="email">Email</label>
            <input class="input" type="text" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="input">
            <label for="password">Password</label>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required>
          </div>

          <button class="butt butt-black" name="login" type="submit">Log In</button>
        </div>

      </form>

      <div class="cool-divider" data-aos="fade-in">
        <span>OR</span>
      </div>

      <a href="<?php echo $folder ?>/signup" class="butt butt-white" name="signup">Sign Up</a>

    </div>
  </div>

  <script>
    AOS.init();
  </script>

</body>

</html>
