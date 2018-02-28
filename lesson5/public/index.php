<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

    require_once("../config/config.php");
		require_once('../engine/db/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Фотогалерея</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
</head>
<body>
	<div class="popup">
		<h3>Загрузка файла на сервер</h3>
		<form action="../engine/uploadImage.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="upload">
		</form>
	</div>
	<!-- /.popup -->

    <?php require_once('../engine/gallery/index.php'); ?>

    <div class="bottomBlk">
        <button id="addImg">Загрузить фото</button>
    </div>
    <!-- /.bottomBlk -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/common.js"></script>
</body>
</html>