<?php
  /* ФУНКЦИИ ИСПОЛЬЗУЕМЫЕ ПРИ ВЫВОДЕ ГАЛЕРЕИ */
  function getGalleryImages() {

  	$sql = 'SELECT * FROM `gallery` ORDER BY `count-views` DESC';
    $result = dbExecuteQuery($sql);
    $galleryHtml = '';

    while($row = mysqli_fetch_assoc($result)) {
      $galleryHtml .= gallerySingleImage($row['img-path-thumb'], $row['img-desc'], $row['id'], $row['count-views']);
    }

    if (empty($galleryHtml)) {
    	$galleryHtml = "<h2>Здесь пока нет фоток</h2>";
		}

    return $galleryHtml;

  }

  function gallerySingleImage($hrefThumb, $desc, $id, $views) {

    $str = "<div class='col-3 galery-image'>";
      $str .= "<a href='single-image.php?id=" . $id . "'><img src='" . $hrefThumb . "' alt='" . $desc . "'></a>";
      $str .= "<p>Количество просмотров: $views</p>";
    $str .= "</div>";

    return $str;

  }