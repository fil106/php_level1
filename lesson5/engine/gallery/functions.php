<?php
  /* ФУНКЦИИ ИСПОЛЬЗУЕМЫЕ В ПРОЕКТЕ */
  function getGalleryImages() {

    $db = mysqli_connect(HOST, USER, PASS, DB);
    $query = "SELECT * FROM `gallery`";
    $row = mysqli_query($db, $query);

    while(mysqli_fetch_assoc($row)) {
      $galleryHtml .= gallerySingleImage(путь к большой картинке, путь к маленькой картинке, описание);
    }

  }

  function gallerySingleImage($hrefFull, $hrefThumb, $desc) {

    $str = "<div class='col galery-image'>";
      $str .= "<a href='" . $hrefFull . "'><img src='" . $hrefThumb . "' alt='" . $desc . "'></a>";
    $str .= "</div>";

    return $str;

  }
