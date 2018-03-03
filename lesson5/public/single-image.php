<?php if(isset($_GET['id'])): ?>

	<?php
        echo 1;
		require_once('../config/config.php');
		require_once('../engine/db/functions.php');

		$id = htmlspecialchars($_GET['id']);

		$sqlSelect = "SELECT `img-name`, `img-path-full`, `count-views` FROM `gallery` WHERE `id`=" . $id;
		$arrResult = dbGetResult($sqlSelect);

		$views = ++$arrResult['count-views'];
		$sqlInsert = "UPDATE gallery SET `count-views`=" . $views . " WHERE id=" . $id;

		if(!dbExecuteQuery($sqlInsert)) {
			$error['insert'] = 'Ошибка увеличения числа просмотров';
		}
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= $arrResult['img-name'] ?></title>
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
		<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<div id="gallery" class="row justify-content-md-center">
				<?php if(isset($error['insert'])): ?>
					<p class="error">Ошибка увеличения числа просмотров фотографии</p>
				<?php endif; ?>
				<img width="50%" src="<?= $arrResult['img-path-full'] ?>" alt="<?= $arrResult['img-name'] ?>">
			</div>
		</div>

		<div class="bottomBlk">
			<a class="turnBack-btn" href="index.php">Вернуться к галереи</a>
			<button id="addImg">Количество просмотров: <?= $views ?></button>
		</div>
		<!-- /.bottomBlk -->

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/common.js"></script>
	</body>
	</html>

<?php endif; ?>