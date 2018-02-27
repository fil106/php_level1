<?php
	include "resize.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Галерея</title>
    <style>
        #gallery > a {
            display: inline-block;
            margin-right: 10px;
        }

        #gallery > a:last-child {
            margin-right: 0px;
        }
    </style>
</head>
<body>
    <div id="gallery">
        <?php
            getImgs("imgs.txt");

            if(isset($_FILES["file"])) {
                $filename = $_FILES["file"]["name"];
                @$imageinfo = getimagesize($_FILES["file"]["tmp_name"]);

                if($imageinfo["mime"] != "image/jpeg") {
                    ?>
                        <script>alert("Загружаемый файл не является картинкой формата JPEG!");</script>
                    <?php
                } else {
                    $file = @fopen("imgs.txt", "a");
                    $fullname = "img/full";
                    $thumbname = "img/thumbnail/thumb-$filename";
                    if(!fwrite($file, "$thumbname\n")) {
                        ?>
                        <script>alert("Произошла ошибка записи в файл");</script>
                    <?php
                    } else {
                        if(move_uploaded_file($_FILES["file"]["tmp_name"], "$fullname/$filename")) {
                    			create_thumbnail("img/full/$filename", $thumbname, 200, 150);
                            ?>
                                <script>alert("Файл успешно загружен");</script>
                            <?php
                            echo getGalleryItem($thumbname);
                        } else {
                            ?>
                            <script>alert("Файл не был загружен");</script>
                            <?php
                        }
                    }
                }
            }

        ?>
    </div>
    <br>
    <form enctype="multipart/form-data" action="#" method="post">
        <label>Выберите фотографию</label>
        <input name="file" type="file">
        <button type="submit">Загрузить фото</button>
    </form>
</body>
</html>

<?php
    /*** ФУНКЦИИ ***/

    function getImgs($filename) {
        $strOut = "";
        $file = @fopen($filename, "r");
        if($file) {
            while(($src = fgets($file, 4096)) !== false) {
                echo getGalleryItem($src);
            }
            if(!feof($file)){
                $strOut = "Ошибка: fgets() неожиданно потерпел неудачу\n";
            }
            fclose($file);
        }
        echo $strOut;
    }

    function getGalleryItem($href) {
    		$arrStr = explode("-", $href);
        return "<a href='img/full/$arrStr[1]'><img height='100px' src='$href'></a>";
    }
?>