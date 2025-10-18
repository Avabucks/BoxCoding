<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Request">
  <meta name="description" content="Request custom HTML & CSS components and we can build for you.">
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
    .header {
      position: relative !important;
      border-bottom: 1px solid rgb(0, 0, 0, .1) !important;
    }

    .header .headerLeft i,
    .header a h2,
    .header a h3,
    .header .li a {
      color: var(--black) !important;
    }

    .header .li a::after {
      background-color: rgb(0, 0, 0, .1) !important;
    }

    .header .outline {
      outline: 1px solid rgb(0, 0, 0, .2) !important;
    }

    .header .v-divider {
      border-left: 1px solid rgb(0, 0, 0, .1) !important;
    }

    .status {
      text-align: center;
      margin-top: 80px;
      margin-bottom: -40px;
      font-size: 1em;
    }

  </style>

</head>

<body>

  <?php include 'header.php'; ?>

  <?php include 'request_send_mail.php'; ?>

  <div class="section request">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Request</span>
      </div>
      <h1 class="h1">Request</h1>
      <h2 class="h2">Request custom HTML & CSS components and we can build for you.</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div data-aos="fade-in" data-aos-anchor-placement="top">
      <form method="post" enctype="multipart/form-data">

        <!-- Display submission status -->
        <div class="status">
         <?php if (!empty($statusMsg)) { ?>
          <p class="statusMsg <?php echo !empty($msgClass) ? $msgClass : ''; ?>">
           <?php echo $statusMsg; ?></p>
         <?php } ?>
        </div>

        <div class="input-cont-css">

          <div class="input">
            <label for="fullname">Full Name</label>
            <input class="input" type="text" name="fullname" id="fullname" placeholder="Full Name" required>
          </div>
          <div class="input">
            <label for="email">Email</label>
            <input class="input" type="text" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="input">
            <label for="description">Description</label>
            <textarea class="input" name="description" id="description" placeholder="Description" required></textarea>
          </div>
          <div class="upload">
            <label for="description">Preview Image</label>
            <div class="upload-zone">
                <label>
                    <input type="file" name="attachment" />
                    <i class='bx bx-upload'></i>
                    <span>Upload your PNG, SVG, JPG Image</span>
                </label>
            </div>
          </div>

          <button class="butt butt-black" name="submit" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    AOS.init();

    const files = document.querySelectorAll(".upload-zone");
    files.forEach((file, index) => {
        file.children[0].addEventListener("change", handleOnChangeFile);
    });

    function handleOnChangeFile(e) {
        var filename = e.target.files[0].name;
        e.target.parentNode.children[2].innerText = filename;
        e.target.parentNode.children[2].style.opacity = '1';
    }

  </script>

</body>

</html>
