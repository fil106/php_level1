<?php



//Функция, показывающая общую информацию о корзине. В данный момент представленна в виде заглушки
function basketInfo()
{
	//Стоимость корзины	
	$basket_price = 100;
	//Количество наименований товаров в корзине
	$basket_count = 10;
	//Общее количество товаров в корзине
	$basket_count_good = 15;
	
	//Составим массив для отправки в браузер
	$result['basket_count_good'] = $basket_count_good;
	$result['basket_count'] = $basket_count;
	$result['basket_price'] = $basket_price;	
	
	return $result;
}

//В случае, если пользователь авторизован, то берем корзину из БД и сохраняем ее в сессии
function basketIsAuth()
{
	$id_user = $_SESSION['IdUserSession'];
	$sql = "select * from basket where id_user = (select id_user from users_auth where hash_cookie = '$id_user')";
	$basket_db = getAssocResult($sql);
	
	foreach ($basket_db as $key => $value)
	{
		$basket[$value['ID_UUID']] = $value['count'];
	}
	
	$_SESSION['basket'] = $basket;
}

//Соединяем корзину из сессии с корзиной из cookie
function BasketSessionCookie()
{
	if ($_SESSION['basket'])
	{
		$mass_basket_json = json_decode($_COOKIE['basket'],true);
		if (is_array($mass_basket_json))
		{
			$basket = array_merge($mass_basket_json, $_SESSION['basket']);
		}
	}
	
	$_SESSION['basket'] = $basket;
}


//Добавление товара в корзину
function addGoods($data_product_guid, $count_goods = 1, $isAuth = false)
{
	$basket = $_SESSION['basket'];

	$count_goods = $count_goods == '' ? 1 : (int)$count_goods;
	
	$basket[$data_product_guid] = $count_goods;
	
	
	if (isset($isAuth))
	{
		$idUserSession = $_SESSION['IdUserSession'];
		$link = getConnection();
		$data_product_guid =mysqli_real_escape_string($link, $data_product_guid);
		$count_goods =mysqli_real_escape_string($link, $count_goods);
		
		//Создадим ззапрос для проверки наличия записи в БД
		$sql = "select * from basket where ID_UUID = '$data_product_guid' and id_user = (select id_user from users_auth where hash_cookie = '$idUserSession')";
		$goods_basket = getRowResult($sql, $link);
		$id = $goods_basket['id'];
		if ($goods_basket) //Если товар имеется в корзине
		{
			$sql = "update basket set count = '$count_goods' where id = $id";
			executeQuery($sql, $link);
		}
		else
		{
			$sql = "insert into basket (id_uuid, count, id_user) value ('$data_product_guid', $count_goods, (select id_user from users_auth where hash_cookie = '$idUserSession'));";
			executeQuery($sql, $link);
		}
		
	}
	
	$_SESSION['basket'] = $basket;
	$mass_basket_json = json_encode($basket);
	setcookie('basket', $mass_basket_json, TIME_COOKIE_BASKET, '/');
	return $result;
}




//Очистка корзины полная или выборочная запись
function ClearBasket($isAuth = false, $uuid = NULL)
{
	$basket = $_SESSION['basket'];
	
	if ($uuid)
	{
		unset($basket[$uuid]);
		if ($isAuth)
		{
			$sql = "DELETE FROM `basket` WHERE `basket`.`ID_UUID` = '$uuid';";
			executeQuery($sql);
		}
	}
	else
	{
		if ($isAuth)
		{
			$idUserSession = $_SESSION['IdUserSession'];
			$sql = "DELETE FROM `basket` WHERE `basket`.`id_user` = (select id_user from users_auth where hash_cookie = '$idUserSession');";
			executeQuery($sql); 
		}
		unset($basket);
	}
	
	$_SESSION['basket'] = $basket;
	$mass_basket_json = json_encode($basket);
	setcookie('basket', $mass_basket_json, TIME_COOKIE_BASKET, '/');
	return $result;
}




?>
