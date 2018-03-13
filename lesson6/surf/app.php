<?php

	/* Подключаем необходимые файлы */
	require_once('config/config.php');
	require_once('engine/functions.php');
	require_once('engine/db.php');
	require_once('engine/auth.php');

	session_start();

//	echo "<pre>";
//
//		print_r($_SERVER);
//		print_r($_GET);
//
//	echo "</pre>";

	$isAuth = auth();

	if ( isset($_POST['auth']) ) {

		$login = htmlspecialchars($_POST['auth_login']);
		$password = htmlspecialchars($_POST['auth_pass']);
		$rememberme = htmlspecialchars($_POST['auth_remember']);

		/* проверки на вводмсые данные */
		if ( $login == '' ) {
			$ERRORS['auth'][] = "Не был введен логин!";
		}
		if ( $password == '' ) {
			$ERRORS['auth'][] = "Не был введен пароль!";
		}

		/* Если ошибок нет, то пытаемся логиниться */
		if ( empty($ERRORS['auth']) ) {

			if ( auth($login, $password, $rememberme )) {
				$isAuth = 1;
			} else {
				$ERRORS['auth'][] = "Введеной конбинации (логин и пароль) не найдено!";
			}

		}

	}

	/* Выход пользователя при нажатии на кнопку "Выйти" */
	if( isset($_GET['logout']) ) {
		$isAuth = UserExit();
		header("Location: /");
	}

	$url_array = getUriArr('/');

	if ( $url_array[1] == "" )
	{

		$page_name = "index";

	}	else {

		$page_name = $url_array[1];

	}

	$content = prepareVariables($page_name);

	echo "<pre style='display: block;height: 300px;'>";

		//print_r($url_array);
		//print_r($content);
		print_r($_SESSION);
		print_r($isAuth);
		print_r($ERRORS);

	echo "</pre>";

	require 'templates/bases.php';