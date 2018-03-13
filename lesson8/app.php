<?php
session_start();

require_once('../config/config.php');
require_once('../engine/functions.php');
require_once('../engine/db.php');
require_once('../engine/autorize.php');
require_once('../engine/basket.php');
require_once('../engine/debug.php');



if ($_POST['metod'] == 'ajax')
{
	$PageAjax = $_POST['PageAjax'];	//Получаем действие на AJAX

	ob_start(); //Запускаем буферизауию вывода	
	$content = prepareVariablesAjax($PageAjax);	//Получаем переменные для шаблона, на основе запрошенного действия.
	require $content['content'];
	$str = ob_get_contents(); //Записываем в переменную то, что в буфере
	ob_end_clean(); //Очищаем буфер
	echo json_encode($str);
}
else
{
	$page_name =  Router();
	$content = prepareVariables($page_name);
	$content['bread_crumbs'] = BreadCrumbs(explode("/", $_SERVER['REQUEST_URI']));
	require '../templates/bases.php';
}



function Router()
{
	$url_array = explode("/", $_SERVER['REQUEST_URI']);
	
	BreadCrumbs($url_array);	

	//Если не указан адрес страницы, то считаем что пользователь зашел на главную страницу
	if ($url_array[1] == "")
	{
		$page_name = "index";
	}
	else
	{
		$page_name = $url_array[1];
		if ($url_array[2])
		{
			$_GET['action'] = $url_array[2];
		}
		
		if ($url_array[3])
		{
			$_GET['id'] = $url_array[3];
		}
	
		
		if (is_numeric($url_array[2])) 
		{
			$_GET['id'] = $url_array[2];
			$_GET['action'] = 'good';
		} 
	}
	return $page_name;
}



?>
