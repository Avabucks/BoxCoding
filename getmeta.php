<?php
  $url = $_POST['url'];
  function getDescription($url) {
      $tags = get_meta_tags($url);
      return @($tags['description'] ? $tags['description'] : "-");
  }
  // get web page meta description
  echo getDescription("https://" . $url);
?>
