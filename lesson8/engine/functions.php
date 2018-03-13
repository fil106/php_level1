<?php
//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);

function prepareVariablesAjax($PageAjax)
{
	$isAuth = auth();
	$vars['basket'] = basketInfo();

	switch ($PageAjax){
		case "register":
			$vars['isAuth'] = auth($_POST['login'], $_POST['pass'], $_POST['rememberme']);
			$vars['content'] = '../templates/auth.php';
		break;
		
		case "basket":		//Добавление товара в корзину
			$data_product_guid = $_POST['var4'];
			$count_goods = $_POST['count'];
			$result = addGoods($data_product_guid, $count_goods, $isAuth);
			$vars['content'] = '../templates/basket/res_basket.php';
		break;	
		
		case "clear_basket":	//Очистка корзины
			ClearBasket($isAuth);
			$vars['content'] = '../templates/basket/res_basket.php';
		break;
	}
	
	return $vars;
}

//Функция получает переменные в зависимости от выбранной страницы. news или newspage или feedback и т.д.
function prepareVariables($page_name) 
{
// Функция сравнения скорости работы функций. Показывает на сколько вторая функция быстрее первой.	
//	TimeSpeed(Catalog_old, Catalog);

	//Выполним функции, которые должны выполняться на каждой странице (авторизация, корзина и т.д.)
	$vars['isAuth'] = auth();
	$vars['basket'] = basketInfo();
	
	switch ($page_name){
	
		case "index":
			$vars['content'] = '../templates/index.php';
			$vars['title'] = SITE_TITLE . "Главная страница";
			$vars['new_product'] = NewProduct();
			$vars['top_product'] = TopProduct();
			$vars['sale_product'] = SaleProduct();
		break;
		
				
        case "catalog":
				
				if (!$_GET['action'])
				{
					$vars['content'] = '../templates/catalog/index.php';
					$vars['catalog'] = Catalog();
				}
				else
				{
					$vars['content'] = '../templates/catalog/sub_catalog.php';
					$vars['sub_catalog'] = Sub_Catalog($_GET);
				}
				
            break;
			
        case "good":
				$vars['content'] = '../templates/good/good.php';
				
				$vars['good'] = Good();
				$vars['new_product'] = NewProduct(3);
				$vars['top_product'] = TopProduct(3);
				
            break;
			
        case "article":

            break;
			
		case "contact":

            break;	
					
		case "register":
			
            break;
			
		default:
			$vars['content'] = '../templates/404page/index.php';
			$vars['title'] = SITE_TITLE . "Запрашиваемая страница не найдена!!!";
			$vars['new_product'] = NewProduct();
			$vars['top_product'] = TopProduct();
			$vars['sale_product'] = SaleProduct();		
		break;	
	}
	
	
	return $vars;
}



function NewProduct($limit = 6)
{
	$sql = "select * from goods order by date desc limit $limit;";
	return getAssocResult($sql);
}

function TopProduct($limit = 3)
{
	$sql = "select * from goods order by view desc, date desc limit $limit;";
	return getAssocResult($sql);
}

function SaleProduct($limit = 3)
{
	$sql = "select * from goods where status = '2' order by view desc limit $limit;";
	return getAssocResult($sql);
}


/*
Представлено два варианты выполнеия одной и той же задачи. 
Дает возможность сравнить скорость выполнения одной и той же задачи при использовании различных подходов
*/
function Catalog_old()
{
	$result = getAssocResult('SELECT * FROM `categories` where parent_id = "0";');
	foreach ($result as $key=>$value)
	{
		$result[$key]['sub_category'] = getAssocResult('SELECT * FROM `categories` where parent_id = "'. $value['id_category'] .'";');
	}
	
	return $result;
}

function Catalog($deep = 0)
{
	$sql = "SELECT * FROM `categories` INNER JOIN pages on categories.id_pages = pages.id where categories.parent_id = '$deep'";
	$result = getAssocResult($sql);
$sql = "SELECT * FROM `categories` INNER JOIN pages on categories.id_pages = pages.id where categories.parent_id in (SELECT categories.id_category FROM categories where parent_id = '0')";
	$results = getAssocResult($sql);

	foreach ($result as $key=>$value)
	{
		foreach ($results as $keys=>$values)
		{
			if ($values['parent_id'] == $value['id_category'])
			{
				$result[$key]['sub_category'][] = $results[$keys];
			}

		}
	}	
	return $result;
}


function Sub_Catalog($data)
{
	$id = $data['id'];
	$id_category = getAssocResult("SELECT * FROM `categories` where id_pages = (select id from pages WHERE url = '$id');");
	$parent_category = getAssocResult('SELECT * FROM `categories` where id_category = "'. $id_category[0]['parent_id'] .'";');
	$sub_catalog = getAssocResult('SELECT * FROM `goods` where id_category = "'. $id_category[0]['id_category'] .'";');

	
	$result = $id_category;	
	$result[0]['catalog'] = $sub_catalog;
	$result[0]['parent'] = $parent_category;
	
	
	return $result; 
}

function Good()
{
	$data = $_GET;
	executeQuery('UPDATE `goods` SET `view` = `view` + 1 where id_good = "'. $data['id'] .'"');
	$result['product'] = getAssocResult('select * from goods where id_good = "'. $data['id'] .'"');
	$result['product'] = $result['product'][0];

	return $result;
	
}


/*
Сохдадим массив для формирования хлебных крошек (быстрой навигации)
*/
function BreadCrumbs($url)
{
	
	if (is_numeric($url[2])) 
	{
		//Выаолняектся логика построения пути, если просматривается товар
	} 
	else
	{
		unset($url[0]);
		unset($url[count($url)]);
		$url[1] = "'" . $url[1];
		$url[count($url)] = $url[count($url)] . "'";
		$url_arr = implode("','",$url);
		
		$sql = "SELECT name, url FROM `pages` WHERE url IN ($url_arr)";
		$crumbs = getAssocResult($sql);
		$url = URL;
		foreach ($crumbs as $key => $value)
		{
			$url =  $url . $value['url']. '/';
			$bread_crumbs[$url] = $value['name'];
		}
	}
	
	return $bread_crumbs;
}

?>
