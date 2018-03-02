<?php
  /* ФУНКЦИИ ИСПОЛЬЗУЕМЫЕ ПРИ ВЫВОДЕ ГАЛЕРЕИ */
  function getGalleryImages() {

  	$sql = 'SELECT * FROM `gallery`';
    $result = dbExecuteQuery($sql);
    $galleryHtml = '';

    while($row = mysqli_fetch_assoc($result)) {
      $galleryHtml .= gallerySingleImage($row['img-path-thumb'], $row['img-desc'], $row['id']);
    }

    if (empty($galleryHtml)) {
    	$galleryHtml = "<h2>Здесь пока нет фоток</h2>";
		}

    return $galleryHtml;

  }

  function gallerySingleImage($hrefThumb, $desc, $id) {

    $str = "<div class='col-3 galery-image'>";
      $str .= "<a href='single-image.php?id=" . $id . "'><img src='" . $hrefThumb . "' alt='" . $desc . "'></a>";
    $str .= "</div>";

    return $str;

  }