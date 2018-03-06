<?php

	require_once('config/config.php');
	require_once('engine/functions.php');
	require_once('engine/db.php');

	echo "<pre>";
	//print_r($_SERVER);
	//print_r($_GET);
	echo "</pre>";

	$url_array = explode("/", $_SERVER['REQUEST_URI']);
	if ($url_array[1] == "")
	{
		$page_name = "index";
	}	else {
		$page_name = $url_array[1];
	}

	$idProduct = $url_array[2];
	$content = prepareVariables($page_name, $idProduct);

	echo "<pre>";
	//print_r($url_array);
		print_r($content);
	echo "</pre>";

	$templatePath = $content['content'];

	require $templatePath;