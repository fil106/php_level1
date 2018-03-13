<?php

//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);


//Функция получает переменные в зависимости от выбранной страницы. news или newspage или feedback

function prepareVariables($page_name) 
{
	switch ($page_name){
	
		case "index":
			$vars['content'] = '../templates/index.php';
			$vars['new_product'] = NewProduct();
			$vars['top_product'] = TopProduct();
			$vars['sale_product'] = SaleProduct();
		break;
		
		case "contact":
		
		break;
		
		case "register":
		
		break;	
		
		case "feedback":
		
		break;
	}
	
	
	return $vars;
}

function NewProduct()
{
	$sql = 'select * from goods order by date desc limit 6;';
	return getAssocResult($sql);
}

function TopProduct()
{
	$sql = 'select * from goods order by view desc, date desc limit 3;';
	return getAssocResult($sql);
}

function SaleProduct()
{
	$sql = 'select * from goods where status = "2" order by view desc limit 3;';
	return getAssocResult($sql);
}

?>
