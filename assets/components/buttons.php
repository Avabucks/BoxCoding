<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buttons - BoxCoding</title>

  <meta name="author" content="Avabucks">
  <meta name="keywords" content="Boxcoding, Avabucks, Button">
  <meta name="description" content="Button Components HTML, CSS & JavaScript.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../favicon.png">

  <!-- Include FILES -->
  <link rel="stylesheet" href="../../style_boxcoding.css?v=1.1">
  <link rel="stylesheet" href="../../responsive.css?v=1.1">
  <link rel="stylesheet" href="src/page_style_boxcoding.css?v=1.1">
  <script src="../../js/script.js"></script>
  <script src="src/events.js"></script>

  <!-- ===== ADS ===== -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5682947198534776"
     crossorigin="anonymous"></script>

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

  <!-- ===== HIGHLIGHT ===== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/atom-one-dark.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>

  <!-- ===== AOS ===== -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- ===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

  <?php include '../../header.php'; ?>

  <div class="section">
    <div class="heading-title" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
      <div class="breadcrumb">
        <a href="../../index">Home</a>
        <i class='bx bx-chevron-right'></i>
        <a href="../../component">Components</a>
        <i class='bx bx-chevron-right'></i>
        <span>Buttons</span>
      </div>
      <div class="shareButtons">
        <h1 class="h1">Buttons</h1>
        <a href="#" title="Copy Link"><i class='bx bx-link'></i></a>
        <a href="#" title="Share"><i class='bx bx-share-alt'></i></a>
      </div>
      <h2 class="h2">Button Components HTML, CSS & JavaScript</h2>
      <div class="divider" data-aos="zoom-in-right"></div>
    </div>
    <div data-aos="fade-in" data-aos-anchor-placement="top">
      <div class="cards-components">

        <?php

        include '../../config.php';

        $id_category = 1;

        include 'src/card_creation.php';

        ?>

      </div>
    </div>
  </div>

  <?php include '../../footer.php'; ?>

  <div class="alert hidden-alert hidden">
    <div>
      <i class='bx bxs-check-circle'></i>
      <span></span>
    </div>
  </div>

</body>

</html>
