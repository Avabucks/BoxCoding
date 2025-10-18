<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Signup">
  <meta name="description" content="Explore UI/UX Designs, Website Templates and Source Code in HTML, CSS and JavaScript that can be used in your next project.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.png">

  <!-- Include FILES -->
  <link rel="stylesheet" href="./style_boxcoding.css?v=1.1">
  <link rel="stylesheet" href="./responsive.css?v=1.1">
  <script src="./js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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

    .signup {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100%;
    }

    .signup .logo {
      display: flex;
      justify-content: center;
      margin-bottom: 50px;
    }
    .signup .logo a {
      display: flex;
      align-items: center;
      height: 60px;
      text-decoration: none;
    }
    .signup .logo a img {
      height: 45px;
      margin-right: 10px;
    }
    .signup .logo a h2 {
      font-weight: 600;
      font-size: 1.1em;
      line-height: 23px;
      color: var(--light);
    }

    .signup .logo a h3 {
      font-weight: 500;
      font-size: .9em;
      line-height: 23px;
      color: var(--light);
      opacity: .7;
    }

    .signup .cool-divider {
      margin: 40px 0;
    }
    .signup .cool-divider span {
      opacity: .5;
    }

    .signup .butt-white {
      width: 100%;
      background-color: rgb(100, 100, 100, .1);
      justify-content: center;
      color: var(--light);
      text-decoration: none;
    }

    .hidden {
      display: none;
    }

  </style>

</head>

<body>

  <div class="popup error hidden">
    <div id="error">
      <div class="header-popup"><i class='bx bx-error-circle'></i>Error</div>
      <div class="text"></div>
      <div class="butt-cont">
        <button class="butt butt-black close-popup">Got It!</button>
      </div>
    </div>
  </div>

  <?php

    include 'config.php';

  if (isset($_COOKIE["login_user"])) {
    header("location:dashboard");
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $mail = $_POST['email'];
  $password = md5($_POST['password']);

  $id_univoco = md5(round(microtime(true) * 1000) + rand(0, 150000));

  $tabella = 'tbl_user';


    // Connessione al db
    $mysqli = new mysqli($host, $username_db, $password_db, $db_name) or die( "Unable to connect");
    $mysqli->select_db($db_name) or die( "Unable to select database");
      mysqli_set_charset($mysqli,"utf8");

      $query="INSERT INTO $tabella (username_us, email_us, password_us, id_us, premium_us) VALUES ('$username', '$mail', '$password', '$id_univoco', '0') ";

      if (mysqli_query($mysqli, $query)) {

          setcookie("username", $username, 2147483647);
          setcookie("login_user", $id_univoco, 2147483647);

          ?>
            <script>location.href="manage_component?id=0"</script>
          <?php      
      }
      $mysqli->close();

  }

  ?>
  <div class="signup">
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
        <div class="signup-form input-cont-css">

          <div class="input">
            <label for="username">Username</label>
            <input class="input" type="text" name="username" id="username" placeholder="Username" required>
          </div>
          <div class="input">
            <label for="email">Email</label>
            <input class="input" type="text" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="input">
            <label for="password">Password</label>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required>
          </div>

          <a class="butt butt-black" id="signup_verify">Sign Up</a>

        </div>

          <div class="verification input-cont-css hidden">
            <div class="input">
              <label for="verify">Verification Code (Check your email)</label>
              <input class="input" type="text" name="verify" id="verify" placeholder="Verification Code" required>
            </div>
            <button class="butt butt-black" name="signup" type="submit">Sign Up</button>
          </div>

      </form>

    </div>
  </div>

  <script>
    AOS.init();

    function error_alert(text) {
      document.querySelectorAll(".error")[0].classList.remove("hidden");
      document.querySelectorAll(".error")[0].querySelectorAll(".text")[0].innerText = text;
    }

    // SIGN UP
    var temp_code = "";
    var send_mail = false;

    document.querySelector("#signup_verify").addEventListener("click", function (e) {

        var error_text = "";

        var username = document.querySelector("#username").value;
        var email = document.querySelector("#email").value;
        var password = document.querySelector("#password").value;

        if (password.length < 8) error_text = "The password must contain at least 8 characters.";
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) error_text = "This email is not valid.";
        if (username == "" || email == "" || password == "") error_text = "You must fill all the fields.";

        if (error_text != "") {
            error_alert(error_text);
            return;
        }

        $.ajax({
            url: 'check_username',
            type: 'POST',
            data: {
                username_us: username
            },

            success: function (data) {
                if (data == "1") {
                    error_alert("This username already exists.");
                    return;
                }
                $.ajax({
                    url: 'check_exist',
                    type: 'POST',
                    data: {
                        email_check: email
                    },

                    success: function (data) {
                        if (data == "1") {
                            error_alert("This email already exists.");
                            return;
                        }
                        if (username != "" && email != "" && password != "" && (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) && password.length >= 8) {
                            document.querySelectorAll(".verification")[0].classList.remove("hidden");
                            document.querySelectorAll(".signup-form")[0].classList.add("hidden");

                            temp_code = parseInt(Math.random() * (99999 - 10000) + 10000);

                            $.ajax({
                                url: "sendMail",
                                type: 'POST',

                                data: {
                                    temp_code: temp_code,
                                    email: email
                                },

                                success: function (data) {
                                    send_mail = true;
                                }

                            });

                        }

                    }

                });

            }
        });

    });

    $('form').submit(function (e) {

        if (!send_mail) return;

        var verify = document.querySelector("#verify").value;

        if (verify != temp_code) {
            e.preventDefault();
            error_alert("The verification code is wrong.");
        }
    });

  </script>

</body>

</html>
