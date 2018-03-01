<?php

	require_once('../config/config.php');
	require_once('../engine/db/functions.php');
	require_once('resize.php');

	if (isset($_POST['upload']) && isset($_FILES['file'])) {

		$file = $_FILES['file']['tmp_name'];
		$filename = htmlspecialchars($_FILES['file']['name']);
		$imageinfo = getimagesize($file);

		/* проверочка на наличие добавляемого имени в базе */
		$sql = "SELECT `img-name` FROM `gallery` WHERE `img-name`='$filename'";
		$result = dbExecuteQuery($sql);

		if ($count = mysqli_num_rows($result)) {

			echo "Фотка с таким именем уже существует";

		} else {

			$originalImageDest = '../public/img/gallery/original';
			$thumbnailImageDest = '../public/img/gallery/thumbnail';

			if($imageinfo['mime'] != 'image/jpeg') {

				print_r($imageinfo);
				echo "Загружаемый файл не картинка формата JPEG или PNG!";

			} else {
				if (move_uploaded_file($file, "$originalImageDest/$filename")) {

					create_thumbnail("$originalImageDest/$filename", "$thumbnailImageDest/thumb-$filename", 500, 300);

					$sql = "INSERT INTO `gallery` (`img-name`, `img-path-full`, `img-path-thumb`, `img-desc`) VALUE
							('$filename', 'img/gallery/original/$filename', 'img/gallery/thumbnail/thumb-$filename', '$filename')";

					dbExecuteQuery($sql);

					echo "УРА! Файл успешно загружен";

				} else {
				    echo "Не удалось записать файл на сервер";
				}
			}
		}
	}
?>
<br>
<a href="../public/index.php">< < < Перейти назад</a>